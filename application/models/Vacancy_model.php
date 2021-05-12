<?php

class Vacancy_model extends CI_Model
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

    public function showVacancy() {
        $this->db
            ->from("vacancy")
            ->join('employers', 'vacancy.employer_id = employers.employer_id', "INNER");
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        $this->db->insert("vacancy", $data);
    }

    public function insert_batch($data) {
        $this->db->insert_batch("table_vacancy_intern", $data);
    }

    public function update($id, $data){
        $this->db->where("intern_id", $id);
        $this->db->update("interns", $data);
    }

}