<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traffic extends CI_Controller {
    public function index() {
    	$data['agent'] = $this->Form();
      
		$this->load->view('System_View',$data);
    }
   public function send(){
   	$this->form_validation->set_rules('codeAgent','code Agent','trim|required');
   	$this->form_validation->set_rules('amount','Montant','trim|required');
   	$this->form_validation->set_rules('devise','Devise','trim|required');
   	$this->form_validation->set_rules('mdp1','Mot de passe','trim|required');
   	$this->form_validation->set_rules('attache','Deuxieme Mot de passe','trim');

   	if($this->form_validation->run()==true){
		$montant=$this->input->post('amount');
		$code = $this->input->post('codeAgent');
		$devise = $this->input->post('devise');
		$mdp = $this->input->post('mdp1');
		$attache = $this->input->post('attache');
		if (!empty($attache)) {
			$attache = trim(strip_tags($attache));
		}
		else{
			$attache = 'Aucune attache';
		}

		$montant = floatval($montant);
		$montantRX = helper_facturation($montant);
						
		
   		if(sha1($mdp)==$this->session->userdata('MDP')){
		if($montantRX=='error'){
			echo  'Erreur#Veuillez entrer un nombre valide et superieur à 1#error';
		}
		else{
				$check_my_amount = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>10,'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),'CODE_DEVISE'=>$devise));
		if(!$check_my_amount){
			echo  'Erreur#Il n\'ya pas de solde disponible';
			}
			else{
				if( $check_my_amount['MONTANT_SOLDE'] >= $montant + $montantRX[1]){

					#$sommes_me = $check_my_amount['MONTANT_SOLDE']+$montant;

					$code_transaction=generate_code('rec_trans_systm','CODE_RT','transysag');

					$data = array('CODE_RT'=>$code_transaction,'CODE_RX'=>$code,'CODE_TX'=>$this->session->userdata('CODE_SYSTM'),'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'MONTANT_RX'=>$montantRX[0],'FRAIS_TX'=>$montantRX[1]);

					if($this->available_amount_when_receive($devise,$code,$montantRX[0],$data)==true){
						$systm = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>10,'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),'CODE_DEVISE'=>$devise));
						$dt_update['MONTANT_SOLDE'] = ($systm['MONTANT_SOLDE']-$montant)+$montantRX[1];
						$dt_update['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');


						
						if(!empty($systm)){
							$this->Model_Ted->update(
								'solde_system',
								array(
									'CODE_SOLDE'=>$systm['CODE_SOLDE'],
									'CODE_DEVISE'=>$devise,
									'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),
									'IS_ACTIF_SOLDE'=>10),
								$dt_update);
						$getDev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$devise));
						$getRx = $this->Model->getOne('agent',array('IS_ACTIF_AGENT'=>15,'CODE_AGENT'=>$code));
						echo  'Transaction reussie#'.$montant.''.$getDev['ABBR_DEVISE'].' virés à '.$getRx['PSEUDO_AGENT'].' '.$getRx['NOM_AGENT'].'#success';
						}
						else{
							echo  'Erreur#Une erreur s\'est produite,Veririfier bien votre devise#warning';
							
						}

						


					}else{
						echo  'Erreur#Une erreur lors de la transaction#error';
						
					}
				}
				else{
					echo  'Erreur#Le solde est insuffisant pour faire cette transaction#error';
				}

			}
		}
	}
	else{
		echo  'Erreur#Le code est incorrect#error';
	}
  
}
else{

	echo  'Erreur#Tous les champs sont requis#error';
	// $response['amount'] = strip_tags(form_error('amount'));
	// $response['mdp1'] = strip_tags(form_error('mdp1'));
	// $response['mdp2'] = strip_tags(form_error('mdp2'));

}
	
		#$this->Model_Ted->insert('solde',$data2);
	}


	private function available_amount_when_receive($devise,$code,$montant,$data){
				#ON VERIFIE SI LE CLIENT A DEJA EFFECTUE OU RECU UNE TRANSACTION
		$check_amount = $this->Model->getOne('solde_system',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>11,'CODE_DEVISE'=>$devise));
		
		
			#SI JAMAIS,ON CREE UN SOLDE POUR LUI	
			if(empty($check_amount && $montant>0)){
				$code_solde=generate_code('solde_system','CODE_SOLDE','sld');
				$this->Model_Ted->register('solde_system',array('CODE_CLIENT'=>$code,'CODE_DEVISE'=>$devise,'CODE_SOLDE'=>$code_solde,'MONTANT_SOLDE'=>$montant));
				$this->Model_Ted->register('rec_trans_systm',$data);
				return true;
				
			}
			#S IL EN A, ON INSERE SON MONTANT AVEC SON SOLDE COURANT
			else{
				$condition = array('IS_ACTIF_SOLDE'=>11,'CODE_DEVISE'=>$devise,'CODE_CLIENT'=>$check_amount['CODE_CLIENT']);
				// $this->Model_Ted->update('solde_system',$data,array('MONTANT_SOLDE'=>$sommes));
				$sommes_total =$check_amount['MONTANT_SOLDE'] + $montant;

				if($this->Model_Ted->update('solde_system',$condition,array('MONTANT_SOLDE'=>$sommes_total,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))){
					$this->Model_Ted->register('rec_trans_systm',$data);
					return true;
				}
				else{
					return false;
				}
			}
		
		
	}
    private function Form(){
    	// $get_all = $this->Model_Ted->join_client_solde(array('IS_ACTIF_CLIENT'=>9),'PSEUDO_CLIENT');
    	$get_all = $this->Model_Ted->list_Some_Order('agent',array('IS_ACTIF_AGENT'=>15),'PSEUDO_AGENT');
    	// $get_client = $this->Model_Ted->querysql('SELECT * FROM client,devise WHERE IS_ACTIF_CLIENT=9 AND IS_ACTIF_DEVISE=9 ORDER BY PSEUDO_CLIENT ASC');
    	$devise = $this->Model_Ted->list_Some('devise',array('IS_ACTIF_DEVISE'=>9));
    	$html = '';
    	
    	$num = 1;
    	// foreach($devise as $key_dev){
    	// 	$html_devise = "<option value='".$key_dev['CODE_DEVISE']."'>".$key_dev['NOM_DEVISE']."(".$key_dev['ABBR_DEVISE'].")</option>";
    	// }
    	foreach($get_all as $key){
    		
            $html.="
            	 <div style='border-radius:20px;height:10px;width:60%;margin-left:20%;background-color:skyblue;font-weight:bold; font-size:1.4em;	' class=' list-item box'><span class='subject'>".$key['PSEUDO_AGENT']."</span>-<span class='course'>".$key['PRENOM_AGENT']."</span>

					<a href='".base_url('Traffic/Traffic/getOne')."/".$key['CODE_AGENT']."'   data-toggle='tooltip' class='pull-right btn btn-warning' title=''>Envoyer</a>
           <hr></div>";
    	}

    
    	return $html;
    	// $this->load->view('Traffic_Send',$data);
    }

     public function getOne(){
    	$code = $this->uri->segment(4);
    	// $devise = $this->Model_Ted->join_solde_system_devise(array('IS_ACTIF_DEVISE'=>9));
    	$devise = $this->Model_Ted->querysql2("SELECT * FROM devise INNER JOIN solde_system on devise.CODE_DEVISE=solde_system.CODE_DEVISE WHERE solde_system.IS_ACTIF_SOLDE=10");
    	$one = $this->Model->getOne('agent',array('IS_ACTIF_AGENT'=>15,'CODE_AGENT'=>$code));
    	$html_devise = '';
    	foreach($devise as $key){
    		$html_devise .= '<option value="'.$key['CODE_DEVISE'].'">'.$key['NOM_DEVISE'].'('.$key['MONTANT_SOLDE'].''.$key['ABBR_DEVISE'].') </option>';
    	}
      	
      	$output['devise'] = $html_devise;
    	$output['data'] = $one;
    	
    	$this->load->view('Traffic_Send',$output);
    }

    public function amount(){
    	$montant_solde = $this->Model_Ted->querysql('SELECT * FROM solde_system INNER JOIN devise ON solde_system.CODE_DEVISE=devise.CODE_DEVISE WHERE IS_ACTIF_SOLDE=10');
    	$html = '';
    	foreach($montant_solde as $key){
    		
    	$html ='<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><a href="'.base_url('Dashboard/Traffic/Form').'"><i class="fas fa-cog"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">Disponible</span>
                <span class="info-box-number">
                  '. $key['MONTANT_SOLDE'].'
                  <small>'. $key['ABBR_DEVISE'].'
                  </small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>';
    	}

    	$response['html'] = $html;

    	echo json_encode($response);
    }











    public function __construct() {
	parent::__construct();
	$data = array(
					'IS_ACTIF_ADMIN'=>9,
					'CODE_ADMIN'=>$this->session->userdata('CODE'),
				);
	$data_redirect = $this->Model->getOne('administrateur',$data);
	// echo "<pre>";
	// echo $this->session->userdata('STATIC');
	// print_r($data_redirect);
	// exit();
		 if (!$this->session->userdata('ID') || !$data_redirect || $data_redirect['CODE_ADMIN'].'admin'!=$this->session->userdata('STATIC')) {
		 	$this->session->sess_destroy();
		 	redirect('Login/index');
		 	exit();
		 }
	}

}