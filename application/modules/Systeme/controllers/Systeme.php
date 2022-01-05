<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Systeme extends CI_Controller {

    public function Entre(){
        $req = "SELECT * FROM rec_trans_systm INNER JOIN agent ON rec_trans_systm.CODE_TX=agent.CODE_AGENT WHERE IS_ACTIF_ADM=10 AND IS_ACTIF_AGENT=15 AND IS_ACTIF_RT=9 AND CODE_RX=?";
        $cond = array($this->session->userdata('CODE_SYSTM'));
       
     $entreFromAgent = $this->Model_Ted->querypreparemix($req,$cond);
     $num=1;
     $html="";
     foreach($entreFromAgent as $key){
      $codeDev = $key['CODE_DEVISE'];
      $dev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$codeDev));
        $html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_AGENT']." ".$key['PSEUDO_AGENT']."</td>
                  <td>".$key['CODE_PAYS_ALPHA3']."</td>
                  <td>".$key['MATRICULE_AGENT']."</td>
                  <td>".$key['TELEPHONE']."</td>
                  <td>".$key['MONTANT_TX']."".$dev['ABBR_DEVISE']."</td>
                  <td>".getFortmat($key['DATE_RT'])."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Agent/getOne/".$key['CODE_RT'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>

                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_RT'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_RT'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer cet indice</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_RT']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
      }
      $data['tableau'] = $html; 
      $this->load->view('Entre_List_View',$data);
    }



