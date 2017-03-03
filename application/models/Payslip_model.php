<?php

class Payslip_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function loadLoans(){
		$loanQuery = $this->db->query("SELECT DISTINCT(deductionName) FROM paysliploan");

		return $loanQuery->result();
	}

	public function loadPeriod(){
		$periodQuery = $this->Db->query("SELECT DISTINCT(payslipPeriod) FROM payslip");

		return $periodQuery->result();
	}

	public function filterCategory(){
		$eid = $this->session->userdata('username');

		$year = $this->input->post('year');
		$month = substr($this->input->post('month'),0,3);

			if($year||$month){
				if($year == "All" && $month == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, ", ", employee.fname, " ", employee.mname) as name, positions.positionName, SUM(payslip.basicpay) AS tbasicpay, SUM(payslip.pera) AS tpera, SUM(payslip.grosspay) AS tgrosspay, SUM(payslip.philhealth) AS tphilhealth, SUM(payslip.pagibig) AS tpagibig, SUM(payslip.gsis) AS tgsis, SUM(payslip.tax) AS ttax, SUM(payslip.netpay) AS tnetpay, SUM(payslip.absences) AS tabsences, SUM(payslip.daysWorked) AS tdaysWorked, SUM(payslip.hoursWorked) AS thoursWorked, SUM(payslip.noOfLates) AS tnoOfLates, SUM(payslip.VL) AS tVL, SUM(payslip.SL) AS tSL
						FROM employee,positions,payslip
						WHERE employee.empID = payslip.empID
						AND employee.positionCode = positions.positionCode
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID');
					$categoryQuery2 = $this->db->query('SELECT
						payslipLoan.deductionName, SUM(payslipLoan.amount) AS total
						FROM payslipLoan,employee
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.empID LIKE "'.$eid.'"
						GROUP BY payslipLoan.deductionName,employee.empID');
				}
				else if($year && $month == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, ", ", employee.fname, " ", employee.mname) as name, positions.positionName, SUM(payslip.basicpay) AS tbasicpay, SUM(payslip.pera) AS tpera, SUM(payslip.grosspay) AS tgrosspay, SUM(payslip.philhealth) AS tphilhealth, SUM(payslip.pagibig) AS tpagibig, SUM(payslip.gsis) AS tgsis, SUM(payslip.tax) AS ttax, SUM(payslip.netpay) AS tnetpay, SUM(payslip.absences) AS tabsences, SUM(payslip.daysWorked) AS tdaysWorked, SUM(payslip.hoursWorked) AS thoursWorked, SUM(payslip.noOfLates) AS tnoOfLates, SUM(payslip.VL) AS tVL, SUM(payslip.SL) AS tSL
						FROM employee,positions,payslip
						WHERE employee.empID = payslip.empID
						AND employee.positionCode = positions.positionCode
						AND payslip.Year LIKE "'.$year.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID');
					$categoryQuery2 = $this->db->query('SELECT
						payslipLoan.deductionName, SUM(payslipLoan.amount) AS total
						FROM payslipLoan,employee
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.empID LIKE "'.$eid.'"
						AND payslipLoan.Year LIKE "'.$year.'"
						GROUP BY payslipLoan.deductionName,employee.empID');
				}
				else if($month && $year == "All"){
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, ", ", employee.fname, " ", employee.mname) as name, positions.positionName, SUM(payslip.basicpay) AS tbasicpay, SUM(payslip.pera) AS tpera, SUM(payslip.grosspay) AS tgrosspay, SUM(payslip.philhealth) AS tphilhealth, SUM(payslip.pagibig) AS tpagibig, SUM(payslip.gsis) AS tgsis, SUM(payslip.tax) AS ttax, SUM(payslip.netpay) AS tnetpay, SUM(payslip.absences) AS tabsences, SUM(payslip.daysWorked) AS tdaysWorked, SUM(payslip.hoursWorked) AS thoursWorked, SUM(payslip.noOfLates) AS tnoOfLates, SUM(payslip.VL) AS tVL, SUM(payslip.SL) AS tSL
						FROM employee,positions,payslip
						WHERE employee.empID = payslip.empID
						AND employee.positionCode = positions.positionCode
						AND payslip.Month LIKE "'.$month.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID');
					$categoryQuery2 = $this->db->query('SELECT
						payslipLoan.deductionName, SUM(payslipLoan.amount) AS total
						FROM payslipLoan,employee
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.empID LIKE "'.$eid.'"
						AND  payslipLoan.Month LIKE "'.$month.'"
						GROUP BY payslipLoan.deductionName,employee.empID');
				}
				else{
					$categoryQuery = $this->db->query('SELECT
						CONCAT( employee.lname, ", ", employee.fname, " ", employee.mname) as name, positions.positionName, SUM(payslip.basicpay) AS tbasicpay, SUM(payslip.pera) AS tpera, SUM(payslip.grosspay) AS tgrosspay, SUM(payslip.philhealth) AS tphilhealth, SUM(payslip.pagibig) AS tpagibig, SUM(payslip.gsis) AS tgsis, SUM(payslip.tax) AS ttax, SUM(payslip.netpay) AS tnetpay, SUM(payslip.absences) AS tabsences, SUM(payslip.daysWorked) AS tdaysWorked, SUM(payslip.hoursWorked) AS thoursWorked, SUM(payslip.noOfLates) AS tnoOfLates, SUM(payslip.VL) AS tVL, SUM(payslip.SL) AS tSL
						FROM employee,positions,payslip
						WHERE employee.empID = payslip.empID
						AND employee.positionCode = positions.positionCode
						AND payslip.Year LIKE "'.$year.'"
						AND payslip.Month LIKE "'.$month.'"
						AND employee.empID LIKE "'.$eid.'"
						GROUP BY employee.empID');

					$categoryQuery2 = $this->db->query("SELECT
						payslipLoan.deductionName, SUM(payslipLoan.amount) AS total
						FROM payslipLoan,employee
						WHERE employee.empID = payslipLoan.empID
						AND payslipLoan.empID LIKE '".$eid."'
						AND payslipLoan.Year LIKE '".$year."'
						AND payslipLoan.Month LIKE '".$month."'
						GROUP BY payslipLoan.deductionName,employee.empID");
				}
			}

			$tableResult = "";

			
			foreach($categoryQuery->result() as $cResult){
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
				$tableResult.="<tr><td>NO. OF LATES</td><td>".$cResult->tnoOfLates."</td></tr>";
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
			foreach($categoryQuery2->result() as $cResult2){
				$tableResult.="<tr><td>".strtoupper($cResult2->deductionName)."</td><td>".$cResult2->total."</td></tr>";
			}
			foreach($categoryQuery->result() as $cResult){
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