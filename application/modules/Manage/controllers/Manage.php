<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {


    public function check(){
   

    $name = html_escape($this->input->post('code'));
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
      $this->load->view('Group_Update_View',$output);
    }


    public function creer() {
      $pays = $this->Model_Ted->list_all('pays');

        $html_pays = '';
        foreach($pays as $one_pays){

          $html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
        }
      
        
        $data['pays'] =$html_pays;
      
    $this->load->view('Group_Add_view',$data);
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
    public function add(){
        $this->form_validation->set_rules('nom','Titre','required|trim');
        $this->form_validation->set_rules('description','Description','required|trim');
        $this->form_validation->set_rules('tel','Telephone','required|trim');
        if($this->form_validation->run()==true){

            $code=generate_code('groupe','CODE_GROUPE','grp');
            $nom=$this->security->xss_clean(html_escape($this->input->post("nom")));
            $description=$this->security->xss_clean(html_escape($this->input->post("description")));
            $tel=$this->security->xss_clean(html_escape($this->input->post("tel")));
            $checkStatus = $this->Model->getOne('gestionnaire',array('IS_ACTIF_GESTION'=>9,'CODE_GESTION'=>$this->session->userdata('GESTION')));
            // $test = (in_array('Approuvé', $checkStatus));
            // var_dump($test);
            // exit();
            if (in_array('Approuvé', $checkStatus)) {   
                $data=array(
                'CODE_GROUPE'=>$code,
                'CODE_GESTION'=>$this->session->userdata('GESTION'),
                'NOM_GROUPE'=>$nom,
                'DESCRIPTION'=>$description,
                'TELEPHONE'=>$tel,

            );
            $verification=$this->Model->getOne('groupe',array('NOM_GROUPE'=>$nom,'IS_ACTIF_GROUPE'=>9));
            // print_r($verification);
            // exit();
               if ($verification) {
                  echo "Desolé#Ce groupe existe deja!!Veuillez choisir un autre nom#error";
                
               }else{
                  $this->Model->insert('groupe',$data);
                  echo "Success#L'enregistrement reussi#success";
               }

             }
             else{
              echo "Erreur#Votre groupe de gestion est sous le status ".$checkStatus['STATUS']." pour le moment#error";
             }
             
        }
        else{
          echo "Erreur#Veuillez remplir tous les champs#error";
        }
          
      
    }
    public function delete(){
      $id= $this->security->xss_clean(html_escape($this->input->post('id')));


      $data=array('IS_ACTIF_GROUPE'=>7);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('groupe',array('ID_GROUPE'=>$id,'IS_ACTIF_GROUPE'=>9),$data);

  
        if ($supprimer){

           echo "success#Suppression reussie avec succès#success";
        }else{
               echo "Echec#Echec de la Suppression#error#error"; 

        }

    }

    public function index(){
      // $bd_data = $this->Model_Ted->list_Some_Order('devise',array('IS_ACTIF_DEVISE'=>9),'NOM_DEVISE');
      // $gestion = $this->session->userdata("GESTION");
      $gestion['groupe.CODE_GESTION'] = $this->session->userdata("GESTION");
      $bd_data = $this->Model_Ted->querygroup($gestion);
     
      $html = '';
      $option = '';
      $num = 1;
      $status = NULL;
      if ($bd_data) {
      foreach($bd_data as $key){
        if (in_array('Approuvé', $key)) {
        $criteresCount['IS_ACTIF_MEMBER'] = 9;
        $criteresCount['CODE_GROUPE'] = $key['CODE_GROUPE'];
        $countMember = $this->Model_Ted->count_number('members',$criteresCount);
        $option .='<option value="'.$key['CODE_GROUPE'].'">'.$key['NOM_GROUPE'].'</option>';
        $html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['NOM_GROUPE']."</td>
                  <td>".$key['DESCRIPTION']."</td>
                  <td>".$countMember."</td>
                  <td>".$key['TELEPHONE']."</td>
                  <td>".getFortmat($key['DATE_CREATION_GR'])."</td>
            
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Membre/Membre/index/".$key['CODE_GROUPE'])."' data-toggle='tooltip' title='Voir' class='btn  btn-info'><i class='fa fa-eye'></i></a>
                      <a href='".base_url("Manage/getOne/".$key['CODE_GROUPE'])."' data-toggle='tooltip' title='Modifier' class='btn btn-success'><i class='fa fa-edit'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_GROUPE'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_GROUPE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer le groupe<b>" . $key['NOM_GROUPE']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_GROUPE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
            }
            else{
              $status = $status;
            }
        }
      }
      else{
        $html.= null;
      }
      $data['modalGroupe'] = $option;
      $data['status'] = $status;
      $data['groupe'] = $html; 
      
      $this->load->view('Group_List_View',$data);
    }
private function checkStatusManage(){
   $gestion = $this->session->userdata('GESTION');

  $getOneManage = $this->Model->getOne('gestionnaire',array('CODE_GESTION'=>$gestion));
  return $getOneManage['IS_ACTIF_GESTION'];
}

  public function __construct() {
  parent::__construct();
  if (!$this->session->userdata('ID_GESTION')) {
    redirect('Clients/Clients');
    exit();
  }

  if ($this->checkStatusManage()!=9) {
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
      redirect('Authentification');
      exit();
     }
  }

}