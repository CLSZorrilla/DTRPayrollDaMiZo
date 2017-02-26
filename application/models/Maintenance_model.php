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

	public function get_departments(){
		$this->db->select('department.deptCode, department.deptName');
		$this->db->from('department');

		$query = $this->db->get();

		return $query;
	}

	public function get_holiday(){
		$this->db->select('holiday.holidayId, holiday.holidayName, holiday.holidayDate, holiday.holidayType');
		$this->db->from('holiday');

		$query = $this->db->get();

		return $query;
	}
}

?>