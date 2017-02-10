<?php

class Customize_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function update_company($img){
		if($this->input->post('timeBasis',TRUE) == 'Flexible'){
			$data=array(
				'name'=>$this->input->post('name', TRUE),
				'abbre'=>$this->input->post('abbre',TRUE),
				'description'=>$this->input->post('desc',TRUE),
				'address'=>$this->input->post('address',TRUE),
				'contactNo'=>$this->input->post('contactNo',TRUE),
				'startRange'=>$this->input->post('sRange',TRUE),
				'endRange'=>$this->input->post('eRange',TRUE),
				'colorTheme'=>$this->input->post('color_theme',TRUE),
				'timeBasis' => $this->input->post('timeBasis',TRUE),
				'logo'=>$img,
			);
		}
		else if($this->input->post('timeBasis',TRUE) == 'Regular'){
			$data=array(
				'name'=>$this->input->post('name', TRUE),
				'abbre'=>$this->input->post('abbre',TRUE),
				'description'=>$this->input->post('desc',TRUE),
				'address'=>$this->input->post('address',TRUE),
				'contactNo'=>$this->input->post('contactNo',TRUE),
				'startTime'=>$this->input->post('start_time',TRUE),
				'endTime'=>$this->input->post('end_time',TRUE),
				'colorTheme'=>$this->input->post('color_theme',TRUE),
				'timeBasis' => $this->input->post('timeBasis',TRUE),
				'logo'=>$img,
			);
		}
		
		$query = $this->db->update('company_profile', $data);

		return $query;
	}
	
	public function get_company(){
		$query = $this->db->query('SELECT * FROM company_profile WHERE id = 1');

		return $query;
	}
	
	public function get_logo(){
		$logo = $this->db->select('logo')
                  ->get_where('company_profile', array('id' => 1))
                  ->row()
                  ->logo;
		return $logo;
	}
}
?>