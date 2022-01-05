<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Acceuils to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        
    }


    public function upload_content(){

        $location = $this->input->post("chemin");
        $reponse = helper_upload($location);

        echo $reponse;
    }
    public function upload_content1(){

        $location1 = $this->input->post("chemin");
        $reponse1 = helper_upload1($location1);

        echo $reponse1;
    }
    // public function upload_content2(){

    //     $location2 = $this->input->post("chemins");
    //     $reponse2 = helper_upload2($location2);

    //     echo $reponse2;
    // }

}
