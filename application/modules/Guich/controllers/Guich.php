<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guich extends CI_Controller {


    public function getOne(){
    	$code = $this->uri->segment(3);
    	$pays = $this->Model_Ted->querysql2('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');
    	// $profil = $this->Model_Ted->list_Some('profil_agent',array('IS_ACTIF_AGENT'=>9));
    	$guichet = $this->Model_Ted->getJoinGuichet(array('IS_ACTIF_GUICHET'=>9,'guichet.CODE_GUICHET'=>$code));
    	$responsable = $this->Model_Ted->list_Some('agent',array('IS_ACTIF_AGENT'=>15));
    	$html_pays = '';
    	$html_responsable = '';
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

      	foreach($responsable as $one_responsable){

          $code_agent = $one_responsable['CODE_AGENT'];
      		$one_guichet = $this->Model->getOne('guichet',array('IS_ACTIF_GUICHET'=>9,'CODE_GUICHET'=>$code,'CODE_AGENT'=>$code_agent));
        // $one_guichet = $this->Model->getOne('guichet',array('IS_ACTIF_GUICHET'=>9,'CODE_GUICHET'=>$code)); 
         
      		if($one_guichet){

      		}
      		else{

      		 $html_responsable .= '<option value="'.$one_responsable['CODE_AGENT'].'">'.$one_responsable['PSEUDO_AGENT'].' '.$one_responsable['PSEUDO_AGENT'].' ('.$one_responsable['MATRICULE_AGENT'].')</option>';
      		}
      	}
      	$output['responsable'] = $html_responsable;
      	$output['pays'] = $html_pays;
      	// $output['profil'] =$html_profil;
    	$output['data'] = $guichet;
    	$this->load->view('Guich_Update_View',$output);
    }

    public function Creer() {
    	$pays = $this->Model_Ted->querysql2('SELECT * FROM pays ORDER BY NOM_FR_FR ASC');
      $resonsable  = $this->Model_Ted->list_Some('agent',array('IS_ACTIF_AGENT'=>15));
      	$html_resonsable = '';
        $html_pays = '';
        foreach($resonsable as $one_resonsable){
          $fetchGuichet = $this->Model_Ted->querysqlrow('SELECT * FROM guichet WHERE IS_ACTIF_GUICHET=9');
          
          if ($one_resonsable['CODE_AGENT']==$fetchGuichet['CODE_AGENT']) {
              
          }
          else{
            $html_resonsable .= '<option value="'.$one_resonsable['CODE_AGENT'].'">'.$one_resonsable['PSEUDO_AGENT'].' '.$one_resonsable['PSEUDO_AGENT'].' ('.$one_resonsable['MATRICULE_AGENT'].')</option>';

          }
        }
      	foreach($pays as $one_pays){

      		$html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
      	}

        $data['responsable'] =$html_resonsable;
      
      	$data['pays'] =$html_pays;
      
		$this->load->view('Guich_Add_view',$data);
    }

    public function upd(){
     

        $this->form_validation->set_rules('Phone','Phone','required');
        $this->form_validation->set_rules('Addr','Addr','required');
        $this->form_validation->set_rules('Responsable','Responsable','required');
        $this->form_validation->set_rules('Email','Email','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Description','Description','trim|required');
        $this->form_validation->set_rules('Guichet','Guichet','trim|required');

        if($this->form_validation->run()==true){

        	  $Id=$this->input->post('Id');
            $Addr=$this->input->post('Addr');
            $Phone=$this->input->post("Phone");
            $Email=$this->input->post("Email");
            $Pays = $this->input->post("Pays");
            $respo=$this->input->post("Responsable");
            $Guichet =ucfirst($this->input->post("Guichet")) ;
            $Description=ucfirst($this->input->post("Description")) ;
if ((int)$Phone!=0) {
    $data=array(
                'NOM_GUICHET'=>$Guichet,
                'EMAIL_GUI'=>$Email,
                'ADDRESSE_GUI'=>$Addr,
                'TELEPHONE_GUI'=>$Phone,
                'CODE_PAYS_ALPHA3'=>$Pays,
                'CODE_AGENT'=>$respo,
                'DESCRIPTION_GUI'=>$Description
            );
               if ($this->Model_Ted->update('guichet',array('ID_GUICHET'=>$Id),$data)) {
	               	echo "Success#La modification reussie#success";
                
               }else{
                	echo "Erreur#Une erreur s'est produite lors de la modification#error";
               }
}
else{
  echo "Erreur#Veuillez renseinger un numero valide#error";
}
    
        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function ajout(){

        $this->form_validation->set_rules('Phone','Phone','required');
        $this->form_validation->set_rules('Addr','Addr','required');
        $this->form_validation->set_rules('Responsable','Responsable','required');
        $this->form_validation->set_rules('Email','Email','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Description','Description','trim');
        $this->form_validation->set_rules('Guichet','Guichet','trim');
        if($this->form_validation->run()==true){

        	
            $code=generate_code('guichet','CODE_GUICHET','gui');
            $Addr=$this->input->post('Addr');
            $Phone=$this->input->post("Phone");
            $Email=$this->input->post("Email");
            $Pays = $this->input->post("Pays");
            $respo=$this->input->post("Responsable");
            $Guichet =ucfirst($this->input->post("Guichet")) ;
            $Description=ucfirst($this->input->post("Description")) ;
            if ((int)$Phone!=0) {
           
                $data=array(
                'CODE_GUICHET'=>$code,
                'NOM_GUICHET'=>$Guichet,
                'ADDED_BY_CODE'=>$this->session->userdata('CODE'),
                'EMAIL_GUI'=>$Email,
                'ADDRESSE_GUI'=>$Addr,
                'TELEPHONE_GUI'=>$Phone,
                'CODE_PAYS_ALPHA3'=>$Pays,
                'CODE_AGENT'=>$respo,
                'DESCRIPTION_GUI'=>$Description
            );
            $verification=$this->Model->getOne('guichet',array('NOM_GUICHET'=>$Guichet));
            // print_r($verification);
            // exit();
               if ($verification) {
                	echo "Erreur#Ce guichet existe deja#error";
                
               }else{
	                $this->Model->insert('guichet',$data);
	               	echo "Success#L'enregistrement reussi#success";
               }
}
else{
  echo "Erreur#Veuillez renseinger un numero valide#error";
}
             
        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function delete(){
      $id_agent=$this->input->post('id');


      $data=array('IS_ACTIF_GUICHET'=>7);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('guichet',array('ID_GUICHET'=>$id_agent),$data);

  
        if ($supprimer){

           echo "success#Suppression reussie avec succès#success";
        }else{
               echo "Error#Echec de la Suppression#error#0";  

        }

    }

    public function Index(){
    	$bd_data = $this->Model_Ted->list_Some_Order('guichet',array('IS_ACTIF_GUICHET'=>9),'CREATED_GUICHET_AT','DESC');
    	
    	$html = '';
    	$num = 1;
    	foreach($bd_data as $key){
    		$html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['NOM_GUICHET']."</td>
                  <td>".$key['CODE_PAYS_ALPHA3']."</td>
                  <td>".$key['ADDRESSE_GUI']."</td>
                  <td>".$key['TELEPHONE_GUI']."</td>
                  <td>".$key['DESCRIPTION_GUI']."</td>
                  <td>".getFortmat($key['CREATED_GUICHET_AT'])."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Guich/getOne/".$key['CODE_GUICHET'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>

                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_GUICHET'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_GUICHET'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer le guichet <b>" . $key['NOM_GUICHET']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_GUICHET']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
    	}
    	$data['tableau'] = $html; 
    	$this->load->view('Guich_List_View',$data);
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