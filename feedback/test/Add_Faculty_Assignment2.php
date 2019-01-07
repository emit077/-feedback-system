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
				<table>
					<tr>
						<td>Faculty ID</td>
					<td><input type="text" name="id" readonly="readonly" value="'.$id.'"></td>
					</tr>
					<tr>
						<td>Semester</td>
						<td><input type="text" name="Semester"></td>
					</tr>
					<tr>
						<td>Branch</td>
						<td><input type="text" name="Branch"></td>
					</tr>
					<tr>
						<td>Subject</td>
						<td><input type="text" name="Subject"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit"></td>
					</tr>
				</table>
			</form>';
		}
		else{

			$select_sql = "SELECT fID,FirstName,LastName FROM faculty";
	$result = mysqli_query($dbconnect,$select_sql);
	
	echo '
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<form method="POST" action="Add_Faculty_Assignment.php">
			<h4>Faculty Assignment</h4>
			<select name ="faculty" id="getfac" onchange="getfacform()">
			<option value="0" label="coyvalue" selected="selected">..Select faculty..</option>';

				while ($row = mysqli_fetch_assoc($result)) {
					echo '<option value=' . $row['fID'] . '>'. $row['FirstName'] .' '. $row['LastName'] .'</option>';
				}
		echo '</select>';
		echo '</form>';

		echo '<div id="editform"></div>';

		}
}	
?>
<script type="text/javascript">
	function getfacform(){
        var v11 = $('#getfac').val();
       //var v2 = $('#SemList').val();
        alert(v11);
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