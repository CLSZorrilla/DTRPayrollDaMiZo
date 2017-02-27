<?php

class Emp_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function insert_user($img){
		$this->encryption->initialize(
        array(
                'cipher' => 'blowfish',
                'mode' => 'cbc',
                'key' => '2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU'
        )
		);
		$encrypted_pass= $this->encryption->encrypt($this->input->post('pword'));
		$data=array(
			'empID'=>$this->input->post('empID',TRUE),
			'password'=>$encrypted_pass,
			'acctType'=>$this->input->post('userType', TRUE),
			'positionCode'=>$this->input->post('positions',TRUE),
			'deptCode'=>$this->input->post('department',TRUE),
			'lname'=>$this->input->post('lName',TRUE),
			'fname'=>$this->input->post('fName',TRUE),
			'mname'=>$this->input->post('mName',TRUE),
			'address'=>$this->input->post('address',TRUE),
			'maritalStatus'=>$this->input->post('maritalStatus',TRUE),
			'noOfDependents'=>$this->input->post('dependents',TRUE),
			'emailAddress'=>$this->input->post('emailAdd',TRUE),
			'birthDate'=>$this->input->post('birthDate',TRUE),
			'contactNo'=>$this->input->post('cNo',TRUE),
			'sex'=>$this->input->post('sex',TRUE),
			'dateHired'=>$this->input->post('dateHired',TRUE),
			'GSISNo'=>$this->input->post('gsisNo',TRUE),
			'PhilHealthNo'=>$this->input->post('phNo',TRUE),
			'TIN'=>$this->input->post('tin',TRUE),
			'VL'=>$this->input->post('vLeave',TRUE),
			'SL'=>$this->input->post('sLeave',TRUE),
			'picture' => $img,
			'activated' => 'TRUE'
		);

