<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

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
      $one = $this->Model->getOne('gestionnaire',array('IS_ACTIF_GESTION'=>9,'CODE_GESTION'=>$code));
     
      $output['data'] = $one;
      $this->load->view('Gestion_Update',$output);
    }

    public function creer() {
      $pays = $this->Model_Ted->list_all('pays');

        $html_pays = '';
        foreach($pays as $one_pays){

          $html_pays .= '<option value="'.$one_pays['CODE_PAYS_ALPHA3'].'">'.$one_pays['NOM_FR_FR'].' ('.$one_pays['CODE_PAYS_ALPHA3'].')</option>';
        }
      
        
        $data['pays'] =$html_pays;
      
    $this->load->view('Gestion_Add_View',$data);
    }

    public function modifier(){
        $this->form_validation->set_rules('Matricule','Matricule','required');

        if($this->form_validation->run()==true){

            $Id=$this->security->xss_clean(html_escape($this->input->post('Id')));
            $Matricule=$this->security->xss_clean(html_escape($this->input->post('Matricule')));
            $fecthCode = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$Matricule));

            if ($fecthCode) {

            $getCode = $fecthCode['CODE_CLIENT'];
                $data=array(
                'CODE_COMPTE'=>$getCode
            );
               if ($this->Model_Ted->update('gestionnaire',array('ID_GESTION'=>$Id,'IS_ACTIF_GESTION'=>9),$data)) {
                  echo "Success#La modification reussie#success";
                
               }else{
                  echo "Erreur#Une erreur s'est produite lors de la modification#error";
               }
             }
             else{
              echo "Erreur#Ce code est incorrect ou n'existe pas#error";
             }

        }
        else{
          echo "Erreur#Veuillez remplir ce champs#error";
        }
          
      
    }
    public function add(){
        $this->form_validation->set_rules('Matricule','Matricule','required');
        if($this->form_validation->run()==true){

            $gestion=generate_code('gestionnaire','CODE_GESTION','ges');
            $Matricule=$this->security->xss_clean($this->input->post("Matricule"));
            $fetchClient = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$Matricule));
            if ($fetchClient) {
            $client = $fetchClient['CODE_CLIENT'];    
                $data=array(
                'CODE_COMPTE'=>$client,
                'CODE_GESTION'=>$gestion
            );
            $verification=$this->Model->getOne('gestionnaire',array('CODE_COMPTE'=>$client,'IS_ACTIF_GESTION'=>9));
            // print_r($verification);
            // exit();
               if ($verification) {
                  echo "Erreur#Ce compte existe deja dans le module gestionnaire#error";
                
               }else{
                  $this->Model->insert('gestionnaire',$data);
                  echo "Success#L'enregistrement reussi#success";
               }

             }
             else{
              echo "Erreur#Ce code est incorrect ou n'existe pas#error";
             }
             
        }
        else{
          echo "Erreur#Veuillez remplir ce champs#error";
        }
          
      
    }
    public function delete(){
      $id=$this->input->post('id');


      $data=array('IS_ACTIF_GESTION'=>7);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('gestionnaire',array('ID_GESTION'=>$id,'IS_ACTIF_GESTION'),$data);

  
        if ($supprimer){

           echo "success#Suppression reussi avec succès#success";
        }else{
               echo "Error#Echec de la Suppression#error#error"; 

        }

    }

    public function bloc(){
      $id=$this->input->post('id');


      $data=array('IS_ACTIF_GESTION'=>5);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('gestionnaire',array('ID_GESTION'=>$id,'IS_ACTIF_GESTION'),$data);

  
        if ($supprimer){

           echo "success#Compte bloqué avec succès#success";
        }else{
               echo "Error#Echec#error"; 

        }

    }

    public function debloc(){
      $id=$this->input->post('id');


      $data=array('IS_ACTIF_GESTION'=>9);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('gestionnaire',array('ID_GESTION'=>$id,'IS_ACTIF_GESTION'),$data);

  
        if ($supprimer){

           echo "success#Compte debloqué avec succès#success";
        }else{
               echo "Error#Echec#error"; 

        }

    }

    public function index(){
      // $bd_data = $this->Model_Ted->list_Some_Order('devise',array('IS_ACTIF_DEVISE'=>9),'NOM_DEVISE');
      $bd_data = $this->Model_Ted->querysql2('SELECT * FROM client INNER JOIN gestionnaire ON client.CODE_CLIENT=gestionnaire.CODE_COMPTE WHERE IS_ACTIF_GESTION=9 OR IS_ACTIF_GESTION=5');
      $html = '';
      $num = 1;
      $btn = "";
      $status = "";
      foreach($bd_data as $key){
        if($key['IS_ACTIF_GESTION']==9){
            $status = "<span class='label label-sm label-success'>Approuvé</span>";
            $btn = "<a href='".base_url("Gestion/getOne/".$key['CODE_GESTION'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-edit'></i></a>
            <a href='#' data-toggle='modal' data-target='#mybloqued" . $key['ID_GESTION'] . "' data-toggle='tooltip' title='Bloqué' class='btn btn-danger'><i class='fa fa-lock'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_GESTION'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>";
          }
          elseif($key['IS_ACTIF_GESTION']==5){
            $status = "<span class='label label-sm label-danger'>Bloqué</span>";
            $btn = "<a href='#' data-toggle='modal' data-target='#myDebloc" . $key['ID_GESTION'] . "' data-toggle='tooltip' title='Debloquer' class='btn btn-warning'><i class='fa fa-unlock'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_GESTION'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>";
          }

        $html.="<tr>
                  <td>".$num++."</td>
                  <td>".$key['NOM_CLIENT'].' '.$key['PSEUDO_CLIENT']."</td>
                  <td>".$key['EMAIL_CLIENT']."</td>
                  <td>".$key['CODE_PAYS_ALPHA3']."</td>
                  <td>".getFortmat($key['DATE_CREATION'])."</td>
                  <td>".$status."</td>
                                 
             
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      ".$btn."
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_GESTION'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer le compte gestionnaire de <b>" . $key['PSEUDO_CLIENT']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_GESTION']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>


                                <div class='modal fade' id='mybloqued" . $key['ID_GESTION'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous bloquer le compte de <b>" . $key['PSEUDO_CLIENT']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='bloc(this)' id='".$key['ID_GESTION']."'>Bloquer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>



                                <div class='modal fade' id='myDebloc" . $key['ID_GESTION'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous debloquer le compte de <b>" . $key['PSEUDO_CLIENT']."</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='debloc(this)' id='".$key['ID_GESTION']."'>Debloquer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Annuler</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
      }
      $data['html'] = $html; 
      $this->load->view('Gestion_List_View',$data);
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