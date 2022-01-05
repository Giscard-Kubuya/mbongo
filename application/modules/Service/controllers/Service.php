<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    // AND DAY(DATE_RT)=? AND CODE_TX=? OR CODE_RX=?
    protected $tbl='';
    
public function Verser(){
    $this->form_validation->set_rules('amount','Montant','trim|required');
    $this->form_validation->set_rules('devise','Devise','trim|required');
    $this->form_validation->set_rules('mdp1','Mot de passe','trim|required');
    $this->form_validation->set_rules('attache','Message','trim');
   
    if($this->form_validation->run()==true){
        $amount=$this->input->post('amount');
        $devise = $this->input->post('devise');
        $mdp = $this->input->post('mdp1');
        $attache = $this->input->post('attache');
        $montant = str_replace(" ","", $amount);
       

        $montant = floatval($montant);
        $montantRX = helper_facturation($montant);
                        
        
        if(password_verify($mdp, $this->session->userdata('MDP'))){
        if($montantRX=='error'){
            echo  'Erreur#Veuillez entrer un nombre valide et superieur à 1#error';
        }
        else{
                $check_my_amount = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>11,'CODE_CLIENT'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise));
        if(!$check_my_amount){
            echo  'Erreur#Il n\'ya pas de solde disponible';
            }
            else{
                if($check_my_amount['MONTANT_SOLDE'] >= $montant + $montantRX[1]){

                    #$sommes_me = $check_my_amount['MONTANT_SOLDE']+$montant;
                    $code=$this->session->userdata('CODE_SYSTM');
                    $code_transaction=generate_code('rec_trans_systm','CODE_RT','transysag');

                    $data = array('CODE_RT'=>$code_transaction,'CODE_RX'=>$code,'CODE_TX'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'MONTANT_RX'=>$montant);

                    if($this->available_amount_when_syst($devise,$code,$montant,$data)==true){
                        
                        $dt_update['MONTANT_SOLDE'] = ($check_my_amount['MONTANT_SOLDE']-$montant);
                        $dt_update['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');


                        
                        if(!empty($check_my_amount)){
                            $this->Model_Ted->update(
                                'solde_system',
                                array(
                                    'CODE_DEVISE'=>$devise,
                                    'CODE_CLIENT'=>$this->session->userdata('CODE'),
                                    'IS_ACTIF_SOLDE'=>11),
                                $dt_update);
                        $getDev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$devise));
                        $getRx = $this->Model->getOne('agent',array('IS_ACTIF_AGENT'=>15,'CODE_AGENT'=>$code));
                        echo  'Versement reussi#'.$montant.''.$getDev['ABBR_DEVISE'].' virés au Système#success';
                        }
                        else{
                            echo  'Erreur#Une erreur s\'est produite,Veririfier bien votre devise#warning';
                            
                        }

                        


                    }else{
                        echo  'Erreur#Une erreur lors du versement#error';
                        
                    }
                }
                else{
                    echo  'Erreur#Le solde est insuffisant pour faire cette transaction#error';
                }

            }
        }
    }
    else{
        echo  'Erreur#Le code est incorrect#error';
    }
  
}
else{

    echo  'Erreur#Tous les champs sont requis#error';
    // $response['amount'] = strip_tags(form_error('amount'));
    // $response['mdp1'] = strip_tags(form_error('mdp1'));
    // $response['mdp2'] = strip_tags(form_error('mdp2'));

}
    
        #$this->Model_Ted->insert('solde',$data2);
    }


    private function available_amount_when_syst($devise,$code,$montant,$data){
                #ON VERIFIE SI LE CLIENT A DEJA EFFECTUE OU RECU UNE TRANSACTION
        $check_amount = $this->Model->getOne('solde_system',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>10,'CODE_DEVISE'=>$devise));
        
        
            #SI JAMAIS,ON CREE UN SOLDE POUR LUI    
            if(empty($check_amount && $montant>0)){
                $code_solde=generate_code('solde_system','CODE_SOLDE','sld');
                $this->Model_Ted->register('solde_system',array('IS_ACTIF_SOLDE'=>10,'CODE_CLIENT'=>$code,'CODE_DEVISE'=>$devise,'CODE_SOLDE'=>$code_solde,'MONTANT_SOLDE'=>$montant));
                $this->Model_Ted->register('rec_trans_systm',$data);
                return true;
                
            }
            #S IL EN A, ON INSERE SON MONTANT AVEC SON SOLDE COURANT
            else{
                $condition = array('IS_ACTIF_SOLDE'=>10,'CODE_CLIENT'=>$check_amount['CODE_CLIENT'],'CODE_DEVISE'=>$devise);
                // $this->Model_Ted->update('solde_system',$data,array('MONTANT_SOLDE'=>$sommes));
                $sommes_total =$check_amount['MONTANT_SOLDE'] + $montant;

                if($this->Model_Ted->update('solde_system',$condition,array('MONTANT_SOLDE'=>$sommes_total,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))){
                    $this->Model_Ted->register('rec_trans_systm',$data);
                    return true;
                }
                else{
                    return false;
                }
            }
        
        
    }


    public function index() {
            $data=$this->last_act();
            $code['CODE_AGENT'] = $this->session->userdata('CODE');
           $data['devise'] = $this->getDevise($code);

            $this->load->view('Service_View',$data);
    }
