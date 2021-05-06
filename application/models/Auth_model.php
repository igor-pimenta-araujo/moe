<?php

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function findByEmail($email)
    {
        $this->db
            ->select("*")
            ->from("users")
            ->where("email", $email);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return NULL;
        }
    }


}