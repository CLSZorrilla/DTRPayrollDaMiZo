<?php
	$attributes=array('id'=>'create_user_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-5');
	$labels=array('Employee ID:','Profile Picture:','Password:','Confirm Password:','Position:','Department:','First Name:','Last Name:', 'Middle Name:','User Type:','Email Address:','Address:', 'Marital Status:', 'Dependents', 'Birthday:', 'Contact No.:', 'Sex:', 'Employee Type:' ,'Date Hired:','GSISNo:', 'PhilHealthNo:', 'TIN:', 'Vacation Leave:', 'Sick Leave');
	$dName=array('empID', 'pPicture','pword','cpword','positionCode','deptCode', 'fName','lName', 'mName','uType','emailAdd','address', 'maritalStatus', 'dependents', 'birthDate', 'cNo', 'sex', 'type','dateHired', 'gsisNo', 'phNo', 'tin', 'vLeave', 'sLeave');
	$dType=array('text', 'image','password','password','dropdown','dropdown', 'text', 'text', 'text','dropdown','email','text', 'dropdown', 'number', 'date', 'text', 'radio', 'radio' ,'date', 'text', 'text', 'text', 'text', 'text');
	if(!empty($id)){
		$EForm=array($empID,'', $password, $password,$posName, $deptCode, $fname, $lName, $mname, $uType, $emailAddress, $address, $maritalStatus,$dependents ,$birthDate, $contactNo, $sex, $status, $dateHired, $GSISNo, $PhilHealthNo, $TIN, $vLeave, $sLeave);
	}
?>

<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">Maintenance</a></li>
		<li class="active"><a href="<?php echo base_url(); ?>employee/manageUserAcct">Manage User</a></li>
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<h4>MANAGE USER</h4>
			<hr />
		</div>
		
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading">
			<?php if(!empty($id)):?>
				Edit User
			<?php  else:?>
				Create User
			<?php endif; ?>
		</div>
		<?php if(!empty($id)): ?>
		<?php echo form_open_multipart("employee/editUserAcct/", $attributes); ?>
		<?php else: ?>
		<?php echo form_open_multipart("employee/createUserAcct/", $attributes); ?>
		<?php endif; ?>

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
		<div class="form-group col-lg-6" style="height: 34px;">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-7">
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
		</div>
		<div class="panel-footer">
			<div style="overflow: hidden;">
				<?php
				if(!empty($id)){
					echo form_submit(array(
						'class' =>'btn btn-default pull-right',
						'type' =>'reset',
						'value' => 'Reset',
						'style' => 'width:100px;margin:5px;'
						));
					echo form_submit(array(
						'class' =>'btn btn-primary pull-right',
						'name' =>'submit',
						'value' => 'Update',
						'id' => 'submit',
						'style' => 'width:100px;margin:5px;'
						));
				}
				else{
					echo form_submit(array(
						'class' =>'btn btn-default pull-right',
						'type' =>'reset',
						'value' => 'Reset',
						'style' => 'width:100px;margin:5px;'
						));
					echo form_submit(array(
						'class' =>'btn btn-primary pull-right',
						'name' =>'submit',
						'value' => 'Register',
						'id' => 'submit',
						'style' => 'width:100px;margin:5px;'
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

$('input:radio[name="type"]').change(
    function(){
        if (this.checked && this.value == 'Contractual') {
            $("#vLeave").hide();
            $('label[for="vLeave"]').hide();
            $("#sLeave").hide();
            $('label[for="sLeave"]').hide();
        }
        else if (this.checked && this.value == 'Regular') {
            $("#vLeave").show();
            $('label[for="vLeave"]').show();
            $("#sLeave").show();
            $('label[for="sLeave"]').show();
        }
    });
</script>