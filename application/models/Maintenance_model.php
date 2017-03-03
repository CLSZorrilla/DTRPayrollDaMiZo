<?php 

class Maintenance_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_user(){
		$this->db->select('employee.empID, employee.password,employee.acctType, positions.positionName, department.deptName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.VL, employee.SL, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture, employee.activated', FALSE);
		$this->db->from('employee');
		$this->db->join('positions', 'employee.positionCode=positions.positionCode');
		$this->db->join('department', 'employee.deptCode=department.deptCode');

		$query = $this->db->get();

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
}

?>