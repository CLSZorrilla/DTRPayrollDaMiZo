<?php

class Customize_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function update_company($img){
		$data=array(
			'name'=>$this->input->post('name', TRUE),
			'description'=>$this->input->post('desc',TRUE),
			'address'=>$this->input->post('address',TRUE),
			'contactNo'=>$this->input->post('contactNo',TRUE),
			'startTime'=>$this->input->post('start_time',TRUE),
			'endTime'=>$this->input->post('end_time',TRUE),
			'colorTheme'=>$this->input->post('color_theme',TRUE),
			'logo'=>$img
		);
		
		$insert_data = $this->db->insert('company_profile', $data);

		return $insert_data;
	}
	
	public function get_company(){
		$this->db->select('id, name, description, address, contactNo, startTime, endTime, colorTheme, logo', FALSE);
		$this->db->from('company_profile');
		$query = $this->db->get();

		return $query;
	}
}
?>