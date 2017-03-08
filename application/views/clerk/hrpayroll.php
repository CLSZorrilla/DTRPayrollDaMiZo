<?php include "/../partials/nav_customize.php";?>

<style type="text/css">
  button#genPaySheet{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  button#genPaySheet:hover{
      background-color: <?php echo $company['colorTheme']; ?>;
      color: white;
  }
  button#printpage{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  button#printpage:hover{
      background-color: <?php echo $company['colorTheme']; ?>;
      color: white;
  }
  table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
    background-color: <?php echo $company['colorTheme']; ?>;
  }
  table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
    background-color:black;
    color: white;
  }
</style>

  <div class="BodyContainer">
    <div class="BodyContent">
      <ol class="breadcrumb">
        <li><a href="main/home_view">Home</a></li>
        <li><a href="#">Payroll</a></li>
        <li class="active">Payroll Sheet</li>
      </ol>

      <div class="row" id="Title">
      <h4 style="color:<?php echo $company['colorTheme']; ?>;"><b>PAYROLL SHEET</b></h4>
      <hr />
      </div>

      <div class="row" style="margin-bottom: 20px;border-bottom:2px solid <?php echo $company['colorTheme']; ?>">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
          <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <input class="datepicker" type="text" data-date-format="mm/dd/yyyy" id="monthPicker" >
          </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="margin-bottom: 15px;">
            <button class="btn pull-right" id="genPaySheet"><span class="glyphicon glyphicon-home"></span> Generate</button>
            <button class="btn pull-right" id="printpage" style="margin-right:15px;"><span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
      </div>

      <div id="PayrollForm" class="row">
          <div id="PayrollHeader" class="showOnPrint" style="display:none;">
              <table class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <tr class="PrintHeader">
                      <td>
                        <img src="<?php echo $cinfo->row(9)->logo; ?>" height="45" width="45" id="target" style="display: block; margin: 2px 3px 3px 3px; float: left;" />
                        <p style="margin: 0px; padding: 15px 0px; display: inline-block;">DEPARTMENT OF AGRICULTURE</p>
                      </td>
                      <td class="PrintHeaderTitle"><h3 class="pull-right" id='pPeriod'>GENERAL PAYROLL</h3></td>
                      <td></td>
                  </tr>
              </table>
          </div>
      </div>
      <div id="tableDiv" class="table-responsive">
        <table class='table table-striped MaintenanceTable' style='font-size:11px;'>
        <thead>
          <tr>
            <th>Name</th>
            <th>Monthly Salary</th>
            <th style="display:none;">Period</th>
            <th>PERA</th>
            <th>Gross Earnings</th>
            <th>PhilHealth Share</th>
            <th>Pagibig Share</th>
            <th>GSIS Integ.</th>
            <th>WT</th>
            <th>Additional Deductions</th>
            <th>Total NetPay</th>
          </tr>
        </thead>
        <tbody id='pInfo'>
        </tbody>
      </table>
      </div>

    </div>
  </div>
  <div id="hideMyPower" style="display: none;">
  </div>
  <script type="text/javascript">
    $(document).ready(function () {

      $('.MaintenanceTable').DataTable({
        "pageLength": 10,
        "pagingType": "full",
        "bFilter": false,
        "bLengthChange": false,
        "ordering": true,
        "aaSorting": [[0, 'desc']],
        responsive: true
      });
    });

    $('.datepicker').datepicker({
      format: "mm-yyyy",
      startView: "months", 
      minViewMode: "months",
      endDate: '+1m'
    });

    $('#genPaySheet').click(function(){
      var payrollMonth = $('#monthPicker').val();

      if(payrollMonth == ""){
        swal({title: "Ooops!",text: "Select a month first before generating", timer: 2000, showConfirmButton:false,type:"error",animation:"slide-from-bottom"});
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>Clerk/paysheet_compute",
          data: {payrollMonth},
          success: function(msg){
            $('.MaintenanceTable').DataTable().destroy();

            $('#tableDiv').html("<table class='table table-striped MaintenanceTable' style='font-size:11px;white-space:nowrap;'><thead><tr><th>Name</th><th>Monthly Salary</th><th style='display:none;'>Period</th><th>PERA</th><th>Gross Earnings</th><th>PhilHealth</th><th>Pagibig Fund</th><th>GSIS Integ.</th><th>WT</th><th>Additional Deductions</th><th>Total NetPay</th></tr></thead><tbody id='pInfo'></tbody></table>");
            $('#pInfo').html(msg);
            $('#hideMyPower').html($('#tableRes td').html());

            var prolldata = $('#hideMyPower').html();
            $.ajax({
              type:"POST",
              url: "<?php echo base_url(); ?>Clerk/getGrandTotal",
              data:{prolldata},
              cache:false,
              success:function(r){
                var result = $.parseJSON(r);

                $('#pInfo').append("<tr><td><b>GRAND TOTAL:</b></td><td><b>"+result.tbpay+"</b></td><td><b>"+result.tpera+"</b></td><td><b>"+result.tgpay+"</b></td><td><b>"+result.tphealth+"</b></td><td><b>"+result.tpagibig+"</b></td><td><b>"+result.tgsis+"</b></td><td><b>"+result.twt+"</b></td><td><b>"+result.tdeduction+"</b></td><td><b>"+result.tnetpay+"</b></td></tr>");
              },
              error:function(r){
                swal("Notice!","System Error. Contact Administrator","error");
              }
            });

            $('#pPeriod').html("Payroll Period:"+ $('#payrollPeriod').html());

            $('#tableRes').remove();

            $('.MaintenanceTable').DataTable({
              "pageLength": 10,
              "pagingType": "full",
              "bFilter": false,
              "bLengthChange": false,
              "ordering": true,
              "aaSorting": [[0, 'desc']],
              // responsive: true,
              dom: 'Bfrtip',
              buttons: [
                { extend: 'excelHtml5', text: 'Save an excel copy', title: "Payroll Sheet"+payrollMonth}
              ]
            });
          },
          error: function(msg) {
            alert("Fail");
          }
        });
      }    
    });

    $(document).on("click",".dt-buttons a",function(e){
      var pslipdata = $('#hideMyPower').html();
      var payrollMonth = $('#monthPicker').val();

      $.ajax({
        type: "POST",
        url:"<?php echo base_url(); ?>Clerk/paysheet_save",
        data:{pslipdata,payrollMonth},
        cache: false,
        success:function(r){
          if(r == 'Success'){
            swal("Good job!", "Successfully saved to database. Saving a copy", "success");
          }
          else if(r == 'Fail'){
             swal("Notice:", "Payroll for the given period has already been generated. Saving a copy instead", "error");
          }
        },
        error:function(r){
          swal("Notice:","System Error Contact Administrator", "error");
        }
      });
    });

    $('#printpage').click(function(){
                $(".dataTables_info , .dataTables_paginate , .dt-buttons").hide();
                $("PayrollHeader").show();
                $(".showOnPrint").show();

                var mywindow = window.open('', 'my div', 'height=583,width=1024');
                mywindow.document.write('<html><head><title>GENERAL PAYROLL</title>');
                mywindow.document.write(
                  '<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />' + 
                  '<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" />' +
                  '<style type="text/css">@page{size: landscape;}</style>');
                mywindow.document.write('</head><body style="min-height:initial;" >');
                mywindow.document.write("<div>" + $("#PayrollForm").html() + "</div>");
                mywindow.document.write("<div>" + $("#tableDiv").html() + "</div>");
                mywindow.document.write('</body></html>');

                setTimeout(function () {
                    mywindow.print();
                    $("PayrollHeader").hide();
                    $(".showOnPrint").hide();
                    $(".dataTables_info , .dataTables_paginate , .dt-buttons").show();
                }, 500);
    });    
  </script>