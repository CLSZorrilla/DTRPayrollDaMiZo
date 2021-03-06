<?php


class Leave extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Leave_model');	
	}

	public function index(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$config = array(
				array(
					'field' => 'empID',
					'label' => 'Employee ID',
					'rules' => 'required|exact_length[10]'
					),
				array(
					'field' => 'fName',
					'label' => 'Full Name',
					'rules' => 'required'
					),
				array(
					'field' => 'startDate',
					'label' => 'Leave Starting Date',
					'rules' => 'required'
					),
				array(
					'field' => 'endDate',
					'label' => 'Leave End Date',
					'rules' => 'required'
					),
				array(
					'field' => 'appDate',
					'label' => 'Approval Date',
					'rules' => 'required'
					)
				);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run() == FALSE){
				$data = array(

					'error' => validation_errors(),

					);

				$data['leaveType'] = $this->Leave_model->load_leave();
				$data['leaveReq'] = "hr/Leaveform";

				$this->load->view('Suview', $data);

			}
			else{
				$leaveSpanString = 	date_diff(date_create($this->input->post('startDate', TRUE)),date_create($this->input->post('endDate', TRUE)));

				$leaveSpan = $leaveSpanString->format('%a');
				$leaveSpan ++;

				if($this->input->post('leaveType') == '1' && ($this->input->post('vl') == '0' || $this->input->post('vl') < $leaveSpan)){
					echo "<script type='text/javascript'>alert('You have no vacation leave credits left');</script>";

					$data['leaveType'] = $this->Leave_model->load_leave();
					$data['leaveReq'] = "hr/Leaveform";

					$this->load->view('Suview', $data);
				}
				else if($this->input->post('leaveType') == '2' && ($this->input->post('sl') == '0' || $this->input->post('sl') < $leaveSpan)){

					echo "<script type='text/javascript'>alert('You have no sick leave credits left');</script>";

					$data['leaveType'] = $this->Leave_model->load_leave();
					$data['leaveReq'] = "hr/Leaveform";

					$this->load->view('Suview', $data);
				}
				else{
					$lcu = $this->Leave_model->leaveCreditsUpdate();

					if($lcu == "Duplicate"){
						$this->session->set_flashdata('leaveDupli', 'Cannot continue. the user already have an attendance on your selected date');

						redirect('leave');
					}else{
						redirect('employee/ManageUserAcct');
					}
				}
			}
		}
		else{
			$data['leaveType'] = $this->Leave_model->load_leave();
			$data['leaveReq'] = "hr/Leaveform";

			$this->load->view('Suview', $data);
		}
	}

	public function get_leave_form_info(){
		$this->Leave_model->get_leaveform_info($this->input->get('empID'));
	}
}



?>