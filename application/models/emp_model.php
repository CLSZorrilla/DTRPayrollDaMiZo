<?php

class Emp_model extends CI_Model{
	public function __contruct(){
		parent::__construct();
	}

	public function insert_user(){
		$options=['cost' => 12];
		$encrypted_pass= password_hash($this->input->post('pword',TRUE), PASSWORD_BCRYPT, $options);
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

	public function check_data($cData){
	    $this->db->like('empID', $cData);
	    $query = $this->db->get('employee');
	    if($query->num_rows()>0){
	    	return true;
	    }
	    else{
	    	return false;
	    }
	}

	public function login_user($eid, $pword){
		$this->db->where('empID', $eid);

		$result = $this->db->get('employee');

		$db_password = $result->row(2)->password;
		$uid = "";
		$uid .=$result->row(5)->lname;
		$uid .=" ";
		$uid .=$result->row(6)->fname;

		if(password_verify($pword, $db_password)){
			return $uid;
		}
		else{
			return false;
		}
	}
}











?>