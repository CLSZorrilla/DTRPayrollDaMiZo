<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/header');?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style-attendance.css" />
</head>
<body>
	<?php $this->load->view('partials/nav');?>
	<div>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>main/home_view"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="active">Attendance</li>
		</ol>
	</div>
	<div class="BodyContainer">
		<div class="BodyContent">
			<div class="row Title">
				<h4>ATTENDANCE</h4>
				<hr>
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="Footer">
		<div class="pull-right">
			<p>&copy; Copyright 2016 All Rights Reserved.</p>
		</div>
	</div>
</body>
<script>
$.getScript('<?php echo base_url();?>assets/js/fullcalendar.min.js',function(){
  
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    events: [
      /*
      {
        title: 'January 12, 2016',
        start: new Date(y, m, d, 12),
        end: new Date(y, m, d-2, 24),
        allDay: false,
        url: 'http://google.com/'

        *Note:Walang allDay, Walang Oras*
      },
      */
      {
        title: 'January 9, 2016',
        start: new Date(2017, 0, 9, 7, 45),
        end: new Date(2017, 0, 9, 17, 30),
        allDay: false,
        url: 'http://google.com/'
      },
      {
        title: 'January 10, 2016',
        start: new Date(2017, 0, 10, 7, 30),
        end: new Date(2017, 0, 10, 17, 0),
        allDay: false
      },
      {
        title: 'January 11, 2016',
        start: new Date(2017, 0, 11, 7, 45),
        end: new Date(2017, 0, 11, 17, 15),
        allDay: false
      },
      {
        title: 'January 12, 2016',
        start: new Date(2017, 0, 12, 8, 0),
        end: new Date(2017, 0, 12, 17, 0),
        allDay: false
      },
      {
        title: 'January 13, 2016',
        start: new Date(2017, 0, 13, 16 , 15),
        end: new Date(2017, 0, 13, 16, 45),
        allDay: false
      }
    ]
  });
})
</script>
</html>