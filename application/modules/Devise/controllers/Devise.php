<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Devise extends CI_Controller {

    

    public function getOne(){
    	$code = $this->uri->segment(3);
    	$pays = $this->Model_Ted->querypreparemix('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');
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
    	$pays = $this->Model_Ted->querysql2('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');

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
            $Devise=ucfirst($this->input->post("Devise"));
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
        $this->form_validation->set_rules('Abbr','Abbr','required');
        $this->form_validation->set_rules('Devise','Devise','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        if($this->form_validation->run()==true){

            $code=generate_code('devise','CODE_DEVISE','dev');
            $Abbr=strtoupper($this->input->post('Abbr'));
            $Devise=ucfirst($this->input->post("Devise"));
            $Pays = $this->input->post("Pays");

                $data=array(
                'ADDED_BY_CODE'=>$this->session->userdata('CODE'),
                'ABBR_DEVISE'=>$Abbr,
                'NOM_DEVISE'=>$Devise,
                'CODE_PAYS'=>$Pays,
                'CODE_DEVISE'=>$code
            );
            $verification=$this->Model->getOne('devise',array('ABBR_DEVISE'=>$Abbr));
            // print_r($verification);
            // exit();
               if ($verification) {
                	echo "Erreur#Ce devise existe deja#error";
                
               }else{
	                $this->Model->insert('devise',$data);
	               	echo "Success#L'enregistrement reussi#success";
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

    public function index(){
    	$bd_data = $this->Model_Ted->list_Some_Order('devise',array('IS_ACTIF_DEVISE'=>9),'NOM_DEVISE');
    	
    	$html = '';
    	$num = 1;
    	foreach($bd_data as $key){
    		$html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['NOM_DEVISE']."</td>
                  <td>".$key['ABBR_DEVISE']."</td>
                  <td>".$key['CODE_PAYS']."</td>
                  <td>".getFortmat($key['CREATED_DEVISE_AT'])."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Devise/getOne/".$key['CODE_DEVISE'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_DEVISE'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_DEVISE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer la banque <b>" . $key['NOM_DEVISE']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_DEVISE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
    	}
    	$data['html'] = $html; 
    	$this->load->view('Devise_List_View',$data);
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