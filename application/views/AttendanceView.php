	<div>
	</div>
  <?php
    foreach($result as $res){
      echo "<input type='hidden' id='calendarData' value='".$res."' />";
    }
  ?>
	<div class="BodyContainer">
		<div class="BodyContent">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>main/home_view">Home</a></li>
        <li class="active">Attendance</li>
      </ol>
			<div class="row" id="Title">
				<h4>ATTENDANCE</h4>
				<hr>

				<div id="calendar"></div>
        <input type="hidden" name="country" value="Norway">
			</div>
		</div>
	</div>
</body>
<script>
  $(document).ready(function(){
  var cData = $('#calendarData').val();

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
      events: $.parseJSON(cData)
    });
  });
});
</script>