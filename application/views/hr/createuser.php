<?php
	$attributes=array('id'=>'create_user_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-2');
	$labels=array('Employee ID:','Password:','Confirm Password:','User Type:','Position:','Department:','Last Name:','First Name:', 'Middle Name:','Profile Picture:','Address:', 'Marital Status:', 'Dependents' ,'Email Address:', 'Birthday:', 'Contact No.:', 'Sex:', 'Employee Type:' ,'Date Hired:','GSISNo:', 'PhilHealthNo:', 'TIN:', 'Vacation Leave:', 'Sick Leave');
	$dName=array('empID','pword','cpword','uType','positionCode','deptCode','lName', 'fName', 'mName', 'pPicture','address', 'maritalStatus', 'dependents' ,'emailAdd', 'birthDate', 'cNo', 'sex', 'type','dateHired', 'gsisNo', 'phNo', 'tin', 'vLeave', 'sLeave');
	$dType=array('text','password','password','dropdown','dropdown','dropdown', 'text', 'text', 'text', 'image','text', 'dropdown', 'number' ,'email', 'date', 'text', 'radio', 'radio' ,'date', 'text', 'text', 'text', 'text', 'text');
	if(!empty($id)){
		$EForm=array($empID, $password, $password, $uType ,$posName, $deptCode, $lName, $fname, $mname, ' ', $address, $maritalStatus, $emailAddress, $birthDate, $contactNo, $sex, $status, $dateHired, $GSISNo, $PhilHealthNo, $TIN, $vLeave, $sLeave);
	}
?>