		$insert_data = $this->db->insert('employee', $data);
	}

	public function get_picture(){

		$this->db->select('picture');
		$query = $this->db->get_where('employee', array('empID' => $eid));

		return $query->result();
	}

	public function edit_user(){
		$this->encryption->initialize(
        array(
                'cipher' => 'blowfish',
                'mode' => 'cbc',
                'key' => '2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU'
        )
		);

		$acctQuery = $this->db->query('SELECT activated FROM employee');
		$acctStatus = $acctQuery->row(0)->activated;

		$encrypted_pass= $this->encryption->encrypt($this->input->post('pword'));
		$data=array(
			'empID'=>$this->input->post('empID',TRUE),
			'password'=>$encrypted_pass,
			'acctType'=>$this->input->post('userType', TRUE),
			'positionCode'=>$this->input->post('positions',TRUE),
			'deptCode'=>$this->input->post('department',TRUE),
			'lname'=>$this->input->post('lName',TRUE),
			'fname'=>$this->input->post('fName',TRUE),
			'mname'=>$this->input->post('mName',TRUE),
			'address'=>$this->input->post('address',TRUE),
			'maritalStatus'=>$this->input->post('maritalStatus',TRUE),
			'noOfDependents'=>$this->input->post('dependents',TRUE),
			'emailAddress'=>$this->input->post('emailAdd',TRUE),
			'birthDate'=>$this->input->post('birthDate',TRUE),
			'contactNo'=>$this->input->post('cNo',TRUE),
			'sex'=>$this->input->post('sex',TRUE),
			'dateHired'=>$this->input->post('dateHired',TRUE),
			'GSISNo'=>$this->input->post('gsisNo',TRUE),
			'PhilHealthNo'=>$this->input->post('phNo',TRUE),
			'TIN'=>$this->input->post('tin',TRUE),
			'VL'=>$this->input->post('vLeave',TRUE),
			'SL'=>$this->input->post('sLeave',TRUE),
			'activated'=>$acctStatus
		);


		$query = $this->db->replace('employee', $data);

		
	}

	public function readRow($id){
		return $this->db->get_where('employee', array('empID' => $id));
	}

	public function load_pos(){
		$this->db->select('positionName, positionCode', FALSE);
		$query = $this->db->get('positions');

		return $query->result();
	}

	public function load_dept(){
		$query = $this->db->get('department');

		return $query->result();
	}

	public function del_user($eid){
		$this->db->set('activated', 'FALSE');
		$this->db->where('empID', $eid);
		$this->db->update('employee'); 
	}

	public function get_user(){
		$this->db->select('employee.empID, employee.password,employee.acctType, positions.positionName, department.deptName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.VL, employee.SL, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture, employee.activated', FALSE);
		$this->db->from('employee');
		$this->db->join('positions', 'employee.positionCode=positions.positionCode');
		$this->db->join('department', 'employee.deptCode=department.deptCode');

		$query = $this->db->get();

		return $query;
	}
	public function login_user($eid, $pword){

		$result = $this->db->get_where('employee', array('empID' => $eid, 'activated' => 'TRUE'));
		$this->encryption->initialize(
			array(
				'cipher' => 'blowfish',
				'mode' => 'cbc',
				'key' => '2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU'
			)
		);
		$db_password = $result->row(2)->password;
		$dPassword = $this->encryption->decrypt($db_password);

		$uid = "";
		$uid .=$result->row(6)->lname;
		$uid .=", ";
		$uid .=$result->row(7)->fname;
		$aType = $result->row(3)->acctType;
		

		if($pword == $dPassword){
			return array($uid,$aType);
		}
		else{
			return false;
		}
	}

	public function get_current_attendance($uid){

		$cDate = date("Y-m-d");

		$query = $this->db->query('SELECT timeIn,amOut,pmIn,timeOut FROM timelog WHERE logdate LIKE "'.$cDate.'" AND empID LIKE "'.$uid.'"');

		return $query->result();
	}

	public function InitialPaysheetData($eid){
		$this->db->select("empID, basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,netpay,absences,daysWorked,hoursWorked,numOfLate,VL,SL,startPeriod,endPeriod");
		$PaysheetResult = $this->db->get_where("Paysheet", array('empID' => $eid));

		return $PaysheetResult->result();
	}

	public function PaysheetDataFilter(){
		$eid = $this->session->userdata('username');
		$year = $this->input->post('year');
		$month = $this->input->post('month');

		if($year != "All" && $month == "All"){
			$PaysheetFilterResult = $this->db->query("
				SELECT empID,basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,netpay,absences,daysWorked,hoursWorked,numOfLate,VL,SL,startPeriod,endPeriod
				FROM paysheet 
				WHERE empID LIKE '".$eid."' 
				AND substring(paysheetPeriod,1,4) LIKE '".$year."'")->result();
		}
		else if($month != "All" && $year == "All"){
			$PaysheetFilterResult = $this->db->query("
				SELECT empID,basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,netpay,absences,daysWorked,hoursWorked,numOfLate,VL,SL,startPeriod,endPeriod
				FROM paysheet 
				WHERE empID LIKE '".$eid."' 
				AND substring(paysheet.paysheetPeriod,5,3) LIKE '".$month."'")->result();
		}
		else if($month != "All" && $year != "All"){
			$PaysheetFilterResult = $this->db->query("
				SELECT empID,basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,netpay,absences,daysWorked,hoursWorked,numOfLate,VL,SL,startPeriod,endPeriod
				FROM paysheet 
				WHERE empID LIKE '".$eid."' 
				AND substring(paysheet.paysheetPeriod,5,3) LIKE '".$month."'
				AND substring(paysheetPeriod,1,4) LIKE '".$year."'")->result();
		}
		else if($year == "All" && $month == "All"){
			$PaysheetFilterResult = $this->db->query("
				SELECT empID,basicpay,pera,grosspay,philhealth,pagibig,gsis,tax,netpay,absences,daysWorked,hoursWorked,numOfLate,VL,SL,startPeriod,endPeriod
				FROM paysheet 
				WHERE empID LIKE '".$eid."'")->result();
		}
		$tableResult = "";
		$affected_rows = $this->db->affected_rows();
		if($affected_rows > 0){
			foreach($PaysheetFilterResult as $pfr){
				$tableResult.="<tr>
				<td>".$pfr->empID."</td>
				<td>".$pfr->basicpay."</td>
				<td>".$pfr->pera."</td>
				<td>".$pfr->grosspay."</td>
				<td>".$pfr->philhealth."</td>
				<td>".$pfr->pagibig."</td>
				<td>".$pfr->gsis."</td>
				<td>".$pfr->tax."</td>
				<td></td>
				<td>".$pfr->netpay."</td>
				<td>".$pfr->absences."</td>
				<td>".$pfr->daysWorked."</td>
				<td>".$pfr->hoursWorked."</td>
				<td>".$pfr->numOfLate."</td>
				<td>".$pfr->VL."</td>
				<td>".$pfr->SL."</td>
				<td>".$pfr->startPeriod."</td>
				<td>".$pfr->endPeriod."</td>";
				$tableResult.="</tr>";
			}
		}
		else{
			$tableResult = "";
		}
					
		if($tableResult == ""){
			echo "<tr><td colspan='18' class='text-center'>NO DATA TO SHOW</td></tr>";
		}else{
			echo $tableResult;
		}
	}
}








?>