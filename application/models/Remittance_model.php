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
		if($this->input->post('period') == "All"){
			$period = $this->input->post('period');
		}
		else{
			$period = $this->input->post('period');
		}
		
		if(strpos($category, 'Loan') === false){
				
				if($category == "Withholding Tax"){
					if($year&&$month&&$period){
						if($year == "All" && $month == "All" && $period == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID')->result();
						}
						else if($year && $month == "All" && $period == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
						}
						else if($month && $year == "All" && $period == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else if($period && $year == "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"')->result();
						}
						else if($period && $year && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
						}
						else if($period && $year == "All" && $month){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else if($period == "All" && $year && $month){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else if($period && $year == "All" && $month){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else{
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, tax as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"')->result();
						}						
					}
				}
				else{
					if($year && $month && $period){
						if($year == "All" && $month == "All" && $period == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID')->result();
						}
						else if($year && $month == "All" && $period == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
						}
						else if($month && $year == "All" && $period == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else if($period && $year == "All" && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"')->result();
						}
						else if($period && $year && $month == "All"){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
						}
						else if($period && $year == "All" && $month){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else if($period == "All" && $year && $month){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else if($period && $year == "All" && $month){
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
						}
						else{
							$categoryQuery = $this->db->query('SELECT 
								CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, '.$category.' as amount,paysheetPeriod 
								FROM employee,paysheet
								WHERE employee.empID = paysheet.empID
								AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
								AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"
								AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"')->result();
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
			if($year||$month||$period){
				if($year == "All" && $month == "All" && $period == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"')->result();
				}
				else if($year && $month == "All" && $period == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
				}
				else if($month && $year == "All" && $period == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
				}
				else if($period && $year == "All" && $month == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,9,1) LIKE "'.$period.'"')->result();
				}
				else if($period && $year && $month == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheetloan.paysheetPeriod,1,4) LIKE "'.$year.'"')->result();
				}
				else if($period && $year == "All" && $month){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
				}
				else if($period == "All" && $year && $month){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
				}
				else if($period && $year == "All" && $month){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"')->result();
				}
				else{
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, paysheetloan.paysheetPeriod,paysheetloan.amount
						FROM employee,paysheetloan
						WHERE employee.empID = paysheetloan.empID
						AND paysheetloan.deductionName LIKE "'.$category.'"
						AND substring(paysheetloan.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheetloan.paysheetPeriod,5,3) LIKE "'.$month.'"
						AND substring(paysheetloan.paysheetPeriod,9,1) LIKE "'.$period.'"')->result();
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