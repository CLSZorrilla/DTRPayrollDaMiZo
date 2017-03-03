<?php
  $base_url = base_url();
?>
<?php include "/../partials/nav_customize.php";?>
<style type="text/css">
  .btnPayroll{
    background-color:white;
    color:black;
    border: 2px solid <?php echo $company['colorTheme']; ?>;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
  }
  .btnPayroll:hover{
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
        <li><a href="#">Home</a></li>
        <li><a href="#">Payroll</a></li>
        <li class="active">Process Payslip</li>
      </ol>
      <div class="row" id="Title">
        <h4 style="color: <?php echo $company['colorTheme']; ?>;"><b>PROCESS PAYSLIP</b></h4>
        <hr />
      </div>
      <input class="datepicker" type="text" data-date-format="mm/dd/yyyy" id="monthPicker" placeholder="Choose Payslip Month">
      <button class="btn btn-primary" id="genBtn">Generate</button>
      <div class="table-responsive">
        <table class="table table-striped MaintenanceTable">
          <thead>
            <tr>
              <?php
                $tHeader=array('Employee ID', 'User Type' ,'Position', 'Department', 'Full Name');
                  foreach($tHeader as $tHead){
                    echo '<th>'.$tHead.'</th>';
                  };

                ?>
            </tr>
          </thead>
          <tbody>
            <?php 
                  foreach($uinfo as $info){
                    echo "
                      <tr class='clickable' id=".$info->empID.">
                        <td>".$info->empID."</td>
                        <td>".$info->acctType."</td>
                        <td>".$info->positionName."</td>
                        <td>".$info->deptName."</td>
                        <td>".$info->name."</td>
                      </tr>"; 
                  }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="Footer">
    <div class="pull-right">
      <p>&copy; Copyright 2017 All Rights Reserved.</p>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.MaintenanceTable').DataTable({
        "pageLength": 10,
        "pagingType": "full",
        "bFilter": true,
        "bLengthChange": false,
        "ordering": true,
        "aaSorting": [[0, 'asc']],
        responsive: true
      });
    });

    $('.datepicker').datepicker({
      format: "mm-yyyy",
      startView: "months", 
      minViewMode: "months",
      endDate: '+1m'
    });

    var ID = "";
      $(document).on('click', '.clickable', function(){
        $('.clickable').css('background-color',"white");
        $('.clickable').css('color',"black");
        $(this).css('background-color',"blue");
        $(this).css('color',"white");
        ID = $(this).attr('id');
      });

      $('#genBtn').click(function(){
        var payrollMonth = $('#monthPicker').val();

        if(ID != "" && payrollMonth == ""){
          
          swal("Notice","Select payroll month before generating","error");
        }
        else if(ID == ""){
          swal("Notice","Select a row first before generating","error");
        }else{
          window.location.href = "empPayslip/"+ID+"/"+payrollMonth;
        }
      })
  </script>