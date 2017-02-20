  <?php
    $base_url = base_url();
  ?>

  <div class="BodyContainer">
    <div class="BodyContent">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Payroll</a></li>
        <li class="active">Payslip</li>
      </ol>
      <div class="row" id="Title">
      <h4>PAYSLIP</h4>
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
                        <a href="<?php echo base_url(); ?>Clerk/empPayslip/<?php echo $info->empID; ?>" id='payroll' class='btn btn-primary'>Process Payroll</a>
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