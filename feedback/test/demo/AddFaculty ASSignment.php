<?php
$hostname = "localhost";
$username = "root";
$psw = "";
$dbname = "student_feedback";
$dbconnect = @mysqli_connect($hostname, $username, $psw, $dbname);
if($dbconnect){
	//echo "dbSuccess";
	$dbSuccess = true;
}
else{
	//echo "fail";
	$dbSuccess = false;
}
if($dbSuccess)
{
	
		if (isset($_POST['fID'])) 
		{
			$id = $_POST['fID'];
			echo '
				<form method="POST" action="insert_faculty_assignment.php">
			
						<lable class="labletxt" style="color: #1e90ff80;" > Faculty ID</lable>
						<input type="text" name="id" readonly="readonly" value="'.$id.'" class="textinput" style="color: #00000080;">

							<label class="labletxt">Branch</label> 
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
				            <label class="labletxt">Semester</label>
				            <select class="combo" name="Semester">
				              <option value="0">select Semester</option>
				              <option>1st</option> <option>2nd</option>
				              <option>3rd</option> <option>4th</option>
				              <option>5th</option> <option>6th</option>
				              <option>7th</option> <option>8th</option>
				            </select>
							<lable class="labletxt">Subject</lable>
							<input type="text" class="textinput" name="Subject">
							<input type="submit" value="submit" style="width: 100%; color: white; background-color: #1e90ff; border-radius: 5px; font-family: verdana,san sarif; border: none; font-size: 18px;" ><br><br>
				</form>
			'; 
		}
		else{

		echo '
		<!--  <div class="overlay-content" style="position: absolute;left: 0px;top:90px; width:100%; height: 80%; padding-top:35px">
        	<div style="width: 42%;text-align: left; margin-left:29% "> -->
	';

			$select_sql = "SELECT fID,FirstName,LastName FROM faculty";
	$result = mysqli_query($dbconnect,$select_sql);
	
	echo '
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<form method="POST" action="Add_Faculty_Assignment.php">
			<center><h4>Faculty Assignment</h4></center>
			<label class="labletxt">Select Faculty</label>
			<select name ="faculty" class="combo" id="getfac" onchange="getfacform()"

			<option value="0" label="coyvalue" selected="selected">..Select faculty..</option>';

				while ($row = mysqli_fetch_assoc($result)) {
					echo '<option value=' . $row['fID'] . '>'. $row['FirstName'] .' '. $row['LastName'] .'</option>';
				}
		echo '</div></select>';
		echo '</form>';

		echo '<div id="editform" style="margin-top: 10px "></div>';
		 echo '<!-- </div>
			</div> -->'; 

		}
}	
?>
<script type="text/javascript">
	function getfacform(){
        var v11 = $('#getfac').val();
       //var v2 = $('#SemList').val();
        //alert(v11);
        $.ajax({
          type: "POST",
          url: "Add_Faculty_Assignment.php",
          data:{'fID':v11},
          
          success: function(data){
            $("#editform").html(data);
            // alert(data);
          }
        });
      }

</script>
