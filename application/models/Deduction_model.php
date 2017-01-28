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
		$query = $this->db->get('philhealth');

		return $query->result();
	}

	public function getEmpSearch($search){
		 $this->db->select('CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name');
		 $this->db->where('lName', $search);
		 $this->db->from('employee');
		 $query = $this->db->get();
		 return $query->result();
	}
}


?>