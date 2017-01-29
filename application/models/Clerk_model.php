<?php


class Clerk_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_emp_list(){
		$this->db->select('employee.empID, employee.password,employee.acctType, positions.positionName, department.deptName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.VL, employee.SL, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture', FALSE);
		$this->db->from('employee');
		$this->db->join('positions', 'employee.positionCode=positions.positionCode');
		$this->db->join('department', 'employee.deptCode=department.deptCode');

		$query = $this->db->get();

		return $query->result();
	}

	public function get_payroll_info($eid){
		$this->db->select('employee.empID,employee.acctType ,positions.positionName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.maritalStatus, employee.noOfDependents , salarygrade.step_1, employee.pera', FALSE);
		$this->db->from('employee');
		$this->db->where('employee.empID' , $eid);
		$this->db->join('positions', 'employee.positionCode=positions.positionCode');
		$this->db->join('department', 'employee.deptCode=department.deptCode');
		$this->db->join('salarygrade', 'positions.salaryGrade=salarygrade.salaryGrade');

		$basicInfo = $this->db->get();
		$basicPay = $basicInfo->row(3)->step_1;
		$pera = $basicInfo->row(4)->pera;
		$dep = $basicInfo->row(2)->noOfDependents;
		$mStatusDep = substr($basicInfo->row(1)->maritalStatus,0,1)."E".$dep."S".$dep;


		//# of days late
		$cMonth = date('m');
		$year = date('Y');
		$damLateResult = $this->db->query('SELECT timediff(timeIn, "08:00:00") as timeIn, amOut, timediff(pmIn, "13:00:00") as pmIn, timeOut 
							FROM timelog 
							WHERE empID LIKE "'.$eid.'"
							AND substr(logdate,6,2) LIKE "'.$cMonth.'"
							AND (onTime_AM = 0 OR onTime_PM = 0)');

		$dLatetimeIn = array();
		$dLateAMout = array();
		$dLatePMin = array();
		$dLatetimeOut = array();
		foreach($damLateResult->result() as $daysLate){
			array_push($dLatetimeIn,$daysLate->timeIn);
			array_push($dLateAMout,$daysLate->amOut);
			array_push($dLatePMin,$daysLate->pmIn);
			array_push($dLatetimeOut,$daysLate->timeOut);
		}

		$hrsLate = 0;
		$minsLate = 0;
		$totalLate = 0;

		foreach($dLatetimeIn as $key => $damLate){
			$hrsLate += substr($dLatetimeIn[$key],0,2)*60;
			$minsLate += substr($dLatetimeIn[$key],3,2);	
		}

		foreach($dLatePMin as $key => $dpmlate){
			$hrsLate += substr($dLatePMin[$key],0,2)*60;
			$minsLate += substr($dLatePMin[$key],3,2);	
		}

		$totalLate = ($hrsLate + $minsLate)/60;

		$dailyRate = $basicPay/22;
		$hourlyRate = $dailyRate/8;

		$lateDeduction = round(($totalLate * $hourlyRate),2);

		//Additional Deductions
		$addDeducResult = $this->db->get_where('deductions', array('empID' => $eid, 'status' => 'on-going'));

		$dName = array();
		$amt = array();
		$int = array();
		$mtp = array();

		foreach($addDeducResult->result() as $deductions){
			array_push($dName,$deductions->deductionName);
			array_push($amt,$deductions->amount);
			array_push($int,substr($deductions->interest,0,5));
			array_push($mtp,$deductions->mtp);
		}
		
		$amtTP = array();

		foreach($amt as $key => $amtToPay){
			array_push($amtTP, (($amt[$key] + ($amt[$key]*($int[$key]/100)))/$mtp[$key]));		
		}

		//# of absences
		$iter = 24*60*60;
	    $weekEndcount = 0;
	    $startDate = strtotime("2017-".$cMonth."-01");
	    $endDate = strtotime("2017-".$cMonth."-31");

	    for($i = $startDate; $i <= $endDate; $i=$i+$iter)
	    {
	    	if(Date('D',$i) == 'Sat' || Date('D',$i) == 'Sun')
	    	{
	    		$weekEndcount++;
	    	}
	    }

	    $dInMonth=cal_days_in_month(CAL_GREGORIAN,$cMonth,$year);

	    $weekDays = $dInMonth - $weekEndcount;

	    $daysWorked = count($dLatetimeIn);

	    $absences = $weekDays - $daysWorked;
	    $absentDeduction = round(($absences * $dailyRate),2);

	    //PERA deduction
	    $peraDailyRate = $pera/22;
	    $peraDeduction = round(($absences * $peraDailyRate),2);
	    //----------------------------------------------------------------
		$grossPay = ($basicPay + $pera) - $lateDeduction - $absentDeduction - $peraDeduction;

		//Philhealth
		$pHealthResult = $this->db->query("SELECT employeeshare
											FROM philhealth
											WHERE '".$grossPay."'>=startRange
											AND '".$grossPay."'<=endRange");

		$pHealthContrib = $pHealthResult->row(0)->employeeshare; //Depending on salary bracket 
		$gsis = round(($grossPay * 0.09),2); //9% of Gross pay

		//Withholding Tax
		if($mStatusDep == 'ME1S1'){
			$wTax = $this->db->query("SELECT ME1S1, exemption, status
								FROM withholdingtax
								WHERE ME1S1 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME1S1 DESC LIMIT 1");

			$withholdingTable = $wTax->row(0)->ME1S1;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else if($mStatusDep == 'ME2S2'){
			$wTax = $this->db->query("SELECT ME2S2, exemption, status
								FROM withholdingtax
								WHERE ME2S2 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME2S2 DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->ME2S2;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else if($mStatusDep == 'ME3S3'){
			$wTax = $this->db->query("SELECT ME3S3, exemption, status
								FROM withholdingtax
								WHERE ME3S3 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME3S3 DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->ME3S3;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else if($mStatusDep == 'ME4S4'){
			$wTax = $this->db->query("SELECT ME4S4, exemption, status
								FROM withholdingtax
								WHERE ME4S4 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME4S4 DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->ME4S4;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else{
			$wTax = $this->db->query("SELECT SME, exemption, status
								FROM withholdingtax
								WHERE SME <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY SME DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->SME;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}

		$taxableIncome = $grossPay - ($pHealthContrib + $gsis + 100);

		$withholdingTax = round(((($taxableIncome - $withholdingTable) * $status) + $exemption),2);


		return array($basicInfo, $peraDeduction, $pHealthContrib, $gsis, $withholdingTax, $dName, $amtTP);

	}

	public function payrollAdjTime($sTime, $eTime, $eid){
		$this->db->select('employee.empID,employee.acctType ,positions.positionName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.maritalStatus, employee.noOfDependents , salarygrade.step_1, employee.pera', FALSE);
		$this->db->from('employee');
		$this->db->where('employee.empID' , $eid);
		$this->db->join('positions', 'employee.positionCode=positions.positionCode');
		$this->db->join('department', 'employee.deptCode=department.deptCode');
		$this->db->join('salarygrade', 'positions.salaryGrade=salarygrade.salaryGrade');

		$basicInfo = $this->db->get();
		$basicPay = $basicInfo->row(3)->step_1;
		$pera = $basicInfo->row(4)->pera;
		$dep = $basicInfo->row(2)->noOfDependents;
		$mStatusDep = substr($basicInfo->row(1)->maritalStatus,0,1)."E".$dep."S".$dep;


		//# of days late
		$cMonth = date('m');
		$damLateResult = $this->db->query('SELECT timediff(timeIn, "'.$sTime.'"") as timeIn, amOut, timediff(pmIn, "13:00:00") as pmIn, timeOut 
							FROM timelog 
							WHERE empID LIKE "'.$eid.'"
							AND logdate LIKE "2017-01-29"
							AND (onTime_AM = 0 OR onTime_PM = 0)');

		$dLatetimeIn = array();
		$dLateAMout = array();
		$dLatePMin = array();
		$dLatetimeOut = array();
		foreach($damLateResult->result() as $daysLate){
			array_push($dLatetimeIn,$daysLate->timeIn);
			array_push($dLateAMout,$daysLate->amOut);
			array_push($dLatePMin,$daysLate->pmIn);
			array_push($dLatetimeOut,$daysLate->timeOut);
		}

		$hrsLate = 0;
		$minsLate = 0;
		$totalLate = 0;

		foreach($dLatetimeIn as $key => $damLate){
			$hrsLate += substr($dLatetimeIn[$key],0,2)*60;
			$minsLate += substr($dLatetimeIn[$key],3,2);	
		}

		foreach($dLatePMin as $key => $dpmlate){
			$hrsLate += substr($dLatePMin[$key],0,2)*60;
			$minsLate += substr($dLatePMin[$key],3,2);	
		}

		$totalLate = ($hrsLate + $minsLate)/60;

		$dailyRate = $basicPay/22;
		$hourlyRate = $dailyRate/8;

		$lateDeduction = round(($totalLate * $hourlyRate),2);

		$grossPay = ($basicPay + $pera) - $lateDeduction;

		//Philhealth
		$pHealthResult = $this->db->query("SELECT employeeshare
											FROM philhealth
											WHERE '".$grossPay."'>=startRange
											AND '".$grossPay."'<=endRange");

		$pHealthContrib = $pHealthResult->row(0)->employeeshare; //Depending on salary bracket 
		$gsis = $grossPay * 0.09; //9% of Gross pay

		//Withholding Tax
		if($mStatusDep == 'ME1S1'){
			$wTax = $this->db->query("SELECT ME1S1, exemption, status
								FROM withholdingtax
								WHERE ME1S1 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME1S1 DESC LIMIT 1");

			$withholdingTable = $wTax->row(0)->ME1S1;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else if($mStatusDep == 'ME2S2'){
			$wTax = $this->db->query("SELECT ME2S2, exemption, status
								FROM withholdingtax
								WHERE ME2S2 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME2S2 DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->ME2S2;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else if($mStatusDep == 'ME3S3'){
			$wTax = $this->db->query("SELECT ME3S3, exemption, status
								FROM withholdingtax
								WHERE ME3S3 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME3S3 DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->ME3S3;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else if($mStatusDep == 'ME4S4'){
			$wTax = $this->db->query("SELECT ME4S4, exemption, status
								FROM withholdingtax
								WHERE ME4S4 <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME4S4 DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->ME4S4;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}
		else{
			$wTax = $this->db->query("SELECT SME, exemption, status
								FROM withholdingtax
								WHERE SME <= '".$basicPay."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY SME DESC LIMIT 1");
			$withholdingTable = $wTax->row(0)->SME;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
		}

		$taxableIncome = $grossPay - ($pHealthContrib + $gsis + 100);

		$withholdingTax = round(((($taxableIncome - $withholdingTable) * $status) + $exemption),2);


		return array($basicInfo, $grossPay, $pHealthContrib, $gsis, $withholdingTax);

	}
}




?>