<?php
	$attributes=array('id'=>'deduction_create', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-2');
	$labels=array('Full Name', 'Deduction Name', 'Amount', 'Interest', 'Months to Pay');
	$dName=array('fName', 'dName', 'amt', 'int', 'mtp');
	$dType=array('text', 'text', 'number', 'text', 'number');
?>


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
		<form class="form-horizontal" action="" method="POST">
		<div class="form-group">
			<div class="col-md-10">
				<label for="fName" class="control-label col-md-2">Full Name</label><input type="text" name="fName" class="form-control text-box single-line"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-10">
			</div>
		</div>
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
$('#fName').keyup(function(){
	if($('#fName').val().length>3){
		$.ajax
		({
			type: "POST",
			url: "Deduction/get_employee",
			cache: false,
			data: 'search='+$('#fName').val(),
			success= function(r){

			}
		});
	}
})
</script>