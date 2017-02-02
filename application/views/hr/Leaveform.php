<?php
	$attributes=array('id'=>'create_leave_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-2');
	$labels=array('Employee ID:','Full Name:','Position:', 'Department:','Vacation Leave:','Sick Leave:','Leave Type:','Starting Date:','End Date:','Approval Date:','Remarks:');
	$dName=array('empID', 'fName' ,'pos' ,'dept' ,'vl','sl','leaveType','startDate','endDate','appDate','note');
	$dType=array('text','text','dropdown','dropdown','text','text','dropdown', 'date' ,'date','date','text');
?>


<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">Leave</a></li>
		<li><a href="#">Leave Credits</a></li>	
	</ol>
</div>
<div class="BodyContainer">
	<div class="BodyContent">
		<div class="row Title">
			<h4>Deduct Leave Credits</h4>
			<hr />
		</div>
		
		<?php echo form_open_multipart("leave", $attributes); ?>

		<?php foreach($labels as $key => $label){
			switch($dType[$key]){
				case 'dropdown':
		?>
		<div class="form-group">
			<?php echo form_label($label, $dName[$key], $lAttrib); ?>
			<div class="col-md-10">
					<?php if($dName[$key] == 'leaveType'): ?>
					<select name="leaveType" class="form-control">
						<?php
							foreach ($leaveType as $lType) {
								echo "
									<option value=".$lType->leaveID.">".$lType->leaveName."</option>
								";
							}
						?>
			        </select>
			    	<?php elseif($dName[$key] == 'pos'): ?>
			        <select id="pos" disabled>
			        	<option value="#">Fill up employee ID field</option>
			        </select>
			    <?php elseif($dName[$key] == 'dept'): ?>
			        <select id="dept" disabled>
			        	<option value="#">Fill up employee ID field</option>
			        </select>
			    	<?php endif; ?>
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
					if($dName[$key] == 'fName' || $dName[$key] == 'vl' || $dName[$key] == 'sl'){
						echo form_input(array(
							'class' => 'form-control text-box single-line',
							'name' => $dName[$key],
							'id' => $dName[$key],
							'placeholder' => $label,
							'type' => $dType[$key],
							'readonly' => 'true'
						));
					}
					else if($dName[$key] == 'appDate'){
						echo form_input(array(
							'class' => 'form-control text-box single-line',
							'name' => $dName[$key],
							'id' => $dName[$key],
							'type' => $dType[$key],
							'value' => date("Y-m-d"),
							'readonly' => 'true'
						));
					}
					else{
						echo form_input(array(
							'class' => 'form-control text-box single-line',
							'name' => $dName[$key],
							'id' => $dName[$key],
							'placeholder' => $label,
							'type' => $dType[$key],	
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
	$.ajax
	({
		url: "Leave/get_leave_form_info?empID="+$("#empID").val(),
		success: function(r)
		{
			var result = $.parseJSON(r);

			$('#fName').val(result.fName);
			$('#pos').html(result.pos);
			$('#dept').html(result.dept);
			$('#vl').val(result.VL);
			$('#sl').val(result.SL);
		}  
	});
}});

$('#cNo').mask("0999-999-9999", {placeholder:" "});
$('#gsisNo').mask("999999999-9999");
$('#phNo').mask("999999999-9999");
$('#tin').mask("999999999-9999");
</script>