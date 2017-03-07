<?php


class Employee extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Emp_model');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
	}

	public function check_if_exist(){
		return $this->Emp_model->check_data();;
	}

	public function manageUserAcct(){
		$data['uinfo'] = $this->Emp_model->get_user()->result();
		$query = $this->Emp_model->get_user();

		$row = $query->row();

		$data['acctStatus'] = $row->activated;

		$data['mUser'] = "hr/Manageuser";

		$this->load->view('Suview', $data);
	}

	public function deleteUserAcct(){
		$empID = $this->uri->segment(3);

		$this->Emp_model->del_user($empID);

		redirect('Employee/manageUserAcct');
	}
	
	public function editUsersAcct(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			if(!$this->upload->do_upload('pic')){
				$pic = $this->Emp_model->get_picture();

				$result = $this->Emp_model->edit_user($pic);

				if($result == "Success"){
					echo "<script> alert('User details updated'); window.location.href = '../Maintenance'</script>";
				}else if($result == "Fail"){
					echo "<script> alert('System Error. Contact Administrator'); window.location.href = '../Maintenance'</script>";
				}
			}else{
				$file_data = $this->upload->data();

				$imgPath = base_url().'/uploads/'.$file_data['file_name'];

				$result = $this->Emp_model->edit_user($imgPath);

				if($result == "Success"){
					echo "<script> alert('User details updated'); window.location.href = '../Maintenance'</script>";
				}else if($result == "Fail"){
					echo "<script> alert('System Error. Contact Administrator'); window.location.href = '../Maintenance'</script>";
				}
			}
		}else{
			$data['editUserForm'] = "hr/updateuser";

			$data['userInfo'] = $this->Emp_model->getUserInfo();

			$this->encryption->initialize(
				array(
					'cipher' => 'blowfish',
					'mode' => 'cbc',
					'key' => '2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU'
					)
				);

			$data['password'] = $this->encryption->decrypt($data['userInfo']->row(2)->password);

			$data['positions'] = $this->Emp_model->load_pos();

			$data['department'] = $this->Emp_model->load_dept();

			$this->load->view('Suview', $data);
		}
	}

	public function createUserAcct(){
		$this->form_validation->set_rules('empID', 'EmployeeID','required|exact_length[10]|is_unique[employee.empID]',array(
				'is_unique'     => 'This %s already exists.'
				));
			$this->form_validation->set_rules('pword', 'Password','required|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('cpword', 'Confirm Password','required|min_length[8]|max_length[15]|matches[pword]');
			$this->form_validation->set_rules('dependents', '# of dependents','required|in_list[1,2,3,4]');
			$this->form_validation->set_rules('positions', 'Position','required');
			$this->form_validation->set_rules('department', 'Department','required');
			$this->form_validation->set_rules('lName', 'Last Name','required|alpha_numeric_spaces|min_length[2]');
			$this->form_validation->set_rules('fName', 'First Name','required|alpha_numeric_spaces|min_length[3]');
			$this->form_validation->set_rules('mName', 'Middle Name','required|alpha_numeric_spaces|min_length[1]');
			$this->form_validation->set_rules('address', 'Address','required|min_length[10]');
			$this->form_validation->set_rules('maritalStatus', 'Marital Status','required');
			$this->form_validation->set_rules('emailAdd', 'Email Address','trim|required|valid_email|is_unique[employee.emailAddress]',array(
				'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('birthDate', 'Birthday','required');
			$this->form_validation->set_rules('cNo', 'Contact No','required|alpha_dash|exact_length[13]');
			$this->form_validation->set_rules('sex', 'Sex','required');
			$this->form_validation->set_rules('dateHired', 'Date Hired','required');
			$this->form_validation->set_rules('gsisNo', 'GSISNo','required|alpha_dash|exact_length[14]|is_unique[employee.GSISNo]',array(
				'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('phNo', 'PhilHealthNo','required|alpha_dash|exact_length[14]|is_unique[employee.PhilHealthNo]',array(
				'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('tin', 'TIN','required|alpha_dash|exact_length[14]|is_unique[employee.TIN]',array(
				'is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('vLeave', 'Vacation Leave','required|numeric|regex_match[/^[1-5]{1,2}.[0-9]{1,2}/]');
			$this->form_validation->set_rules('sLeave', 'Sick Leave','required|numeric|regex_match[/^[1-5]{1,2}.[0-9]{1,2}/]');

			if($this->form_validation->run() == FALSE || !$this->upload->do_upload('pic')){
				$data = array(

					'error' => validation_errors(),

					);

				$data['cUserForm']="hr/Createuser";

				$data['positions'] = $this->Emp_model->load_pos();

				$data['department'] = $this->Emp_model->load_dept();
				$data['pictureError'] = $this->upload->display_errors();

				$this->load->view('Suview', $data);

			}
			else{

				$file_data = $this->upload->data();

				$imgPath = base_url().'/uploads/'.$file_data['file_name'];

				$this->Emp_model->insert_user($imgPath);

				echo '<script> alert("Employee Inserted Successfully"); window.location.href = "../Maintenance"; </script>';

			}
	}

	public function monthlyPayslip(){
		$data['empPayslip'] = 'employee/employeepayslip';

		$this->load->model('Payslip_model');
		$data['loanNames'] = $this->Payslip_model->loadLoans();

		$this->load->view('Suview', $data);
	}

	public function employeeProfile(){
		$eid = $this->session->userdata('username');
		$data['empProfile'] = 'employee/employeeprofile';
		$data['uinfo'] = $this->Emp_model->get_profile($eid);

		$this->load->view('Suview', $data);
	}

	public function FilterCategory(){
		$this->load->model('Payslip_model');
		$this->Payslip_model->filterCategory();
	}
}




?>