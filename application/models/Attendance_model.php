<?php


class Attendance_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_attendance($eid){
		$getAtt = $this->db->query("SELECT logdate, timeIn, amOut, pmIn, timeOut FROM `timelog` WHERE empID LIKE '".$eid."'");

		$timeIn = array();
		$amOut = array();
		$pmIn = array();
		$timeOut = array();
		$date = array();

		foreach ($getAtt->result() as $time) {
			array_push($timeIn, $time->timeIn);
			array_push($amOut, $time->amOut);
			array_push($pmIn, $time->pmIn);
			array_push($timeOut, $time->timeOut);
			array_push($date, $time->logdate);
		}

		$tIn = array();
		foreach($timeIn as $key => $attendance){
			array_push($tIn, array('title' => 'Time in','start' => $date[$key]."T".$timeIn[$key], 'allDay' => false));
			array_push($tIn, array('title' => 'am Out','start' => $date[$key]."T".$amOut[$key], 'allDay' => false ));
			array_push($tIn, array('title' => 'pm In','start' => $date[$key]."T".$pmIn[$key], 'allDay' => false ));
			array_push($tIn, array('title' => 'time Out','start' => $date[$key]."T".$timeOut[$key], 'allDay' => false ));
		}

		$timeInT = json_encode($tIn);

		return array($timeInT);
	}
}




?>