<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Web
 */
class Web extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }


    /**
     * index
     */
    public function index()
	{

	    $head = array(
            "scripts" => array(
                "login.js"
            )
        );

	    $this->load->view('layout/head', $head);
	    $this->load->view('layout/navbar');
        $this->load->view('login');
        $this->load->view('layout/footer');
    }

    public function register(){
        $head = array(
            "scripts" => array(
                "register.js"
            )
        );

        $this->load->view('layout/head', $head);
        $this->load->view('layout/navbar');
        $this->load->view('register');
        $this->load->view('layout/footer');
    }

    public function confirm($token)
    {
        $email = base64_decode($token);
        $this->load->model("employer_model");
        $user = $this->employer_model->findByEmail($email);

        if ($user && $user->employer_status != "confirmed") {
            $data = array(
                "employer_status" => "confirmed"
            );
            $this->employer_model->update($user->employer_id, $data);
        }
    }

}
