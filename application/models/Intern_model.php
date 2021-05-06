<?php

class Intern_model extends CI_Model
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
            ->from("interns")
            ->where("intern_email", $email);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function findById($id)
    {
        $this->db
            ->select("*")
            ->from("interns")
            ->where("intern_id", $id);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function insert($data) {
        $this->db->insert("interns", $data);
    }

    public function update($id, $data){
        $this->db->where("intern_id", $id);
        $this->db->update("interns", $data);
    }

}