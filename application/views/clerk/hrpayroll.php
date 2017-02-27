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
      /*-webkit-text-fill-color: black;
      -webkit-text-stroke-width: .25px;
      -webkit-text-stroke-color: white;*/
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

      <div class="row" style="margin-bottom: 5px;">
      <b>From</b>
      <input class="form-control" type="date" id="periodDateS" style="display: inline-block; width:262px;" />
       <b>to</b>
      <input class="form-control" type="date" id="periodDateE" style="display: inline-block; width:262px;" />
      <button class="btn pull-right" id="genPaySheet" ><span class="glyphicon glyphicon-home"></span> Generate</button>
      </div>
      
      <div class="table-responsive" id="tableDiv">
        <table class='table table-striped MaintenanceTable' style='font-size:11px;white-space:nowrap;'>
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Monthly Salary</th>
            <th>PERA</th>
            <th>Gross Earnings</th>
            <th>PhilHealth</th>
            <th>Pagibig Fund</th>
            <th>GSIS Integ.</th>
            <th>WT</th>
            <th>Additional Deductions</th>
            <th>Total NetPay</th>
            <th># of Absences</th>
            <th>Day/s Worked</th>
            <th>Hours Worked</th>
            <th># of Late</th>
            <th>Vacation Leave</th>
            <th>Sick Leave</th>
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

      var periodDateS = $('#periodDateS').val();
      var periodDateE = $('#periodDateE').val();

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

    $(function(){
      var dtToday = new Date();
      
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate()-1;
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();
      
      var maxDate = year + '-' + month + '-' + day;

      $('#periodDateS').attr('max', maxDate);
      $('#periodDateE').attr('max', maxDate);
    });

    $('#periodDateS').change(function(){
      var minDate = $('#periodDateS').val();

      $('#periodDateE').attr('min', minDate);
    });
    $('#genPaySheet').click(function(){
      var periodDateS = $('#periodDateS').val();
      var periodDateE = $('#periodDateE').val();

      if(periodDateS == "" || periodDateE == ""){
        swal({title: "Ooops!",text: "Input a date range first", timer: 2000, showConfirmButton:false,type:"error",animation:"slide-from-bottom"});
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>Clerk/paysheet_compute",
          data: {periodDateS,periodDateE},
          success: function(msg){
            $('.MaintenanceTable').DataTable().destroy();

            $('#tableDiv').html("<table class='table table-striped MaintenanceTable' style='font-size:11px;white-space:nowrap;'><thead><tr><th>Name</th><th>Position</th><th>Monthly Salary</th><th>PERA</th><th>Gross Earnings</th><th>PhilHealth</th><th>Pagibig Fund</th><th>GSIS Integ.</th><th>WT</th><th>Additional Deductions</th><th>Total NetPay</th><th># of Absences</th><th>Day/s Worked</th><th>Hours Worked</th><th># of late</th><th>Vacation Leave</th><th>Sick Leave</th></tr></thead><tbody id='pInfo'></tbody></table>");
            $('#pInfo').html(msg);
            $('#hideMyPower').html($('#tableRes td').html());
            //alert($('#tableRes td').html());
            $('#tableRes').remove();

            $('.MaintenanceTable').DataTable({
              "pageLength": 10,
              "pagingType": "full",
              "bFilter": false,
              "bLengthChange": false,
              "ordering": true,
              "aaSorting": [[0, 'desc']],
              responsive: true,
              dom: 'Bfrtip',
              buttons: [
                { extend: 'excelHtml5', text: 'Save a copy', title:  periodDateS+" to "+periodDateE+" Payroll Sheet"}
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
      var periodDateS = $('#periodDateS').val();
      var periodDateE = $('#periodDateE').val();

      $.ajax({
        type: "POST",
        url:"<?php echo base_url(); ?>Clerk/paysheet_save",
        data:{pslipdata,periodDateS,periodDateE},
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
  </script>