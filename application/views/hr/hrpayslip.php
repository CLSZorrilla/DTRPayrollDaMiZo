  <?php
    $base_url = base_url();
  ?>

  <div class="BodyContainer">
    <div class="BodyContent">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Payroll</li>
      </ol>
      <div class="row Title">
      <h4>Employee List</h4>
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
                           echo $info->pslipdate;
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