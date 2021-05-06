<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
    }

    /**
     * index
     */
    public function index()
    {

    }

    public function pass_verify($password)
    {

        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number = preg_match('/[0-9]/', $password);
        $special = preg_match('/[!@#$&*._&]/', $password);

        if ($uppercase && $lowercase && $number && $special && strlen($password) > 5) {
            echo "1"; // senha correta
        }else{
            echo "0"; // senha incorreta
        }

    }

}
