<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Response extends CI_Controller {
	
    public function index(){
        $data['code'] = $this->input->get('cd_?');
        
        $this->load->view('Chat_View',$data);
    }
    public function display(){
        $codeClient = $this->input->post('code');
    	$req = 'SELECT * FROM chat WHERE IS_ACTIF_MSG = 9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_TX DESC';
    	$critere = array($codeClient,$codeClient);
    	$exec = $this->Model_Ted->querypreparemix($req,$critere);

    	$liveHtml = '';
    	
    	
    	foreach ($exec as $key) {
    		// print_r($key);
    		// exit();
    		if ($key['CODE_TX']==$this->session->userdata('CODE_SYSTM')) {
	    		$liveHtml .= '<div class="form-group">
	                            <span class="fa fa-lg fa-user pb-chat-fa-user"></span><span class="label label-default pb-chat-labels pb-chat-labels-left">'.$key['CONTENU_MSG'].'</span>
	                            </div>
	                            <hr>
	                            ';
    			
    		}
    		else{
    			$liveHtml .= '
	                            <div class="form-group pull-right pb-chat-labels-right">
	                                <span class="label label-primary pb-chat-labels pb-chat-labels-primary">'.$key['CONTENU_MSG'].'</span><span class="fa fa-lg fa-user pb-chat-fa-user"></span>
	                            </div>
	                            <div class="clearfix"></div>
	                            <hr>';
    		}
    	}

    	$response['live'] = $liveHtml;
    	echo json_encode($response);
    }

    public function send(){
    	$this->form_validation->set_rules('message','message','required|trim');
        $this->form_validation->set_rules('code','code','required|trim');
    	$response['status'] = 0;
    	if ($this->form_validation->run()) {
    		$message = $this->security->xss_clean(html_escape(htmlspecialchars($this->input->post('message'))));
            $client = $this->security->xss_clean(html_escape(htmlspecialchars($this->input->post('code'))));
    		$code = helper_generate_code('chat','CODE_CHAT','cht');
    		$data['CONTENU_MSG'] = $message;
    		$data['CODE_CHAT'] = $code;
    		$data['CODE_TX'] = $this->session->userdata('CODE_SYSTM');
    		$data['CODE_RX'] = $client;
            $critere1 = array('CODE_RX'=>$client);
            $critere2 = array('CODE_TX'=>$client);

    		if ($this->Model_Ted->register('chat',$data)) {
                $this->Model_Ted->update('chat',$critere1,array('SEEN'=>9));
                $this->Model_Ted->update('chat',$critere2,array('SEEN'=>9));
    			$response['status'] = 1;
    		}
    		else{
    			$response['msg'] = 'Une erreur lors de la transaction du message';
    		}

    	}
    	else{
			$response['msg'] = 'Vous ne pouvez pas envoyer un message vide';
    	}
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