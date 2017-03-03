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
		$this->db->select('CONCAT(lname, '.'", ", fname, '.'" ", mname) AS name, positionCode, deptCode,VL,SL');
		$result = $this->db->get_where('employee', array('empID' => $eid));

		$this->db->select('positionName');
		$posRes = $this->db->get_where('positions', array('positionCode' => $result->row(0)->positionCode));
		$this->db->select('deptName');
		$deptRes = $this->db->get_where('department', array('deptCode' => $result->row(0)->deptCode));

		$fName = $result->row(0)->name;
		$VL = $result->row(3)->VL;
		$SL = $result->row(4)->SL;

		$pos = "<option value=".$result->row(1)->positionCode.">".$posRes->row(0)->positionName."</option>";

		$dept = "<option value=".$result->row(2)->deptCode.">".$deptRes->row(0)->deptName."</option>";

		echo json_encode(array('fName' => $fName, 'pos' => $pos, 'dept' => $dept, 'VL' => $VL , 'SL' => $SL));
	}

	public function leaveCreditsUpdate(){
		$startDate = $this->input->post('startDate', TRUE);
		$endDate = $this->input->post('endDate', TRUE);

		$checkIfWithAttendance = $this->db->query("SELECT logdate FROM timelog WHERE (logdate BETWEEN '".$startDate."' AND '".$endDate."') OR logdate LIKE '".$startDate."' OR  logdate LIKE '".$endDate."'");

		$result = $checkIfWithAttendance->num_rows();

		if($result > 0){
			return "Duplicate";
		}else{
			$leaveSpanString = 	date_diff(date_create($startDate),date_create($endDate));

			$leaveSpan = $leaveSpanString->format('%a');
			$leaveSpan ++;

			$data = array(
				'empID' => $this->input->post('empID', TRUE),
				'leaveType' => $this->input->post('leaveType', TRUE),
				'startingDate' => $this->input->post('startDate', TRUE),
				'endDate' => $this->input->post('endDate', TRUE),
				'noOfDays' => $leaveSpan,
				'approvalDate' => $this->input->post('appDate', TRUE),
				'remarks' => $this->input->post('note', TRUE)
			);


			if($this->input->post('leaveType') == '1'){
				$this->db->query('UPDATE employee SET VL = VL-"'.$leaveSpan.'" + 1 WHERE empID LIKE "'.$data['empID'].'"');		
			}
			else if($this->input->post('leaveType') == '2'){
				$this->db->query('UPDATE employee SET SL = SL-"'.$leaveSpan.'" WHERE empID LIKE "'.$data['empID'].'"');
			}

			$this->db->insert('leavehistory', $data);
		}
	}
}




?>