public function check(){
        $nameAgent = html_escape($this->input->post('codeAgent'));
        $nameSecureAgent = $this->security->xss_clean($nameAgent);
        $checkExistAgent = $this->Model->getOne('agent',array('IS_ACTIF_AGENT'=>15,'MATRICULE_AGENT'=>$nameSecureAgent));



        $name = html_escape($this->input->post('code'));
        $nameSecure = $this->security->xss_clean($name);
        $checkExist = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$nameSecure));
         $nameGetAgent = '';
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
            $nameGet .='<b class="alert alert-warning">Code pas correct!!!</b>';
        }

        #AGENT CHECK MATRICULE

        if ($checkExistAgent) {
            $nameGetAgent .='<b style="font-style:italic;">'.$checkExistAgent['PSEUDO_AGENT'].' '.strtoupper($checkExistAgent['NOM_AGENT']).'</b>';
            
        }
        else{
            $nameGetAgent .='<b class="alert alert-warning">Code pas correct!!!</b>';
        }
        
        $response['existAgent'] = $nameGetAgent;
        $response['exist'] = $nameGet;
        echo json_encode($response);
    }
    private function last_act(){
        $last_action['transmit'] = $this->Model_Ted->list_last_act(array('CODE_TX'=>$this->session->userdata('CODE')));
        $last_action['receive'] = $this->Model_Ted->list_last_receive(array('CODE_RX'=>$this->session->userdata('CODE')));
        return $last_action;
    }
    public function Rapport(){

        $this->load->view('Rapport_View',$this->RapportHtml());
    }


    public function RapportHtml(){
         $sortie1 = $this->Model_Ted->report_agent($this->session->userdata('CODE'));

         $req = ("SELECT * FROM rec_trans_systm WHERE IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT DESC");
         $params = array('CODE_TX'=>$this->session->userdata('CODE'),'CODE_RX'=>$this->session->userdata('CODE'));
         $sortie = $this->Model_Ted->querypreparemix($req,$params);

        
          $html = '';
          $num = 1;

          foreach($sortie as $key){
            $dev['CODE_DEVISE'] = $key['CODE_DEVISE'];

            $devise = $this->Model->getOne('devise',$dev);
            if ($key['CODE_TX']==$this->session->userdata('CODE')) {
            $transmetteur = 'Moi';
            }
            elseif($key['CODE_TX']==$this->session->userdata('CODE_SYSTM')){
                $transmetteur = 'Système';
            }
            else{
                $client = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'CODE_CLIENT'=>$key['CODE_TX']));
                $transmetteur =$client['NOM_CLIENT'].' '.$client['PSEUDO_CLIENT'].'('.$client['MATRICULE_CLIENT'].')';
            }

            if ($key['CODE_RX']==$this->session->userdata('CODE')) {
            $recepteur = 'Moi';
            }
            elseif($key['CODE_RX']==$this->session->userdata('CODE_SYSTM')){
                $recepteur = 'Système';
            }
            else{
                $client = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'CODE_CLIENT'=>$key['CODE_RX']));
                $recepteur =$client['NOM_CLIENT'].' '.$client['PSEUDO_CLIENT'].'('.$client['MATRICULE_CLIENT'].')';
            }
            
            $html.='<tr class="">
                    <td>
                       '.$num++.'
                    </td>
                    <td>
                        '.$transmetteur.'
                    </td>
                    <td>
                        '.$key['MONTANT_TX'].''.$devise['ABBR_DEVISE'].'
                    </td>
                    <td class="center">
                        '.$recepteur.'
                    </td>
                    <td class="center">
                        '.$key['MONTANT_RX'].''.$devise['ABBR_DEVISE'].'
                    </td>
                    <td class="center">
                        '.$key['FRAIS_TX'].''.$devise['ABBR_DEVISE'].'
                    </td>
                    <td class="center">
                        '.getFortmat($key['DATE_RT']).'
                    </td>
                </tr>';
          }
          $response['repport'] =$html;
          return $response;

    }

    public function last_date(){
         $date_transfer = $this->Model_Ted->list_last_one($this->session->userdata('CODE'));
         
        
        $response['last_transfer']= helper_get_timeago($date_transfer['DATE_RT']);
        echo json_encode($response);
    }
    public function form(){
            $code['CODE_AGENT'] = $this->session->userdata('CODE');
            $this->tbl = 'client';
            
            $code_beneficiaire['CODE_CLIENT'] = trim($this->input->post('get_beneficiaire'));
            $data['devise'] = $this->getDevise($code);
            $data['data'] = $this->getOne($code_beneficiaire);
            
            $this->load->view('Search_Found',$data);

    }

    public function list(){
    $data['code_client'] = $this->get_all();

    $this->load->view('Search_Client',$data);

    }
