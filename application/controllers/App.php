<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }


    /**
     * index
     */
    public function index()
	{
        $this->load->view('email/vaga_estagio');
    }
}
