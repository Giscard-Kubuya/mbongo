<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
      
			$this->load->view('Dashboard_View');
    }

 

    public function compteur(){
    	$availableAmount = $this->Model_Ted->join_solde_system_devise(array('CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),'IS_ACTIF_SOLDE'=>10));
    	$availableClient = $this->Model_Ted->count_number('client',array('IS_ACTIF_CLIENT'=>9));
        $notMessage = $this->Model_Ted->count_number('chat',array('CODE_RX'=>$this->session->userdata('CODE_SYSTM'),'IS_ACTIF_MSG'=>9,'SEEN'=>7));
    	$Client = $this->Model_Ted->list_Some('rec_trans_systm',array('IS_ACTIF_RT'=>9));
    	
    	$htmlCompteur = '';

    	foreach ($availableAmount as $key) {
    		$htmlCompteur .='<div class="col-sm-6 col-md-3">
                                <div class="panel income db mbm">
                                    <div class="panel-body">
                                        <p class="icon"><i class="icon fa fa-money"></i></p>
                                        <h4 class="value" style="font-size:1.2em;"><span>'. $key['MONTANT_SOLDE'].'</span><span>'.$key['ABBR_DEVISE'] .'</span></h4>
                                        <p class="description">'. helper_get_timeago($key['LAST_UPDATE_SOLDE_AT']) .'</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;" class="progress-bar progress-bar-info"><span class="sr-only">60% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            
    	}


    	foreach($Client as $key2){
    		$hour = explode(":",$key2['DATE_RT']);
    		$hour2 =explode(" ",$hour[0]);
    		$profit = $key2['FRAIS_TX'];

    	}
        $response['msgNot'] = $notMessage;
    	
    	$response['hour2'] = $hour2;
    	$response['profit'] = $profit;
    	$response['compteur'] = $htmlCompteur;
    	$response['compteurClient'] = $availableClient;
    	echo json_encode($response);
    }



    public function display(){
        $req = 'SELECT * FROM chat WHERE SEEN = 7 AND IS_ACTIF_MSG = 9 AND CODE_RX=? ORDER BY DATE_TX DESC ';
        $critere = array($this->session->userdata('CODE_SYSTM'));
        $exec = $this->Model_Ted->querypreparemix($req,$critere);
        $liveHtml = '';
        
        
        foreach ($exec as $key) {
            $atts = array(
                'width'       => 800,
                'height'      => 600,
                'scrollbars'  => 'yes',
                'status'      => 'yes',
                'resizable'   => 'yes',
                'screenx'     => 0,
                'screeny'     => 0,
                'window_name' => '_blank',
                'data-toggle'=>"tooltip",
                'title'=>"Live chat(22h00)",
                'class'=>"nav-link dropdown-toggle  waves-effect waves-dark"
            );
            // print_r($key);
            // exit();
             $liveHtml .= '<li class="in"><img src="<?=base_url(\'outils/madmin\')?>/../../../s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" class="avatar img-responsive" />
                                                    <div class="message"><span class="chat-arrow"></span><a href="#" class="chat-name">Client</a>&nbsp;<span class="chat-datetime">à '.getFortmat($key['DATE_TX']).''.anchor_popup(base_url() .'Response?cd_?='.$key['CODE_TX'].'', 'Click me', $atts).'</span><span class="chat-body">'.$key['CONTENU_MSG'].'</span></div>
                                                </li>';

            
            
        }


        $response['live'] = $liveHtml;
        echo json_encode($response);
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