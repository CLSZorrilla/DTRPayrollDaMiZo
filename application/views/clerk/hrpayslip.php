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

      <div class="table-responsive">
        <table class="table table-striped MaintenanceTable">
          <thead>
            <tr>
              <?php
                $tHeader=array('Employee ID', 'User Type' ,'Position', 'Department', 'Full Name', 'Generated');
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
                      <tr>
                        <td>".$info->empID."</td>
                        <td>".$info->acctType."</td>
                        <td>".$info->positionName."</td>
                        <td>".$info->deptName."</td>
                        <td>".$info->name."</td>
                        <td>";
                        if($info->generated == 2){ ?> 
                        <a href="<?php echo base_url(); ?>Clerk/empPayslip/<?php echo $info->empID; ?>" id='payroll' class='btn btnPayroll'>Process Payroll</a>
                        <?php } else {
                           echo "Not ready for processing";
                         }
                    echo "</td>
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

  </script>