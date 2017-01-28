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
      <li><a href="#">Payroll</a></li>
      <li class="active">Payroll Computation</li>
    </ol>
  </div>
  <div class="BodyContainer">
    <div class="BodyContent">
      <div class="row Title">
        <h4>PAYROLL COMPUTATION</h4>
        <hr/>
      </div>

      <div class="row">
        <div class="col-lg-6">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <label for="empID" class="control-label">NAME:</label>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="empID" value="Zorrilla, Chris Lorenz S." class="form-control text-box single-line" id="empID" placeholder="Employee ID:">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <label for="service" class="control-label">SERVICE:</label>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="service" value="Administrative Service" class="form-control text-box single-line" id="service" placeholder="Service:">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <label for="position" class="control-label">POSITION:</label>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="position" value="Master" class="form-control text-box single-line" id="position" placeholder="Position:">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <label for="division" class="control-label">DIVISION:</label>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="division" value="Carthaginian" class="form-control text-box single-line" id="division" placeholder="Division:">
            </div>
        </div>
      </div>
      <br/>

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

    	<div class="row">
    		<div class="col-lg-5">
                <div>
                    <span><b>EARNINGS:</b></span>
                </div>
                <br />
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">MONTHLY SALARY:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="24,047.00" class="form-control text-box single-line" id="" placeholder="Monthly Salary:">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">PERA:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="2,000.00" class="form-control text-box single-line" id="" placeholder="Pera:">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">SALARY:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="1,309.00" class="form-control text-box single-line" id="" placeholder="Salary:">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">GROSS EARNINGS:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="26,192.00" class="form-control text-box single-line" id="" placeholder="Gross Earnings:">
                </div>
    		</div>
    		<div class="col-lg-5">
                <div>
                    <span><b>DEDUCTIONS:</b></span>
                </div>
                <br />
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">PHILHEALTH:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="312.50" class="form-control text-box single-line" id="" placeholder="PhilHealth:">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">PAGIBIG FUND:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="100.00" class="form-control text-box single-line" id="" placeholder="Pagibig Fund:">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">GSIS INTEG.:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="2,357.28" class="form-control text-box single-line" id="" placeholder="GSIS Integ.:">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">WT:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="3,764.90" class="form-control text-box single-line" id="" placeholder="WT:">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="control-label">TOTAL DEDUCTIONS:</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="21,602.60" class="form-control text-box single-line" id="" placeholder="Total Deductions:">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>TOTAL NETPAY:</h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="" value="21,602.60" class="form-control text-box single-line" id="" placeholder="Total Netpay">
                </div>
        		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <button type="button" class="btn btnPayroll" style="margin:5px 0px;width:inherit;">Compute</button>
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