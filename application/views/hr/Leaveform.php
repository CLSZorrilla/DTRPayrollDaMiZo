<?php
	include "/../partials/nav_customize.php";

	$attributes=array('id'=>'create_leave_form', 'class'=>'form-horizontal');
	$lAttrib=array('class' => 'control-label col-md-4');
	$labels=array('Employee ID:','Full Name:','Position:', 'Department:','Vacation Leave:','Sick Leave:','Starting Date:','End Date:','Leave Type:','Approval Date:','Remarks:');
	$dName=array('empID', 'fName' ,'pos' ,'dept' ,'vl','sl','startDate','endDate','leaveType','appDate','note');
	$dType=array('text','text','dropdown','dropdown','text','text', 'date' ,'date','dropdown','date','text');
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
			<li class="active">Leave</li>
		</ol>
		<div class="row" id="Title">
			<h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>LEAVE</b></h4>
			<hr />
		</div>
	
		<?php if($this->session->flashdata('leaveDupli')): ?>
			<div class="alert alert-danger alert-dismissable fade in"><?php echo $this->session->flashdata('leaveDupli'); ?><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
		<?php endif; ?>
		<div class="panel panel-default" style="margin:0px 15px;">
		<div class="panel-heading">Deduct Leave Credits</div>
		<?php echo form_open_multipart("leave", $attributes); ?>

		<div class="panel-body">
			<?php foreach($labels as $key => $label){
				switch($dType[$key]){
					case 'dropdown':
			?>
			<div class="form-group col-lg-6">
				<?php echo form_label($label, $dName[$key], $lAttrib); ?>
				<div class="col-md-8">
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
				        <select id="pos" class="form-control" disabled>
				        	<option value="#">Fill up employee ID field</option>
				        </select>
				    <?php elseif($dName[$key] == 'dept'): ?>
				        <select id="dept" class="form-control" disabled>
				        	<option value="#">Fill up employee ID field</option>
				        </select>
				    <?php endif; ?>
				</div>
			</div>
			<?php
					break;
					default:
			?>
			<div class="form-group col-lg-6">
				<?php echo form_label($label, $dName[$key], $lAttrib); ?>
				<div class="col-md-8">
					<?php
						if($dName[$key] == 'fName' || $dName[$key] == 'vl' || $dName[$key] == 'sl'){
							echo form_input(array(
								'class' => 'form-control text-box single-line',
								'name' => $dName[$key],
								'id' => $dName[$key],
								'placeholder' => $label,
								'type' => $dType[$key],
								'readonly' => 'true',
								'value' => set_value($dName[$key])
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
								'value' => set_value($dName[$key])
							));
						}
					?>
				</div>
				<div class="col-md-offset-4 col-md-8">
					<?php
						echo form_error($dName[$key], '<div class="alert alert-danger alert-dismissable fade in" style="width:280px;overflow:hidden;margin:15px 0px 0px;"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
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
						'class' =>'btn btnReset pull-right',
						'type' =>'reset',
						'value' => 'Reset',
						'style' => 'width:100px;margin:5px;'
						));
					echo form_submit(array(
						'class' =>'btn btnEnter pull-right',
						'name' =>'submit',
						'value' => 'Send',
						'style' => 'width:100px;margin:5px;'
						));
				?>
			</div>
		</div>
		</div>
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