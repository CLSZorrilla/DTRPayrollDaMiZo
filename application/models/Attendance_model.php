<?php


class Attendance_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_attendance($eid){
		$getAtt = $this->db->query("SELECT logdate, timeIn, amOut, pmIn, timeOut FROM `timelog` WHERE empID LIKE '".$eid."'");
		$getHolidays = $this->db->query("SELECT holidayName, holidayDate FROM holiday");

		$tbasis = $this->db->query("SELECT timeBasis, startRange,endRange, startTime, endTime FROM company_profile WHERE id = 1");

		$sRange = $tbasis->row()->startRange;
		$eRange = $tbasis->row()->endRange;
		$sTime = $tbasis->row()->startTime;
		$eTime = $tbasis->row()->endTime;
		$timeBasis = $tbasis->row()->timeBasis;

		$timeIn = array();
		$amOut = array();
		$pmIn = array();
		$timeOut = array();
		$date = array();
		$holiName = array();
		$holiDate = array();

		foreach ($getAtt->result() as $time) {
			array_push($timeIn, $time->timeIn);
			array_push($amOut, $time->amOut);
			array_push($pmIn, $time->pmIn);
			array_push($timeOut, $time->timeOut);
			array_push($date, $time->logdate);
		}

		foreach($getHolidays->result() as $holi){
			array_push($holiName,$holi->holidayName);
			array_push($holiDate,(substr($holi->holidayDate,6,4)."-".substr($holi->holidayDate,0,2)."-".substr($holi->holidayDate,3,2)));
		}

		$tIn = array();
		foreach($timeIn as $key => $attendance){
			if($timeBasis == "Flexible"){
				if($timeIn[$key] > $eRange){
					array_push($tIn, array('title' => 'Time in','start' => $date[$key]."T".$timeIn[$key], 'allDay' => false, 'color' => 'red'));
				}
				else{
					array_push($tIn, array('title' => 'Time in','start' => $date[$key]."T".$timeIn[$key], 'allDay' => false));
				}
			}else if($timeBasis == "Regular"){
				if($timeIn[$key] > $sTime){
					array_push($tIn, array('title' => 'Time in','start' => $date[$key]."T".$timeIn[$key], 'allDay' => false, 'color' => 'red'));
				}
				else{
					array_push($tIn, array('title' => 'Time in','start' => $date[$key]."T".$timeIn[$key], 'allDay' => false));
				}
			}
			
			array_push($tIn, array('title' => 'am Out','start' => $date[$key]."T".$amOut[$key], 'allDay' => false ));

			if($pmIn[$key] > '13:00:00'){
				array_push($tIn, array('title' => 'pm In','start' => $date[$key]."T".$pmIn[$key], 'allDay' => false, 'color' => 'red'));
			}
			else{
				array_push($tIn, array('title' => 'pm In','start' => $date[$key]."T".$pmIn[$key], 'allDay' => false ));
			}
			
			array_push($tIn, array('title' => 'time Out','start' => $date[$key]."T".$timeOut[$key], 'allDay' => false ));
		}

		foreach($holiName as $key => $holyDays){
			array_push($tIn, array('title' => $holiName[$key],'start' => $holiDate[$key], 'color' => 'green', 'allDay' => false));
		}

		$timeInT = json_encode($tIn);

		return array($timeInT);
		
		//return print_r($holiName[0]);
	}
}




?>