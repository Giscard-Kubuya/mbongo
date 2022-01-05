<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rapport extends CI_Controller {
    public function index() {
      		$data['liste']  = $this->liste();
      		$data['total'] = $this->Model_Ted->querysql('SELECT * FROM solde_system WHERE CODE_CLIENT=?',$this->session->userdata('CODE'));
      		
			$this->load->view('Rapport_List_View',$data);
    }

    public function liste() {
      $sortie = $this->Model_Ted->report_agent($this->session->userdata('CODE'));
      $html = '';
      $num = 1;
      foreach($sortie as $key){
      	$dev['CODE_DEVISE'] = $key['CODE_DEVISE'];

      	$devise = $this->Model->getOne('devise',$dev);
      	$html.='<tr>
		        <td>'.$num++.'</td>
		        <td>'.$key['MONTANT_TX'].''.$devise['ABBR_DEVISE'].'</td>
		        <td>'.$key['MONTANT_RX'].''.$devise['ABBR_DEVISE'].'</td>
		        <td>'.getFortmat($key['DATE_RT']).'</td>
          </tr>';
      }
      return $html;
    }


    public function __construct() {
	parent::__construct();
	
	
		 if (!$this->session->userdata('ID') || $this->session->userdata('CODE').'agent'!=$this->session->userdata('STATIC')) {
		 	$this->session->sess_destroy();
		 	redirect('Login/index');
		 	exit();
		 }
	}

}