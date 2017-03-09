<?php

class Remittance_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function loadLoans(){
		$loanQuery = $this->db->query("SELECT DISTINCT(deductionName) FROM payslipLoan");

		return $loanQuery->result();
	}

	public function loadPeriod(){
		$periodQuery = $this->Db->query("SELECT DISTINCT(paysheetPeriod) FROM paysheet");

		return $periodQuery->result();
	}

	public function filterCategory(){
		$category = $this->input->post('category');
		$year = $this->input->post('year');
		$month = substr($this->input->post('month'),0,3);
		$eid = $this->session->userdata('username');
		
		if(strpos($category, 'Loan') === false){	
				if($category == "Withholding Tax"){
					if($year&&$month){
						if($category == "Withholding Tax"){
							$IDNo = $this->db->query("SELECT TIN FROM employee WHERE empID LIKE '".$eid."'");
						}

						if($year == "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID')->result();
						}
						else if($year != "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID
								AND payslip.Year LIKE "'.$year.'"')->result();
						}
						else if($month != "All" && $year == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID
								AND payslip.Month LIKE "'.$month.'"')->result();
						}
						else{
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID
								AND payslip.Month LIKE "'.$month.'"
								AND payslip.Year LIKE "'.$year.'"')->result();
						}					
					}
				}
				else{
					if($year && $month){
						if($category == "GSIS"){
							$IDNo = $this->db->query("SELECT GSISNo FROM employee WHERE empID LIKE '".$eid."'");
						}else if($category == "Philhealth"){
							$IDNo = $this->db->query("SELECT PhilHealthNo FROM employee WHERE empID LIKE '".$eid."'");
						}else if($category == "Pagibig"){
							$IDNo = $this->db->query("SELECT empID FROM employee WHERE empID LIKE '".$eid."'");
						}

						if($year == "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID')->result();
						}
						else if($year != "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID
								AND payslip.year LIKE "'.$year.'"')->result();
						}
						else if($month != "All" && $year == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,payslip.Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID
								AND payslip.Month LIKE "'.$month.'"')->result();
						}
						else{
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,Month 
								FROM employee,payslip
								WHERE employee.empID = payslip.empID
								AND payslip.Year LIKE "'.$year.'"
								AND payslip.Month LIKE "'.$month.'"')->result();
						}
					}
						
				}
				
				$affectedRows = $this->db->affected_rows();
				$tableResult = "";
				if($affectedRows > 0){
					if($category == "GSIS"){
						$tableResult.="<tr><td>".$IDNo->row()->GSISNo."</td>";
					}else if($category == "Philhealth"){
						$tableResult.="<tr><td>".$IDNo->row()->PhilHealthNo."</td>";
					}else if($category == "Withholding Tax"){
						$tableResult.="<tr><td>".$IDNo->row()->TIN."</td>";
					}else if($category == "Pagibig"){
						$tableResult.="<tr><td>".$IDNo->row()->empID."</td>";
					}

					foreach($categoryQuery as $cResult){
						$tableResult.="<td>".$cResult->name."</td>";
						$tableResult.="<td>".$cResult->amount."</td></tr>";
					}
				}else{
					$tableResult = "";
				}
				

		}else{
			if($year||$month){
				
				$IDNo = $this->db->query("SELECT empID FROM employee WHERE empID LIKE '".$eid."'");

				if($year == "All" && $month == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, payslipLoan.amount,payslipLoan.Month
						FROM employee,payslipLoan
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.deductionName LIKE "'.$category.'"')->result();
				}
				else if($year != "All" && $month == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, payslipLoan.amount,payslipLoan.Month
						FROM employee,payslipLoan
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.deductionName LIKE "'.$category.'"
						AND payslipLoan.Year LIKE "'.$year.'"')->result();
				}
				else if($month != "All" && $year == "All" ){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, payslipLoan.amount,payslipLoan.Month
						FROM employee,payslipLoan
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.deductionName LIKE "'.$category.'"
						AND payslipLoan.Month LIKE "'.$month.'"')->result();
				}
				else {
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, payslipLoan.amount,payslipLoan.Month
						FROM employee,payslipLoan
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.deductionName LIKE "'.$category.'"
						AND payslipLoan.Year LIKE "'.$year.'"
						AND payslipLoan.Month LIKE "'.$month.'"')->result();
				}
			}

			$affectedRows = $this->db->affected_rows();
			$tableResult = "";
			if($affectedRows > 0){
				$tableResult.="<tr><td>".$IDNo->row()->empID."</td>";

				foreach($categoryQuery as $cResult){
					$tableResult.="<td>".$cResult->name."</td>";
					$tableResult.="<td>".$cResult->amount."</td></tr>";
				}
			}else{
				$tableResult = "";
			}	
		}

		if($tableResult == ""){
			echo "<tr><td colspan='3' class='text-center'>NO DATA TO SHOW</td></tr>";
		}else{
			echo $tableResult;
		}
	}
}






?>