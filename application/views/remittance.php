	<?php
		$base_url = base_url();
	?>
	<div class="BodyContainer">
		<div class="BodyContent">
			<ol class="breadcrumb">
				<li><a href="<?php echo $base_url; ?>main/home_view">Home</a></li>
				<li class="active">Remittance Report</li>
			</ol>
      		<div class="row">
				<h4>REMITTANCE REPORT</h4>
				<hr />
			</div>
            <div class="row" style="margin:0px -15px;"">
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Loan:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" id="" name="">
	                    	<option value="">All</option>
							<option>Landbank Loan</option>
							<option>Mower Loan</option>
						</select>
					</div>
                </div>
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Year:</label>
                    <div class="col-lg-8">
	                    <select class="form-control col-lg-4" id="" name="">
	                    	<option value="">All</option>
							<option>2017</option>
						</select>
					</div>
                </div>
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Month:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" id="" name="">
	                    	<option value="">All</option>
							<option>January</option>
							<option>February</option>
							<option>March</option>
						</select>
					</div>
                </div>
                <div class="form-group col-lg-3">
                    <label class="control-label col-lg-4">Period:</label>
                    <div class="col-lg-8">
	                    <select class="form-control" id="" name="">
	                    	<option value="">All</option>
							<option>1st</option>
							<option>2nd</option>
						</select>
					</div>
                </div>
            </div>
			<div class="table-responsive">
				<table class="table table-striped MaintenanceTable">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Zorrilla, Christian Lorenz S.</td>
							<td>9999</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        $(document).ready(function () {
			$('.MaintenanceTable').DataTable({
				"pageLength": 10,
				"pagingType": "full",
				"bFilter": false,
				"bLengthChange": false,
				"ordering": false,
				"aaSorting": [[0, 'desc']],
				responsive: true
			});
		});
	</script>