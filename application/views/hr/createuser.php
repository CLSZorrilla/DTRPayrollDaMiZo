<?php
	include "/../partials/nav_customize.php";

	$attributes=array('id'=>'create_user_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-5');
	$labels=array('Employee ID:','Profile Picture:','Password:','Confirm Password:','Position:','Department:','First Name:','Last Name:', 'Middle Name:','User Type:','Email Address:','Address:', 'Marital Status:', 'Dependents', 'Birthday:', 'Contact No.:', 'Sex:','Date Hired:','GSISNo:', 'PhilHealthNo:', 'TIN:', 'Vacation Leave:', 'Sick Leave');
	$dName=array('empID', 'pPicture','pword','cpword','positionCode','deptCode', 'fName','lName', 'mName','uType','emailAdd','address', 'maritalStatus', 'dependents', 'birthDate', 'cNo', 'sex','dateHired', 'gsisNo', 'phNo', 'tin', 'vLeave', 'sLeave');
	$dType=array('text', 'image','password','password','dropdown','dropdown', 'text', 'text', 'text','dropdown','email','text', 'dropdown', 'number', 'date', 'text', 'radio','date', 'text', 'text', 'text', 'text', 'text');
	if(!empty($id)){
		$EForm=array($empID,'', $password, $password,$posName, $deptCode, $fname, $lName, $mname, $uType, $emailAddress, $address, $maritalStatus,$dependents ,$birthDate, $contactNo, $sex, $status, $dateHired, $GSISNo, $PhilHealthNo, $TIN, $vLeave, $sLeave);
	}
