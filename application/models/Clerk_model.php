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
							AND substr(logdate,6,2) LIKE "'.$cMonth.'"');

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

		//Undertime Deduction
		$uTime= $this->db->query("SELECT 
			timediff(timeDiff(amOut,'08:00:00'),
			addTime(
			CASE
				WHEN timeDiff(amOut, '12:00:00') < 0 THEN '00:00:00'
				ELSE timeDiff(amOut, '12:00:00')
			END,
			CASE 
				WHEN timeDiff(timeIn, '08:00:00') < 0 THEN '00:00:00'
				ELSE timeDiff(timeIn, '08:00:00')
			END)) as amWorked,

			CASE
				WHEN pmIn <=0 && timeOut <=0 THEN '00:00:00'
				ELSE timeDiff(timeDiff(timeOut, '13:00:00'),addTime(
				CASE 
					WHEN timeDiff(pmIn, '13:00:00') < 0 THEN '00:00:00' 
					ELSE timeDiff(pmIn, '13:00:00')
				END,
				CASE
					WHEN timeDiff(timeOut,'17:00:00') < 0 THEN '00:00:00'
					ELSE timeDiff(timeOut, '17:00:00')
				END))
			END as pmWorked

			FROM `timelog`
				");

		$numOfDays = $uTime->num_rows()*8;
		$amWorked = array();
		$pmWorked = array();
		$hoursWorked = array();

		foreach($uTime->result() as $hours){
			array_push($amWorked, date("H:i",strtotime($hours->amWorked)));
			array_push($pmWorked, date("H:i", strtotime($hours->pmWorked)));
		}


		foreach($amWorked as $key => $hrsWork){//i minutes
			$dateTemp = date_create(date("H:i", strtotime("$amWorked[$key]")));
			$dateTemp = date_add($dateTemp,date_interval_create_from_date_string(
				date("H", strtotime("$pmWorked[$key]")).' hours'));
			$dateTemp = date_add($dateTemp,date_interval_create_from_date_string(
				date("i", strtotime("$pmWorked[$key]")).' minutes'));
			array_push($hoursWorked, date_format($dateTemp,"H:i"));
		}


		$hrsUtime = 0;
		$minsUtime = 0;
		$totalUtime = 0;

		foreach ($hoursWorked as $hrsandmins) {
			if($hrsandmins < "08:00:00"){
				$hrsUtime += substr($hrsandmins,0,2)*60;
				$minsUtime += substr($hrsandmins,3,2);
			}
		}

		$totalUtime = ($hrsUtime + $minsUtime)/60;

		$uTimeDeduction = 0;

		$uTimeDeduction = round(($numOfDays - $totalUtime) * ($hourlyRate),2); 
		//Additional Deductions
		$addDeducResult = $this->db->get_where('deductions', array('empID' => $eid, 'status' => 'on-going'));

		$dName = array();
		$amt = array();
		$mtp = array();

		foreach($addDeducResult->result() as $deductions){
			array_push($dName,$deductions->deductionName);
			array_push($amt,$deductions->amount);
			array_push($mtp,$deductions->mtp);
		}
		
		$amtTP = array();

		foreach($amt as $key => $amtToPay){
			array_push($amtTP, (($amt[$key])/$mtp[$key]));		
		}

		//# of absences
		$iter = 24*60*60; //segundo sa isang araw
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
	    $peraDailyRate = round(($pera/22),2);
	    $peraDeduction = round(($absences * $peraDailyRate),2);
	    $peraCurrent = $pera - $peraDeduction;
	    //----------------------------------------------------------------
		$grossPay = ($basicPay + $pera) - ($lateDeduction) - ($absentDeduction) - ($uTimeDeduction) - ($peraDeduction);

		//Philhealth
		$pHealthResult = $this->db->query("SELECT employeeshare
											FROM philhealth
											WHERE '".$grossPay."'>=startRange
											AND '".$grossPay."'<=endRange");
		
		if($grossPay != 0){
		$pHealthContrib = $pHealthResult->row(0)->employeeshare; //Depending on salary bracket 
		}
		else{
			$pHealthContrib = 0;
		}
		$gsis = round(($grossPay * 0.09),2); //9% of Gross pay
		//Withholding Tax

		$taxableIncome = $grossPay - ($pHealthContrib + $gsis + 100);

		$withholdingTax = 0;
		if($taxableIncome >= 0){
			if($mStatusDep == 'ME1S1'){
			$wTax = $this->db->query("SELECT ME1S1, exemption, status
								FROM withholdingtax
								WHERE ME1S1 <= '".$taxableIncome."'
								AND compensationLevel LIKE 'monthly%'
								ORDER BY ME1S1 DESC LIMIT 1");

			$withholdingTable = $wTax->row(0)->ME1S1;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
			}
			else if($mStatusDep == 'ME2S2'){
				$wTax = $this->db->query("SELECT ME2S2, exemption, status
					FROM withholdingtax
					WHERE ME2S2 <= '".$taxableIncome."'
					AND compensationLevel LIKE 'monthly%'
					ORDER BY ME2S2 DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->ME2S2;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}
			else if($mStatusDep == 'ME3S3'){
				$wTax = $this->db->query("SELECT ME3S3, exemption, status
					FROM withholdingtax
					WHERE ME3S3 <= '".$taxableIncome."'
					AND compensationLevel LIKE 'monthly%'
					ORDER BY ME3S3 DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->ME3S3;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}
			else if($mStatusDep == 'ME4S4'){
				$wTax = $this->db->query("SELECT ME4S4, exemption, status
					FROM withholdingtax
					WHERE ME4S4 <= '".$taxableIncome."'
					AND compensationLevel LIKE 'monthly%'
					ORDER BY ME4S4 DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->ME4S4;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}
			else{
				$wTax = $this->db->query("SELECT SME, exemption, status
					FROM withholdingtax
					WHERE SME <= '".$taxableIncome."'
					AND compensationLevel LIKE 'monthly%'
					ORDER BY SME DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->SME;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}

			$withholdingTax = round(((($taxableIncome - $withholdingTable) * $status) + $exemption),2);
		}

		$loanAmount = 0;
		foreach($amtTP as $amt){
			$loanAmount += $amt;
		}

		$totalDeductions = ($pHealthContrib + $gsis + $withholdingTax + 100 + $loanAmount);

		$netPay =($grossPay) - ($totalDeductions);

		return array($basicInfo, $grossPay, $pHealthContrib, $gsis, $withholdingTax, $dName, $amtTP, $netPay, $peraCurrent, $totalDeductions);
	}

	public function timeAdjPayroll(){
		$eid = $this->input->post('eid');
		//$sTime = $this->input->post('startTime');
		//$eTime = $this->input->post('endTime');
		//$aray = get_payroll_info($eid);
		try{
			//echo $eid." ".$sTime." ".$eTime;
		echo json_encoder(get_payroll_info($eid));
		}catch(Exception $e){echo "porn";}
	}
}




?>