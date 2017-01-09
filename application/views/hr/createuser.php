<?php
	$attributes=array('id'=>'create_user_form', 'class'=>'form_horizontal');
	$lAttrib=array('class' => 'control-label col-md-2');
	$labels=array('Employee ID','Password','Confirm Password','Position','Department','Last Name','First Name', 'Middle Name','Profile Picture','Address', 'Marital Status', 'Email Address', 'Birthday', 'Contact No.', 'Sex', 'Employee Type' ,'Date Hired','GSISNo', 'PhilHealthNo', 'TIN', 'Leave Credits');
	$dName=array('empID','pword','cpword','positionCode','deptCode','lName', 'fName', 'mName', 'pPicture','address', 'maritalStatus', 'emailAdd', 'birthDate', 'cNo', 'sex', 'type','dateHired', 'gsisNo', 'phNo', 'tin', 'leaveCredits');
	$dType=array('text','password','password','dropdown','dropdown', 'text', 'text', 'text', 'image','text', 'dropdown', 'email', 'date', 'text', 'radio', 'radio' ,'date', 'text', 'text', 'text', 'number');
?>

<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">Maintenance</a></li>
		<li><a href="manageUserAcct">Manage Users</a></li>
		<li class="active">Create Users</li>
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<h4>CREATE USERS</h4>
			<hr />
		</div>
		

		<?php echo form_open_multipart('employee/createUserAcct', $attributes); ?>

		<?php foreach($labels as $key => $label){
			switch($dType[$key]){
				case 'dropdown':
		?>
		<div class="form-group">
			<?php echo form_label($label); ?>

			<?php
				if($dName[$key]=='positionCode'){
					$options = array(
						'1'         => 'Guild Master',
						'2'      => 'Guild Moderator',
						'3'         => 'Guild Member'
					);

					echo form_dropdown('positions', $options,'Guild Master');
				}
				else if ($dName[$key]=='deptCode'){
					$options = array(
						'1'         => 'Catacombs',
						'2'           => 'Anguish',
						'3'         => 'Aminus'
					);

					echo form_dropdown('department', $options, 'Catacombs');
				}
				else if ($dName[$key]=='maritalStatus'){
					$options = array(
						'married'   => 'Married',
						'widowed'   => 'Widowed',
						'separated' => 'Separated',
						'divorced'  => 'Divorced',
						'single'  	=> 'Single'
					);

					echo form_dropdown('maritalStatus', $options, 'married');
				}
				?>
			
		</div>
		<?php
				break;
				case 'radio':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>

				<?php
					if($dName[$key] == 'sex'){
				?>
					<input type="radio" name=<?php echo $dName[$key];?> value="Male" checked>Male
  					<input type="radio" name=<?php echo $dName[$key]; ?> value="Female"> Female
				<?php
					}
					else if($dName[$key] == 'type'){
				?>
					<input type="radio" name=<?php echo $dName[$key];?> value="Regular" checked>Regular
  					<input type="radio" name=<?php echo $dName[$key]; ?> value="Parttime">Parttime
				<?php
					}
				?>
		</div>
		<?php
				break;
				case 'image':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>

			<?php
				echo form_upload('pic','Profile Picture');
			?>
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
					'value' => set_value($dName[$key])
					));

					echo form_error($dName[$key], '<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
				?>
			</div>
			<div class = "m-error1">
	            <div id = "m-error"></div>
	        </div>
		</div>
			<?php
				}
			}
			?>
		<div class="form-group">
			<div class="">
				<?php
				echo form_submit(array(
					'class' =>'btn btn-primary',
					'name' =>'submit',
					'value' => 'Register'
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

$('#empID').mask("99-999-999",{completed:function(){
	$.ajax({
	  type: "POST",
	  url: 'employee/check_if_exist',    
	  data: {$eid: $("#empID").val()},
	  success: function(res) {
	    if(res == TRUE){
	    	alert("EXISTING");
	    }
	  }
	});
}});
$('#cNo').mask("0999-999-9999", {placeholder:" "});
$('#gsisNo').mask("999999999-9999");
$('#phNo').mask("999999999-9999");
$('#tin').mask("999999999-9999");
</script>