<?php

class Deduction_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_salaryGrade(){
		$query = $this->db->get('salarygrade');

		return $query->result();
	}

	public function get_philHealthDeduction(){
		$query = $this->db->get('philhealthdeduction');

		return $query->result();
	}
}


?>