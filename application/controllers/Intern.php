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
        $this->load->model('employer_model');
    }

    /**
     * index
     */
    public function index()
    {
        if ($_SESSION['id'] && $_SESSION['office'] == "intern"){
            $intern = $this->intern_model->findById($_SESSION['id']);

            $head = array(
                "scripts" => array(
                    "intern.js"
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

    public function mural(){
        if ($_SESSION['id'] && $_SESSION['office'] == "intern"){
            $intern = $this->intern_model->findById($_SESSION['id']);


            $followEmployer = $this->intern_model->showFollowEmployers($_SESSION['id']);
            $list = array();
            foreach ($followEmployer as $f){
                array_push($list, $f['id_employer']);
            }

            $employer = $this->intern_model->showEmployerDontFollow($list);

            $head = array(
                "scripts" => array(
                    "intern.js"
                ),
                "intern" => $intern,
                "employer" => $employer
            );

            $this->load->view('layout/head', $head);
            $this->load->view('layout/navbarApp');
            $this->load->view('app/internMural');
            $this->load->view('layout/footer');
        }else{
            header("Location: " . base_url());
        }
    }

    public function follow(){
        if ($_SESSION['id'] && $_SESSION['office'] == "intern"){
            $intern = $this->intern_model->findById($_SESSION['id']);


            $followEmployer = $this->intern_model->showFollowEmployers($_SESSION['id']);
            $list = array();
            foreach ($followEmployer as $f){
                array_push($list, $f['id_employer']);
            }

            $employer = $this->intern_model->showEmployerDontFollow($list);

            $head = array(
                "scripts" => array(
                    "intern.js"
                ),
                "intern" => $intern,
                "employer" => $followEmployer
            );

            $this->load->view('layout/head', $head);
            $this->load->view('layout/navbarApp');
            $this->load->view('app/internFollow');
            $this->load->view('layout/footer');
        }else{
            header("Location: " . base_url());
        }
    }

    /**
     * @return void
     */
    public function register()
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
            $answer['message'] = "Senhas n??o conferem";
            echo json_encode($answer);
            return;
        }

        if (!$this->pass_verify($data['password'])){
            $answer['status'] = 0;
            $answer['message'] = "A senha precisa de: pelo menos uma letra mai??scula, pelo menos um caractere num??rico, pelo menos um caractere especial.";
            echo json_encode($answer);
            return;
        }

        if ($this->intern_model->findByEmail($data['email'])){
            $answer['status'] = 0;
            $answer['message'] = "J?? existe um usu??rio com esse email";
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
    public function pass_verify($password)
    {
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number = preg_match('/[0-9]/', $password);
        $special = preg_match('/[!@#$&*._&]/', $password);

        if ($uppercase && $lowercase && $number && $special && strlen($password) > 5) {
            return true; // "senha correta"
        }else{
            return false; // "senha inv??lida"
        }
    }

    public function register_vacancys(){

        if (empty($_POST['list'])){
            $answer['status'] = 0;
            $answer['message'] = "Nenhuma empresa selecionada";
            echo json_encode($answer);
            return;
        }

        $list = $_POST['list'];


        $data = array();
        foreach ($list as $l){
            $dados = array(
                'id_intern' => $_SESSION['id'],
                'id_employer' => $l
            );
            array_push($data, $dados);
        }

        $this->intern_model->insert_batch($data);

        $answer['status'] = 1;
        $answer['message'] = "Empresas seguidas com sucesso!!";
        echo json_encode($answer);
    }

    public function unfollow_employer(){
        $this->intern_model->unfollow($_SESSION['id'], $_POST['employer_id']);
        $answer['status'] = 1;
        $answer['message'] = "Voc?? deixou de seguir com sucesso!!";
        echo json_encode($answer);
    }

}
