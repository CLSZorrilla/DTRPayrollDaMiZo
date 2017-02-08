<?php
	$attributes=array('id'=>'create_user_form', 'class'=>'form-horizontal');
	$lblClsED=array('class' => 'control-label');

	$lAttrib=array('class' => 'col-xs-12 col-sm-12 col-md-12 col-lg-12');
	$lblEarn=array('MONTHLY SALARY:', 'PERA:', 'GROSS EARNINGS:');
	$lblDeduct=array('PHILHEALTH:', 'PAGIBIG FUND:', 'GSIS(9% OF GP):', 'WITHHOLDING TAX:');
	$dNameEarn=array('bPay', 'pera', 'gPay');
	$dNameDeduct=array('pHealth', 'pagIbig', 'gsis', 'wTax');
	$dTypeEarn=array('text', 'text', 'text');
	$dTypeDeduct=array('text','text', 'text', 'text');

	$empData =array($pInfoRes[0]->row(0)->empID,
				$pInfoRes[0]->row(3)->name, 
				$pInfoRes[0]->row(2)->positionName,
				$pInfoRes[0]->row(5)->maritalStatus,
				$pInfoRes[0]->row(6)->noOfDependents);

	$earnData =array($pInfoRes[0]->row(7)->step_1,
				$pInfoRes[8],
				$pInfoRes[1],
				);

	$deductData =array($pInfoRes[2],
				'100',
				$pInfoRes[3],
				$pInfoRes[4]
				);
	$netPay = $pInfoRes[7];

	$totalDeduction = $pInfoRes[9];
?>

<div>
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="<?php echo base_url(); ?>Clerk">Payroll</a></li>
		<li class="active">Salary Computation</li>
	</ol>
