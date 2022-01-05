<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function connect($params = NULL) {
        if (!empty($this->session->userdata('USERNAME'))) {

        } else {
            // $datas['message'] = $params;
            $this->load->view('Login_View');
         }
    }
    public function index($params = NULL) {
        
            // $datas['message'] = $params;
            $this->load->view('Login_View_admin');
         
    }

    public function create_client(){
       $this->form_validation->set_rules('Prenom','Prenom','required');
        $this->form_validation->set_rules('Pseudo','Pseudo','required');
        $this->form_validation->set_rules('Password','Password','required');
        $this->form_validation->set_rules('Password2','Password2','required');
        $this->form_validation->set_rules('Genre','Genre','required');
        if($this->form_validation->run()==true){

            $count_matricule = $this->Model_Ted->count_a_field('client','MATRICULE_CLIENT');
            $random = random_string('alpha',4);
            //$incr = $count_matricule++;
            // $new_matricule = 'KBY_'.$random.'-'.$count_matricule;
            $date =(int) date('my');
            $new_matricule = 'KBY'.$date.'_'.$random;
           
             $matricule =strtoupper(increment_string($new_matricule,'_',$count_matricule));
          // $new_matricule = 'KBY_'.$random.$count_matricule;
            $code=generate_code('client','CODE_CLIENT','kby');
            $Prenom=ucfirst($this->input->post('Prenom'));
            $Pseudo=$this->input->post("Pseudo");
            $Password=$this->input->post("Password");
            $Genre=$this->input->post("Genre");
            $Password2 = $this->input->post("Password2");
          if ($Password == $Password2 && strlen($Password)>3) {
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $data=array(
                'SEXE_CLIENT'=>$Genre,
                'PRENOM_CLIENT'=>$Prenom,
                'PSEUDO_CLIENT'=>$Pseudo,
                'CODE_CLIENT'=>$code,
                'MDP_CLIENT'=>$Password,
                'MATRICULE_CLIENT'=>$matricule
              );
            $verification=$this->Model_Ted->checkvalue('client',array('PSEUDO_CLIENT'=>$Pseudo));
            $user = $Pseudo == 'Daniel';
            if ($verification || $user) {
                  echo "Desolé#Ce pseudo est déjà utilisé#error";
                
               }else{
                  $this->Model->insert('client',$data);
                  echo "Succès#L'enregistrement reussi#success";
               }

          }
          else{
            echo "Erreur#Les deux mots de passe doivent être les mêmes et superieur à 4 caractères#error";
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


    public function do_login() {
        $login = $this->input->post('pseudo');
        $password =md5($this->input->post('password'));

        $user= $this->Model->getOne('utilisateur',array('PSEUDO'=>$login,'PASSWORD'=>$password,'IS_ACTIF'=>1));      
                          
        if (!empty($user)) {
            
                $session = array(
                    'ID_UTILISATEUR' => $user['ID_UTILISATEUR'],
                    'CODE_UTILISATEUR' => $user['CODE_UTILISATEUR'],
                    'USER_NAME'=> $user['NOM'],
                    'SECOND_NAME'=> $user['PRENOM'],
                    'PSEUDO' => $user['PSEUDO'],
                    'PROFIL' => $user['PROFIL'],
                    'STATUT_USER' => $user['IS_ACTIF']
                );

             $this->session->set_userdata($session);
             
               if ($this->session->userdata('PROFIL')==1) {
                   echo 'success#connection reussi#success';
               }elseif($this->session->userdata('PROFIL')==2){
                    echo 'success#connection reussi#success';
               }else{
             echo 'Erreur#Identifiant incorrect#error';
         }
                 
       
   
        }else{
            echo 'Erreur#Identifiant incorrect#error';
         }
          

    }

public function do_login_admin() {
        $login = addslashes($this->input->post('pseudo'));
        $tbl='';
        $data[]='';

$systm = $this->Model->getOne('administrateur',array('IS_ACTIF_ADMIN'=>9,'ID_PROFIL_ADMIN'=>2));
if ($systm && $systm['CODE_ADMIN']=="") {
  $systmCode =random_string('alnum', 250);
  $this->Model_Ted->update('administrateur',array('IS_ACTIF_ADMIN'=>9,'ID_PROFIL_ADMIN'=>2),array('CODE_ADMIN'=>$systmCode));


  
}
elseif($systm && $systm['CODE_ADMIN']){
  $systmCode =$systm['CODE_ADMIN'];

}
        // check exist
$admin_check = $this->Model->getOne('administrateur',array('PSEUDO_ADMIN'=>$login,'IS_ACTIF_ADMIN'=>9));


if(filter_var($login,FILTER_VALIDATE_EMAIL)){
  $email = $login;
}
else{
  $email = '';
}  
$agent_check = $this->Model_Ted->list_One('agent',array('EMAIL_AGENT'=>$email,'IS_ACTIF_AGENT'=>15));

$client_check = $this->Model_Ted->list_One('client',array('PSEUDO_CLIENT'=>$login,'IS_ACTIF_CLIENT'=>9));

if(!empty($admin_check) && empty($agent_check) && empty($client_check)){
  $password =sha1($this->input->post('password'));
  $tbl='administrateur';
  $data = array('IS_ACTIF_ADMIN'=>9,'PSEUDO_ADMIN'=>$login,'MDP_ADMIN'=>$password);

  $profil = $admin_check['ID_PROFIL_ADMIN'];
  
  if ($profil==1) {
      $redirect = 'Welcome/Principal1';
      $role = 'Co-Administrateur'.$admin_check['CODE_ADMIN'];
    }
    elseif ($profil==2) {
      $redirect = 'Dashboard/Dashboard';
      $role = 'Administrateur'.$admin_check['CODE_ADMIN'];
    }
    elseif ($profil==3) {
      $redirect = 'Welcome/Admin1';
      $role = 'Administrateur simple'.$admin_check['CODE_ADMIN'];
    }
    elseif ($profil==4) {
      $redirect = 'Welcome/Admin2';
      $role = 'Co-Administrateur simple'.$admin_check['CODE_ADMIN'];
    }
    else{
      redirect(base_url('Login/index'));
    }

    $user= $this->Model->getOne($tbl,$data);
                        
        if (!empty($user)) {
            
                $session = array(
                    'ID' => $user['ID_ADMIN'],
                    'CODE' => $user['CODE_ADMIN'],
                    'NOM'=> $user['NOM_ADMIN'],
                    'EMAIL'=> $user['EMAIL_ADMIN'],
                    'PSEUDO' => $user['PSEUDO_ADMIN'],
                    'MDP' => $user['MDP_ADMIN'],
                    'PROFIL' => $user['ID_PROFIL_ADMIN'],
                    'STATUT' => $user['IS_ACTIF_ADMIN'],
                    'CODE_SYSTM' => $systmCode,
                    'MATRICULE'=> $user['MATRICULE_ADMIN'],
                    'ROLE'=>$role,
                    'STATIC' => $user['CODE_ADMIN'].'admin',
                    'ONLINE' => 'online'
                );

               $this->session->set_userdata($session);
               #redirect(base_url($redirect));
             echo 'success#'.$redirect.'#success';
              /* if ($this->session->userdata('PROFIL_UTILISATEUR')==1) {
                   echo 'success#connection reussi#success';
               }elseif($this->session->userdata('PROFIL_UTILISATEUR')==2){
                    echo 'success#connection reussi#success';
               }
               elseif($this->session->userdata('PROFIL_UTILISATEUR')==3){
                    echo 'success#connection reussi#success';
               }else{
             echo 'Erreur#Identifiant incorrect#error';
         }
           */        
         
   
        }else{
            echo 'Erreur#Identifiant incorrect#error';
         }
     
}
elseif(empty($admin_check) && !empty($agent_check)){
        $password =$this->input->post('password');
        if(password_verify($password, $agent_check['MDP_AGENT'])){ 
                  $session = array(
                      'ID' => $agent_check['ID_AGENT'],
                      'CODE' => $agent_check['CODE_AGENT'],
                      'NOM'=> $agent_check['NOM_AGENT'],
                      'MDP' => $agent_check['MDP_AGENT'],
                      'EMAIL' => $agent_check['EMAIL_AGENT'],
                      'MATRICULE'=> $agent_check['MATRICULE_AGENT'],
                      'PRENOM'=> $agent_check['PRENOM_AGENT'],
                      'PSEUDO' => $agent_check['PSEUDO_AGENT'],
                      'STATUT' => $agent_check['IS_ACTIF_AGENT'],
                      'CODE_SYSTM' => $systmCode,
                      'STATIC' => $agent_check['CODE_AGENT'].'agent',
                      'ONLINE' => 'online'
                  );

          
               $this->session->set_userdata($session);
               $redirect = 'Service/Service';
              echo 'success#'.$redirect.'#success';
                   
        }
        else{
              echo 'Erreur#Identifiant incorrect#error';
            }
}
elseif(!empty($admin_check) && !empty($agent_check)){
print_r('agent et admin');
  exit();
}

elseif(!empty($client_check) && empty($admin_check)){
  
        $password =$this->input->post('password');
        if(password_verify($password, $client_check['MDP_CLIENT'])){ 
        $codeGestion = $client_check['CODE_CLIENT']; 
          $fetchGestion = $this->Model->getOne('gestionnaire',array('CODE_COMPTE'=>$codeGestion));
          if ($fetchGestion) {
                  $session = array(
                      'ID' => $client_check['ID_CLIENT'],
                      'CODE' => $client_check['CODE_CLIENT'],
                      'NOM'=> $client_check['NOM_CLIENT'],
                      'MDP' => $client_check['MDP_CLIENT'],
                      'MATRICULE'=> $client_check['MATRICULE_CLIENT'],
                      'PRENOM'=> $client_check['PRENOM_CLIENT'],
                      'PSEUDO' => $client_check['PSEUDO_CLIENT'],
                      'STATUT' => $client_check['IS_ACTIF_CLIENT'],
                      'CODE_SYSTM' => $systmCode,
                      'STATIC' => $client_check['CODE_CLIENT'].'client',
                      'GESTION' => $fetchGestion['CODE_GESTION'],
                      'ONLINE' => 'online',
                      'CLIENT' => 'On'
                  );
            
          }
          else{
            $session = array(
                      'ID' => $client_check['ID_CLIENT'],
                      'CODE' => $client_check['CODE_CLIENT'],
                      'NOM'=> $client_check['NOM_CLIENT'],
                      'MDP' => $client_check['MDP_CLIENT'],
                      'MATRICULE'=> $client_check['MATRICULE_CLIENT'],
                      'PRENOM'=> $client_check['PRENOM_CLIENT'],
                      'PSEUDO' => $client_check['PSEUDO_CLIENT'],
                      'STATUT' => $client_check['IS_ACTIF_CLIENT'],
                      'CODE_SYSTM' => $systmCode,
                      'STATIC' => $client_check['CODE_CLIENT'].'client',
                      // 'GESTION' => $fetchGestion['CODE_GESTION'],
                      'ONLINE' => 'online',
                      'CLIENT' => 'On'
                  );
          }

          
               $this->session->set_userdata($session);
               $redirect = 'Clients/Clients';
              echo 'success#'.$redirect.'#success';
                   
        }
        else{
              echo 'Erreur#Identifianta incorrect#error';
            }
  }

  else{
    echo 'Erreur#Ce compte n\'existe pas#error';
}
       

}

    public function do_logout(){

        $session = array(
                    'ID_UTILISATEUR' => NULL,
                    'CODE_UTILISATEUR' => NULL,
                    'USER_NAME' => NULL,
                    'PASSWORD' => NULL,
                    'PROFIL' => NULL,
                    'STATUT_USER' => NULL
            );

            $this->session->set_userdata($session);
            redirect(base_url('Login'));
  }




      public function frontOffice($params = NULL) {
        $this->load->view('frontOffice/index_view');
      }



    public function send_message() {
        $message = $this->input->post('message');
        $categorie =$this->input->post('categorie');
        
        if(!empty($categorie) && !empty($message)){
          if (!empty($this->session->userdata())) {
            // code..
            $code_utilisateur=$this->session->userdata('CODE_UTILISATEUR');
            $data=array(
            'DESCRIPTION'=>$message,
            'CATEGORIE'=>$categorie,
            'CODE_UTILISATEUR'=>$code_utilisateur
            );
            $this->Model->insert('demande',$data);
              echo "success#L'enregistrement reussi#success";
            // $this->frontOffice();
            }
            else {
               echo "Error#Veuillez completez en tant que client#error";
            }
            }else{
               echo "Error#Veuillez completez tous les champs#error";
            }
    }

    public function deconnexion(){
        $this->session->sess_destroy();
        redirect('Authentification');
        exit();
    }




}
          
 ?>