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
			'emailAddress'=>$this->input->post('emailAdd',TRUE),
			'birthDate'=>$this->input->post('birthDate',TRUE),
			'contactNo'=>$this->input->post('cNo',TRUE),
			'sex'=>$this->input->post('sex',TRUE),
			'status'=>$this->input->post('type',TRUE),
			'dateHired'=>$this->input->post('dateHired',TRUE),
			'GSISNo'=>$this->input->post('gsisNo',TRUE),
			'PhilHealthNo'=>$this->input->post('phNo',TRUE),
			'TIN'=>$this->input->post('tin',TRUE),
			'VL'=>$this->input->post('vLeave',TRUE),
			'SL'=>$this->input->post('sLeave',TRUE),
			'picture'=>$img,
			'activated' => 'TRUE'
		);

		$insert_data = $this->db->insert('employee', $data);

		return $insert_data;
	}

	public function check_data(){
	    $query = $this->db->get_where('employee', array('empID' => $this->input->post('empID')));
	    if($query->num_rows() == '1'){
	    	echo json_encode( array('res' => 'false') );
	    }
	    else{
	    	echo json_encode( array('res' => 'true') );
	    }
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
		$encrypted_pass= $this->encryption->encrypt($this->input->post('pword'));
		$data=array(
			'empID'=>$this->input->post('empID',TRUE),
			'password'=>$encrypted_pass,
			'positionCode'=>$this->input->post('positions',TRUE),
			'deptCode'=>$this->input->post('department',TRUE),
			'lname'=>$this->input->post('lName',TRUE),
			'fname'=>$this->input->post('fName',TRUE),
			'mname'=>$this->input->post('mName',TRUE),
			'address'=>$this->input->post('address',TRUE),
			'maritalStatus'=>$this->input->post('maritalStatus',TRUE),
			'emailAddress'=>$this->input->post('emailAdd',TRUE),
			'birthDate'=>$this->input->post('birthDate',TRUE),
			'contactNo'=>$this->input->post('cNo',TRUE),
			'sex'=>$this->input->post('sex',TRUE),
			'status'=>$this->input->post('type',TRUE),
			'dateHired'=>$this->input->post('dateHired',TRUE),
			'GSISNo'=>$this->input->post('gsisNo',TRUE),
			'PhilHealthNo'=>$this->input->post('phNo',TRUE),
			'TIN'=>$this->input->post('tin',TRUE),
			'leaveCredits'=>$this->input->post('leaveCredits',TRUE)
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
		//$this->db->where('empID', $eid);
		//$this->db->delete('employee');

		

		$this->db->set('activated', 'FALSE');
		$this->db->where('empID', $eid);
		$this->db->update('employee'); 
	}

	public function get_user(){
		$this->db->select('employee.empID, employee.password, positions.positionName, department.deptName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.VL, employee.SL, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture, employee.activated', FALSE);
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
		$uid .=" ";
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

		$cDate = date("y-m-d");
		$this->db->select('am_IN, am_Out, pm_In, pm_Out');
		$query = $this->db->get_where('timelog', array('logdate' => $cDate, 'empID' => $uid));

		return $query->result();
	}
}








?>