?>
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
			<li><a href="#">Maintenance</a></li>
			<li class="active"><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage User</a></li>
		</ol>
		<div class="row Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>MANAGE USER</b></h4>
			<hr />
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading" style="color:<?php echo $company['colorTheme']; ?>;">
			<span class="glyphicon glyphicon-plus-sign"></span><b> Create User</b>

		</div>

		<?php echo form_open_multipart("employee/createUserAcct", $attributes); ?>

		<div class="panel-body">
		<?php foreach($labels as $key => $label){
			switch($dType[$key]){
				case 'dropdown':
		?>
		<div class="form-group col-lg-6">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-7">
			<?php
				if($dName[$key]=='positionCode'){?>
					<select name="positions" class="form-control">
			                <?php
			                foreach($positions as $pos){
			                	echo '<option value='.$pos->positionCode.'>'.$pos->positionName.'</option>';
			                }

			                ?>
			        </select>
				<?php
				}
				else if ($dName[$key]=='deptCode'){?>
					<select name="department" class="form-control">
			                <?php
			                foreach($department as $dept){
			                	echo '<option value='.$dept->deptCode.'>'.$dept->deptName.'</option>';
			                }
			                ?>
			        </select>
				<?php
				}
				else if ($dName[$key]=='maritalStatus'){
					$options = array(
						'Married'   => 'Married',
						'Widowed'   => 'Widowed',
						'Divorced'  => 'Divorced',
						'Single'  	=> 'Single'
					);

					echo form_dropdown('maritalStatus', $options, 'Married','class="form-control"');
				}
				else if ($dName[$key]=='uType') {?>
					<?php 
					
					$options = array(
						'Employee' => 'Employee',
						'HR'   => 'Human Relations',
						'Payroll Clerk'   => 'Payroll Clerk'
						);

					echo form_dropdown('userType', $options, 'Employee','class="form-control"');
						
				}
					?>
			</div>
		</div>
		<?php
				break;
				case 'radio':
		?>
		<div class="form-group col-lg-6" style="height: 34px;">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-7">
				<?php
					if($dName[$key] == 'sex'){?>
							<input type='radio' name=<?php echo $dName[$key]; ?> value='Male' checked>Male
	  						<input type='radio' name=<?php echo $dName[$key];  ?> value='Female'> Female
					<?php } ?>
			</div>
		</div>
		<?php
				break;
				case 'image':
		?>
		<div class="form-group col-lg-6" style="height: 34px;">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-7">
				<?php
				echo form_upload('pic','Profile Picture');
				?>
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
		<div class="form-group col-lg-6">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-7">
				<?php
					
						if($dType[$key] == 'number'){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'max' => '4'
							));
						}
						else if($dName[$key] == "fName"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "f_name_status"></span> <?php
						}
						else if($dName[$key] == "mName"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "m_name_status"></span> <?php
						}
						else if($dName[$key] == "lName"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "l_name_status"></span> <?php
						}
						else if($dName[$key] == "pword"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "pword_status"></span> <?php
						}
						else if($dName[$key] == "cpword"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "cpword_status"></span> <?php
						}
						else if($dName[$key] == "vLeave"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "vLeave_status"></span> <?php
						}
						else if($dName[$key] == "sLeave"){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
							));
							?> <span class= "sLeave_status"></span> <?php
						}
						else{
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'value' => set_value($dName[$key]),
								'required' => true
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
		</div>
		<div class="panel-footer">
			<div style="overflow: hidden;">
				<?php
					echo form_submit(array(
						'class' =>'btn btn-default pull-right',
						'type' =>'reset',
						'value' => 'Reset',
						'style' => 'width:100px;margin:5px;'
						));
					echo form_submit(array(
						'class' =>'btn btnEnter pull-right',
						'name' =>'submit',
						'value' => 'Register',
						'id' => 'submit',
						'style' => 'width:100px;margin:5px;'
						));

				?>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">

$('#empID').mask("99-999-999");
$('#cNo').mask("0999-999-9999", {placeholder:" "});
$('#gsisNo').mask("999999999-9999");
$('#phNo').mask("999999999-9999");
$('#tin').mask("999999999-9999");

$("#pword").keyup(function(){
	var pword = document.getElementById("pword").value;

	if(pword.length == 0){
		$(".pword_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("submit").disabled = true;
	}
	else if(pword.length < 8){
		$(".pword_status").html('<i style="color: red;">Minimum of 8 characters</i>');
		document.getElementById("submit").disabled = true;
	}
	else if((jQuery.trim( pword )).length==0){
		$(".pword_status").html('<i style="color: red;">You only entered space/s</i>');
		document.getElementById("submit").disabled = true;
	}
	else{
		$(".pword_status").html('');
		document.getElementById("submit").disabled = false;

	}
});

$("#cpword").keyup(function(){
	var cpword = document.getElementById("cpword").value;
	var pword = document.getElementById("pword").value;

	if(cpword.length == 0){
		$(".cpword_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("submit").disabled = true;
	}
	else if(cpword.length < 8){
		$(".cpword_status").html('<i style="color: red;">Minimum of 8 characters</i>');
		document.getElementById("submit").disabled = true;
	}
	else if((jQuery.trim( cpword )).length==0){
		$(".cpword_status").html('<i style="color: red;">You only entered space/s</i>');
		document.getElementById("submit").disabled = true;
	}
	else if(cpword != pword){
		$(".cpword_status").html('<i style="color: red;">Confirm password doesnt match password </i>');
		document.getElementById("submit").disabled = true;
	}
	else{
		$(".cpword_status").html('');
		document.getElementById("submit").disabled = false;
	}
});

$("#fName").keyup(function(){
	var first_name = document.getElementById("fName").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(first_name)) {
        $(".f_name_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("submit").disabled = true;
    }
    else{
    	if(first_name.length == 0){
    		$(".f_name_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else if(first_name.length == 1){
    		$(".f_name_status").html('<i style="color: red;">Minimum of 2 characters</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else if((jQuery.trim( first_name )).length==0){
    		$(".f_name_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else{
    		$(".f_name_status").html('');
			document.getElementById("submit").disabled = false;

    	}
    }
});

$("#lName").keyup(function(){
	var last_name = document.getElementById("lName").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(last_name)) {
        $(".l_name_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("submit").disabled = true;
    }
    else{
    	if(last_name.length == 0){
    		$(".l_name_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else if(last_name.length == 1){
    		$(".l_name_status").html('<i style="color: red;">Minimum of 2 characters</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else if((jQuery.trim( last_name )).length==0){
    		$(".l_name_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else{
    		$(".l_name_status").html('');
			document.getElementById("submit").disabled = false;

    	}
    }
});

$("#mName").keyup(function(){
	var middle_name = document.getElementById("mName").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(middle_name)) {
        $(".m_name_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("submit").disabled = true;
    }
    else{
    	if(middle_name.length == 0){
    		$(".m_name_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else if(middle_name.length == 1){
    		$(".m_name_status").html('<i style="color: red;">Minimum of 2 characters</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else if((jQuery.trim( middle_name )).length==0){
    		$(".m_name_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("submit").disabled = true;
    	}
    	else{
    		$(".m_name_status").html('');
			document.getElementById("submit").disabled = false;

    	}
    }
});

$("#vLeave").keyup(function(){
	var vacationLeave = document.getElementById("vLeave").value;
	var letterPattern = new RegExp(/[A-Za-z]/);
	var formatPattern = new RegExp(/^.[0-5]{1,2}[0-9]{1,2}$/);

	if(letterPattern.test(vacationLeave)){
		$(".vLeave_status").html('<i style="color: red;">Characters not allowed</i>');
		document.getElementById("submit").disabled = true;
	}
	else{
		if(formatPattern.test(vacationLeave)){
			$(".vLeave_status").html('<i style="color: red;">Invalid Format. i.e 1.25</i>');
			document.getElementById("submit").disabled = true;
		}
		else if(vacationLeave.length == 0){
			$(".vLeave_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("submit").disabled = true;
		}
		else if((jQuery.trim( vacationLeave )).length==0){
    		$(".vLeave_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("submit").disabled = true;
    	}
		else{
			$(".vLeave_status").html('');
    		document.getElementById("submit").disabled = false;
		}
	}
});

$("#sLeave").keyup(function(){
	var sickLeave = document.getElementById("sLeave").value;
	var letterPattern = new RegExp(/[A-Za-z]/);
	var formatPattern = new RegExp(/^.[0-5]{1,2}[0-9]{1,2}$/);

	if(letterPattern.test(sickLeave)){
		$(".sLeave_status").html('<i style="color: red;">Characters not allowed</i>');
		document.getElementById("submit").disabled = true;
	}
	else{
		if(formatPattern.test(sickLeave)){
			$(".sLeave_status").html('<i style="color: red;">Invalid Format. i.e 1.25</i>');
			document.getElementById("submit").disabled = true;
		}
		else if(sickLeave.length == 0){
			$(".sLeave_status").html('<i style="color: red;">This field is required</i>');
    		document.getElementById("submit").disabled = true;
		}
		else if((jQuery.trim( sickLeave )).length==0){
    		$(".sLeave_status").html('<i style="color: red;">You only entered space/s</i>');
    		document.getElementById("submit").disabled = true;
    	}
		else{
			$(".sLeave_status").html('');
    		document.getElementById("submit").disabled = false;
		}
	}
});
</script>