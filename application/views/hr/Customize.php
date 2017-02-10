<?php
	$attributes=array('id'=>'create_leave_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-2');
	$labels=array('Company Name', 'Abbreviation', 'Description','Address', 'Contact Number','Time Basis','Start Time','End Time','Color Theme','Company Logo');
	$dName=array('name', 'abbre', 'desc','address','contactNo','timeBasis','start_time', 'end_time', 'color_theme', 'logo');
	$dType=array('text','text','text','text','text','radio','text','text','color','image');
	
	$id = 1;
	$cForm=array(
		$cinfo->row(1)->name,
		$cinfo->row(2)->abbre,
		$cinfo->row(3)->description,
		$cinfo->row(4)->address,
		$cinfo->row(5)->contactNo,
		'',
		$cinfo->row(6)->startTime,
		$cinfo->row(7)->endTime,
		$cinfo->row(8)->colorTheme,
		$cinfo->row(9)->logo
		);
?>

<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">System Settings</a></li>	
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<h4>Customization of System</h4>
			<hr />
		</div>
		
		<?php echo form_open_multipart("main/customize", $attributes); ?>

		<?php foreach($labels as $key => $label){
			switch($dType[$key]){
				case 'image':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-10">
				<input id="src" type="file" name="logo" />
				<br />
				<img src="<?php echo $cForm[$key]; ?>" height="100" width="100" id="target" />
				<br /><br />
			<?php
				if(isSet($pictureError)){
					echo $pictureError;
				}
			?>
			</div>
		</div>
		<?php
				break;
				case 'radio':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-10">
				<input type='radio' name=<?php echo $dName[$key]; ?> id="flexi" value='Flexible'>Flexible Time
	  			<input type='radio' name=<?php echo $dName[$key];  ?> id="regular" value='Regular' checked> Regular Time
			</div>
			<br />
			<div class="col-md-10">
				<select name="sRange" id="sRange">
					<option value="07:00:00">07:00</option>
					<option value="08:00:00">08:00</option>
					<option value="09:00:00">09:00</option>
				</select>
				<select name="eRange" id="eRange">
					<option value="08:00:00">08:00</option>
					<option value="09:00:00">09:00</option>
					<option value="11:00:00">11:00</option>
				</select>
			</div>
		</div>
		<?php
				break;
				default:
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-10">
				<?php
					if($dName[$key]=='end_time'){
						echo form_input(array(
						'class' => 'form-control text-box single-line',
						'name' => $dName[$key],
						'id' => $dName[$key],
						'placeholder' => $label,
						'type' => $dType[$key],	
						'value' => $cForm[$key],
						'readonly' => true
						));
					}
					else{
						echo form_input(array(
						'class' => 'form-control text-box single-line',
						'name' => $dName[$key],
						'id' => $dName[$key],
						'placeholder' => $label,
						'type' => $dType[$key],	
						'value' => $cForm[$key]
						));
					}
					
					echo form_error($dName[$key], '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
				?>
			</div>
		</div>
			<?php
				}
			}
			?>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<?php
				echo form_submit(array(
					'class' =>'btn btn-primary',
					'name' =>'submit',
					'value' => 'Save Changes'
					));
				?>
			</div>
		</div>
	</div>
</div>
<div class="Footer">
	<div class="pull-right">
		<p>&copy; Copyright 2017 All Rights Reserved.</p>
	</div>
</div>
<script type="text/javascript">
if ($("#regular").prop("checked", true)) {
            $("#start_time").show();
            $('label[for="start_time"]').show();
            $("#end_time").show();
            $('label[for="end_time"]').show();
            $("#sRange").hide();
            $("#eRange").hide();

}

$('input:radio[name="timeBasis"]').change(
    function(){
        if (this.checked && this.value == 'Flexible') {
            $("#start_time").hide();
            $('label[for="start_time"]').hide();
            $("#end_time").hide();
            $('label[for="end_time"]').hide();
            $("#sRange").show();
            $("#eRange").show();
        }
        else if (this.checked && this.value == 'Regular') {
            $("#start_time").show();
            $('label[for="start_time"]').show();
            $("#end_time").show();
            $('label[for="end_time"]').show();
            $("#sRange").hide();
            $("#eRange").hide();

        }
    });
$('#contactNo').mask("999-9999", {placeholder:" "});
$('#start_time').mask("99:99", {completed: function(){
	var sTime = $('#start_time').val();

	var eTimeAdd = new Date(0,0,0,sTime.substr(0,2),sTime.substr(3,2));

	eTimeAdd.setHours(eTimeAdd.getHours() + 9);

	if (eTimeAdd.getMinutes() > 10){
		mins = eTimeAdd.getMinutes();
	} else {
		mins = "0" + eTimeAdd.getMinutes();
	}

	var eTime = (eTimeAdd.getHours() +":"+mins).toString();

	$('#end_time').val(eTime);
}});

function showImage(src,target) {
  var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };
  src.addEventListener("change",function() {
    // fill fr with image data    
    fr.readAsDataURL(src.files[0]);
  });
}

var src = document.getElementById("src");
var target = document.getElementById("target");
showImage(src,target);

</script>