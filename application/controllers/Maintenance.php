<?php

class Maintenance extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Maintenance_model');
	}

	public function index(){
		$data['uinfo'] = $this->Maintenance_model->get_user()->result();
		$query = $this->Maintenance_model->get_user();
		$row = $query->row();
		
		$data['acctStatus'] = $row->activated;

		$data['pinfo'] = $this->Maintenance_model->get_positions()->result();
		$data['dinfo'] = $this->Maintenance_model->get_departments()->result();
		$data['hinfo'] = $this->Maintenance_model->get_holiday()->result();
		$data['deductinfo'] = $this->Maintenance_model->get_deduction()->result();
		// $data['philinfo'] = $this->Maintenance_model->get_philhealth()->result();
		// $data['sginfo'] = $this->Maintenance_model->get_salarygrade()->result();
		// $data['wtinfo'] = $this->Maintenance_model->get_withholdingtax()->result();
		$data['maintenance'] = "hr/Maintenance";

		$this->load->view('Suview', $data);
	}


	public function createPosition(){
			$this->form_validation->set_rules('positionName', 'Position Name','required');
			$this->form_validation->set_rules('salaryGrade', 'Salary Grade','required');

			if($this->form_validation->run() == FALSE){
				$data = array(

					'error' => validation_errors(),

					);

				$data['cPositionForm']="hr/createposition";
				$this->load->view('Suview', $data);

			}
			else{

				$this->Maintenance_model->insert_position();
				redirect('maintenance');
			}
	}

	public function editPosition(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$result = $this->Maintenance_model->edit_position();
			if($result == "Success" || $result == "Duplicate"){
				echo "<script> alert('Position details updated'); window.location.href = 'index'</script>";
			}else if($result == "Fail"){
				echo "<script> alert('System Error. Contact Administrator'); window.location.href = 'index'</script>";
			}

		}else{
			$data['editPositionForm'] = "hr/updateposition";

			$data['positionInfo'] = $this->Maintenance_model->getPosInfo();

			$this->load->view('Suview', $data);
		}
	}

	public function createDepartment(){
			$this->form_validation->set_rules('deptName', 'Department Name','required');

			if($this->form_validation->run() == FALSE){
				$data = array(

					'error' => validation_errors(),

					);

				$data['cDepartmentForm']="hr/createdepartment";
				$this->load->view('Suview', $data);

			}
			else{

				$this->Maintenance_model->insert_department();
				redirect('maintenance');
			}
	}

	public function editDepartment(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$result = $this->Maintenance_model->edit_department();
			if($result == "Success" || $result == "Duplicate"){
				echo "<script> alert('Department details updated'); window.location.href = 'index'</script>";
			}else if($result == "Fail"){
				echo "<script> alert('System Error. Contact Administrator'); window.location.href = 'index'</script>";
			}

		}else{
			$data['editDepartmentForm'] = "hr/updatedepartment";

			$data['departmentInfo'] = $this->Maintenance_model->getDeptInfo();

			$this->load->view('Suview', $data);
		}
	}


	public function createHoliday(){
			$this->form_validation->set_rules('holidayName', 'Holiday Name','required');
			$this->form_validation->set_rules('holidayDate', 'holidayDate','required');
			$this->form_validation->set_rules('holidayType', 'HolidayType','required');

			if($this->form_validation->run() == FALSE){
				$data = array(

					'error' => validation_errors(),

					);

				$data['cHolidayForm']="hr/createholiday";
				$this->load->view('Suview', $data);

			}
			else{

				$this->Maintenance_model->insert_holiday();
				redirect('maintenance');
			}
	}

	public function editHoliday(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$result = $this->Maintenance_model->edit_holiday();
			if($result == "Success" || $result == "Duplicate"){
				echo "<script> alert('Holiday details updated'); window.location.href = 'index'</script>";
			}else if($result == "Fail"){
				echo "<script> alert('System Error. Contact Administrator'); window.location.href = 'index'</script>";
			}

		}else{
			$data['editHolidayForm'] = "hr/updateholiday";

			$data['holidayInfo'] = $this->Maintenance_model->getHolidayInfo();

			$this->load->view('Suview', $data);
		}
	}

	public function createDeduction(){
			$this->form_validation->set_rules('deductionName', 'Deduction Name','required');

			if($this->form_validation->run() == FALSE){
				$data = array(

					'error' => validation_errors(),

					);

				$data['cDeductionForm']="hr/creatededuction";
				$this->load->view('Suview', $data);

			}
			else{

				$this->Maintenance_model->insert_deduction();
				redirect('maintenance');
			}
	}

	public function editDeduction(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$result = $this->Maintenance_model->edit_deduction();
			if($result == "Success" || $result == "Duplicate"){
				echo "<script> alert('Deduction Type details updated'); window.location.href = 'index'</script>";
			}else if($result == "Fail"){
				echo "<script> alert('System Error. Contact Administrator'); window.location.href = 'index'</script>";
			}

		}else{
			$data['editDeductionForm'] = "hr/updatededuction";

			$data['deductionInfo'] = $this->Maintenance_model->getDeductionInfo();

			$this->load->view('Suview', $data);
		}
	}
}

?>