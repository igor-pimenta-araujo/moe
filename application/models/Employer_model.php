<?php

class Employer_model extends CI_Model
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
            ->from("employers")
            ->where("employer_email", $email);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function insert($data) {
        $this->db->insert("employers", $data);
    }

    public function update($id, $data){
        $this->db->where("employer_id", $id);
        $this->db->update("employers", $data);
    }

}