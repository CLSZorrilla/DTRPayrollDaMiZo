<?php
	$attributes=array('id'=>'create_leave_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-2');
	$labels=array('Company Name','Description','Address', 'Contact Number','Start Time','End Time','Color Theme','Company Logo');
	$dName=array('name', 'desc' ,'address' ,'contactNo' ,'start_time','end_time','color_theme','logo');
	$dType=array('text','text','text','text','text','text','color','image');
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
				<input type="file" name="logo" />
			<?php
				if(isSet($pictureError)){
					echo $pictureError;
				}
			?>
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
					
					echo form_input(array(
						'class' => 'form-control text-box single-line',
						'name' => $dName[$key],
						'id' => $dName[$key],
						'placeholder' => $label,
						'type' => $dType[$key],	
					));
					
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
$('#contactNo').mask("999-9999", {placeholder:" "});
$('#start_time').mask("99:99");
$('#end_time').mask("99:99");
</script>