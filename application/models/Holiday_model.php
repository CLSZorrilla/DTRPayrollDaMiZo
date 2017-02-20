<?php

class Holiday_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_holiday(){
		$this->db->select('holiday.holidayId, holiday.holidayName, holiday.holidayDate, holiday.holidayType');
		$this->db->from('holiday');

		$query = $this->db->get();

		return $query;
	}

}

?>