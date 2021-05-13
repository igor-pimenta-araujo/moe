<?php
defined('BASEPATH') or exit('No direct script access allowed');

//  email
require_once(APPPATH . 'libraries/phpmailer/src/PHPMailer.php');
require_once(APPPATH . 'libraries/phpmailer/src/SMTP.php');
require_once(APPPATH . 'libraries/phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//  /email

/**
 * Class Employer
 */
class Employer extends CI_Controller
{

    /**
     * Employer constructor.
     */
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('employer_model');
        $this->load->model('vacancy_model');
    }

    /**
     * index
     */
    public function index()
    {
        if ($_SESSION['id'] && $_SESSION['office'] == "employer") {
            $employer = $this->employer_model->findById($_SESSION['id']);
            $head = array(
                "scripts" => array(
                    "login.js",
                    "employer.js"
                ),
                "employer" => $employer
            );

            $this->load->view('layout/head', $head);
            $this->load->view('layout/navbarApp');
            $this->load->view('app/employer');
            $this->load->view('layout/footer');
        } else {
            header("Location: " . base_url());
        }
    }

    public function mural()
    {
        if ($_SESSION['id'] && $_SESSION['office'] == "employer") {
            $employer = $this->employer_model->findById($_SESSION['id']);
            $head = array(
                "scripts" => array(
                    "employer.js"
                ),
                "employer" => $employer
            );

            $this->load->view('layout/head', $head);
            $this->load->view('layout/navbarApp');
            $this->load->view('app/employerMural');
            $this->load->view('layout/footer');
        } else {
            header("Location: " . base_url());
        }
    }

    /**
     * register
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

        if ($data['password'] != $data['password_confirm']) {
            $answer['status'] = 0;
            $answer['message'] = "Senhas não conferem";
            echo json_encode($answer);
            return;
        }

        if (!$this->pass_verify($data['password'])) {
            $answer['status'] = 0;
            $answer['message'] = "A senha precisa de: pelo menos uma letra maiúscula, pelo menos um caractere numérico, pelo menos um caractere especial.";
            echo json_encode($answer);
            return;
        }

        if ($this->employer_model->findByEmail($data['email'])) {
            $answer['status'] = 0;
            $answer['message'] = "Já existe um usuário com esse email";
            echo json_encode($answer);
            return;
        }

        $data['employer_password'] = md5($data['password']);
        $data['employer_email'] = $data['email'];
        unset($data['password_confirm']);
        unset($data['password']);
        unset($data['email']);

        $this->employer_model->insert($data);

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
        } else {
            return false; // "senha inválida"
        }
    }

    public function register_vacancy()
    {
        $data = $_POST;

        if (!in_array("", $data)) {

            if ($data["remuneration"] < 472) {
                $json["status"] = 0;
                $json["message"] = "Remuneração está abaixo do minimo permitido pela universidade. R$472,00";
                echo json_encode($json);
                return;
            }

            $data["employer_id"] = $_SESSION['id'];
            $this->vacancy_model->insert($data);

            $this->notification($data);
            $json["status"] = 1;
            $json["message"] = "Cadastro da vaga de estágio realizado com sucesso!! :)";
            echo json_encode($json);
        } else {
            $json["status"] = 0;
            $json["message"] = "Preencha todos os campos";
            echo json_encode($json);
        }
    }

    private function notification($vacancy){
        $employer = $this->employer_model->findById($_SESSION['id']);

        $followers = $this->vacancy_model->findFollowers($employer->employer_id);

        if ($followers){
            foreach ($followers as $f){
                $this->email("{$f['intern_email']}","Uma nova oportunidade de estágio foi cadastrada!!",
                    "<h1>Olá {$f['intern_name']}, Você tem uma nova oportunidade de Estágio</h1>
                        <p>A empresa {$employer->employer_name} cadastrou a seguinte vaga de estágio:</p>
                        <p>Descrição: {$vacancy['description']}</p>
                        <p>Lista de atividades: {$vacancy['activities_list']}</p>
                        <p>Lista de habilidades: {$vacancy['skill_list']}</p>
                        <p>Semestre requerido: {$vacancy['semester']} | Horas: {$vacancy['hours']} | Remuneração: R$".number_format($vacancy['remuneration'], 2, ",",".")."</p>");
            }
        }

    }

    public function email($from, $subject, $message)
    {

        $mail = new PHPMailer();

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // DEBUG
            $mail->isSMTP();
            $mail->Host = 'smtp.hsnfe.com.br';
            $mail->SMTPAuth = true;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->CharSet = "UTF-8";

            $mail->Username = 'devigor@hsnfe.com.br';
            $mail->Password = 'Igor@901520';
            $mail->Port = 587;

            $mail->setFrom('atendimento@moe.com');
            $mail->addAddress($from);

            ini_set('default_charset', 'UTF-8');


            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->isHTML(true);

            if ($mail->send()) {
                return true;
            } else {
                return false; //erro ao enviar email
            }
        } catch (Exception $e) {
            return "Exception<br>$e->errorMessage()";
        }

    }
}
