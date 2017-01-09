<?php


class employee extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('emp_model');
	}

	public function check_if_exist(){
		$res=$this->emp_model->checkData($eid);

		return $res;
	}
	public function manageUserAcct(){
		$data['mUser']="hr/manageuser";

		$this->load->view('suview', $data);
	}
	public function createUserAcct(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$this->form_validation->set_rules('empID', 'EmployeeID','required|exact_length[10]|is_unique[employee.empID]',array(
                'is_unique'     => 'This %s already exists.'
        	));
			$this->form_validation->set_rules('pword', 'Password','required|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('cpword', 'Confirm Password','required|min_length[8]|max_length[15]|matches[pword]');
			$this->form_validation->set_rules('positions', 'Position','required');
			$this->form_validation->set_rules('department', 'Department','required');
			$this->form_validation->set_rules('lName', 'Last Name','required|alpha_numeric_spaces|min_length[2]');
			$this->form_validation->set_rules('fName', 'First Name','required|alpha_numeric_spaces|min_length[3]');
			$this->form_validation->set_rules('mName', 'Middle Name','required|alpha_numeric_spaces|min_length[1]');
			$this->form_validation->set_rules('address', 'Address','required|alpha_numeric_spaces|min_length[10]');
			$this->form_validation->set_rules('maritalStatus', 'Marital Status','required');
			$this->form_validation->set_rules('emailAdd', 'Email Address','trim|required|valid_email|is_unique[employee.emailAddress]',array(
                'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('birthDate', 'Birthday','required');
			$this->form_validation->set_rules('cNo', 'Contact No','required|alpha_dash|exact_length[13]');
			$this->form_validation->set_rules('sex', 'Sex','required');
			$this->form_validation->set_rules('type', 'Employee Type','required');
			$this->form_validation->set_rules('dateHired', 'Date Hired','required');
			$this->form_validation->set_rules('gsisNo', 'GSISNo','required|numeric|exact_length[14]|is_unique[employee.GSISNo]',array(
                'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('phNo', 'PhilHealthNo','required|numeric|exact_length[14]|is_unique[employee.PhilHealthNo]',array(
                'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('tin', 'TIN','required|numeric|exact_length[14]|is_unique[employee.TIN]',array(
                'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('leaveCredits', 'Leave Credits','required|numeric|min_length[1]|max_length[2]');

			if($this->form_validation->run() == FALSE){
				$data = array(

				'error' => validation_errors()

				);

				$data['cUserForm']="hr/createuser";

				$this->load->view('suview', $data);

			}
			else{
				//echo $this->input->post('gsisNo');
				if($this->emp_model->insert_user()){

					$this->session->set_flashdata('user_registered', 'User has been registered');
					redirect('employee/manageUserAcct');
				}
			}
		}
		else{
			$data['cUserForm']="hr/createuser";

			$this->load->view('suview', $data);
		}
	}
}




?>