<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller {

    public function check(){
   

    $name = html_escape($this->input->post('Matricule'));
    $nameSecure = $this->security->xss_clean($name);
    $checkExist = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$nameSecure));
    $nameGet = '';
    #CLIENT CHECK MATRICULE
    if ($checkExist) {
      if($checkExist['CODE_CLIENT']== $this->session->userdata('CODE')){
        $nameGet .='<b style="font-style:italic;" class="alert alert-danger">Impossible de faire l\'auto transaction</b>';
        
      }
      else{

      $nameGet .='<b style="font-style:italic;">'.$checkExist['PSEUDO_CLIENT'].' '.strtoupper($checkExist['NOM_CLIENT']).'</b>';
      
      }
    }
    else{
      $nameGet .='<b class="alert alert-warning">Le Code est incorrect ou n\'existe pas!!!</b>';
    }

    #AGENT CHECK MATRICULE

    
    $response['exist'] = $nameGet;
    echo json_encode($response);
  }

    public function getOne(){
      $code = $this->uri->segment(3);
      $one = $this->Model->getOne('groupe',array('IS_ACTIF_GROUPE'=>9,'CODE_GROUPE'=>$code));
     
      $output['data'] = $one;
      $this->load->view('Module_Update_View',$output);
    }

    public function creer() {
      $pays = $this->Model_Ted->list_all('pays');

        $html_pays = '';
        foreach($pays as $one_pays){

          $html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
        }
      
        
        $data['pays'] =$html_pays;
      
    $this->load->view('Module_Add_view',$data);
    }

    public function modifier(){
        $this->form_validation->set_rules('nom','Titre','required|trim');
        $this->form_validation->set_rules('description','Description','required|trim');
        $this->form_validation->set_rules('tel','Telephone','required|trim');
        

        if($this->form_validation->run()==true){
            $nom=$this->security->xss_clean(html_escape($this->input->post("nom")));
            $description=$this->security->xss_clean(html_escape($this->input->post("description")));
            $tel=$this->security->xss_clean(html_escape($this->input->post("tel")));
            $Id=$this->security->xss_clean(html_escape($this->input->post('Id')));

           
            $data=array(
                'NOM_GROUPE'=>$nom,
                'DESCRIPTION'=>$description,
                'TELEPHONE'=>$tel
            );
               if ($this->Model_Ted->update('groupe',array('ID_GROUPE'=>$Id,'IS_ACTIF_GROUPE'=>9),$data)) {
                  echo "Success#La modification reussie#success";
                
               }else{
                  echo "Erreur#Une erreur s'est produite lors de la modification#error";
               }
             

        }
        else{
          echo "Erreur#Veuillez remplir ce champs#error";
        }
          
      
    }
    public function Add(){
        $this->form_validation->set_rules('codeMembre','Code','required|trim');
        $this->form_validation->set_rules('position','position','required|trim');
        $this->form_validation->set_rules('groupe','groupe','required|trim');
        $this->form_validation->set_rules('description','description','required|trim');
        if($this->form_validation->run()==true){

            $code=generate_code('members','CODE_MEMBER','mbr');
            $position=$this->security->xss_clean(html_escape(ucfirst($this->input->post("position"))));
            $description=$this->security->xss_clean(html_escape($this->input->post("description")));
            $codeMembre=$this->security->xss_clean(html_escape($this->input->post("codeMembre")));
            $groupe=$this->security->xss_clean(html_escape($this->input->post("groupe")));
            $fetchCode = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$codeMembre));

            // $test = (in_array('Approuvé', $checkStatus));
            // var_dump($test);
            // exit();
            if ($fetchCode) {   
              if ($fetchCode['MATRICULE_CLIENT']!=$this->session->userdata('MATRICULE')) {

                $client=$fetchCode['CODE_CLIENT'];
                $data=array(
                'CODE_MEMBER'=>$code,
                'CODE_GROUPE'=>$groupe,
                'CODE_COMPTE'=>$client,
                'POSITION'=>$position,
                'DESCRIPTION_MEMBRE'=>$description,

            );
            $verification=$this->Model->getOne('members',array('CODE_COMPTE'=>$client,'CODE_GROUPE'=>$groupe,'IS_ACTIF_MEMBER'=>9));
            // print_r($verification);
            // exit();
               if ($verification) {
                  echo "Desolé#Cette personne est deja dans le groupe!!#error";
                
               }else{
                  $this->Model->insert('members',$data);
                  echo "Success#L'enregistrement reussi#success";
               }
             }
             else{
              echo "Desolé#Votre compte est un compte de gestion#error";
             }

             }
             else{
              echo "Erreur#Ce code est incorrect ou n'existe pas#error";
             }
             
        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function delete(){
      $id= $this->security->xss_clean(html_escape($this->input->post('id')));


      $data=array('IS_ACTIF_MEMBER'=>7);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('members',array('ID_MEMBER'=>$id),$data);

        if ($supprimer){

           echo "success#Suppression reussie avec succès#success";
        }else{
               echo "Echec#Echec de la Suppression#error#error"; 

        }

    }
    private function getDevise($critere=array()){
    $all = $this->Model_Ted->join_client_solde($critere);
    $html ='';
    foreach($all as $key){
      $html.='<option  value="'.$key['CODE_DEVISE'].'">'.$key['NOM_DEVISE'].'('.$key['ABBR_DEVISE'].')</option>';
    }
    return $html;
  }
  public function send(){
    // echo "<pre>";
    // var_dump($this->input->post());
    // exit();
    // 
   
    $this->form_validation->set_rules('amount','Montant','trim|required');
    $this->form_validation->set_rules('code','code','required|trim');
    $this->form_validation->set_rules('devise','Devise','required|trim');
    $this->form_validation->set_rules('mdp','Mot de passe','required|trim');

    if($this->form_validation->run()){
      $montant=html_escape($this->security->xss_clean($this->input->post('amount')));
      $code = html_escape($this->security->xss_clean($this->input->post('code')));
      $devise =html_escape($this->security->xss_clean($this->input->post('devise')));
      $mdp = $this->input->post('mdp');
      $montant = floatval($montant);
      $montantRX = helper_facturation($montant);

      $number = $this->Model_Ted->count_number('members',array('IS_ACTIF_MEMBER'=>9,'CODE_GROUPE'=>$code));

      $requiredAmount = $number*$montant;

      
    if(password_verify($mdp, $this->session->userdata('MDP'))){

    if($montantRX=='error'){
      echo  'Erreur#Veuillez entrer un nombre valide et superieur à 1#error';
    }
    else{
    

    $check_my_amount = $this->Model_Ted->join_solde_client(array('IS_ACTIF_CLIENT'=>9,'solde.CODE_CLIENT'=>$this->session->userdata('CODE'),'IS_ACTIF_SOLDE'=>9));
    if(!$check_my_amount){
      echo  'Erreur#Vous n\'avez pas de solde disponible';
      }
      else{

        if($requiredAmount < $check_my_amount['MONTANT_SOLDE']-$montantRX[1]){

          $sommes_me = $check_my_amount['MONTANT_SOLDE']-$requiredAmount;

          $code_transaction=generate_code('payement','CODE_PAYEMENT','pmt');

          $data = array('CODE_PAYEMENT'=>$code_transaction,'CODE_TX'=>$code,'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'MONTANT_RX'=>$montant,'NOMBRE_PAYEMENT'=>$number);


              if($this->available_amount_when_receive($data)==true){

                  $dt_update['MONTANT_SOLDE'] = $sommes_me;
                  $dt_update['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');

                  if($check_my_amount){
                    $this->Model_Ted->update(
                    'solde',
                    array(
                      'IS_ACTIF_SOLDE'=>9,
                      'CODE_SOLDE'=>$check_my_amount['CODE_SOLDE'],
                      'CODE_CLIENT'=>$this->session->userdata('CODE')),
                    $dt_update);
              
                    echo "Reussie#Retrait éffectué avec succès#success";
                    }
                    else{
                      echo "Erreur#Un probleme avec le devise#error";
                    }
                    
                }
                else{
                  echo "Erreur#Une erreur lors de transaction#error";
                }
        }
        else{
          echo  'Erreur#Le solde est insuffisant pour faire cette transaction#error';
        }

      }
    
  

    }
  }
  else{
  echo  'Erreur#L\'identifiant est incorrect#error';
}


    }
    else{
      echo  'Erreur#Tous les champs sont requis#error';
    }


  }
private function available_amount_when_receive($data){
  $groupe = $data['CODE_TX'];
  $fetchMembers = $this->Model_Ted->list_Some('members',array('IS_ACTIF_MEMBER'=>9,'CODE_GROUPE'=>$groupe)) ;

  foreach($fetchMembers as $key){
    $code = $key['CODE_COMPTE'];
    $devise = $data['CODE_DEVISE'];
    $code_payement = $data['CODE_PAYEMENT'];
    $nbr_payement = $data['NOMBRE_PAYEMENT'];
    $montant = $data['MONTANT_RX'];

    $dt['CODE_PAYEMENT']=$code_payement;
    $dt['CODE_RX']=$code;
    $dt['CODE_TX']=$groupe;
    $dt['CODE_DEVISE']=$devise;
    $dt['MONTANT_TX']=$montant;
    $dt['MONTANT_RX']=$montant;
    $dt['NOMBRE_PAYEMENT']=$nbr_payement;

    $check_amount = $this->Model->getOne('solde',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>9));
   
    if($check_amount && $montant>0){
        $condition = array('IS_ACTIF_SOLDE'=>9,'CODE_CLIENT'=>$check_amount['CODE_CLIENT'],'CODE_DEVISE'=>$devise);
        // $this->Model_Ted->update('solde',$data,array('MONTANT_SOLDE'=>$sommes));
        $sommes =$check_amount['MONTANT_SOLDE'] + $montant;

        if($this->Model_Ted->update('solde',$condition,array('MONTANT_SOLDE'=>$sommes,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))){
          $this->Model_Ted->register('payement',$dt);
         
          return true;
        }
        else{
          return false;
        }
      }
  }
    
    
  }
    public function index(){
      // $bd_data = $this->Model_Ted->list_Some_Order('devise',array('IS_ACTIF_DEVISE'=>9),'NOM_DEVISE');
      // $gestion = $this->session->userdata("GESTION");
      $groupe = $this->uri->segment(4);
      $groupeClean = htmlspecialchars($this->security->xss_clean(html_escape($groupe)));
      $criteres['members.IS_ACTIF_MEMBER'] = 9;
      $criteres['members.CODE_GROUPE'] = $groupe;
      $bd_data = $this->Model_Ted->getOneJoinMembers($criteres);
      $crit['client.CODE_CLIENT'] = $this->session->userdata('CODE');
      $data['devise'] = $this->getDevise($crit);
      $data['groupe'] = $groupe;
      $data['number'] = $this->Model_Ted->count_number('members',array('CODE_GROUPE'=>$groupe,'IS_ACTIF_MEMBER'=>9));
      $html = '';
      $num = 1;
      if ($bd_data) {
      foreach($bd_data as $key){
         
        $html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['PRENOM_CLIENT']." ".$key['NOM_CLIENT']."</td>
                  <td>".$key['MATRICULE_CLIENT']."</td>
                  <td>".$key['POSITION']."</td>
                  <td>".getFortmat($key['DATE_CREATION'])."</td>

                              
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Manage/getOne/".$key['CODE_MEMBER'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_MEMBER'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_MEMBER'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer le compte de <b>" . $key['PRENOM_CLIENT']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_MEMBER']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
            
        }
      }
      else{
        $html.= null;
      }
      $data['membres'] = $html; 
      
      $this->load->view('Module_List_View',$data);
    }
  public function __construct() {
  parent::__construct();
  if (!$this->session->userdata('ID_GESTION')) {
    redirect('Clients/Clients');
    exit();
  }
  $data = array(
          'IS_ACTIF_CLIENT'=>9,
          'CODE_CLIENT'=>$this->session->userdata('CODE'),
        );
  $data_redirect = $this->Model->getOne('client',$data);
     if (!$this->session->userdata('ID') || !$data_redirect || $data_redirect['CODE_CLIENT'].'client'!=$this->session->userdata('STATIC')) {
      $this->session->sess_destroy();
      redirect('Login/index');
      exit();
     }
  }

}