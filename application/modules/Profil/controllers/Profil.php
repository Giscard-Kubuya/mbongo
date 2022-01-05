<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct() {
          parent::__construct();
          // $this->output->enable_profiler(TRUE);

    }

    public function index() {
            $table = 'client';
            $criteres = array('IS_ACTIF_CLIENT'=>9,'CODE_CLIENT'=>$this->session->userdata('CODE'));
            $data['profil'] = $this->Model->getOne($table,$criteres);
            $data['pays'] = $this->getPays();
        
			$profil = $this->load->view('Profil_View',$data,TRUE);

            $response['profil'] = $profil;
            echo json_encode($response);
    }

    private function getPays(){
        $pays = $this->Model_Ted->querysql2('SELECT * FROM pays ORDER BY NOM_FR_FR ASC ');

        $html = '';
        foreach ($pays as $key) {
            $html.='<option value="'.$key['CODE_PAYS_ALPHA3'].'">'.$key['NOM_FR_FR'].'</option>';
        }
        return $html;
    }

    public function list() {
    	$table = 'role';
    	$criteres = array('IS_ACTIF_ROLE'=>9);
    	$getData = $this->Model_Ted->list_Some($table,$criteres);

    	$num = 1;
    	$html = '';
    	foreach ($getData as $key) {
		$html .= '<tr>
		            <td>'.$num++.'</td>
		            <td>'.$key['NOM_ROLE'].'</td>
		            <td>'.$key['DATE_AJOUT_ROLE'].'</td>
		            
		            <td>
		              <button class="btn btn-outline-info" code ='.$key['CODE_ROLE'].'  onclick="getOne(this)"><i class="fa fa-edit"></i></button>
		            </td>
		            <td>
		            	<button class="btn btn-outline-danger" data-toggle="modal" data-target="#delete'.$key['ID_ROLE'].'"><i class="fa fa-trash-o"></i></button>


	<div class="modal fade" id="delete'.$key['ID_ROLE'].'"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attentation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez vous vraiment supprimer le role '.$key['NOM_ROLE'].'?</p>
      </div>
      <div class="modal-footer">
        <button id = '.$key['ID_ROLE'].' onclick="deleted(this)" class="btn btn-danger">Submit</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</td>
</tr>
';

		        #$this->MyDelete($key['CODE_ROLE']);
    		
    	}
      $response['data'] = $html;
      echo json_encode($response);
			
    }

    public function deleted(){
    	$id = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('Id'))));
    	$table = 'role';
    	$criteres = array('IS_ACTIF_ROLE'=>9,'ID_ROLE'=>$id);
    	$data = array('IS_ACTIF_ROLE'=>7);

    	if ($this->Model_Ted->update($table,$criteres,$data)) {
    		echo "Reussie#La suppression reussie avec succès#success";
    	}else{
    		echo "Erreur#Erreur lors de la suppression#error";
    	}
    }

    public function addForm(){
    	$modal = $this->load->view('Role_Add_View','',true);

    	$response['modal'] = $modal;

    	echo json_encode($response);
    }

    public function add(){
    	$this->form_validation->set_rules('Nom','Nom','required|trim');
    	$this->form_validation->set_rules('Description','Description','required|trim');

    	if ($this->form_validation->run()) {
	    	$name = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('Nom'))));
	    	$description = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('Description'))));
	    	$code = helper_generate_hash('role','CODE_ROLE','rl');

	    	$data = array(

	    		'NOM_ROLE'=>$name,
	    		'CODE_ROLE'=>$code,
	    		'DESCRIPTION_ROLE'=>$description,
	    		'CODE_ADD'=>'sessMe'

	    	);
	    	$table = 'role';
	    	$criteres = array('IS_ACTIF_ROLE'=>9,'NOM_ROLE'=>$name);
	    	$check = $this->Model->getOne($table,$criteres);

	    	if ($check) {
	    		echo "Erreur#Ce rôle existe déjà dans le système#error";
	    	}
	    	else{
	    		if ($this->Model_Ted->register($table,$data)) {
	    			echo "Reussi#L'enregistrement reussi#success";
	    		}
	    		else{
	    			echo "Erreur#Erreur lors de L'enregistrement#error";
	    		}

	    	}
    		
    	}
    	else{
    		echo "Erreur#Veillez remplir tous les champs#error";
    	}
    }

    public function getOne(){
    	$code = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('code'))));
    	$criteres = array('IS_ACTIF_ROLE'=>9,'CODE_ROLE'=>$code);
    	$table = 'role';
    	$fetchOne = $this->Model->getOne($table,$criteres);
    	$dt['role'] = $fetchOne;
    	$html = $this->load->view('Role_Update_View',$dt,true);

    	$response['modal'] = $html;

    	echo json_encode($response);
    }

    public function update(){
        
    	$this->form_validation->set_rules('nomP','Nom','trim');
    	$this->form_validation->set_rules('prenomP','prenom','required|trim');
        $this->form_validation->set_rules('emailP','email','trim');
        $this->form_validation->set_rules('PaysP','Pays','trim');
        $this->form_validation->set_rules('mdpP','mdp','trim');
        $this->form_validation->set_rules('mdpP1','mdp1','trim');

    	if ($this->form_validation->run()) {
	    	$name = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('nomP'))));
	    	$prenom = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('prenomP'))));
	    	$code = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('codeP'))));
            $email = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('emailP'))));
            $Pays = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('PaysP'))));
            $mdp = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('mdpP'))));
            $mdp1 = htmlspecialchars($this->security->xss_clean(html_escape($this->input->post('mdpP1'))));
	    	$table = 'client';
	    	$criteres = array('IS_ACTIF_CLIENT'=>9,'CODE_CLIENT'=>$code);
            if ($mdp) {
                if ($mdp1) {
                    if (password_verify($mdp1,$this->session->userdata('MDP'))) {
                        $hash = password_hash($mdp, PASSWORD_DEFAULT);
                        $data = array(
                            'CODE_PAYS_ALPHA3'=>$Pays,
                            'NOM_CLIENT'=>$name,
                            'PRENOM_CLIENT'=>$prenom,
                            'MDP_CLIENT'=>$hash,
                            'EMAIL_CLIENT'=>$email
                        );
                        if ($this->Model_Ted->update($table,$criteres,$data)) {
                            echo "Reussi#La modification reussie#success";
                        }
                        else{
                                echo "Erreur#Erreur lors de La Modification#error";
                            
                        }


                    }
                    else{
                        echo "Erreur#Ancien Mot de passe incorrect#error";
                    }
                }
                else{
                    echo "Erreur#Veuillez inserer l'ancien mot de passe#error";
                }
            }
            else{
                $data = array(
                            'CODE_PAYS_ALPHA3'=>$Pays,
                            'NOM_CLIENT'=>$name,
                            'PRENOM_CLIENT'=>$prenom,
                            'EMAIL_CLIENT'=>$email
                        );
    	    	if ($this->Model_Ted->update($table,$criteres,$data)) {
    	    		echo "Reussi#La modification reussie#success";
    	    	}
    	    	else{
    	    			echo "Erreur#Erreur lors de La Modification#error";
    	    		
    	    	}
            }

	    	

    		
    	}
    	else{
    		echo "Erreur#Votre prenom est obligatoire#error";
    	}
    }

}