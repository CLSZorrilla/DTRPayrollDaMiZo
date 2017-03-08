<?php 

class Maintenance_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_user(){
		$query = $this->db->query("SELECT employee.empID, employee.password, employee.acctType, positions.positionName, department.deptName, CONCAT( employee.lname, ',', employee.fname, ' ', employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.VL, employee.SL, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture, employee.activated FROM employee,positions,department WHERE employee.positionCode = positions.positionCode AND employee.deptCode = department.deptCode");

		return $query;
	}

	public function get_positions(){
		$this->db->select('positions.positionCode, positions.positionName, positions.salaryGrade');
		$this->db->from('positions');

		$query = $this->db->get();

		return $query;
	}

	public function insert_position(){
		$data=array(
			'positionCode'=>$this->input->post('positionCode',TRUE),
			'positionName'=>$this->input->post('positionName', TRUE),
			'salaryGrade'=>$this->input->post('salaryGrade',TRUE)
		);

		$insert_data = $this->db->insert('positions', $data);
	}

	public function getPosInfo(){
		$positionCode = $this->uri->segment(3);

		return $this->db->get_where('positions', array('positionCode' => $positionCode));
	}

	public function edit_position(){
		$posCode = $this->input->post('positionCode',TRUE);
		$posName = $this->input->post('positionName',TRUE);
		$salaryGrade = $this->input->post('salaryGrade',TRUE);

		$checkIfExist = $this->db->query("SELECT * FROM positions WHERE positionCode LIKE '".$posCode."' AND positionName LIKE '".$posName."' AND salaryGrade LIKE '".$salaryGrade."'");

		$numRows = $checkIfExist->num_rows();
		if($numRows > 0){
			return "Duplicate";
		}else{
			$data=array(
			'positionCode'=>$this->input->post('positionCode',TRUE),
			'positionName'=>$this->input->post('positionName', TRUE),
			'salaryGrade'=>$this->input->post('salaryGrade',TRUE)
			);

			$this->db->where('positionCode', $data['positionCode']);
			$query = $this->db->update('positions', $data);

			$affectedRows = $this->db->affected_rows();

			if($affectedRows > 0){
				return "Success";
			}else{
				return "Fail";
			}
		}
	}

	public function get_departments(){
		$this->db->select('department.deptCode, department.deptName');
		$this->db->from('department');

		$query = $this->db->get();

		return $query;
	}

	public function insert_department(){
		$data=array(
			'deptCode'=>$this->input->post('deptCode',TRUE),
			'deptName'=>$this->input->post('deptName', TRUE)
		);

		$insert_data = $this->db->insert('department', $data);
	}

	public function getDeptInfo(){
		$deptCode = $this->uri->segment(3);

		return $this->db->get_where('department', array('deptCode' => $deptCode));
	}

	public function edit_department(){
		$deptCode = $this->input->post('deptCode',TRUE);
		$deptName = $this->input->post('deptName',TRUE);

		$checkIfExist = $this->db->query("SELECT * FROM department WHERE deptCode LIKE '".$deptCode."' AND deptName LIKE '".$deptName."'");

		$numRows = $checkIfExist->num_rows();
		if($numRows > 0){
			return "Duplicate";
		}else{
			$data=array(
			'deptCode'=>$this->input->post('deptCode',TRUE),
			'deptName'=>$this->input->post('deptName', TRUE)
			);

			$this->db->where('deptCode', $data['deptCode']);
			$query = $this->db->update('department', $data);

			$affectedRows = $this->db->affected_rows();

			if($affectedRows > 0){
				return "Success";
			}else{
				return "Fail";
			}
		}
	}

	public function get_holiday(){
		$this->db->select('holiday.holidayId, holiday.holidayName, holiday.holidayDate, holiday.holidayType');
		$this->db->from('holiday');

		$query = $this->db->get();

		return $query;
	}

	public function insert_holiday(){
		$data=array(
			'holidayName'=>$this->input->post('holidayName',TRUE),
			'holidayDate'=>$this->input->post('holidayDate', TRUE),
			'holidayType'=>$this->input->post('holidayType', TRUE)
		);

		$insert_data = $this->db->insert('holiday', $data);
	}

	public function getHolidayInfo(){
		$holidayId = $this->uri->segment(3);

		return $this->db->get_where('holiday', array('holidayId' => $holidayId));
	}

	public function edit_holiday(){
		$holidayId = $this->input->post('holidayId',TRUE);
		$holidayName = $this->input->post('holidayName',TRUE);
		$holidayDate = $this->input->post('holidayDate',TRUE);
		$holidayType = $this->input->post('holidayType',TRUE);

		$checkIfExist = $this->db->query("SELECT * FROM holiday WHERE holidayId LIKE '".$holidayId."' AND holidayName LIKE '".$holidayName."' AND holidayDate LIKE '".$holidayDate."' AND holidayType LIKE '".$holidayType."'");

		$numRows = $checkIfExist->num_rows();
		if($numRows > 0){
			return "Duplicate";
		}else{
			$data=array(
			'holidayId'=>$this->input->post('holidayId',TRUE),
			'holidayName'=>$this->input->post('holidayName', TRUE),
			'holidayDate'=>$this->input->post('holidayDate', TRUE),
			'holidayType'=>$this->input->post('holidayType', TRUE)
			);

			$this->db->where('holidayId', $data['holidayId']);
			$query = $this->db->update('holiday', $data);

			$affectedRows = $this->db->affected_rows();

			if($affectedRows > 0){
				return "Success";
			}else{
				return "Fail";
			}
		}
	}

	public function get_deduction(){
		$this->db->select('deductionname.deductionId, deductionname.deductionName');
		$this->db->from('deductionname');

		$query = $this->db->get();

		return $query;
	}

	public function insert_deduction(){
		$data=array(
			'deductionId'=>$this->input->post('deductionId',TRUE),
			'deductionName'=>$this->input->post('deductionName', TRUE)
		);

		$insert_data = $this->db->insert('deductionname', $data);
	}

	public function getDeductionInfo(){
		$deductionId = $this->uri->segment(3);

		return $this->db->get_where('deductionname', array('deductionId' => $deductionId));
	}

	public function edit_deduction(){
		$deductionId = $this->input->post('deductionId',TRUE);
		$deductionName = $this->input->post('deductionName',TRUE);

		$checkIfExist = $this->db->query("SELECT * FROM deductionname WHERE deductionId LIKE '".$deductionId."' AND deductionName LIKE '".$deductionName."'");

		$numRows = $checkIfExist->num_rows();
		if($numRows > 0){
			return "Duplicate";
		}else{
			$data=array(
			'deductionId'=>$this->input->post('deductionId',TRUE),
			'deductionName'=>$this->input->post('deductionName', TRUE)
			);

			$this->db->where('deductionId', $data['deductionId']);
			$query = $this->db->update('deductionname', $data);

			$affectedRows = $this->db->affected_rows();

			if($affectedRows > 0){
				return "Success";
			}else{
				return "Fail";
			}
		}
	}

	public function get_philhealth(){
		$this->db->select('monthlySalaryBracket, startRange, endRange, totalMonthlyContribution, employeeShare,employerShare');
		$this->db->from('philhealth');

		$query = $this->db->get();

		return $query;
	}

	public function edit_philhealthtable(){
		$input = filter_input_array(INPUT_POST);
		$endRange = $input['endRange'];
		$startRange = $input['startRange'];
		$totalMonthly = $input['totalMonthly'];
		$empShare = $input['empShare'];
		$emploShare = $input['emploShare'];

		if(isset($startRange)){
			$this->db->query("UPDATE philhealth SET startRange = '".$startRange."' WHERE monthlySalaryBracket = '".$input['bracket']."'");
		}else if(isset($endRange)){
			$this->db->query("UPDATE philhealth SET endRange = '".$endRange."' WHERE monthlySalaryBracket = '".$input['bracket']."'");
		}else if(isset($totalMonthly)){
			$this->db->query("UPDATE philhealth SET totalMonthlyContribution = '".$totalMonthly."' WHERE monthlySalaryBracket = '".$input['bracket']."'");
		}else if(isset($empShare)){
			$this->db->query("UPDATE philhealth SET employeeShare = '".$empShare."' WHERE monthlySalaryBracket = '".$input['bracket']."'");
		}else if(isset($emploShare)){
			$this->db->query("UPDATE philhealth SET employerShare = '".$emploShare."' WHERE monthlySalaryBracket = '".$input['bracket']."'");
		}
	}

	public function edit_wttable(){
		$input = filter_input_array(INPUT_POST);

		$exemption = $input['exemption'];
		$status = $input['status'];
		$Z = $input['Z'];
		$SME = $input['SME'];
		$ME1S1 = $input['ME1S1'];
		$ME2S2 = $input['ME2S2'];
		$ME3S3 = $input['ME3S3'];
		$ME4S4 = $input['ME4S4'];

		if(isset($exemption)){
			$this->db->query("UPDATE withholdingtax SET exemption = '".$exemption."' WHERE compensationLevel = '".$input['cLevel']."'");
		}else if(isset($status)){
			$this->db->query("UPDATE withholdingtax SET status = '".$status."' WHERE compensationLevel = '".$input['cLevel']."'");
		}else if(isset($Z)){
			$this->db->query("UPDATE withholdingtax SET Z = '".$Z."' WHERE compensationLevel = '".$input['cLevel']."'");
		}else if(isset($SME)){
			$this->db->query("UPDATE withholdingtax SET SME = '".$SME."' WHERE compensationLevel = '".$input['cLevel']."'");
		}else if(isset($ME1S1)){
			$this->db->query("UPDATE withholdingtax SET ME1S1 = '".$ME1S1."' WHERE compensationLevel = '".$input['cLevel']."'");
		}else if(isset($ME2S2)){
			$this->db->query("UPDATE withholdingtax SET ME2S2 = '".$ME2S2."' WHERE compensationLevel = '".$input['cLevel']."'");
		}
		else if(isset($ME3S3)){
			$this->db->query("UPDATE withholdingtax SET ME3S3 = '".$ME3S3."' WHERE compensationLevel = '".$input['cLevel']."'");
		}
		else if(isset($ME4S4)){
			$this->db->query("UPDATE withholdingtax SET ME4S4 = '".$ME4S4."' WHERE compensationLevel = '".$input['cLevel']."'");
		}
	}

	public function get_salarygrade(){
		$this->db->select('salarygrade.salaryGrade, salarygrade.step_1, salarygrade.step_2, salarygrade.step_3, salarygrade.step_4, salarygrade.step_5, salarygrade.step_6, salarygrade.step_7, salarygrade.step_8, salarygrade.remarks');
		$this->db->from('salarygrade');

		$query = $this->db->get();

		return $query;
	}

	public function edit_salarygradetable(){
		$input = filter_input_array(INPUT_POST);
		$s1 = $input['s1'];
		$s2 = $input['s2'];
		$s3 = $input['s3'];
		$s4 = $input['s4'];
		$s5 = $input['s5'];
		$s6 = $input['s6'];
		$s7 = $input['s7'];
		$s8 = $input['s8'];

		if(isset($s1)){
			$this->db->query("UPDATE salarygrade SET step_1 = '".$s1."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s2)){
			$this->db->query("UPDATE salarygrade SET step_2 = '".$s2."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s3)){
			$this->db->query("UPDATE salarygrade SET step_3 = '".$s3."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s4)){
			$this->db->query("UPDATE salarygrade SET step_4 = '".$s4."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s5)){
			$this->db->query("UPDATE salarygrade SET step_5 = '".$s5."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s6)){
			$this->db->query("UPDATE salarygrade SET step_6 = '".$s6."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s7)){
			$this->db->query("UPDATE salarygrade SET step_7 = '".$s7."' WHERE salaryGrade = '".$input['sGrade']."'");
		}else if(isset($s8)){
			$this->db->query("UPDATE salarygrade SET step_8 = '".$s8."' WHERE salaryGrade = '".$input['sGrade']."'");
		}
	}

	public function get_withholdingtax(){
		$this->db->select('withholdingtax.compensationLevel, withholdingtax.exemption, withholdingtax.status, withholdingtax.Z, withholdingtax.SME, withholdingtax.ME1S1, withholdingtax.ME2S2, withholdingtax.ME3S3, withholdingtax.ME4S4');
		$this->db->from('withholdingtax');

		$query = $this->db->get();

		return $query;
	}
}

?>