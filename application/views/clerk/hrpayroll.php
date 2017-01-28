  <?php
    $base_url = base_url();
  ?>

  <div>
    <ol class="breadcrumb">
      <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="active">Payroll</li>
    </ol>
  </div>
  <div class="BodyContainer">
    <div class="BodyContent">
      <div class="row Title">
      <h4>Employee List</h4>
      </div>

      <div class="table-responsive">
        <table class="table table-striped MaintenanceTable">
          <thead>
            <tr>
              <?php
                $tHeader=array('Employee ID', 'User Type' ,'Position', 'Department', 'Full Name', 'Address', 'Date Hired', 'Action', 'Marital Status' ,'GSIS No.', 'PhilHealth No.', 'TIN', 'Vacation Leave', 'Sick Leave' ,'Email Address', 'Birthdate', 'Contact No.', 'Sex', 'Picture');
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
                        <td>".$info->address."</td>
                        <td>".$info->dateHired."</td>
                        <td><a href=".$base_url."Clerk/payroll_computation/".$info->empID." id='payroll' class='btn btn-primary'>Process Payroll</a></td>
                        <td>".$info->maritalStatus."</td>
                        <td>".$info->GSISNo."</td>
                        <td>".$info->PhilHealthNo."</td>
                        <td>".$info->TIN."</td>
                        <td>".$info->VL."</td>
                        <td>".$info->SL."</td>
                        <td>".$info->emailAddress."</td>
                        <td>".$info->birthDate."</td>
                        <td>".$info->contactNo."</td>
                        <td>".$info->sex."</td>
                        <td><img src='".$info->picture."' width='20' height='25'/></td>
                        
                      </tr>
                      ";
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
        "aaSorting": [[0, 'desc']],
        responsive: true
      });
    });
  </script>