public function Sortie(){
        $req = "SELECT * FROM rec_trans_systm INNER JOIN agent ON rec_trans_systm.CODE_RX=agent.CODE_AGENT WHERE IS_ACTIF_ADM=10 AND IS_ACTIF_AGENT=15 AND IS_ACTIF_RT=9 AND CODE_TX=? ORDER BY DATE_RT DESC";
        $cond = array($this->session->userdata('CODE_SYSTM'));
     $sortieFromSystem = $this->Model_Ted->querypreparemix($req,$cond);
     // print_r($sortieFromSystem);
     // exit();
     $num=1;
     $html="";
     foreach($sortieFromSystem as $key){
      $codeDev = $key['CODE_DEVISE'];
      $dev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$codeDev));
        $html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_AGENT']." ".$key['PSEUDO_AGENT']."</td>
                  <td>".$key['CODE_PAYS_ALPHA3']."</td>
                  <td>".$key['MATRICULE_AGENT']."</td>
                  <td>".$key['TELEPHONE']."</td>
                  <td>".$key['MONTANT_TX']."".$dev['ABBR_DEVISE']."</td>
                  <td>".getFortmat($key['DATE_RT'])."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Agent/getOne/".$key['CODE_RT'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>

                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_RT'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_RT'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer cet indice</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_RT']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
      }
      $data['tableau'] = $html; 
      $this->load->view('Sortie_List_View',$data);
    }

    public function getOne(){
    	$code = $this->uri->segment(3);
    	$pays = $this->Model_Ted->querysql('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');
    	$one = $this->Model_Ted->list_One('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$code));
    	$html_pays = '';
      	foreach($pays as $one_pays){

      		$html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
      	}

      	
      $output['pays'] = $html_pays;
    	$output['data'] = $one;
    	$this->load->view('Devise_Update_View',$output);
    }

    public function creer() {
    	$pays = $this->Model_Ted->list_all('pays');

      	$html_pays = '';
      	foreach($pays as $one_pays){

      		$html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
      	}
      
      	
      	$data['pays'] =$html_pays;
      
		$this->load->view('Devise_Add_view',$data);
    }

    public function modifier(){
    	  $this->form_validation->set_rules('Abbr','Abbr','required');
        $this->form_validation->set_rules('Devise','Devise','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Id','Id','required');

        if($this->form_validation->run()==true){

        	  $Id=$this->input->post('Id');
            $Abbr=strtoupper($this->input->post('Abbr'));
            $Devise=$this->input->post("Devise");
            $Pays = $this->input->post("Pays");

                $data=array(
                'MODIFIED_BY_CODE'=>$this->session->userdata('CODE'),
                'ABBR_DEVISE'=>$Abbr,
                'NOM_DEVISE'=>$Devise,
                'CODE_PAYS'=>$Pays
            );
               if ($this->Model_Ted->update('devise',array('ID_DEVISE'=>$Id),$data)) {
	               	echo "Success#La modification reussie#success";
                
               }else{
                	echo "Erreur#Une erreur s'est produite lors de la modification#error";
               }

        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function add(){

        $this->form_validation->set_rules('Montant','Montant','required|trim');
        $this->form_validation->set_rules('Devise','Devise','required|trim');
        $this->form_validation->set_rules('Mdp','Mdp','required|trim');
        if($this->form_validation->run()==true){

            $code=generate_code('devise','CODE_DEVISE','dev');
            $Montant=trim($this->input->post('Montant'));
            $Devise=$this->input->post("Devise");
            $Mdp = trim($this->input->post("Mdp"));
            $Montant = (int)$Montant;
            if(is_integer($Montant) && $Montant>1.8){
            
            $getOne = $this->Model->getOne('administrateur',array('IS_ACTIF_ADMIN'=>9,'ID_PROFIL_ADMIN'=>2,'NOM_ADMIN'=>$this->session->userdata('NOM')));
            if (empty($getOne)) {
              echo "Erreur#Redirection car il n existe pas#warning";
            }
            else{
                  if (sha1($Mdp)!=$getOne['MDP_ADMIN']) {
                    echo "Erreur#Redirection le mpd est incorrect#warning";
                  }
                  else{
                    $check_my_amount = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>10,'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),'CODE_DEVISE'=>$Devise)); 
                    $code_transaction=generate_code('rec_trans_systm','CODE_RT','trsyst');


                    $dt_update['MONTANT_SOLDE'] = ($check_my_amount['MONTANT_SOLDE']+$Montant);
                    $dt_update['LAST_UPDATE_SOLDE_AT']=date('Y-m-d H:i:s');                     
                      if ($check_my_amount) {
                        $this->Model_Ted->update(
                              'solde_system',
                              array(
                                'CODE_SOLDE'=>$check_my_amount['CODE_SOLDE'],
                                'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),
                                'IS_ACTIF_SOLDE'=>10),
                              $dt_update);

                      }
                      else{

                        $this->Model_Ted->register(
                        'solde_system',
                        array(
                          'CODE_DEVISE'=>$Devise,
                          'CODE_SOLDE'=>$code,
                          'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),
                          'IS_ACTIF_SOLDE'=>10,'MONTANT_SOLDE'=>$Montant));
                        

                        }

                        $data = array('CODE_RT'=>$code_transaction,'CODE_RX'=>$this->session->userdata('CODE_SYSTM'),'CODE_TX'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$Devise,'MONTANT_TX'=>$Montant,'MONTANT_RX'=>$Montant);

                        $this->Model_Ted->register('rec_trans_systm',$data);
                    

                        $getDev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$Devise));

                        echo  'Chargement reussi#Vous avez rechargé '.$Montant.''.$getDev['ABBR_DEVISE'].' dans le système#success';
                  }
                
                }
              }
              else{
                echo "Erreur#Veuillez Renseigner un montant valide#error";
              }
           }
             
        
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function delete(){
      $id=$this->input->post('id');


      $data=array('IS_ACTIF_DEVISE'=>7,'MODIFIED_BY_CODE'=>$this->session->userdata('CODE'));
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('devise',array('ID_DEVISE'=>$id,'IS_ACTIF_DEVISE'),$data);

  
        if ($supprimer){

           echo "success#Suppression reussi avec succès#success";
        }else{
               echo "Error#Echec de la Suppression#error#0";  

        }

    }
    public function deleteInd(){
      $id=$this->input->post('id');


      $data=array('IS_ACTIF_ADM'=>7);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('rec_trans_systm',array('ID_RT'=>$id,'IS_ACTIF_ADM'=>10),$data);

  
        if ($supprimer){

           echo "success#Suppression reussi avec succès#success";
        }else{
               echo "Error#Echec de la Suppression#error#0";  

        }

    }

    public function index(){
    	$devise = $this->Model_Ted->list_Some_Order('devise',array('IS_ACTIF_DEVISE'=>9),'NOM_DEVISE');
    	

    

        $html_devise = '';
        foreach($devise as $one_pays){

          $html_devise .= '<option value="'.$one_pays['CODE_DEVISE'].'">'.$one_pays['NOM_DEVISE'].' ('.$one_pays['ABBR_DEVISE'].')</option>';
        }
      
      
    	$data['devise'] = $html_devise; 
    	$this->load->view('Systeme_View',$data);
    }
  public function __construct() {
  parent::__construct();
  $data = array(
          'IS_ACTIF_ADMIN'=>9,
          'CODE_ADMIN'=>$this->session->userdata('CODE'),
        );
  $data_redirect = $this->Model->getOne('administrateur',$data);
     if (!$this->session->userdata('ID') || !$data_redirect || $data_redirect['CODE_ADMIN'].'admin'!=$this->session->userdata('STATIC')) {
      $this->session->sess_destroy();
      redirect('Authentification');
      exit();
     }
  }

}