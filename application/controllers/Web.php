<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Web
 */
class Web extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
    }


    /**
     * index
     */
    public function index()
    {
        if (empty($_SESSION['id'])) {

            $head = array(
                "scripts" => array(
                    "login.js"
                )
            );

            $this->load->view('layout/head', $head);
            $this->load->view('layout/navbar');
            $this->load->view('login');
            $this->load->view('layout/footer');

        }else{
            if ($_SESSION['office'] == "intern"){
                header("Location: " . base_url("intern"));
            }else{
                header("Location: " . base_url("employer"));
            }
        }
    }

    public function register()
    {
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

    public function auth()
    {
        if (in_array("", $_POST)) {
            $answer['status'] = 0;
            $answer['message'] = "Preencha todos os campos";
            echo json_encode($answer);
            return;
        }

        $this->load->model("intern_model");
        $this->load->model("employer_model");

        $intern = $this->intern_model->findByEmail($_POST['email']);
        $employer = $this->employer_model->findByEmail($_POST['email']);

        if ($intern) {

            $password = $_POST['password'];

            if ($intern->intern_password == md5($password)) {
                $answer['status'] = 1;
                $answer['message'] = "Bem vindo! " . $intern->intern_name;
                $answer['office'] = "intern";
                $_SESSION['id'] = $intern->intern_id;
                $_SESSION['office'] = "intern";
                echo json_encode($answer);
            } else {
                $answer['status'] = 0;
                $answer['message'] = "Email e/ou senha incorreta";
                echo json_encode($answer);
            }
            return;
        }

        if ($employer) {

            $password = $_POST['password'];

            if ($employer->employer_password == md5($password)) {
                $answer['status'] = 1;
                $answer['message'] = "Bem vindo! " . $employer->employer_contact_name;
                $answer['office'] = "employer";
                $_SESSION['id'] = $employer->employer_id;
                $_SESSION['office'] = "employer";
                echo json_encode($answer);
            } else {
                $answer['status'] = 0;
                $answer['message'] = "Email e/ou senha incorreta";
                echo json_encode($answer);
            }
            return;
        }

        $answer['status'] = 0;
        $answer['message'] = "Email e/ou senha incorreta";
        echo json_encode($answer);

    }

    public function logout(){
        session_destroy();
        header("Location: " . base_url());
    }

}
