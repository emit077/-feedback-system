 
<?php
session_start();
  ?>
  <!DOCTYPE html>
   <html>
   <head>
     <title></title>
   </head>
   <body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <form action="" method="GET">
    <select name="selectBranch" id="selectBranch" class="combo" style=" width: 150px;margin-right: 20px"  >
      <option value=""> select branch</option>
      <option>IT</option>
      <option>CSE</option>
      <option>EEE</option>
      <option>ME</option>
      <option>Civil</option>
      <option>ETC</option>
    </select>
    <select name="selectSem" class="combo" id="SemList" onchange="getStatus()" style=" width: 150px;">
      <option value="">select semester</option>
      <option>7th</option>
      <option>5th</option>
      <option>3rd</option>
      <option>1st</option>
    </select>
    </form>
    <dir id="sBranchList"></dir>
    <div id="subStatus"></div>
     <script>
      function getStatus(){
        var v1 = $('#selectBranch').val();
        var v2 = $('#SemList').val();
       // alert(v1);
        $.ajax({
          type: "POST",
          url: "status_ajAx.php",
          data:{'Branch':v1,'Semester':v2},
          
          success: function(data){
            $("#sBranchList").html(data);
            // alert(data);
          }
        });
      }

    </script>

   </body>
   </html>
