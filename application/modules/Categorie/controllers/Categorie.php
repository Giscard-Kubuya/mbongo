<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // helper_session_exist();
    }

    public function index($params = NULL) {

      // $data['categorie']=$this->Model_Ted->list_Some('categorie',array('IS_ACTIF'=>1));
      $this->load->view('Categorie_Add_View');
    }
    

    public function add(){
            $code_categorie=helper_generate_code('categorie','CODE_CATEGORIE','cat');
            $nom_categorie =$this->input->post('nom_categorie');
           

           

             if(!empty($nom_categorie)){
                $data=array(
                'CODE_CATEGORIE'=>$code_categorie,
                'NOM_CATEGORIE'=>$nom_categorie
            );
               $verification=$this->Model->getOne('categorie',array('NOM_CATEGORIE'=>$nom_categorie));
            if (empty($verification)) {
                
                $this->Model->insert('categorie',$data);
               echo "success#L'enregistrement reussi#success";
                # code...
               }else{
                echo "Error#Cette categorie existe deja#error";
               }

             }else{
                 echo "Error#Veuillez completez tous les champs#error";

             }
          
      
    }

    public function liste(){
      $condition=array(
        'IS_ACTIF'=>1
      );
      $categorie=$this->Model_Ted->list_Some('categorie',$condition);
      $tableau="";
      $id=0;
      foreach($categorie as $key){
          $id++;
           $tableau.="<tr>
                
                  <td>".$id."</td>
                  <td>".$key['NOM_CATEGORIE']."</td>
                                 
                  <td class='text-center'>
                    <div class='btn-group btn-group-xs'>
                      <a href='".base_url("Categorie/getOne/".$key['CODE_CATEGORIE'])."' data-toggle='tooltip' title='Modifier' class='btn btn-default'><i class='fa fa-pencil'></i></a>
                       <a href='#' data-toggle='modal' data-target='#mydelete" . $key['ID_CATEGORIE'] . "' data-toggle='tooltip' title='Supprimer' class='btn btn-danger'><i class='fa fa-times'></i></a>
                    </div>
                  </td>
                        <div class='modal fade' id='mydelete" . $key['ID_CATEGORIE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                             <div class='modal-body'>
                                              <h5>Voulez vous Supprimer la banque <b>"  .$key['NOM_CATEGORIE']. "</b>?</h5>
                                                </div>

                                        <div class='modal-footer'>
                                         <button class='btn btn-danger btn-md' onclick='deleted(this)' id='".$key['ID_CATEGORIE']."'>Supprimer</button>
                                        <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                          </div>

                                       </div>
                                    </div>
                                </div>
                            
            </tr>";
        }

        $data['tableau']=$tableau;
    
   
        $this->load->view("Categorie_List_View ",$data);
    }
       

    public function efface(){
      $id_categorie=$this->input->post('id');


      $data=array('IS_ACTIF'=>3);
     // $data2=array('IS_ACTIF'=>3);

      $supprimer=$this->Model->update('categorie',array('ID_CATEGORIE'=>$id_categorie),$data);

  
        if ($supprimer){

           echo "success#Suppression reussi avec succès#success";
        }else{
               echo "Error#Echec de la Suppression#error#0";  

        }

    }

    public function getOne(){
      $code_categorie=$this->uri->segment(3);
      $data['categorie']=$this->Model->getOne('categorie', array('CODE_CATEGORIE'=>$code_categorie)); 

        $this->load->view('Categorie_Update_View',$data);

    }

  public function modifier(){
              $id_categorie=$this->input->post('Id');
            $nom_cathegorie=$this->input->post('nom_cathegorie');
         

             if(!empty($nom_cathegorie)){
                $data=array(
                'NOM_CATEGORIE'=>$nom_cathegorie,
            );
        
              $modification=$this->Model->update('categorie',array('ID_CATEGORIE'=>$id_categorie),$data);

              if ($modification) {
                 echo "success#La modification a reussi#success";

             }else{
                 echo "Error#Veuillez completez tous les champs#error";

             }
     
        
    }
  }
}


 