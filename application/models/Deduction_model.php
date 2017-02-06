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
		$query = $this->db->query('SELECT CONCAT( lname, '.'", ", fname, '.'" ", mname) AS name FROM employee WHERE lname LIKE "'.$search.'%"');
		 
		return $query->result();
	}

	public function submitDeduction(){
		$fName = $this->input->post('fName',TRUE);

		$eidres = $this->db->query('SELECT empID 
									FROM employee
									WHERE CONCAT( lname, ", ", fname, " ", mname) 
									LIKE "'.$fName.'"');

		$eid = $eidres->row(0)->empID;

		$data=array(
			'empID' => $eid,
			'fullName'=> $fName,
			'deductionName' => $this->input->post('dName'),
			'amount' => $this->input->post('amt'),
			'mtp' => $this->input->post('mtp'),
			'monthsLeft' => $this->input->post('mtp'),
			'dateApplied' => Date('Y-m-d'),
			'status' => 'on-going'
		);

		$insert_data = $this->db->insert('deductions', $data);

		return $insert_data;
	}
}


?>