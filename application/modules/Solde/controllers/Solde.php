<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Solde extends CI_Controller {


    public function getOne(){
    	$code = $this->uri->segment(3);
    	$pays = $this->Model_Ted->list_all('pays');
    	$profil = $this->Model_Ted->list_Some('profil_agent',array('IS_ACTIF_AGENT'=>9));
    	$guichet = $this->Model_Ted->list_Some('guichet',array('IS_ACTIF_GUICHET'=>9));
    	$one = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>9,'CODE_AGENT'=>$code));
    	$html_pays = '';
    	$html_guichet = '';
      	$html_profil = '';
      	foreach($pays as $one_pays){

      		$html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
      	}

      	foreach($profil as $one_profil){
      		$one_agent = $this->Model_Ted->list_One('agent',array('IS_ACTIF_AGENT'=>9));
      		if($one_profil['ID_PROFIL_AGENT']==$one_agent['ID_PROFIL_AGENT']){

      		}
      		else{

      		$html_profil .= '<option value="'.$one_profil['ID_PROFIL_AGENT'].'">'.$one_profil['NOM_PROFIL_AGENT'].'</option>';
      		}
      	}

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
      	$output['profil'] =$html_profil;
    	$output['data'] = $one;
    	$this->load->view('Agent_Update_View',$output);
    }

    public function index() {
      $criteres =array('IS_ACTIF_SOLDE'=>11,'IS_ACTIF_AGENT'=>15);
    	$solde = $this->Model_Ted->join_solde_agent_devise1($criteres);
      	$html_solde = '';
      	$num = 1;
        foreach($solde as $key){
                  if($key['STATUS']==3){
                    $status = "<span class='label label-sm label-success'>Approuvé</span>";
                  }
                  elseif($key['STATUS']==2){
                    $status = "<span class='label label-sm label-warning'>Suspendu</span>";
                  }
                  elseif($key['STATUS']==1){
                    $status = "<span class='label label-sm label-danger'>Bloqué</span>";
                  }
        $html_solde.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_AGENT']." ".$key['PSEUDO_AGENT']."</td>
                  <td>".$key['CODE_PAYS']."</td>
                  <td>".$key['SEXE_AGENT']."</td>
                  <td>".$key['MATRICULE_AGENT']."</td>
                  <td>".helper_get_timeago($key['LAST_UPDATE_SOLDE_AT'])."</td>
                  <td>".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE']."</td>
                  <td>".$status."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>";

                    if($key['STATUS']==3){
 $html_solde.="
 <a href='#' data-toggle='modal' data-target='#mysuspend" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Suspendre' class='btn btn-warning'><i class='fa fa-exclamation-triangle'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mybloqued" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Bloqué' class='btn btn-danger'><i class='fa fa-lock'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mybloqued" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloqué le compte de <b>" . $key['PRENOM_AGENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='mysuspend" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous suspendre le compte de <b>" . $key['PRENOM_AGENT']."</b>?(il est à ".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>";
                    }elseif ($key['STATUS']==2) {
                

                    $html_solde.="<a href='#' data-toggle='modal' data-target='#myapproved" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Approuvé' class='btn btn-success'><i class='fa fa-unlock'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mybloqued" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Bloqué' class='btn btn-danger'><i class='fa fa-lock'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mybloqued" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloqué le compte de <b>" . $key['PRENOM_AGENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='myapproved" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous approuver le compte de <b>" . $key['PRENOM_AGENT']."</b>?(il est à ".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>";
                    }elseif ($key['STATUS']==1) {
                     $html_solde.="

                      <a href='#' data-toggle='modal' data-target='#mysuspend" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Suspendre' class='btn btn-warning'><i class='fa fa-exclamation-triangle'></i></a>
                       <a href='#' data-toggle='modal' data-target='#myapproved" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Approuvé' class='btn btn-success'><i class='fa fa-unlock'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mybloqued" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloqué le compte de <b>" . $key['PRENOM_AGENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='myapproved" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous approuver le compte de <b>" . $key['PRENOM_AGENT']."</b>?(il est à ".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>";
                    }


                   
      }
      	$data['solde'] =$html_solde;

   /*   echo "<pre>";
print_r($data);
exit();*/
      
		$this->load->view('Agent_List_view',$data);

    }
    public function Client() {
      $criteres =array('IS_ACTIF_SOLDE'=>9);
      $solde = $this->Model_Ted->join_client_solde($criteres);
        $html_solde = '';
        $num = 1;
        foreach($solde as $key){
                  if($key['STATUS']==3){
                    $status = "<span class='label label-sm label-success'>Approuvé</span>";
                  }
                  elseif($key['STATUS']==2){
                    $status = "<span class='label label-sm label-warning'>Suspendu</span>";
                  }
                  elseif($key['STATUS']==1){
                    $status = "<span class='label label-sm label-danger'>Bloqué</span>";
                  }
        $html_solde.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_CLIENT']." ".$key['PSEUDO_CLIENT']."</td>
                  <td>".$key['CODE_PAYS']."</td>
                  <td>".$key['SEXE_CLIENT']."</td>
                  <td>".$key['MATRICULE_CLIENT']."</td>
                  <td>".helper_get_timeago($key['LAST_UPDATE_SOLDE_AT'])."</td>
                  <td>".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE']."</td>
                  <td>".$status."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>";

                    if($key['STATUS']==3){
 $html_solde.="
 <a href='#' data-toggle='modal' data-target='#mysuspend" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Suspendre' class='btn btn-warning'><i class='fa fa-exclamation-triangle'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mybloqued" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Bloqué' class='btn btn-danger'><i class='fa fa-lock'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mybloqued" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloqué le compte de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='mysuspend" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous suspendre le compte de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>";
                    }elseif ($key['STATUS']==2) {
                

                    $html_solde.="<a href='#' data-toggle='modal' data-target='#myapproved" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Approuvé' class='btn btn-success'><i class='fa fa-unlock'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mybloqued" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Bloqué' class='btn btn-danger'><i class='fa fa-lock'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mybloqued" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloqué le compte de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='myapproved" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous approuver le compte de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>";
                    }elseif ($key['STATUS']==1) {
                     $html_solde.="

                      <a href='#' data-toggle='modal' data-target='#mysuspend" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Suspendre' class='btn btn-warning'><i class='fa fa-exclamation-triangle'></i></a>
                       <a href='#' data-toggle='modal' data-target='#myapproved" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Approuvé' class='btn btn-success'><i class='fa fa-unlock'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mybloqued" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloqué le compte de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='myapproved" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous approuver le compte de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']."".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>";
                    }


                   
      }
        $data['solde'] =$html_solde;

   /*   echo "<pre>";
print_r($data);
exit();*/
      
    $this->load->view('Client_List_view',$data);

    }
    public function getList(){
       $criteres =array('IS_ACTIF_SOLDE'=>9);
      $solde = $this->Model_Ted->join_client_solde($criteres);
        $html_solde = '';
        $num = 1;
        foreach($solde as $key){
        $html_solde.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_CLIENT']."</td>
                  <td>".$key['PSEUDO_CLIENT']."</td>
                  <td>".$key['MATRICULE_CLIENT']."</td>
                  <td>".$key['CODE_PAYS']."</td>
                  <td>".$key['MONTANT_SOLDE']."</td>
                  <td>".$key['ABBR_DEVISE']."</td>
                  <td>".$key['LAST_UPDATE_SOLDE_AT']."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Solde/getOne/".$key['CODE_SOLDE'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_SOLDE'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_SOLDE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer le solde de <b>" . $key['PRENOM_CLIENT']."</b>?(il est à ".$key['MONTANT_SOLDE']." ".$key['ABBR_DEVISE'].")</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_SOLDE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
      }
        $response['html'] =$html_solde;
        echo json_encode($response);
    }

    public function modifier(){
    	$this->form_validation->set_rules('Prenom','Prenom','required|trim');
        $this->form_validation->set_rules('Pseudo','Pseudo','required|trim');
        $this->form_validation->set_rules('Description','Description','required|trim');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Profil','Profil','required');
        $this->form_validation->set_rules('Genre','Genre','required');
        $this->form_validation->set_rules('Guichet','Guichet','required');
        if($this->form_validation->run()==true){

        	$Guichet=$this->input->post('Guichet');
        	$Id=$this->input->post('Id');
            $Prenom=$this->input->post('Prenom');
            $Pseudo=$this->input->post("Pseudo");
            $Pays = $this->input->post("Pays");
            $Profil=$this->input->post("Profil");
            $Genre=$this->input->post("Genre");
            $Description=$this->input->post("Description");

                $data=array(
                'SEXE_AGENT'=>$Genre,
                'CODE_GUICHET'=>$Guichet,
                'PRENOM_AGENT'=>$Prenom,
                'PSEUDO_AGENT'=>$Pseudo,
                'ID_PROFIL_AGENT'=>$Profil,
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
    public function add(){
        $this->form_validation->set_rules('Prenom','Prenom','required');
        $this->form_validation->set_rules('Pseudo','Pseudo','required');
        $this->form_validation->set_rules('Pays','Pays','required');
        $this->form_validation->set_rules('Profil','Profil','required');
        $this->form_validation->set_rules('Genre','Genre','required');
        $this->form_validation->set_rules('Description','Description','trim');
        $this->form_validation->set_rules('Guichet','Guichet','trim');
        if($this->form_validation->run()==true){

        	$count_matricule = $this->Model_Ted->count_a_field('agent','MATRICULE_AGENT');
        	$new_matricule = 'AG_'.$count_matricule;
            $code=generate_code('agent','CODE_AGENT','agt');
            $Prenom=$this->input->post('Prenom');
            $Pseudo=$this->input->post("Pseudo");
            $Pays = $this->input->post("Pays");
            $Profil=$this->input->post("Profil");
            $Genre=$this->input->post("Genre");
            $Guichet = $this->input->post("Guichet");
            $Description=$this->input->post("Description");
            $password=sha1($Pseudo);
            $matricule =increment_string($new_matricule) ;

                $data=array(
                'SEXE_AGENT'=>$Genre,
                'CODE_GUICHET'=>$Guichet,
                'ADDED_BY_CODE'=>'sessionCode',
                'PRENOM_AGENT'=>$Prenom,
                'PSEUDO_AGENT'=>$Pseudo,
                'ID_PROFIL_AGENT'=>$Profil,
                'CODE_PAYS_ALPHA3'=>$Pays,
                'CODE_AGENT'=>$code,
                'MDP_AGENT'=>$password,
                'MATRICULE_AGENT'=>$matricule,
                'DESCRIPTION_TACHE_AGENT'=>$Description
            );
            $verification=$this->Model->getOne('agent',array('PSEUDO_AGENT'=>$Pseudo));
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

    public function liste_data(){
    	$bd_data = $this->Model_Ted->join_ag_prof_gui(array('A.IS_ACTIF_AGENT'=>9));
    	
    	$html = '';
    	$num = 1;
    	foreach($bd_data as $key){
    		$html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_AGENT']."</td>
                  <td>".$key['PSEUDO_AGENT']."</td>
                  <td>".$key['MATRICULE_AGENT']."</td>
                  <td>".$key['CODE_PAYS_ALPHA3']."</td>
                  <td>".$key['CREATED_AGENT_AT']."</td>
                  <td>".$key['NOM_GUICHET']."</td>
				  <td>".$key['NOM_PROFIL_AGENT']."</td>
                                 
             
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
                                              <h5>Voulez vous Supprimer la banque <b>" . $key['PRENOM_AGENT']."</b>?</h5>
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
    	$data['html'] = $html; 
    	$this->load->view('Agent_List_View',$data);
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
      redirect('Login/index');
      exit();
     }
  }

}