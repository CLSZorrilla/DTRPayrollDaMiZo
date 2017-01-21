<?php


class Leave_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function load_leave(){
		$this->db->select('leaveID,leaveName', FALSE);
		$query = $this->db->get('leave');

		return $query->result();
	}

	public function get_leaveform_info($eid){
		$this->db->select('CONCAT(lname, '.'", ", fname, '.'" ", mname) AS name, positionCode, deptCode');
		$result = $this->db->get_where('employee', array('empID' => $eid));

		$this->db->select('positionName');
		$posRes = $this->db->get_where('positions', array('positionCode' => $result->row(0)->positionCode));
		$this->db->select('deptName');
		$deptRes = $this->db->get_where('department', array('deptCode' => $result->row(0)->deptCode));

		$fName = $result->row(0)->name;

		$pos = "<option value=".$result->row(1)->positionCode.">".$posRes->row(0)->positionName."</option>";

		$dept = "<option value=".$result->row(2)->deptCode.">".$deptRes->row(0)->deptName."</option>";



		echo json_encode(array('fName' => $fName, 'pos' => $pos, 'dept' => $dept));
	}
}




?>