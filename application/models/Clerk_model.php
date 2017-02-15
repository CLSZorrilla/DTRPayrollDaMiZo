<?php


class Clerk_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_emp_list(){
		$this->db->select('employee.empID, employee.password,employee.acctType, positions.positionName, department.deptName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.VL, employee.SL, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture, employee.pslipdate, employee.generated', FALSE);
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
		$basicPay = $basicInfo->row(6)->step_1;
		$name = $basicInfo->row(3)->name;
		$eid = $basicInfo->row(0)->empID;
		$position = $basicInfo->row(2)->positionName;
		$pera = $basicInfo->row(4)->pera;
		$dep = $basicInfo->row(2)->noOfDependents;
		$mStat = substr($basicInfo->row(1)->maritalStatus,0,1);
		$mStatusDep;
		if($dep > 0){
			$mStatusDep = "ME".$dep."S".$dep;
		}
		else{
			$mStatusDep = "SME";
		}

		$timeBasis = $this->db->query("SELECT timeBasis FROM company_profile");

		$tbasis = $timeBasis->row(0)->timeBasis;
		
		//--------------------------------------------------------------
		//get startTime and endTime
		$seTime = $this->db->query('SELECT startTime, endTime, startRange, endRange FROM company_profile WHERE id = 1');

		$sTime = $seTime->row(0)->startTime;

		$sTimeAdd = date_create(date("H:i", strtotime("$sTime")));
		$eTime = date_format(date_add($sTimeAdd,date_interval_create_from_date_string("9 hours")), "H:i");

		$sRange = $seTime->row(2)->startRange;
		$eRange = $seTime->row(3)->endRange;

		$sDRange = $this->input->post('periodDateS');
		$eDRange = $this->input->post('periodDateE');

