<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/header');?>
</head>
<body>
  <?php $this->load->view('partials/nav');?>
  <div>
    <ol class="breadcrumb">
      <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="active">Payroll</li>
    </ol>
  </div>
  <div class="BodyContainer">
    <div class="BodyContent">
      <div class="row Title">
        <h4>PAYROLL</h4>
        <hr/>
      </div>

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
            <span>Zorrilla, Chris Lorenz S.</span>
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
    			<span><b>NET EARNINGS:</b></span>
    				<table class="table table-striped">
    					<tbody>
    						<tr>
    							<td>1ST PERIOD</td>
    							<td>1,147.00</td>
    						</tr>
    						<tr>
    							<td>2ND PERIOD</td>
    							<td>1,147.00</td>
    						</tr>
    						<tr>
    							<td>3RD PERIOD</td>
    							<td>1,147.00</td>
    						</tr>
    						<tr>
    							<td>4TH PERIOD</td>
    							<td>1,147.00</td>
    						</tr>
    					</tbody>
    				</table>
    			<span><b>EARNINGS:</b></span>
    				<table class="table table-striped">
    					<tbody>
    						<tr>
    							<td>MONTHLY SALARY</td>
    							<td>24,047.00</td>
    						</tr>
    						<tr>
    							<td>PERA</td>
    							<td>2,000.00</td>
    						</tr>
    						<tr>
    							<td>SALARY</td>
    							<td>1,309.00</td>
    						</tr>
    						<tr>
    							<td><b>GROSS EARNINGS</b></td>
    							<td>26,192.00</td>
    						</tr>
    					</tbody>
    				</table>
    		</div>
    		<div class="col-lg-6">
    			<span><b>DEDUCTIONS:</b></span>
    				<table class="table table-striped">
    					<thead>
    						<tr>
    							<th>START</th>
    							<th>END</th>
    							<th></th>
    							<th></th>
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<td>06/15</td>
    							<td></td>
    							<td>PHILHEALTH</td>
    							<td>312.50</td>
    						</tr>
    						<tr>
    							<td>02/13</td>
    							<td></td>
    							<td>PAGIBIG FUND</td>
    							<td>100.00</td>
    						</tr>
    						<tr>
    							<td>04/16</td>
    							<td></td>
    							<td>GSIS INTEG.</td>
    							<td>2,357.28</td>
    						</tr>
    						<tr>
    							<td>01/16</td>
    							<td></td>
    							<td>WT</td>
    							<td>3,764.90</td>
    						</tr>
    					</tbody>
    				</table>

        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <span><b>TOTAL DEDUCTIONS:</b></span>
		        </div>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <span>21,602.60</span>
		        </div>
		        <br/>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <h3>TOTAL NETPAY:</h3>
		        </div>
        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <h3>21,602.60</h3>
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