public function show_solde(){
        $solde = $this->Model_Ted->join_solde_agent_devise($this->session->userdata('CODE'));
        #$count = $this->Model_Ted->count_number('solde_system',array('IS_ACTIF_SOLDE'=>11,'CODE_CLIENT'=>$this->session->userdata('CODE')));
       
        #$deviseEmpty = $this->Model_Ted->list_Some('devise',array('IS_ACTIF_DEVISE'=>9));
  
        
        $htmlDevise = '';
       
        $devEmp = $this->Model_Ted->list_Some('devise',array('IS_ACTIF_DEVISE'=>9));
        foreach ($devEmp as $cle) {
            $dev = $cle['CODE_DEVISE'];
            #$solde = $this->Model_Ted->join_client_solde2($this->session->userdata('CODE'),$dev);
            $solde2 = $this->Model->getOne('solde_system',array('CODE_CLIENT'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$dev));
            
            if ($solde2['CODE_DEVISE']==$dev) {
                $htmlDevise.= '<div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                                <h6 class="text-white" >'.$solde2['MONTANT_SOLDE'].''.$cle['ABBR_DEVISE'].'</h6>
                            </div>
                        </div>
                    </div> ';
            }
            else{
                $htmlDevise.= '<div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                                <h6 class="text-white" >0'.$cle['ABBR_DEVISE'].'</h6>
                            </div>
                        </div>
                    </div> ';
            }
            
        }
                        
                   
   
       
        
       
        // $solde_all_divice = $this->Model_Ted->join_solde_agent_devise(array('IS_ACTIF_AGENT'=>9,'solde_system.IS_ACTIF_SOLDE'=>11,'solde_system.CODE_CLIENT'=>$this->session->userdata('CODE')));
        
        
       
    $response['htmlSolde'] = $htmlDevise;
    echo json_encode($response);
     
}