</div>
<div class="BodyContainer" id="compute" >
	<div class="BodyContent">
		<div class="row Title">
			<h4>Salary Computation</h4>
			<h5>By default it is set to <b>MONTHLY</b> with an official time of <b>8am-5pm</b></h5>
		</div>
		<?php  
			/*foreach($pInfoRes[1] as $pres){
				echo $pres."<br/>";
			}*/

			//echo $pInfoRes[1];
		?>
		<?php echo form_open_multipart("employee/createUserAcct", $attributes); ?>
		<div class="row">
	        <div class="col-lg-6">
		        <div class="form-group">
	                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                    <label for="" class="control-label">EMPLOYEE ID:</label>
	                </div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<input type="text" value="<?php echo $empData[0]; ?>" class="form-control text-box single-line" id="eid" placeholder="Employee ID">
					</div>
				</div>
				<div class="form-group">
	                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                    <label for="" class="control-label">FULL NAME:</label>
	                </div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<input type="text" name="" value="<?php echo $empData[1]; ?>" class="form-control text-box single-line" id="fName" placeholder="Full Name" readonly>
					</div>
				</div>
				<div class="form-group">
		            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		                <label for="" class="control-label">POSITION:</label>
		            </div>
		            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                	<input type="text" name="" value="<?php echo $empData[2]; ?>" class="form-control text-box single-line" id="position" placeholder="Position" readonly>
	            	</div>
	            </div>
	        </div>
	        <div class="col-lg-6">
	        	<div class="form-group">
		            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		                <label for="" class="control-label">TAX STATUS:</label>
		            </div>
		            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                	<input type="text" name="" value="<?php echo $empData[3]; ?>" class="form-control text-box single-line" id="tStatus" placeholder="Position" readonly>
	            	</div>
				</div>
				<div class="form-group">
		            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		                <label for="" class="control-label">DEPENDENTS:</label>
		            </div>
		            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                	<input type="text" name="" value="<?php echo $empData[4]; ?>" class="form-control text-box single-line" id="dept" placeholder="Position" readonly>
	            	</div>
	            </div>
	        </div>
	    </div>
	    <br/>

	      <!--
	      <div class="row">
	        <div style="padding: 0px 15px;">
	            <span><b>NET EARNINGS:</b></span>
	        </div>
	        <br />
	        <div class="col-lg-6">
	            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                <label for="" class="control-label">1ST PERIOD:</label>
	            </div>
	            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                <input type="text" name="" value="1,147.00" class="form-control text-box single-line" id="" placeholder="Employee ID:">
	            </div>
	            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                <label for="" class="control-label">3RD PERIOD:</label>
	            </div>
	            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                <input type="text" name="" value="1,147.00" class="form-control text-box single-line" id="" placeholder="Service:">
	            </div>
	        </div>
	        <div class="col-lg-6">
	            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                <label for="" class="control-label">2ND PERIOD:</label>
	            </div>
	            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                <input type="text" name="" value="1,147.00" class="form-control text-box single-line" id="" placeholder="Position:">
	            </div>
	            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                <label for="" class="control-label">4TH PERIOD:</label>
	            </div>
	            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	                <input type="text" name="" value="1,147.00" class="form-control text-box single-line" id="" placeholder="Division:">
	            </div>
	        </div>
	      </div>
	      <br/>
	      -->

	    	<div class="row">
	    		<div class="col-lg-5">
	                <div>
	                    <span><b>EARNINGS:</b></span>
	                </div>
	                <br />
					<?php foreach($lblEarn as $key => $label){ ?>
                		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php echo form_label($label, $dNameEarn[$key], $lblClsED); ?>
						</div>
                		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php
								echo form_input(array(
									'class' => 'form-control text-box single-line',
									'name' => $dNameEarn[$key],
									'id' => $dNameEarn[$key],
									'placeholder' => $label,
									'type' => $dTypeEarn[$key],
									'value' => $earnData[$key],
									'readonly' => true
								));

								echo form_error($dNameEarn[$key], '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
							?>
						</div>
					<?php 
						} 
					?>
	    		</div>
	    		<div class="col-lg-5">
	                <div>
	                    <span><b>DEDUCTIONS:</b></span>
	                </div>
	                <br />
					<?php foreach($lblDeduct as $key => $label){ ?>
                		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php echo form_label($label, $dNameDeduct[$key], $lblClsED); ?>
						</div>
                		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php
								echo form_input(array(
									'class' => 'form-control text-box single-line',
									'name' => $dNameDeduct[$key],
									'id' => $dNameDeduct[$key],
									'placeholder' => $label,
									'type' => $dTypeDeduct[$key],
									'value' => $deductData[$key],
									'readonly' => true
								));

								echo form_error($dNameDeduct[$key], '<div class="alert alert-danger alert-dismissable fade in"><a href="#" id="ekis" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
							?>
						</div>
					<?php 
						} 
					?>

					<!-- Additional Deductions -->
					<?php foreach($pInfoRes[5] as $key => $data){?>
                			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label for="" class="control-label"><?php echo $pInfoRes[5][$key] ?></label>
							</div>
                			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<input type="text" value="<?php echo round($pInfoRes[6][$key],2) ?>" class="form-control text-box single-line" readonly />
							</div>
					<?php } ?>
					<!-- Additional Deductions -->

	            </div>
	            <div class="col-lg-2">
	                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                    <h3>TOTAL NETPAY:</h3>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                    <input type="text" name="" value="<?php echo $netPay; ?>" class="form-control text-box single-line" id="netpay" placeholder="Total Netpay" readonly>
	                </div>
	        		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                  <button type="button" id="generate" class="btn btnPayroll" style="margin:5px 0px;width:inherit;">Generate</button>
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
	var eid = $('#eid').val();
	var printPayslip;

	$('#generate').click(function(){
		printPayslip = window.open('<?php echo base_url(); ?>Clerk/viewpayslip/'+eid, '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0,resizable=0');
		
		/*if(printPayslip.closed){
			$("#generate").prop("disabled",false);
		}
		else{
			$("#generate").prop("disabled",true);
		}*/
  		//window.location.href ="<?php echo base_url(); ?>Clerk";
	})
</script>