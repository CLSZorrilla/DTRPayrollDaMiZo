<?php include "/../partials/nav_customize.php"; ?>
<style type="text/css">
  input.btnEnter{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  input.btnEnter:hover{
      background-color: <?php echo $company['colorTheme']; ?>;
      color: white;
  }
</style>
<div class="BodyContainer">
	<div class="BodyContent">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#"s>Deduction Management</a></li>	
		</ol>
      	<div class="row" id="Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>DEDUCTION MANAGEMENT</b></h4>
			<hr />
		</div>

		<?php
			if(isSet($formsubmit)){
				echo "<div class='alert alert-success alert-dismissable fade in'>Form Submitted<a href='#'' id='ekis' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
			}
		?>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading">Applying Deductions</div>
		<form class="form-horizontal" action="submit_deduction" method="POST">
		<div class="panel-body">
		<div class="form-group">
            <div>
				<label for="fName" class="control-label col-md-2">Full Name:</label>
			</div>
            <div class="col-md-4">
				<input type="text"   name="fName" placeholder="Full Name" id="fName" value="<?php echo set_value('fName'); ?>" class="form-control text-box single-line"/>
			</div>
            <div class="col-md-6">
			<?php
			echo form_error("fName", '<div class="alert alert-danger alert-dismissable fade in" style="width:330px;height:34px;margin-bottom:0px;padding-top:5px;"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			</div>
		</div>
		<div class="form-group">
            <div>
				<label for="dName" class="control-label col-md-2">Deduction Name:</label>
			</div>
            <div class="col-md-4">
				<select id="deductionName" class="form-control" name="dName">
					<?php
						print_r($deductName);
						foreach($deductName as $deductionName){
							echo "
								<option value=".$deductionName->deductionName.">".$deductionName->deductionName."</option>";
						}
					?>
					<option>Others</option>
				</select>
				<input type="text" id="otherDeduction" name="otherDeduction" class="form-control" style="margin-top:10px;" readonly/>
			</div>
            <div class="col-md-6">
			<?php
			echo form_error("dName", '<div class="alert alert-danger alert-dismissable fade in" style="width:330px;height:34px;margin-bottom:0px;padding-top:5px;"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			</div>
		</div>
		<div class="form-group">
            <div>
				<label for="amt" class="control-label col-md-2">Amount:</label>
			</div>
            <div class="col-md-4">
				<input type="number" name="amt" placeholder="Amount" id="amt" value="<?php echo set_value('amt'); ?>" class="form-control text-box single-line"/>
			</div>
            <div class="col-md-6">
			<?php
			echo form_error("amt", '<div class="alert alert-danger alert-dismissable fade in" style="width:330px;height:34px;margin-bottom:0px;padding-top:5px;"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			</div>
		</div>
		<div class="form-group">
            <div>
				<label for="mtp" class="control-label col-md-2">Months to pay:</label>
			</div>
            <div class="col-md-4">
				<input type="number" name="mtp" min="0" placeholder="Months to pay" id="mtp" value="<?php echo set_value('mtp'); ?>" class="form-control text-box single-line"/>
			</div>
            <div class="col-md-6">
			<?php
			echo form_error("mtp", '<div class="alert alert-danger alert-dismissable fade in" style="width:330px;height:34px;margin-bottom:0px;padding-top:5px;"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-2" style="padding: 10px 0px 5px 0px;">
				<?php
					echo form_submit(array(
						'class' =>'btn btnReset pull-right',
						'type' =>'reset',
						'value' => 'Reset',
						'style' => 'width:100px;margin:5px;'
						));
					echo form_submit(array(
						'class' =>'btn btnEnter pull-right',
						'name' =>'submit',
						'value' => 'Register',
						'style' => 'width:100px;margin:5px;'
						));
				?>
			</div>
		</div>
		</div>
		</form>
		</div>
</div>
</div>
<script type="text/javascript">
	$("#interest").mask("99.99%");
	$(document).ready(function(){
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

	$('#deductionName').change(function(){
		if($( "#deductionName option:selected" ).text() == "Others"){
			$("#otherDeduction").prop("readonly", false);
		}
		else{
			$("#otherDeduction").prop("readonly", true);
			$('#otherDeduction').val("");
		}
	});
</script>