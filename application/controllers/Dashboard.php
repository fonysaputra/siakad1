<?php

Class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        //chekAksesModule();
        $this->load->library('ssp');
    }

    

    function index() {
        $this->template->load('template', 'dashboard/index');
    }

  


}