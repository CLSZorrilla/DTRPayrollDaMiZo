<?php

class Emp_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function insert_user(){
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

		$insert_data = $this->db->insert('employee', $data);

		return $insert_data;
	}

	public function check_data(){

	    $this->db->like('empID', $this->input->post('empID') );
	    $query = $this->db->get('employee');
	    if($query->num_rows() == 1){
	    	echo json_encode( array('res' => 'true') );
	    }
	    else{
	    	echo json_encode( array('res' => 'false') );
	    }
	}

	public function edit_user(){
		$key = createkey(16);
		$this->encryption->initialize(
        array(
                'cipher' => 'blowfish',
                'mode' => 'cbc',
                'key' => $key
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

	public function readRow($id)
	{
		return $this->db->get_where('employee', array('empID' => $id));
	}
	public function check_changes(){
		$result = $this->db->query('SELECT counting FROM employee WHERE id=1');
		if($result = $result->result()){
			return $result->counting;
		}
		return 0;
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

	public function get_user(){
		$this->db->select('employee.empID, employee.password, positions.positionName, department.deptName, CONCAT( employee.lname, '.'", ", employee.fname, '.'" ", employee.mname) AS name, employee.address, employee.maritalStatus, employee.dateHired, employee.GSISNo, employee.PhilHealthNo, employee.TIN, employee.leaveCredits, employee.emailAddress, employee.birthDate, employee.contactNo, employee.sex, employee.picture', FALSE);
		$this->db->from('employee');
		$this->db->join('positions', 'employee.positionCode=positions.positionCode');
		$this->db->join('department', 'employee.deptCode=department.deptCode');

		$query = $this->db->get();

		return $query->result();
	}
	public function login_user($eid, $pword){
		$this->db->where('empID', $eid);

		$result = $this->db->get('employee');
		$this->encryption->initialize(
			array(
				'cipher' => 'blowfish',
				'mode' => 'cbc',
				'key' => '2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU'
			)
		);
		$db_password = $result->row(2)->password;
		$dPassword = $this->encryption->decrypt($db_password);

		echo $password;
		$uid = "";
		$uid .=$result->row(5)->lname;
		$uid .=" ";
		$uid .=$result->row(6)->fname;

		

		if($pword == $dPassword){
			return $uid;
		}
		else{
			return false;
		}
	}
}











?>