<?php

class Remittance_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function loadLoans(){
		$loanQuery = $this->db->query("SELECT DISTINCT(deductionName) FROM paysheetloan");

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

		if(strpos($category, 'Loan') === false){
				
				if($category == "Withholding Tax"){
					if($year||$month){
						if($year == "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID')->result();
						}
						else if($year && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
						}
						else if($month && $year == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else{
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}						
					}
				}
				else{
					if($year||$month){
						if($year == "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
							CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
							FROM employee,paysheet
							WHERE employee.empID = paysheet.empID
							')->result();
						}
						else if($year && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
						}
						else if($month && $year == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else{
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
					}
						
				}
				
				$tableResult = "";
				foreach($categoryQuery as $cResult){
					$tableResult.="<tr><td>".$cResult->name."</td>";
					$tableResult.="<td>".$cResult->amount."</td>";
					$tableResult.="<td>".$cResult->paysheetPeriod."</td></tr>";
				}

		}else{
			if($year||$month){
				if($year == "All" && $month == "All"){
					$categoryQuery = $this->db->query('SELECT 
					CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
					FROM employee,paysheetloan
					WHERE employee.empID = paysheetloan.empID
					AND paysheetloan.deductionName LIKE "'.$category.'"
					')->result();
				}
				else if($year && $month == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetLoan.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
				}else if($month && $year == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
				}
				else{
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetLoan.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
				}		
			}

			$tableResult = "";
			foreach($categoryQuery as $cResult){
				$tableResult.="<tr><td>".$cResult->name."</td>";
				$tableResult.="<td>".$cResult->amount."</td>";
				$tableResult.="<td>".$cResult->paysheetPeriod."</td></tr>";
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