public function send(){
    $this->form_validation->set_rules('code_client','Code','trim|required');
    $this->form_validation->set_rules('amount','Montant','trim|required');
    $this->form_validation->set_rules('devise','Devise','trim|required');
    $this->form_validation->set_rules('mdp','Mot de passe','trim|required');
   
    if($this->form_validation->run()==true){
        $montant=html_escape($this->security->xss_clean($this->input->post('amount')));
        $matricule = html_escape($this->security->xss_clean($this->input->post('code_client')));
        $devise =html_escape($this->security->xss_clean($this->input->post('devise')));
        $mdp = $this->input->post('mdp');
        $montant = floatval($montant);
        $montantRX = helper_facturation($montant);

        $montant = floatval($montant);
        $montantRX = helper_facturation($montant);
                        
        
        if(password_verify($mdp, $this->session->userdata('MDP'))){
        if($montantRX=='error'){
            echo  'Erreur#Veuillez entrer un nombre valide et superieur à 1#error';
        }
        else{

            $checkMatricule = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$matricule));
            
            if($checkMatricule){
            $code = $checkMatricule['CODE_CLIENT'];
            $check_my_amount = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>11,'CODE_CLIENT'=>$this->session->userdata('CODE')));

        if(!$check_my_amount){
            $response['error'] = 'Votre solde est insuffisant';
            }
            else{
                // if($montant < $check_my_amount['MONTANT_SOLDE']-$montantRX[1]){
                if($check_my_amount['MONTANT_SOLDE'] >= $montant + $montantRX[1]){

                    #$sommes_me = $check_my_amount['MONTANT_SOLDE']+$montant;

                    $code_transaction=generate_code('rec_trans_systm','CODE_RT','transysage');

                    $data = array('CODE_RT'=>$code_transaction,'CODE_RX'=>$code,'CODE_TX'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'MONTANT_RX'=>$montantRX[0],'FRAIS_TX'=>$montantRX[1]);

                    if($this->available_amount_when_receive($devise,$code,$montantRX[0],$data)==true){
                        $systm_one = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>11,'CODE_CLIENT'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise));

                        $dt_sys['MONTANT_SOLDE'] = $systm_one['MONTANT_SOLDE']+$montantRX[1]-$montant;
                        $dt_sys['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');

                            if(!empty($systm_one['CODE_DEVISE']) && $systm_one['CODE_DEVISE']!=$devise){
                        
                               
                                echo  'Erreur#Une erreur provenant du devise...Il est fort probable que la transaction a été bien faite mais on a constanté quelques problemes avec le devise. Veuillez contater l\'équipe technique#error';
                                
                                /*$this->Model_Ted->register(
                                    'solde_system',
                                    array(
                                        'CODE_SOLDE'=>$code_acount,
                                        'CODE_CLIENT'=>$this->session->userdata('CODE'),
                                        'CODE_DEVISE'=>$devise,
                                        'MONTANT_SOLDE'=>$montantRX[1],
                                        'IS_ACTIF_SOLDE'=>11
                                    ));*/
                                    
                            }
                            else{
                                
                                $this->Model_Ted->update(
                                    'solde_system',
                                    array(
                                        'CODE_DEVISE'=>$devise,
                                        'IS_ACTIF_SOLDE'=>11,
                                        'CODE_SOLDE'=>$systm_one['CODE_SOLDE'],
                                        'CODE_CLIENT'=>$this->session->userdata('CODE')),
                                    $dt_sys);
                                
                            }
                        

                        $getDev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$devise));
                        $getRx = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'CODE_CLIENT'=>$code));
                        echo  'Transaction reussie#'.$montant.''.$getDev['ABBR_DEVISE'].' virés à '.$getRx['PSEUDO_CLIENT'].' '.$getRx['NOM_CLIENT'].'#success';

                    }else{
                        echo  'Erreur#Une erreur lors de la transaction#error';
                        
                    }
                }
                else{
                    echo  'Erreur#Le solde est insuffisant pour faire cette transaction#error';
                   
                }

            }
          }
    else{
        echo  'Echec#Impossible de faire l\'auto-transaction#error';
    }
        }
    }
    else{
        echo  'Erreur#Le code est incorrect#error';
    }
 
}
else{

    echo  'Erreur#Tous les champs sont requis#error';
    // $response['amount'] = strip_tags(form_error('amount'));
    // $response['mdp1'] = strip_tags(form_error('mdp1'));
    // $response['mdp2'] = strip_tags(form_error('mdp2'));

}
    
        #$this->Model_Ted->insert('solde',$data2);
    }

    private function available_amount_when_receive($devise,$code,$montant,$data){
                #ON VERIFIE SI LE CLIENT A DEJA EFFECTUE OU RECU UNE TRANSACTION
        $check_amount = $this->Model_Ted->list_Some('solde',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>9,'CODE_DEVISE'=>$devise));
        
        
            #SI JAMAIS,ON CREE UN SOLDE POUR LUI    
            if(empty($check_amount && $montant>0)){
        
                $code_solde=generate_code('solde','CODE_SOLDE','sldclt');
                $this->Model_Ted->register('solde',array('CODE_CLIENT'=>$code,'CODE_DEVISE'=>$devise,'CODE_SOLDE'=>$code_solde,'MONTANT_SOLDE'=>$montant));
                $this->Model_Ted->register('rec_trans_systm',$data);
                return true;
                
            }
            #S IL EN A, ON INSERE SON MONTANT AVEC SON SOLDE COURANT
            else{
                $one = $this->Model->getOne('solde',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>9,'CODE_DEVISE'=>$devise));
                $condition = array('IS_ACTIF_SOLDE'=>9,'CODE_CLIENT'=>$one['CODE_CLIENT'],'CODE_DEVISE'=>$one['CODE_DEVISE']);
                // $this->Model_Ted->update('solde',$data,array('MONTANT_SOLDE'=>$sommes));
                $sommes_total =$one['MONTANT_SOLDE'] + $montant;
                if($this->Model_Ted->update('solde',$condition,array('MONTANT_SOLDE'=>$sommes_total,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))==true){
                
                    $this->Model_Ted->register('rec_trans_systm',$data);
                    return true;
                }
                else{
                    return false;
                }
            }
        
        
    }

    private function getDevise($critere=array()){
        $all = $this->Model_Ted->join_solde_agent_devise($critere);
        $html ='';
        foreach($all as $key){
            $html.='<option value="'.$key['CODE_DEVISE'].'">'.$key['NOM_DEVISE'].'('.$key['ABBR_DEVISE'].')</option>';
        }
        return $html;
    }

    private function getOne($critere=array()){
        $one = $this->Model->getOne($this->tbl,$critere);
        return $one;
    }


    private function get_all(){
        $clients = $this->Model_Ted->querysql('SELECT * FROM client WHERE IS_ACTIF_CLIENT=9 ORDER BY RAND()');
        $html='';
        foreach($clients as $key){
            $html.='<option value="'.$key['CODE_CLIENT'].'">'.$key['MATRICULE_CLIENT'].'</option>';
        }
        return $html;
    }
    public function Versement(){
        $req = ('SELECT * FROM agent INNER JOIN rec_trans_systm ON agent.CODE_AGENT=rec_trans_systm.CODE_TX OR agent.CODE_AGENT=rec_trans_systm.CODE_RX WHERE rec_trans_systm.IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=?');
        $param = array($this->session->userdata('CODE'),$this->session->userdata('CODE'));

        $exec = $this->Model_Ted->querypreparemix($req,$param);
        $html='';
        $num = 1;

            
          foreach($exec as $key){
            $dev['CODE_DEVISE'] = $key['CODE_DEVISE'];

            $devise = $this->Model->getOne('devise',$dev);
            if ($key['CODE_TX']==$this->session->userdata('CODE')) {
            $transmetteur = 'Moi';
            }
            else{
                $transmetteur ='Système';
            }
            if ($key['CODE_RX']==$this->session->userdata('CODE')) {
                $recepteur = 'Moi';
            }
            else{
                $recepteur ='Système';
            }
            $html.='<tr class="">
                    <td>
                       '.$num++.'
                    </td>
                    <td>
                        '.$transmetteur.'
                    </td>
                    <td>
                        '.$key['MONTANT_TX'].''.$devise['ABBR_DEVISE'].'
                    </td>
                    <td class="center">
                        '.$recepteur.'
                    </td>
                    <td class="center">
                        '.$key['MONTANT_RX'].''.$devise['ABBR_DEVISE'].'
                    </td>
                    <td class="center">
                        '.$key['FRAIS_TX'].''.$devise['ABBR_DEVISE'].'
                    </td>
                    <td class="center">
                        '.getFortmat($key['DATE_RT']).'
                    </td>
                </tr>';
          }
         
        $dt['repport'] = $html;
    
        $this->load->view('Versement_Rapport',$dt);
    }



    public function __construct() {
    parent::__construct();
    
         if (!$this->session->userdata('ID') || $this->session->userdata('CODE').'agent'!=$this->session->userdata('STATIC')) {
            $this->session->sess_destroy();
            redirect('Authentification');
            exit();
         }
    }

}