		//---------------------------------------------------------------
		//hours late
		$cMonth = date('m');
		$year = date('Y');
		if($tbasis == 'Flexible'){
			$damLateResult = $this->db->query('SELECT 
					CASE
						WHEN timediff(timeIn, "'.$eRange.'") < 0 THEN "00:00:00" 
						ELSE timediff(timeIn, "'.$eRange.'") 
					END as timeIn, amOut, 
					CASE 
						WHEN timediff(pmIn, "13:00:00") < 0 THEN "00:00:00" 
						ELSE timediff(pmIn, "13:00:00") 
					END as pmIn, timeOut 
							FROM timelog 
							WHERE empID LIKE "'.$eid.'"
							AND logdate BETWEEN "'.$sDRange.'" AND "'.$eDRange.'"');
		}
		else if($tbasis == 'Regular'){
			$damLateResult = $this->db->query('SELECT timediff(timeIn, "'.$sTime.'") as timeIn, amOut, timediff(pmIn, "13:00:00") as pmIn, timeOut 
							FROM timelog 
							WHERE empID LIKE "'.$eid.'"
							AND logdate BETWEEN "'.$sDRange.'" AND "'.$eDRange.'"');
		}

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

		$totalLate = round((($hrsLate + $minsLate)/60),2);

		$dailyRate = round(($basicPay/22),2);
		$hourlyRate = round(($dailyRate/8),2);

		$lateDeduction = round(($totalLate * $hourlyRate),2);

		$daysLate = $this->db->query('SELECT empID FROM timelog WHERE timediff(timeIn,"09:00:00") > 0 AND empID LIKE "'.$eid.'"');

		$numofLate = count($daysLate->row(0)->empID);

		//--------------------------------------------------------------------
		//Undertime Deduction

		if($tbasis == 'Flexible'){
			$uTime= $this->db->query("SELECT 
			timeDiff(timeDiff(amOut,timeIn), 
			CASE 
				WHEN timeDiff(amOut,'12:00:00') < 0 THEN '00:00:00' 
				ELSE timeDiff(amOut,'12:00:00') 
			END) as amWorked,

				CASE
					WHEN pmIn <=0 && timeOut <=0 THEN '00:00:00'
					ELSE timeDiff(timeDiff(CASE
									WHEN timeDiff(timeIn, '".$eRange."') > 0 THEN '18:00:00'
									ELSE addTime(timeIn, '09:00:00')
									END,'13:00:00')
								,addTime(
									CASE
										WHEN timeDiff(pmIn,'13:00:00') < 0 THEN '00:00:00'
										ELSE timeDiff(pmIn,'13:00:00')
									END, 
									CASE 
										WHEN timeDiff(
											CASE
												WHEN timeDiff(timeIn, '".$eRange."') > 0 THEN '18:00:00'
												ELSE addTime(timeIn, '09:00:00')
											END,timeOut) < 0 THEN '00:00:00'
										ELSE timeDiff(CASE
											WHEN timeDiff(timeIn, '".$eRange."') > 0 THEN '18:00:00'
											ELSE addTime(timeIn, '09:00:00')
											END,timeOut)
									END)
							)
				END as pmWorked

			FROM `timelog`
			WHERE empID LIKE '".$eid."'
			AND logdate BETWEEN '".$sDRange."' AND '".$eDRange."'
				");
		}
		else if($tbasis == 'Regular'){
			$uTime= $this->db->query("SELECT 
			timediff(timeDiff(amOut,'".$sTime."'),
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
					WHEN timeDiff(timeOut,'".$eTime."') < 0 THEN '00:00:00'
					ELSE timeDiff(timeOut, '".$eTime."')
				END))
			END as pmWorked

			FROM `timelog`
			WHERE empID LIKE '".$eid."'
			AND logdate BETWEEN '".$sDRange."' AND '".$eDRange."'
				");
		}
		

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

		$totalHrsWorked = round((($hrsUtime + $minsUtime)/60),2);

		$uTimeDeduction = 0;

		$uTimeDeduction = round(($numOfDays - ($totalHrsWorked+$totalLate)) * ($hourlyRate),2);
		//----------------------------------------------------------------
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
			array_push($amtTP, round(($amt[$key]/$mtp[$key]),2));		
		}
		//----------------------------------------------------------------
		//# of absences
		$iter = 24*60*60; //segundo sa isang araw
	    $weekEndcount = 0;
	    $startDate = strtotime($sDRange);
	    $endDate = strtotime($eDRange);

	    for($i = $startDate; $i <= $endDate; $i=$i+$iter)
	    {
	    	if(Date('D',$i) == 'Sat' || Date('D',$i) == 'Sun')
	    	{
	    		$weekEndcount++;
	    	}
	    }

	    //$dInMonth=cal_days_in_month(CAL_GREGORIAN,substr($sDRange,5,2),substr($sDRange,0,4));

	    $datetime1 = date_create($sDRange);
		$datetime2 = date_create($eDRange);
		$interval = date_diff($datetime1, $datetime2);
		$interval2 = $interval->format('%a');

		$daysInRange = $interval2+1;

	    $weekDays = $daysInRange - $weekEndcount;

	    $daysWorked = count($dLatetimeIn);

	    $absences = $weekDays - $daysWorked;
	    $absentDeduction = round(($absences * $dailyRate),2);
	    //----------------------------------------------------------------
	    //PERA deduction
	    $peraDailyRate = round(($pera/22),2);
	    $peraDeduction = round(($absences * $peraDailyRate),2);
	    $peraCurrent = $pera - $peraDeduction;
	    //----------------------------------------------------------------
		$grossPay = ($basicPay + $pera) - (($lateDeduction) + ($absentDeduction) + ($uTimeDeduction) + ($peraDeduction));

		//----------------------------------------------------------------
		//Philhealth
		$pHealthResult = $this->db->query("SELECT employeeShare
											FROM philhealth
											WHERE '".$grossPay."'>=startRange
											AND '".$grossPay."'<=endRange");
		
		if($grossPay != 0){
			$pHealthContrib = $pHealthResult->row(0)->employeeShare; //Depending on salary bracket 
		}
		else{
			$pHealthContrib = 0;
		}
		$gsis = round(($grossPay * 0.09),2); //9% of Gross pay

		//----------------------------------------------------------------
		//Withholding Tax

		$taxableIncome = round($grossPay - ($pHealthContrib + $gsis + 100),2);

		$withholdingTax = 0;
		if($taxableIncome >= 0){
			if($mStatusDep == 'ME1S1'){
			$wTax = $this->db->query("SELECT ME1S1, exemption, status
								FROM withholdingtax
								WHERE ME1S1 <= '".$taxableIncome."'
								AND compensationLevel LIKE 'semi%'
								ORDER BY ME1S1 DESC LIMIT 1");

			$withholdingTable = $wTax->row(0)->ME1S1;
			$exemption = $wTax->row(1)->exemption;
			$status = $wTax->row(2)->status;
			}
			else if($mStatusDep == 'ME2S2'){
				$wTax = $this->db->query("SELECT ME2S2, exemption, status
					FROM withholdingtax
					WHERE ME2S2 <= '".$taxableIncome."'
					AND compensationLevel LIKE 'semi%'
					ORDER BY ME2S2 DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->ME2S2;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}
			else if($mStatusDep == 'ME3S3'){
				$wTax = $this->db->query("SELECT ME3S3, exemption, status
					FROM withholdingtax
					WHERE ME3S3 <= '".$taxableIncome."'
					AND compensationLevel LIKE 'semi%'
					ORDER BY ME3S3 DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->ME3S3;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}
			else if($mStatusDep == 'ME4S4'){
				$wTax = $this->db->query("SELECT ME4S4, exemption, status
					FROM withholdingtax
					WHERE ME4S4 <= '".$taxableIncome."'
					AND compensationLevel LIKE 'semi%'
					ORDER BY ME4S4 DESC LIMIT 1");
				$withholdingTable = $wTax->row(0)->ME4S4;
				$exemption = $wTax->row(1)->exemption;
				$status = $wTax->row(2)->status;
			}
			else{
				$wTax = $this->db->query("SELECT SME, exemption, status
					FROM withholdingtax
					WHERE SME <= '".$taxableIncome."'
					AND compensationLevel LIKE 'semi%'
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

		$netPay =round(($grossPay) - ($totalDeductions),2);

		if($netPay<=0){
			$netPay = 0;
		}

		$pagIbig = 100;

		$leave = $this->db->query('SELECT VL, SL FROM employee WHERE empID LIKE "'.$eid.'"');

		$VL = $leave->row(0)->VL;
		$SL = $leave->row(1)->SL;

		return array($name,$position,$basicPay,$pera, $grossPay, $pHealthContrib, $gsis, $withholdingTax, $dName, $amtTP, $netPay, $peraCurrent, $totalDeductions,$pagIbig,$eid, $absences, $daysWorked,($totalHrsWorked." Hours"),$VL,$SL,$numofLate);
	}

	public function get_payrollsheet(){
		$emp = $this->db->query('SELECT empID from employee');

		$Results = array();
		foreach($emp->result() as $eid){
			array_push($Results,$this->get_payroll_info($eid->empID));
		}

		$StringFor="";
		foreach ($Results as $key => $empData) {
			$StringFor.="<tr>".$this->get_info($empData)."</tr>";
		}
		
		echo $StringFor;

		echo "<tr id='tableRes'><td>".json_encode($Results)."</td></tr>";
	}

	public function get_info($info){
		$tableData = "<td>".$info[0]."</td>
				<td>".$info[1]."</td>
				<td>".$info[2]."</td>
				<td>".$info[11]."</td>
				<td>".$info[4]."</td>
				<td>".$info[5]."</td>
				<td>100</td>
				<td>".$info[6]."</td>
				<td>".$info[7]."</td>
				<td><table><tr>";

				foreach($info[8] as $key => $deductionName){
					$tableData.="<td><b>".$deductionName."</b>- <br/>".$info[9][$key]."</td>";
				}

				$tableData.="</tr></table></td><td>".$info[10]."</td>
												<td>".$info[15]."</td>
												<td>".$info[16]."</td>
												<td>".$info[17]."</td>
												<td>".$info[20]."</td>
												<td>".$info[18]."</td>
												<td>".$info[19]."</td>";

		return $tableData;
	}
	public function save_Payslip(){
		$data = array(
			'empID' => $this->input->post('eid', TRUE),
			'basicpay' => $this->input->post('monthlySalary', TRUE),
			'pera' => $this->input->post('pera', TRUE),
			'grosspay' => $this->input->post('grossPay', TRUE),
			'philhealth' => $this->input->post('philHealth', TRUE),
			'pagibig' => $this->input->post('pagIbig', TRUE),
			'gsis' => $this->input->post('gsis', TRUE),
			'tax' => $this->input->post('tax', TRUE),
			'netpay' => $this->input->post('netPay', TRUE)
			);
		
		$insert_data = $this->db->insert('payslip', $data);

		$payslipNo = $this->db->insert_id();

		for($i=0;$this->input->post('dName['.$i.']')!=null&& $this->input->post('dAmt['.$i.']')!=null;$i++){
				$dName[$i]=$this->input->post('dName['.$i.']');
				$dAmt[$i]=$this->input->post('dAmt['.$i.']');

				$this->db->query("INSERT into paysliploan(payslipNo, deductionName, amount) VALUES ('".$payslipNo."','".$dName[$i]."', '".$dAmt[$i]."')");
			}

		$pslipDate = Date("Y-m-d");
		$this->db->query('UPDATE employee SET generated = "TRUE", pslipdate = "'.$pslipDate.'" WHERE empID LIKE "'.$data['empID'].'" AND generated LIKE "%FALSE%"');
	}

	public function save_paysheet(){
		try{
			$data = json_decode($this->input->post('pslipdata'));

			$sPeriod = $this->input->post('periodDateS');
			$ePeriod = $this->input->post('periodDateE');

			$checkPSheet = $this->db->query("SELECT startPeriod, endPeriod FROM payslip WHERE (('".$sPeriod."' BETWEEN startPeriod AND endPeriod) OR ('".$ePeriod."' BETWEEN startPeriod AND endPeriod)) OR '".$sPeriod."' LIKE startPeriod OR '".$ePeriod."' LIKE endPeriod");

			$checkPSheetResult = $checkPSheet->num_rows();

			if($checkPSheetResult > 0){
				echo "Fail";
			}
			else{
				foreach($data as $d){
			 		$this->db->query("INSERT INTO `payslip`(`empID`, `basicpay`, `pera`, `grosspay`, `philhealth`, `pagibig`, `gsis`, `tax`, `netpay`,`absences`,`hoursWorked`, `startPeriod`, `endPeriod`) VALUES ('".$d[14]."','".$d[2]."','".$d[11]."','".$d[4]."','".$d[5]."','".$d[13]."','".$d[6]."','".$d[7]."','".$d[10]."','".$d[15]."','".$d[16]."','".$sPeriod."','".$ePeriod."')");

					$paysheetNo = $this->db->insert_id();

					foreach($d[8] as $key => $data){
			 			$this->db->query("INSERT INTO `paysliploan`(`payslipNo`, `deductionName`, `amount`) VALUES ('".$paysheetNo."','".$d[8][$key]."','".$d[9][$key]."')");
			 		}
			 	}

			 	echo "Success";
			}
		}catch(Exception $e){
			print_r ($e);
		}
	}
}




?>