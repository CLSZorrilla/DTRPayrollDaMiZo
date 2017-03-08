<?php 

class Deduction_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_salaryGrade(){
		$query = $this->db->get('salarygrade');

		return $query->result();
	}

	public function getDeductionNames(){
		$query = $this->db->query("SELECT deductionName FROM deductionname");

		return $query;
	}

	public function getDeductions(){
		$query = $this->db->query("SELECT * FROM deductions");

		return $query;
	}

	public function changeStatus(){
		$status = $this->input->post('nothing',TRUE);
		$id = $this->input->post('dID',TRUE);

		$this->db->query("UPDATE deductions SET status = '".$status."' WHERE deductionNo = '".$id."'");

		$affectedRows = $this->db->affected_rows();

		if($affectedRows > 0){
			echo "Success";
		}else{
			echo "Fail";
		}
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
		$dName = $this->input->post('dName');
		$otherDeduct = $this->input->post('otherDeduction');

		if($otherDeduct != ""){
			$this->db->query("INSERT INTO deductionname(deductionName) VALUES('".$otherDeduct."') ");

			$eidres = $this->db->query('SELECT empID 
									FROM employee
									WHERE CONCAT( lname, ", ", fname, " ", mname) 
									LIKE "'.$fName.'"');

			$eid = $eidres->row(0)->empID;

			$data=array(
				'empID' => $eid,
				'fullName'=> $fName,
				'deductionName' => $otherDeduct,
				'amount' => $this->input->post('amt'),
				'mtp' => $this->input->post('mtp'),
				'monthsLeft' => $this->input->post('mtp'),
				'dateApplied' => Date('Y-m-d'),
				'status' => 'on-going'
				);

			$insert_data = $this->db->insert('deductions', $data);

		}else{
			$eidres = $this->db->query('SELECT empID 
									FROM employee
									WHERE CONCAT( lname, ", ", fname, " ", mname) 
									LIKE "'.$fName.'"');

			$eid = $eidres->row(0)->empID;

			$data=array(
				'empID' => $eid,
				'fullName'=> $fName,
				'deductionName' => $dName,
				'amount' => $this->input->post('amt'),
				'mtp' => $this->input->post('mtp'),
				'monthsLeft' => $this->input->post('mtp'),
				'dateApplied' => Date('Y-m-d'),
				'status' => 'on-going'
				);

			$insert_data = $this->db->insert('deductions', $data);
		}

		return $insert_data;
	}
}


?>