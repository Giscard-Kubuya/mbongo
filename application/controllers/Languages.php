<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of LanguageSwitcherController
 *
 * @author Fubini
 */
class Languages extends CI_Controller {

    public function __construct() {
	parent::__construct();
        $this->output->profiler(TRUE);
	
	}
        
    public function switchLang($language = "") {      
        $language =  $this->uri->segment(3);
	$language = ($language != "") ? $language : "english";
	$this->session->set_userdata('site_lang', $language);
	redirect($_SERVER['HTTP_REFERER']);
	}
}
