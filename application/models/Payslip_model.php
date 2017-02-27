<?php

class Payslip_model extends CI_Model{

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
		$eid = $this->session->userdata('username');

		$year = $this->input->post('year');
		$month = substr($this->input->post('month'),0,3);
		if($this->input->post('period') == "All"){
			$period = $this->input->post('period');
		}
		else{
			$period = $this->input->post('period');
		}

			if($year||$month||$period){
				if($year == "All" && $month == "All" && $period == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else if($year && $month == "All" && $period == "All"){
					$categoryQuery = $this->db->query('SELECT 
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,1,4) LIKE "'.$year.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else if($month && $year == "All" && $period == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,5,3) LIKE "'.$month.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else if($period && $year == "All" && $month == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,9,1) LIKE "'.$period.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else if($period && $year && $month == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheetLoan.paysheetPeriod,1,4) LIKE "'.$year.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else if($period && $year == "All" && $month){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND substring(paysheetLoan.paysheetPeriod,5,3) LIKE "'.$month.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else if($period == "All" && $year && $month){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheetLoan.paysheetPeriod,5,3) LIKE "'.$month.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}
				else{
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) as name, positions.positionName, SUM(paysheet.basicpay) AS tbasicpay, SUM(paysheet.pera) AS tpera, SUM(paysheet.grosspay) AS tgrosspay, SUM(paysheet.philhealth) AS tphilhealth, SUM(paysheet.pagibig) AS tpagibig, SUM(paysheet.gsis) AS tgsis, SUM(paysheet.tax) AS ttax, SUM(paysheet.netpay) AS tnetpay, SUM(paysheet.absences) AS tabsences, SUM(paysheet.daysWorked) AS tdaysWorked, SUM(paysheet.hoursWorked) AS thoursWorked, SUM(paysheet.numOfLate) AS tnumOfLate, SUM(paysheet.VL) AS tVL, SUM(paysheet.SL) AS tSL
						FROM employee,positions,paysheet
						WHERE employee.empID = paysheet.empID
						AND employee.positionCode = positions.positionCode
						AND substring(paysheet.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheet.paysheetPeriod,5,3) LIKE "'.$month.'"
						AND substring(paysheet.paysheetPeriod,9,1) LIKE "'.$period.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID')->result();
					$categoryQuery2 = $this->db->query('SELECT
						paysheetLoan.deductionName, SUM(paysheetLoan.amount) AS total
						FROM paysheetLoan,employee
						WHERE employee.empID = paysheetLoan.empID
						AND paysheetLoan.empID LIKE "'.$eid.'"
						AND substring(paysheetLoan.paysheetPeriod,1,4) LIKE "'.$year.'"
						AND substring(paysheetLoan.paysheetPeriod,5,3) LIKE "'.$month.'"
						AND substring(paysheetLoan.paysheetPeriod,9,1) LIKE "'.$period.'"
						GROUP BY paysheetLoan.deductionName,employee.empID')->result();
				}	
			}

			$tableResult = "";
			foreach($categoryQuery as $cResult){
        	$tableResult.="<div>";

            $tableResult.="<div class='row'>";
            $tableResult.="<div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'><span><b>NAME:</b></span></div>";
            $tableResult.="<div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'><span></span>".$cResult->name."</div>";
            $tableResult.="</div>";
            $tableResult.="<div class='row'>";
            $tableResult.="<div class='col-xs-4 col-sm-4 col-md-4 col-lg-3'><span><b>POSITION:</b></span></div>";
            $tableResult.="<div class='col-xs-8 col-sm-8 col-md-8 col-lg-3'><span></span>".$cResult->positionName."</div>";
            $tableResult.="</div><br/>";

        	$tableResult.="<div class='row'>";

            $tableResult.="<div class='col-md-6'>";

            $tableResult.="<div class='row'><span><b>EARNINGS:</b></span>";
            $tableResult.="<table class='table table-striped'><tbody>";
            $tableResult.="<tr><td>BASIC PAY</td><td>".$cResult->tbasicpay."</td></tr>";
            $tableResult.="<tr><td>PERA</td><td>".$cResult->tpera."</td></tr>";
            $tableResult.="<tr><td><b>GROSS EARNINGS</b></td><td>".$cResult->tgrosspay."</td></tr>";                              
            $tableResult.="</tbody></table>";
            $tableResult.="</div>";

            $tableResult.="<div class='row'><span><b>MONTHLY RECORD:</b></span>";
            $tableResult.="<table class='table table-striped'><tbody>";
            $tableResult.="<tr><td>DAYS WORKED</td><td>".$cResult->tdaysWorked."</td></tr>";
            $tableResult.="<tr><td>HOURS WORKED</td><td>".$cResult->thoursWorked."</td></tr>";
            $tableResult.="<tr><td>NO. OF ABSENCES</td><td>".$cResult->tabsences."</td></tr>";
            $tableResult.="<tr><td>NO. OF LATES</td><td>".$cResult->tnumOfLate."</td></tr>";
            $tableResult.="<tr><td>REMAINING SL</td><td>".$cResult->tSL."</td></tr>";
            $tableResult.="<tr><td>REMAINING VL</td><td>".$cResult->tVL."</td></tr>";
            $tableResult.="</tbody></table>";
            $tableResult.="</div>";
            
            $tableResult.="</div>";
                
            $tableResult.="<div class='col-md-6'>";

            $tableResult.="<div class='row'><span><b>DEDUCTIONS:</b></span>";
            $tableResult.="<table class='table table-striped'><tbody>";
            $tableResult.="<tr><td>PHILHEALTH</td><td>".$cResult->tphilhealth."</td></tr>";
            $tableResult.="<tr><td>PAGIBIG FUND</td><td>".$cResult->tpagibig."</td></tr>";
            $tableResult.="<tr><td>GSIS INTEG.</td><td>".$cResult->tgsis."</td></tr>";
            $tableResult.="<tr><td>WT</td><td>".$cResult->ttax."</td></tr>";
        	}
			foreach($categoryQuery2 as $cResult){
			$tableResult.="<tr><td>".strtoupper($cResult->deductionName)."</td><td>".$cResult->total."</td></tr>";
        	}
			foreach($categoryQuery as $cResult){
            $tableResult.="</tbody></table>";
        	$tableResult.="</div>";

            $tableResult.="<div class='row'>";
            $tableResult.="<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'><h3>TOTAL NETPAY:</h3></div>";
            $tableResult.="<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'><h3>".$cResult->tnetpay."</h3></div>";
            $tableResult.="</div>";
            
            $tableResult.="</div>";
            
        	$tableResult.="</div>";
        
        	$tableResult.="</div>";
			}

		if($tableResult == ""){
			echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'><h1>NO RECORD</h1></div>";
		}else{
			echo $tableResult;
		}
	}
}