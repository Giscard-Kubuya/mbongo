<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {


    public function getOne(){
    	$code = $this->uri->segment(3);
    	$pays = $this->Model_Ted->querysql2('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');
    	// $profil = $this->Model_Ted->list_Some('profil_agent',array('IS_ACTIF_AGENT'=>9));
    	$guichet = $this->Model_Ted->list_Some('guichet',array('IS_ACTIF_GUICHET'=>9));
    	$one = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>15,'CODE_AGENT'=>$code));
    	$html_pays = '';
    	$html_guichet = '';
      	// $html_profil = '';
      	foreach($pays as $one_pays){

      		$html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
      	}

      	// foreach($profil as $one_profil){
      	// 	$one_agent = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>9));
      	// 	if($one_profil['ID_PROFIL_AGENT']==$one_agent['ID_PROFIL_AGENT']){

      	// 	}
      	// 	else{

      	// 	$html_profil .= '<option value="'.$one_profil['ID_PROFIL_AGENT'].'">'.$one_profil['NOM_PROFIL_AGENT'].'</option>';
      	// 	}
      	// }

      	foreach($guichet as $one_guichet){
      		$one_agent = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>9));
      		if($one_agent['CODE_GUICHET']==$one_guichet['CODE_GUICHET']){

      		}
      		else{

      		$html_guichet .= '<option value="'.$one_guichet['CODE_GUICHET'].'">'.$one_guichet['NOM_GUICHET'].'</option>';
      		}
      	}
      	$output['guichet'] = $html_guichet;
      	$output['pays'] = $html_pays;
      	// $output['profil'] =$html_profil;
    	$output['data'] = $one;
    	$this->load->view('Agent_Update_View',$output);
    }

    public function Creer() {
    	$pays = $this->Model_Ted->querysql2('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');
    	$profil = $this->Model_Ted->list_Some('profil_agent',array('IS_ACTIF_AGENT'=>9));
    	$guichet = $this->Model_Ted->list_Some('guichet',array('IS_ACTIF_GUICHET'=>9));

      	$html_guichet = '';
      	$html_pays = '';
      	$html_profil = '';
      	foreach($pays as $one_pays){

      		$html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
      	}
      	foreach($profil as $one_profil){
      		#$one_agent = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>9));
      		/*if($one_agent['ID_PROFIL_AGENT']==$one_profil['ID_PROFIL_AGENT']){

      		}
      		else{*/

      		$html_profil .= '<option value="'.$one_profil['ID_PROFIL_AGENT'].'">'.$one_profil['NOM_PROFIL_AGENT'].'</option>';
      		#}
      	}
      	foreach($guichet as $one_guichet){
      		$one_agent = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>9));
      		if($one_agent['CODE_GUICHET']==$one_guichet['CODE_GUICHET']){

      		}
      		else{

      		$html_guichet .= '<option value="'.$one_guichet['CODE_GUICHET'].'">'.$one_guichet['NOM_GUICHET'].'</option>';
      		}
      	}
      	$data['pays'] =$html_pays;
      	$data['profil'] =$html_profil;
      	$data['guichet'] =$html_guichet;
      
		$this->load->view('Agent_Add_view',$data);
    }

    public function modifier(){
        $this->form_validation->set_rules('Ville','Ville','required');
        $this->form_validation->set_rules('Phone','Phone','required');
        $this->form_validation->set_rules('Prenom','Prenom','required');
        $this->form_validation->set_rules('Pseudo','Pseudo','required');
        $this->form_validation->set_rules('Email','Email','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Genre','Genre','required');
        $this->form_validation->set_rules('Description','Description','trim');
        $this->form_validation->set_rules('Guichet','Guichet','trim');

        if($this->form_validation->run()==true){

        	$Guichet=$this->input->post('Guichet');
        	  $Id=$this->input->post('Id');
            $Prenom=$this->input->post('Prenom');
            $Pseudo=$this->input->post("Pseudo");
            $Phone=$this->input->post("Phone");
            $Email=$this->input->post("Email");
            $Pays = $this->input->post("Pays");
            $Ville=$this->input->post("Ville");
            $Genre=$this->input->post("Genre");
            $Guichet = $this->input->post("Guichet");
            $Description=$this->input->post("Description");
    $data=array(
                'SEXE_AGENT'=>$Genre,
                'CODE_GUICHET'=>$Guichet,
                'MODIFIED_BY_CODE'=>$this->session->userdata('CODE'),
                'PRENOM_AGENT'=>$Prenom,
                'EMAIL_AGENT'=>$Email,
                'PSEUDO_AGENT'=>$Pseudo,
                'VILLE'=>$Ville,
                'TELEPHONE'=>$Phone,
                'CODE_PAYS_ALPHA3'=>$Pays,
                'DESCRIPTION_TACHE_AGENT'=>$Description
            );
               if ($this->Model_Ted->update('agent',array('ID_AGENT'=>$Id),$data)) {
	               	echo "Success#La modification reussie#success";
                
               }else{
                	echo "Erreur#Une erreur s'est produite lors de la modification#error";
               }

        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function addAgentService(){
        $this->form_validation->set_rules('Ville','Ville','required');
        $this->form_validation->set_rules('Phone','Phone','required');
        $this->form_validation->set_rules('Prenom','Prenom','required');
        $this->form_validation->set_rules('Pseudo','Pseudo','required');
        $this->form_validation->set_rules('Email','Email','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Genre','Genre','required');
        $this->form_validation->set_rules('Description','Description','trim');
        $this->form_validation->set_rules('Guichet','Guichet','trim');
        if($this->form_validation->run()==true){

        	$count_matricule = $this->Model_Ted->count_a_field('agent','MATRICULE_AGENT');
        	$new_matricule = 'AG_'.$count_matricule;
            $code=helper_generate_code('agent','CODE_AGENT','agt');
            $Prenom=$this->input->post('Prenom');
            $Pseudo=$this->input->post("Pseudo");
            $Phone=$this->input->post("Phone");
            $Email=$this->input->post("Email");
            $Pays = $this->input->post("Pays");
            $Ville=$this->input->post("Ville");
            $Genre=$this->input->post("Genre");
            $Guichet = $this->input->post("Guichet");
            $Description=$this->input->post("Description");
            $password= strtolower($Pseudo);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $matricule =increment_string($new_matricule) ;

                $data=array(
                'SEXE_AGENT'=>$Genre,
                'CODE_GUICHET'=>$Guichet,
                'ADDED_BY_CODE'=>$this->session->userdata('CODE'),
                'PRENOM_AGENT'=>$Prenom,
                'EMAIL_AGENT'=>$Email,
                'PSEUDO_AGENT'=>$Pseudo,
                'VILLE'=>$Ville,
                'TELEPHONE'=>$Phone,
                'CODE_PAYS_ALPHA3'=>$Pays,
                'CODE_AGENT'=>$code,
                'MDP_AGENT'=>$password,
                'MATRICULE_AGENT'=>$matricule,
                'DESCRIPTION_TACHE_AGENT'=>$Description
            );
            $verification=$this->Model->getOne('agent',array('EMAIL_AGENT'=>$Email));
            // print_r($verification);
            // exit();
               if ($verification) {
                	echo "Erreur#Ce pseudo est deja utilise#error";
                
               }else{
	                $this->Model->insert('agent',$data);
	               	echo "Success#L'enregistrement reussi#success";
               }

             
        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function delete(){
      $id_agent=$this->input->post('id');


      $data=array('IS_ACTIF_AGENT'=>7);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('agent',array('ID_AGENT'=>$id_agent),$data);

  
        if ($supprimer){

           echo "success#Suppression reussi avec succès#success";
        }else{
               echo "Error#Echec de la Suppression#error#0";  

        }

    }

    public function Index(){
    	$bd_data = $this->Model_Ted->list_Some('agent',array('IS_ACTIF_AGENT'=>15));
    	
    	$html = '';
    	$num = 1;
    	foreach($bd_data as $key){
    		$html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_AGENT']." ".$key['PSEUDO_AGENT']."</td>
                  <td>".$key['CODE_PAYS_ALPHA3']."</td>
                  <td>".$key['SEXE_AGENT']."</td>
                  <td>".$key['MATRICULE_AGENT']."</td>
                  <td>".$key['TELEPHONE']."</td>
                  <td>".getFortmat($key['CREATED_AGENT_AT'])."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Agent/getOne/".$key['CODE_AGENT'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>

                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_AGENT'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_AGENT'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer l'agent <b>" . $key['PRENOM_AGENT']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_AGENT']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
    	}
    	$data['tableau'] = $html; 
    	$this->load->view('Agent_List_View',$data);
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
      redirect('Authentification');
      exit();
     }
  }

}