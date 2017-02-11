<div>
    <ol class="breadcrumb">
      <li><a href="main/home_view"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="active">Payroll</li>
    </ol>
  </div>
  <div class="BodyContainer">
    <div class="BodyContent">
      <div class="row Title">
      <h4><b>E</b>mployee <b>L</b>ist</h4>
      </div>
      <b>From</b>
      <input type="date" id="periodDateS" /> <b>to</b>
      <input type="date" id="periodDateE" />
      <button class="btn btn-primary" id="genPaySheet" >Generate</button>
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
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
          'excel'
        ]
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
        alert("Input date range");
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>Clerk/paysheet_compute",
          data: {periodDateS,periodDateE},
          success: function(msg){
            $('.MaintenanceTable').DataTable().destroy();

            $('#tableDiv').html("<table class='table table-striped MaintenanceTable' style='font-size:11px;white-space:nowrap;'><thead><tr><th>Name</th><th>Position</th><th>Monthly Salary</th><th>PERA</th><th>Gross Earnings</th><th>PhilHealth</th><th>Pagibig Fund</th><th>GSIS Integ.</th><th>WT</th><th>Additional Deductions</th><th>Total NetPay</th></tr></thead><tbody id='pInfo'></tbody></table>");
            $('#pInfo').html(msg);
            $('#hideMyPower').html($('#tableRes td').html());
            //alert($('#tableRes td').html());
            $('#tableRes').remove();

            $('.MaintenanceTable').DataTable({
              "pageLength": 10,
              "pagingType": "full",
              "bFilter": true,
              "bLengthChange": false,
              "ordering": true,
              "aaSorting": [[0, 'desc']],
              responsive: false,
              dom: 'Bfrtip',
              buttons: [
              'excel'
              ]
            });
          },
          error: function(msg) {
            alert("Fail");
          }
        });
      }    
    });

    function passHeader(msg){
      msg1 = msg.replace("</tr>").split("<tr>");
      for(var x=0;x<msg1.length;x++){
        //alert(msg[x]);
        var stringMs = msg1[x].replace("</td>","").split("<td>");
        var headAppend = "";
        //alert(stringMs.toString());
        for(var i=12;i<stringMs.length;i++){
          //alert(stringMs[i]);
          var tempStr = stringMs[i].replace("</td>","").replace("undefined","");
          tempStr= tempStr.substring(0,tempStr.indexOf("..!.."));
          var regex = new RegExp(tempStr);
          if(!$('#pHeader').html().match(regex))
          headAppend+= "<th>"+tempStr+"</th>";
        }
        $('#pHeader').html($('#pHeader').html()+headAppend);
        //if(headAppend!=""&&headAppend!=null)
        //alert(headAppend);
      }
      return msg;//.replace(/[>].*\.\.!\.\./igm,">");
    }


    $(document).on("click",".dt-buttons a",function(e){
      var pslipdata = JSON.parse($('#hideMyPower').html());

      alert(pslipdata);
      $.ajax({
        type: "POST",
        url:"<?php echo base_url(); ?>Clerk/paysheet_save",
        data:{pslipdata},
        dataType:"json",
        cache: false,
        success:function(r){
          alert("Success");
        },
        error:function(r){
          alert("Fail");
        }
      });
    });
  </script>