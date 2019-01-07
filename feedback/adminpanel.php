<?php 
session_start();
if (!isset($_SESSION["adminName"])) {
  header("Location:login.php");
}
else{
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<title>admin panel</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/style_adminpanel.css">
	<script>
    function openEditProfile() {
      document.getElementById("editProfile").style.width = "100%";
    }
    function closeEditProfile() {
      document.getElementById("editProfile").style.width = "0%";
    }

    function open_Student_List() {
      document.getElementById("StudentList").style.width = "100%";
    }
    function close_Student_List() {
      document.getElementById("StudentList").style.width = "0%";
    }

    function open_Update_Student() {
      document.getElementById("UpdateStudent").style.width = "100%";
    }
    function close_Update_Student() {
      document.getElementById("UpdateStudent").style.width = "0%";
    }

    function open_Delete_Student() {
      document.getElementById("DeleteStudent").style.width = "100%";
    }
    function close_Delete_Student() {
      document.getElementById("DeleteStudent").style.width = "0%";
    }

    function open_Add_StuForm() {
      document.getElementById("AddStudent").style.width = "100%";
    }
    function close_Add_StuForm(){
      document.getElementById("AddStudent").style.width = "0%";
    }

    function open_Faculty_List() {
      document.getElementById("FacultyList").style.width = "100%";
    }
    function close_Faculty_List() {
      document.getElementById("FacultyList").style.width = "0%";
    }

    function open_Add_Faculty() {
      document.getElementById("AddFaculty").style.width = "100%";
    }
    function close_Add_Faculty() {
      document.getElementById("AddFaculty").style.width = "0%";
    }

    function open_Update_Faculty() {
      document.getElementById("UpdateFaculty").style.width = "100%";
    }
    function close_Update_Faculty() {
      document.getElementById("UpdateFaculty").style.width = "0%";
    }

    function open_Delete_Faculty() {
      document.getElementById("DeleteFaculty").style.width = "100%";
    }
    function close_Delete_Faculty() {
      document.getElementById("DeleteFaculty").style.width = "0%";
    }

  </script>
</head>

<body>
   <header>
     <div id="headcontainer">
  		<h1>FEEDBACK SYSTEM</h1>
  	 </div>
  	 <div class="navbar">
      <a class="active" href="index.php"><img src="images/home.svg" style="width: 50px;height: 50px;"><br>Home</a>
         <div class="dropdown">
            <button class="dropbtn"><img src="images/fac1.png" style="width: 50px;height: 50px;"><br>Manage Faculty </button>
            <div class="dropdown-content">
   		      <span style="" onclick="open_Faculty_List()"> List of Faculty</span>
   		      <span style="" onclick="open_Add_Faculty()"> Add Faculty</span>
   		     <span style="" onclick="open_Update_Faculty()"> Update Faculty Details</span>
   		     <span style="" onclick="open_Delete_Faculty()">Delete Faculty Details</span>
            </div>
         </div> 
         <div class="dropdown">
            <button class="dropbtn"><img src="images/students.png" style="width: 50px;height: 50px;"><br>Manage Student</button>
            <div class="dropdown-content">
               <span style="" onclick="open_Student_List()"> List of Student</span>
	             <span style="" onclick="open_Add_StuForm()"> Add student</span>
               <span style="" onclick="open_Update_Student()"> Update Students</span>
               <span style="" onclick="open_Delete_Student()">Delete Student</span>
	         </div>

         </div> 
         <a href="#about"><img src="images/aboutUs2.png" style="width: 50px;height: 50px;"><br>About</a>
         <a href="logout.php" style="position: absolute;right: 0px   ">
           <img src="images/login.svg" style="width: 50px;height: 50px;"><br>Logout
         </a>
      </div>
   </header>

  <!--<div style="text-align: center;">
	  <img src="images/bg.jpg" style="height: 250px;width: 250px;text-align; margin-top: 20px;">
	  <Br><b style="font-size: 20px;color: darkblue;font-weight: 5">
   	AMIT KUMAR SAHU<br>DATABASE ADMINISTRATOR</b>
    <a href="feedbackReport.php"> Report</a>
    <a href="viewStatus.php">cheak status</a>

    <center>
	   	<span style="font-size:20px;cursor:pointer" onclick="openEditProfile()">Edit Profile</span>
    </center>
  </div> -->
    <div style="display: inline-block;width: 99.8%; padding: 1px; background-color: #; height:350px; position: relative;">
            <div class="container" style="position: relative;  top: 30px;left: 120px">
              
                      <a class="adminpic" target="_blank" href="bg.jpg">
                      <img src="images/bg.jpg" style="height: 250px;width: 250px;text-align; margin-top: 16px; "></a>
                      <Br>
                      <span style="font-size:20px;cursor:pointer" onclick="openEditProfile()">Edit Profile</span> 
                 
            </div>
              <div class="adminpf" style="position:absolute; right:480px; top:80px">
                    <b style="font-size: 20px;color: darkblue;font-weight: 5;">
                     Name: AMIT KUMAR SAHU<br><br>Designation:DATABASE ADMINISTRATOR</b>
                    <br><br><br>  <br><br>
                    <a href="viewStatus.php"> <button class="button button1">Get Status</button></a>
                    <a href="feedbackReport.php" ><button class="button button2">Generate report</button></a>
              
             </div>
    </div>

  <footer>
      <div id="footcontainer">
        || <a href="index.php">Home</a> ||
        <a href="contact.php">Contact Us</a> ||
        <a href="about.php">About Us</a> || 
        <a href="login.php">Login</a> ||
        <br>
        Feedback System is optimized to give feedback.We do not warrent the correctness of its content.     
        <br>
        &copy; 2018 by amitrimaanjali. All rights reserved

      </div>
  </footer>
   <!-- -------------------------------------Edit profile------------------------------------ -->

  <div id="editProfile" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeEditProfile()">&times;</a>

    <?php
        include('DBconnect.php');
        $dbconnected = @mysqli_connect($hostname, $username, $password, $db);
        $dbsuccess = true;
        if($dbconnected)
        {
          echo "Mysql connection ok<br />";
        }
        else
        {
          echo "Mysql connection failed<br />";
          $dbsucess = false;
        }
      if ($dbsuccess) 
        {
            $sql_select_admin = "SELECT * FROM `student` WHERE sID=15001";
            $sql_select_admin_Query=mysqli_query($dbconnected, $sql_select_admin);
            while($row=mysqli_fetch_array($sql_select_admin_Query, MYSQLI_ASSOC))
           {
            $n=$row['FirstName'];
            $l=$row['LastName'];
          } 
        echo '
        <div class="overlay-content">
            <form action="validate.php" method="POST">
              <input  type="text" name="username" placeholder="Username" value="'.$n.'" class="textinput" ><br>
              <input type="text" name="password" placeholder="Password" value="'.$l.'" class="textinput" >
              <button class="submit" type="submit" style="">
                  <img src="css/arrow-right.png" height="24px" />
              </button>
            </form>
        </div>';
      }
      ?>
   </div>


<!-- -------------------------------------Student----------------------------------------- -->
<!-- view Student list overlay -->

<div id="StudentList" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Student_List()">&times;</a>
  <center>
    <h1>View Student List</h1>
    <?php include "connectdb.php"; ?>
    <script>
      function getStuList(){
        var v1 = $('#selectBranch').val();
        var v2 = $('#SemList').val();
        $.ajax({
          type: "GET",
          url: "ajAx.php",
          data:{'Branch':v1,'Semester':v2},
          
          success: function(data){
            $("#sBranchList").html(data);
            // alert(data);
          }
        });
      }

    </script>
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
    <select name="selectSem" class="combo" id="SemList" onchange="getStuList()" style=" width: 150px;">
      <option value="">select semester</option>
      <option>7th</option>
      <option>5th</option>
      <option>3rd</option>
      <option>1st</option>
    </select>
    </form>
    <div class="text-center container" id="sBranchList"></div>
    <!-- <table id="sBranchList" class="table table-hover" style="width: 30%;">
      
    </table> -->
    <!-- <div id="sBranchList">
    </div> -->
  </center>
</div>

<!-- ------------- -->
<!-- Add student Form by using overlay -->

<div id="AddStudent" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Add_StuForm()">&times;</a>
  <div class="overlay-content">
     <div style="width: 42%;text-align: left; margin-left:29% ">
        <form action="AddStudent.php" method="POST">
           <label class="labletxt" for="FirstName">First Name</label><br>
           <input  type="text" name="FirstName" placeholder="Enter First Name" class="textinput" ><br>
           
           <label class="labletxt" for="LastName" >Last Name</label><br>
           <input type="text" name="LastName" placeholder="Enter Last Name"  class="textinput" ><br>
           
           <label class="labletxt" for="Branch">Branch</label><br>
           <select class="combo" name="Branch">
              <option value="0">select Branch</option>
              <option value="IT">Information Technology</option>
              <option value="CSE">Computer Science </option>
              <option value="ME">Mechanical</option> 
              <option value="ETC">Electronics & Telecommunication</option>
              <option value="EEE">Elecreical & Elecreonics</option> 
              <option value="Civil">Civil</option>
              <option value="MEX">Mechatronic</option>
           </select><br>
           
           <label class="labletxt" for="Semester">Semester</label><br>
           <select class="combo" name="Semester">
              <option value="0">select Semester</option>
              <option>1st</option> <option>2nd</option>
              <option>3rd</option> <option>4th</option>
              <option>5th</option> <option>6th</option>
              <option>7th</option> <option>8th</option>
           </select><br>    
           <button class= "submit" type="submit" onclick="ale()">
               <img src="css/arrow-right.png" height="24px" />
           </button>
        </form>
     </div>
  </div> 
</div>
<script type="text/javascript">
  function ale(){
    alert("Added Student successfully");
  }
</script>
<!-- --------------------------  -->  

<!-- Update Student overlay -->

<div id="UpdateStudent" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Update_Student()">&times;</a>  
        <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <style>  
           ul{  
                background-color:#eee;  
                cursor:pointer; 
                padding-left: 5px; 
                list-style-type: none;
}
           }  
           li{  
                padding:5px;
                text-align: left;  
           }  
           input{
            padding: 5px;

           }
           </style>  
      </head>  
           <br /><br />  
           <center>
             <div class="overlay-content" style="position: absolute;left: 350px;top:70px;" >
                <form>  
                <label>Enter Search Name</label> <br> 
                <input type="text" name="Search" id="cleartext" class="Search findstu hide" placeholder="Enter Search Name" autocomplete="off" style="width: 250px" onchange="hide(this.value)">
                <input type="button" name="button" onclick="autodata()" value="search"> 
                <div class="SearchList" style="margin-left: 170px; width: 267px; text-align: left;" ></div>
                </form>  
                <div id="sList" class="myDiv"></div>  
                <div id="sForm"></div>
              </div>
            </center>
 <script>  
 $(document).ready(function(){  
      $('.Search').keyup(function(){  
           var query = $(this).val();

           if(query != '')  
           {  
                $.ajax({  
                     url:"Studentsearch.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('.SearchList').fadeIn();  
                          $('.SearchList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('.Search').val($(this).text());  
           $('.SearchList').fadeOut();  
      });  
 });  

 function autodata(){
  var v1 = $('.findstu').val();
  //alert(v1);
  $.ajax({
          type: "GET",
          url: "findstudent.php",
          data:{'studentname':v1},
          
          success: function(data){
            $("#sList").html(data);
            // alert(data);
          }
        });
 }

$('.hide').on('input',function(){
    if( $(this).val() == "" )
        $('.myDiv').hide();
    else
        $('.myDiv').show();
});
$('.hide').on('input',function(){
    if( $(this).val() == "" )
        $('.myDiv').hide();
    else
        $('.myDiv').show();
});
 
/*  function eraseText() {
     document.getElementsByClassName("cleartext").value = "";
}*/
  </script>  
</div>

<!-- ------------------- -->

<!-- Delete Student overlay -->

<div id="DeleteStudent" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Delete_Student()">&times;</a>

</div>

<!-- ------------------- -->

<!--------------------------------------Faculty------------------------------------------- -->

<!-- view facultylist overlay -->

<div id="FacultyList" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Faculty_List()">&times;</a>
  <center><h1>view Faculty List</h1>
      <script>
        function getList(val)  
        {
          $.ajax
          ({
              type: "POST",
              url: "get_state.php",
              data:'Searchid='+val,
              success: function(data)
              {
                $("#state-list").html(data);
              }
          });
        }

      </script> 
  <center>
    <select name="Search" id="Search-list" class="combo"  onChange="getList(this.value);" >
    <option value="">Select Branch</option>
    <?php
    $sql1="SELECT distinct sBranch FROM student";
         $results=$dbhandle->query($sql1); 
    while($rs=$results->fetch_assoc()) { 
      $branch=$rs["sBranch"];
    ?>
    <option ><?php echo "$branch"  ?></option>
    <?php
    }
    ?>
    </select>
  </center>.
    <table border="1" id="state-list" name="state" style="width: 60%">
     <!--  <tr>
        <th style="">name</th>
      </tr> -->
    </table>
    
  </center>
</div>  
<!-- -------------- -->

<!-- ADD Faculty overlay -->

<div id="AddFaculty" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Add_Faculty()">&times;</a>
  <center><h1>Add Faculty</h1></center>
  <div style="margin-bottom: 5%;">
    <div class="overlay-content" style="top: 0px">
     <div style="width: 75%;text-align: center; margin-left:12% ">
       <input type="button" name="abc" onclick="Faculty_assignment()"  value="Assign more Branch >>"
      style="width: 50%; border: none;font-family: verdana,san sarif; font-size: 18px; background-color: #1e90ff; color: white; border-radius: 5px;position: absolute;left: 25% "><br><br>
      <form action="Add_Faculty.php" method="POST">
         <input type="hidden" name="ID">
         <table style="width: 100%;border-right: 3px; border-color:#1e90ff; margin-left: 20px ">
          <tr>
            <td><label class="labletxt"> First Name</label></td>
            <td><input type="text" class="textinput" name="FirstName" placeholder="First Name" style="margin-bottom: 0px" ></td>
          </tr>
          <tr>
            <td><label class="labletxt"> Last Name</label></td>
            <td><input type="text" class="textinput" name="LastName" placeholder="Last Name" style="margin-bottom: 0px"><br></td>
          </tr>
          <tr>
            <td><label class="labletxt">Phone No</label></td>
            <td><input type="text" class="textinput" name="PhoneNo" placeholder="12345467890" style="margin-bottom: 0px"></td>
          </tr>
          <tr>
            <td><label class="labletxt">Email ID</label><br></td>
            <td><input type="text" class="textinput" name="EmailID" placeholder="xyz@abc.com" style="margin-bottom: 0px"></td>
          </tr>
          <tr>
            <td><label class="labletxt">Branch</label></td>
            <td>
              <select class="combo" name="Branch" style="margin-bottom: 0px">
                <option value="0">select Branch</option>
                <option value="IT">Information Technology</option>
                <option value="CSE">Computer Science </option>
                <option value="ME">Mechanical</option> 
                <option value="ETC">Electronics & Telecommunication</option>
                <option value="EEE">Elecreical & Elecreonics</option> 
                <option value="Civil">Civil</option>
                <option value="MEX">Mechatronic</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label class="labletxt">Semester</label></td>
            <td>
              <select class="combo" name="Semester" style="margin-bottom: 0px">
                <option value="0">select Semester</option>
                <option>1st</option> <option>2nd</option>
                <option>3rd</option> <option>4th</option>
                <option>5th</option> <option>6th</option>
                <option>7th</option> <option>8th</option>
              </select>
            </td>
          </tr>
        </table><br>
          <input type="submit" value="Submit" style="width: 50%; border: none;font-family: verdana,san sarif; font-size: 18px; background-color: #1e90ff; color: white; border-radius: 5px" /><br><br>
      </form>
      <div id="edit"></div>
      <script type="text/javascript">
        function Faculty_assignment(){
         // alert("hello")
           $.ajax({
          url: "Add_Faculty_Assignment.php",
                success: function(data){
                  $("#edit").html(data);
                  // alert(data);
                }
              });
        }
      </script>
    </div>
  </div>
</div>
</div>

<!-- ------------------- -->

<!-- Update Faculty overlay -->

<div id="UpdateFaculty" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Update_Faculty()">&times;</a>
 <center><h1>UPdate Faculty List</h1>
      <script>
        function getFacList(val)  
        {
          alert(val);
          $.ajax
          ({
              type: "POST",
              url: "UpFindFac1.php",
              data:'facbranch='+val,
              success: function(data)
              {
                $("#Facultylist").html(data);
              }
          });
        }

        

      </script> 
  <center>
    <select name="Search" id="Search-list" class="combo"  onChange="getFacList(this.value);" >
      <option value="">Select Branch</option>
      <option value="IT">Information Technology</option>
      <option value="CSE">Computer Science </option>
      <option value="ME">Mechanical</option> 
      <option value="ETC">Electronics & Telecommunication</option>
      <option value="EEE">Elecreical & Elecreonics</option> 
      <option value="Civil">Civil</option>
      <option value="MEX">Mechatronic</option>
      <option ><?php echo "$branch"  ?></option>
    </select>
  </center>.
    <div id="Facultylist" style="width: 70%"> </div>
    <div id="deleted"></div>
    
  </center>
</div>

<!-- ------------------- -->

<!-- Delete Faculty overlay -->

<div id="DeleteFaculty" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_Delete_Faculty()">&times;</a>
  <center>
    

  </center>
</div>

<!-- ------------------- -->


</body>
</html>
<?php
   } 
?>