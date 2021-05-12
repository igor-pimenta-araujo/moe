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

    //SELECT * FROM `employers` LEFT JOIN table_employer_intern ON employers.employer_id = table_employer_intern.id_employer WHERE table_employer_intern.id_intern = 2
    public function showFollowEmployers($id) {
        $this->db
            ->select("*")
            ->from("employers")
            ->join("table_employer_intern", "employers.employer_id = table_employer_intern.id_employer")
            ->where("table_employer_intern.id_intern", $id);
        return $this->db->get()->result_array();
    }

    public function showEmployerDontFollow($list) {
        $this->db
            ->from("employers");
        foreach ($list as $l){
            $this->db->where("employer_id <>", $l);
        }
        return $this->db->get()->result_array();
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

    public function insert_batch($data) {
        $this->db->insert_batch("table_employer_intern", $data);
    }

    public function update($id, $data){
        $this->db->where("intern_id", $id);
        $this->db->update("interns", $data);
    }

    public function unfollow($id, $employer_id){
        $this->db->where("id_intern", $id);
        $this->db->where("id_employer", $employer_id);
        $this->db->delete("table_employer_intern");
    }

}