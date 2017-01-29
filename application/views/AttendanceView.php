	<div>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>main/home_view"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li class="active">Attendance</li>
		</ol>
	</div>
  <?php
    foreach($result as $res){
      echo "<input type='text' id='calendarData' value='".$res."' />";
    }

    //echo $result[0];
  ?>
	<div class="BodyContainer">
		<div class="BodyContent">
			<div class="row Title">
				<h4>ATTENDANCE</h4>
				<hr>

				<div id="calendar"></div>
        <input type="hidden" name="country" value="Norway">
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
  var cData = $('#calendarData').val();

  alert(cData);
  $.getScript('<?php echo base_url();?>assets/js/fullcalendar.min.js',function(){

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title'
      },
      editable: true,
      events: [{"title":"Time in","start":"2017-01-29T07:30","allDay":false},{"title":"am Out","start":"2017-01-29T12:30","allDay":false},{"title":"pm In","start":"2017-01-29T13:30","allDay":false},{"title":"time Out","start":"2017-01-29T16:30","allDay":false},{"title":"Time in","start":"2017-01-30T08:30","allDay":false},{"title":"am Out","start":"2017-01-30T12:00","allDay":false},{"title":"pm In","start":"2017-01-30T13:05","allDay":false},{"title":"time Out","start":"2017-01-30T17:00","allDay":false},{"title":"Time in","start":"2017-01-31T08:00","allDay":false},{"title":"am Out","start":"2017-01-31T12:30","allDay":false},{"title":"pm In","start":"2017-01-31T13:00","allDay":false},{"title":"time Out","start":"2017-01-31T17:30","allDay":false},
        {"title":"Time in","start":"2017-01-26T08:00","allDay":false},{"title":"am Out","start":"2017-01-26T12:30","allDay":false}]
    });
  })
</script>