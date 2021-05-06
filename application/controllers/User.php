<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('user_model');
    }

    /**
     * index
     */
    public function index()
	{
	    echo "hey";

    }

    public function authUser()
    {
        if (in_array("", $_POST)){
            $answer['status'] = 0;
            $answer['message'] = "Preencha todos os campos";
            echo json_encode($answer);
            return;
        }

        $user = $this->user_model->findByEmail($_POST['email']);

        if ($user){

            $password = $_POST['password'];

            if ($user->password == md5($password)){
                $answer['status'] = 1;
                $answer['message'] = "Bem vindo!";
                echo json_encode($answer);
                $_SESSION['id'] = $user->id;
            }else{
                $answer['status'] = 0;
                $answer['message'] = "Email e/ou senha incorreta";
                echo json_encode($answer);
            }

        }else{
            $answer = array();
            $answer['status'] = 0;
            $answer['message'] = "Email e/ou senha incorreta";
            echo json_encode($answer);
        }

    }

}
