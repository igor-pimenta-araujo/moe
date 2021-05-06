<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Intern
 */
class Intern extends CI_Controller
{

    /**
     * Intern constructor.
     */
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('intern_model');
    }

    /**
     * index
     */
    public function index(): void
    {
        if ($_SESSION['id'] && $_SESSION['office'] == "intern"){
            $intern = $this->intern_model->findById($_SESSION['id']);

            $head = array(
                "scripts" => array(
                    "login.js"
                ),
                "intern" => $intern
            );

            $this->load->view('layout/head', $head);
            $this->load->view('layout/navbarApp');
            $this->load->view('app/intern');
            $this->load->view('layout/footer');
        }else{
            header("Location: " . base_url());
        }
    }

    /**
     * @return void
     */
    public function register(): void
    {
        if (in_array("", $_POST)) {
            $answer['status'] = 0;
            $answer['message'] = "Preencha todos os campos";
            echo json_encode($answer);
            return;
        }

        $data = $_POST;

        if ($data['password'] != $data['password_confirm']){
            $answer['status'] = 0;
            $answer['message'] = "Senhas não conferem";
            echo json_encode($answer);
            return;
        }

        if (!$this->pass_verify($data['password'])){
            $answer['status'] = 0;
            $answer['message'] = "A senha precisa de: pelo menos uma letra maiúscula, pelo menos um caractere numérico, pelo menos um caractere especial.";
            echo json_encode($answer);
            return;
        }

        if ($this->intern_model->findByEmail($data['email'])){
            $answer['status'] = 0;
            $answer['message'] = "Já existe um usuário com esse email";
            echo json_encode($answer);
            return;
        }

        $data['intern_password'] = md5($data['password']);
        $data['intern_email'] = $data['email'];
        unset($data['password_confirm']);
        unset($data['password']);
        unset($data['email']);

        $this->intern_model->insert($data);

        $answer['status'] = 1;
        $answer['message'] = "Conta criada com sucesso!! Acesse seu email para confirmar :)";
        echo json_encode($answer);

    }

    /**
     * @param $password
     * @return bool
     */
    public function pass_verify($password): bool
    {
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number = preg_match('/[0-9]/', $password);
        $special = preg_match('/[!@#$&*._&]/', $password);

        if ($uppercase && $lowercase && $number && $special && strlen($password) > 5) {
            return true; // "senha correta"
        }else{
            return false; // "senha inválida"
        }
    }

}