<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">Maintenance</a></li>
		<li><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage Users</a></li>
		<?php if(!empty($id)):?>
			<li class="active">Edit Users</li>
		<?php  else:?>
			<li class="active">Create Users</li>
		<?php endif; ?>
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<?php if(!empty($id)):?>
			<h4>EDIT USERS</h4>
			<?php  else:?>
			<h4>CREATE USERS</h4>
			<?php endif; ?>
			<hr />
		</div>
		
		<?php if(!empty($id)): ?>
		<?php echo form_open_multipart("employee/editUserAcct/", $attributes); ?>
		<?php else: ?>
		<?php echo form_open_multipart("employee/createUserAcct/", $attributes); ?>
		<?php endif; ?>

		<?php foreach($labels as $key => $label){
			switch($dType[$key]){
				case 'dropdown':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-10">
			<?php
				if($dName[$key]=='positionCode'){?>
					<select name="positions" class="form-control">
			                <?php
			                	if(!empty($id)){
			                		if($posName == "0"){?>
			                			<option value='0' selected='SELECTED'><?php if($posName == '0'){ echo "Guild Master";} ?></option>
			                			<option value='1'>Guild Moderator</option>
			                			<option value='2'>Guild Member</option>
			                		<?php
			                		}
			                		else if($posName == "1"){?>
			                			<option value='0'>Guild Master</option>
										<option value='1' selected='SELECTED'><?php if($posName == '1'){ echo "Guild Moderator";} ?></option>
			                			<option value='2'>Guild Member</option>
			                		<?php
			                		}
			                		else{?>
			                			<option value='0'>Guild Master</option>
			                			<option value='1'>Guild Moderator</option>
			                			<option value='2' selected='SELECTED'><?php if($posName == '2'){ echo "Guild Member";}?></option>
			                		<?php
			                		}
			                	}
			                	else{
				                	foreach($positions as $pos){
				                		echo '<option value='.$pos->positionCode.'>'.$pos->positionName.'</option>';
				                	}
			               		}
			                ?>
			        </select>
				<?php
				}
				else if ($dName[$key]=='deptCode'){?>
					<select name="department" class="form-control">
			                <?php
			                	if(!empty($id)){
			                		if($deptCode == "0"){?>
			                			<option value='0' selected='SELECTED'>Catacombs</option>
			                			<option value='1'>Aminus</option>
			                		<?php
			                		}
			                		else if($deptCode == "1"){?>
			                			<option value='0'>Catacombs</option>
			                			<option value='1' selected='SELECTED'>Aminus</option>
			                		<?php
			                		}     
			                	}
			                	else{
				                	foreach($department as $dept){
				                		echo '<option value='.$dept->deptCode.'>'.$dept->deptName.'</option>';
				                	}
			               		}
			                ?>
			        </select>
				<?php
				}
				else if ($dName[$key]=='maritalStatus'){
					$options = array(
						'Married'   => 'Married',
						'Widowed'   => 'Widowed',
						'Separated' => 'Separated',
						'Divorced'  => 'Divorced',
						'Single'  	=> 'Single'
					);

					echo form_dropdown('maritalStatus', $options, 'Married','class="form-control"');
				}
				else if ($dName[$key]=='uType') {?>
					<?php 
					if(!empty($id)){ ?>
						<select name="userType" class="form-control">
							<?php if($uType == "Employee"){ ?>
								<option value='Employee' selected='SELECTED'>Employee</option>
								<option value='HR'>Human Relations</option>
								<option value='Payroll Clerk'>Payroll Clerk</option>
							<?php } else if($uType == "HR"){ ?>
								<option value='Employee'>Employee</option>
								<option value='HR' selected='SELECTED'>Human Relations</option>
								<option value='Payroll Clerk'>Payroll Clerk</option>
							<?php } else if($uType == "Payroll Clerk"){ ?>
								<option value='Employee'>Employee</option>
								<option value='HR'>Human Relations</option>
								<option value='Payroll Clerk' selected='SELECTED'>Payroll Clerk</option>
							<?php } ?>
						</select>
					<?php } else {
							$options = array(
								'Employee' => 'Employee',
								'HR'   => 'Human Relations',
								'Payroll Clerk'   => 'Payroll Clerk'

								);

							echo form_dropdown('userType', $options, 'Employee','class="form-control"');
						}
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
				<?php
					if($dName[$key] == 'sex'){
						if(!empty($id)){
							if($sex == "Male"){ ?>
								<input type='radio' name=<?php echo $dName[$key]; ?> value='Male' checked>Male
	  							<input type='radio' name=<?php echo $dName[$key];  ?> value='Female'> Female
							<?php } else { ?>
								<input type='radio' name=<?php echo $dName[$key]; ?> value='Male'>Male
	  							<input type='radio' name=<?php echo $dName[$key];  ?> value='Female' checked> Female
							<?php } ?>
						<?php } else { ?>
							<input type='radio' name=<?php echo $dName[$key]; ?> value='Male' checked>Male
	  						<input type='radio' name=<?php echo $dName[$key];  ?> value='Female'> Female
						<?php }
					}

					else if($dName[$key] == 'type'){
				
						if(!empty($id)){
							if($status == "Regular"){ ?>
								<input type='radio' name=<?php echo $dName[$key]; ?> value='Regular' checked>Regular
	  							<input type='radio' name=<?php echo $dName[$key];  ?> value='Contractual'> Contractual
							<?php } else { ?>
								<input type='radio' name=<?php echo $dName[$key]; ?> value='Regular'>Regular
	  							<input type='radio' name=<?php echo $dName[$key];  ?> value='Contractual' checked> Contractual
							<?php } ?>
						<?php } else { ?>
							<input type='radio' name=<?php echo $dName[$key]; ?> value='Regular' checked>Regular
	  						<input type='radio' name=<?php echo $dName[$key];  ?> value='Contractual'> Contractual
						<?php }
					}
				?>
			</div>
		</div>
		<?php
				break;
				case 'image':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-10">
			<?php
				echo form_upload('pic','Profile Picture');
			?>
			<?php 
				form_error($dName[$key]);
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
					if(!empty($id)){
						echo form_input(array(
						'class' => 'form-control text-box single-line',
						'name' => $dName[$key],
						'id' => $dName[$key],
						'placeholder' => $label,
						'type' => $dType[$key],
						'value' => $EForm[$key]
						));
					}
					else{
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
						else{
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key]
							));
						}
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
				if(!empty($id)){
					echo form_submit(array(
					'class' =>'btn btn-primary',
					'name' =>'submit',
					'value' => 'Update',
					'id' => 'submit'
					));
				}
				else{
					echo form_submit(array(
					'class' =>'btn btn-primary',
					'name' =>'submit',
					'value' => 'Register',
					'id' => 'submit'
					));
				}
				
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