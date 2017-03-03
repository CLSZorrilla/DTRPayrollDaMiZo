<?php

class Remittance_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function loadLoans(){
		$loanQuery = $this->db->query("SELECT DISTINCT(deductionName) FROM paysliploan");

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
					foreach($categoryQuery as $cResult){
						$tableResult.="<tr><td>".$cResult->name."</td>";
						$tableResult.="<td>".$cResult->amount."</td>";
						$tableResult.="<td>".$cResult->Month."</td></tr>";
					}
				}else{
					$tableResult = "";
				}
				

		}else{
			if($year||$month){
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
						AND payslipLoan.Year LIKE "'.$Year.'"
						AND payslipLoan.Month LIKE "'.$Month.'"')->result();
				}
			}

			$affectedRows = $this->db->affected_rows();
			$tableResult = "";
			if($affectedRows > 0){
				foreach($categoryQuery as $cResult){
					$tableResult.="<tr><td>".$cResult->name."</td>";
					$tableResult.="<td>".$cResult->amount."</td>";
					$tableResult.="<td>".$cResult->Month."</td></tr>";
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