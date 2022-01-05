<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    function __construct() {
          parent::__construct();
          // $this->output->enable_profiler(TRUE);

    }

    public function index() {
		$this->load->view('Agent_Add_View');
    }

}