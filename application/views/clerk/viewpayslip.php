<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/header');?>
</head>
<body>
  <div class="BodyContainer">
    <div class="BodyContent">
      <div class="row PayslipCompany">
        <img src="<?php echo base_url();?>assets/images/LTO-logo.png" alt="Logo" />
        <p>LAND TRANSPORTATION OFFICE</p>
        <span>LTO Compound, East Avenue, Quezon City, 1100 Philippines</span>
      </div>
      <br/>
      <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>NAME:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><?php echo $fname; ?></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>SERVICE:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span>Administrative Service</span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>POSITION:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span>Master</span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span><b>DIVISION:</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span>Carthaginian</span>
        </div>
    	</div>
    	<br/>

    	<div class="row">
    		<div class="col-lg-6">  				
    			<span><b>EARNINGS:</b></span>
    				<table class="table table-striped">
    					<tbody>
    						<tr>
    							<td>MONTHLY SALARY</td>
    							<td><?php echo $bpay; ?></td>
    						</tr>
    						<tr>
    							<td>PERA</td>
    							<td><?php echo $pera; ?></td>
    						</tr>
    						<tr>
    							<td><b>GROSS EARNINGS</b></td>
    							<td><?php echo $gpay; ?></td>
    						</tr>
    					</tbody>
    				</table>
    		</div>
    		<div class="col-lg-6">
    			<span><b>DEDUCTIONS:</b></span>
    				<table class="table table-striped">
    					<thead>
    						<tr>
    							<th></th>
    							<th></th>
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<td>PHILHEALTH</td>
    							<td><?php echo $phealth; ?></td>
    						</tr>
    						<tr>
    							<td>PAGIBIG FUND</td>
    							<td><?php echo $pagibig; ?></td>
    						</tr>
    						<tr>
    							<td>GSIS INTEG.</td>
    							<td><?php echo $gsis; ?></td>
    						</tr>
    						<tr>
    							<td>WT</td>
    							<td><?php echo $wtax; ?></td>
    						</tr>
    					</tbody>
    				</table>

        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <span><b>TOTAL DEDUCTIONS:</b></span>
		        </div>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <span><?php echo $tdeduct; ?></span>
		        </div>
		        <br/>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <h3>TOTAL NETPAY:</h3>
		        </div>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <h3><?php echo $netpay; ?></h3>
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
</body>
<script type="text/javascript">
    $(document).ready(function () {
      $('.MaintenanceTable').DataTable({
        "pageLength": 10,
        "pagingType": "full",
        "bFilter": true,
        "bLengthChange": false,
        "ordering": true,
        "aaSorting": [[0, 'desc']],
        responsive: true
      });
    });
</script>
</html>