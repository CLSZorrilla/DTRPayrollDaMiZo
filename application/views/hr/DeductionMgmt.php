<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">Deduction Management</a></li>	
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<h4>Apply Deductions</h4>
			<hr />
		</div>
		<?php
			if(isSet($formsubmit)){
				echo "<div class='alert alert-success alert-dismissable fade in'>Form Submitted<a href='#'' id='ekis' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
			}
		?>
		<form class="form-horizontal" action="submit_deduction" method="POST">
		<div class="form-group">
			<div class="col-md-10">
				<label for="fName" class="control-label col-md-2">Full Name:</label>
				<input type="text"   name="fName" placeholder="Full Name" id="fName" value="<?php echo set_value('fName'); ?>" class="form-control text-box single-line"/>
			</div>
		</div>
		<?php
		echo form_error("fName", '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="form-group">
			<div class="col-md-10">
				<label for="dName" class="control-label col-md-2">Deduction Name:</label><input type="text" name="dName" placeholder="Deduction Name" id="dName" value="<?php echo set_value('dName'); ?>" class="form-control text-box single-line"/>
			</div>
		</div>
		<?php
		echo form_error("dName", '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="form-group">
			<div class="col-md-10">
				<label for="amt" class="control-label col-md-2">Amount:</label><input type="number" name="amt" placeholder="Amount" id="amt" value="<?php echo set_value('amt'); ?>" class="form-control text-box single-line"/>
			</div>
		</div>
		<?php
		echo form_error("amt", '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="form-group">
			<div class="col-md-10">
				<label for="int" class="control-label col-md-2">Interest:</label><input type="text" name="int"  placeholder="Interest" id="interest" value="<?php echo set_value('int'); ?>" class="form-control text-box single-line"/>
			</div>
		</div>
		<?php
		echo form_error("int", '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="form-group">
			<div class="col-md-10">
				<label for="mtp" class="control-label col-md-2">Months to pay:</label><input type="number" name="mtp" max="12" min="0" placeholder="Months to pay" id="mtp" value="<?php echo set_value('mtp'); ?>" class="form-control text-box single-line"/>
			</div>
		</div>
		<?php
		echo form_error("cairo_matrix_transform_point(matrix, dx, dy)", '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<?php
				echo form_submit(array(
					'class' =>'btn btn-primary',
					'name' =>'submit',
					'value' => 'Register'
					));
				?>
			</div>
		</div>
		</form>
	</div>
</div>
<div class="Footer">
	<div class="pull-right">
		<p>&copy; Copyright 2017 All Rights Reserved.</p>
	</div>
</div>
<script type="text/javascript">
	$("#interest").mask("99.99%");

	
	$('#fName').keyup(function(){
		if($('#fName').val().length=3){
			$.ajax({
				url: "get_employee?search="+$('#fName').val(),
				success: function(r){
					var options = {

						url: "get_employee",

						getValue: "name"
					};
					$("#fName").easyAutocomplete(options);

					
				},
				error: function(r){
					alert("Fail");
				}
			});
		}
	});
</script>