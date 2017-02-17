	<div class="remOnPrnt">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>main/home_view"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li>Attendance</li>
      <li class="active">Time Card</li>
		</ol>
	</div>
	<div class="BodyContainer">
		<div class="BodyContent">
			<div class="row remOnPrnt" id="Title">
				<h4>ATTENDANCE</h4>
				<hr>
        <button id="PrintBtn" type="button" class="btn btn-primary pull-right">Print</button>
      </div>

<div id="OTOffsetForm" class="row">
    <div id="OTOffsetHeader" class="showOnPrint" style="display:none;">
        <table class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <tr class="PrintHeader">
                <td>
                <img src="<?php echo base_url();?>assets/images/LTO-logo.png" width="50" height="50" alt="Logo" /></td>
                <td class="PrintHeaderTitle"><h3>TIME CARD</h3></td>
            </tr>
            <tr>
                <td colspan="6"><br /></td>
            </tr>
        </table>
        <br />
        <table class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <tr>
                <td><span><b>Name:</b></span></td>
                <td>                    
                @if ((ViewBag.sel3 == null) || (ViewBag.sel3 == ""))
                {
                    <span>All</span>
                }
                else
                {
                    <span>@ViewBag.sel3</span>
                }
                </td>
                <td><span><b>Cut off Period:</b></span></td>
                <td>
                @if ((ViewBag.sel5 == null) || (ViewBag.sel5 == "") || (ViewBag.sel4 == null) || (ViewBag.sel4 == "") || (ViewBag.sel6 == null) || (ViewBag.sel6 == ""))
                {
                    <span>All</span>
                }
                else
                {
                    <span>@ViewBag.sel4 / @ViewBag.sel5 / @ViewBag.sel6</span>
                }
                </td>
            </tr>
            <tr>
                <td><span><b>Designation/Dept.:</b></span></td>
                <td>
                    @if ((ViewBag.sel1 == null) || (ViewBag.sel1 == ""))
                    {
                        <span>All</span>
                    }
                    else
                    {
                        <span>@ViewBag.sel1</span>
                    }
                </td>
                <td><span><b>Payroll Period:</b></span></td>
                <td>
                    @if ((ViewBag.sel5 == null) || (ViewBag.sel5 == "") || (ViewBag.sel4 == null) || (ViewBag.sel4 == "") || (ViewBag.sel6 == null) || (ViewBag.sel6 == ""))
                    {
                        <span>All</span>
                    }
                    else
                    {
                        int ConvertDay = int.Parse(ViewBag.sel5);
                        if (ConvertDay == 8)
                        {
                            <span>@ViewBag.sel4 / 15 / @ViewBag.sel6</span>
                        }
                        else
                        {
                            <span>@ViewBag.sel4 / 30 / @ViewBag.sel6</span>
                        }
                    }
                </td>
            </tr>
            <tr>
                <td colspan="6"><br /></td>
            </tr>
        </table>
    </div>
</div>

      <div id="AttendanceTable">
        <table class="table table-striped">
          <thead>
            <tr>
              <th rowspan="2">Days</th>
              <th colspan="2">Morning</th>
              <th colspan="2">Afternoon</th>
            </tr>
            <tr>
              <th>IN</th>
              <th>OUT</th>
              <th>IN</th>
              <th>OUT</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>2</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>3</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>4</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>5</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>6</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>7</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>8</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>9</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>10</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>11</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>12</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>13</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>14</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>15</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>16</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>17</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>18</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>19</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>20</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>21</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>22</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>23</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>24</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>25</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>26</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>27</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>28</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>29</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>30</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
            <tr>
              <td>31</td>
              <td>07:59</td>
              <td>11:59</td>
              <td>12:35</td>
              <td>05:05</td>
            </tr>
          </tbody>
        </table>
			</div>
		</div>
	</div>

  <div id="printDiv">
  <script>
    $("#PrintBtn").click(function () {
                $(".remOnPrnt").hide();
                //$("OTOffsetHeader").show();
                $(".showOnPrint").show();

                var mywindow = window.open('', 'my div', 'height=400,width=600');
                mywindow.document.write('<html><head><title>OVERTIME/OFFSET FORM</title>');
                mywindow.document.write(
                  '<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />' +
                  '<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style-printing.css" />');
                mywindow.document.write('</head><body >');
                mywindow.document.write("<div>" + $(".BodyContainer").html() + "</div>");
                mywindow.document.write('</body></html>');

                setTimeout(function () {
                    mywindow.print();
                    //$("OTOffsetHeader").hide();
                    $(".showOnPrint").hide();
                    $(".remOnPrnt").show();
                }, 500);
            });
  </script>
</div>

	<div class="Footer">
		<div class="pull-right">
			<p>&copy; Copyright 2016 All Rights Reserved.</p>
		</div>
	</div>
</body>