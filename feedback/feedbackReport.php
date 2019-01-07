<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <form action="" method="POST" action="FeedbackReport.php">
	    <select name="selectBranch" class="combo" style=" width: 150px;margin-right: 20px"  >
	      <option value=""> select branch</option>
	      <option value="IT">Information Technology</option>
	      <option value="CSE">Computer Science </option>
	      <option value="ME">Mechanical</option> 
	      <option value="ETC">Electronics & Telecommunication</option>
	      <option value="EEE">Elecreical & Elecreonics</option> 
	      <option value="Civil">Civil</option>
	      <option value="MEX">Mechatronic</option>
	    </select>
	    <select name="selectSem" class="combo" onchange="POSTStuList()" style=" width: 150px;">
	      <option value="">select semester</option>
	      <option>7th</option>
	      <option>5th</option>
	      <option>3rd</option>
	      <option>1st</option>
	    </select>
	    <input type="submit" name="POSTresult" value="generate Report ">
    </form>
 

<?php 
$branch=isset($_POST["selectBranch"]) ? $_POST["selectBranch"] : null;
$sem=isset($_POST["selectSem"]) ? $_POST["selectSem"] : null;
if($branch!=null AND $sem!=null)
{
	session_start();
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "student_feedback";
	$dbconnected = @mysqli_connect($hostname, $username, $password, $db);
	$dbsuccess = true;
// if($dbconnected)
// 	{
// 		echo "Mysql connection ok<br />";
// 	}
// else
// 	{
// 		echo "Mysql connection failed<br />";
// 		$dbsucess = false;
// 	}
if ($dbsuccess) 
	{

		$faculty_select ="SELECT distinct faculty.FirstName,faculty.LastName,faculty.fID, faculty.Contact_no,faculty.Email,faculty_assignment.Subject FROM faculty_assignment join faculty on faculty.fID=faculty_assignment.fID WHERE Branch = \"$branch\" AND semester=\"$sem\"";
		$faculty_select_Query=mysqli_query($dbconnected, $faculty_select);

		echo '
			<table border="2" style="width:50%">
				<tr>
					<th rowspan="2" >Faculty ID</th>
					<th rowspan="2" > Name</th>
					<th colspan="2" >Feedback Result</th>
				</tr>
				<tr>
					<th> persentages</th>
					<th>Grade</th>
				</tr>';

		$numRow1 = mysqli_num_rows($faculty_select_Query);
		//echo "$numRow1<br>";
		if($numRow1 > 0) {
			while($row=mysqli_fetch_array($faculty_select_Query, MYSQLI_ASSOC))
			{
				$username=$row["fID"];
				 // echo $row["fID"];
				 // echo $row["FirstName"];
				 // echo "<br>";
				 // echo $row["Subject"];
				 // echo "<br>";

				 echo '
				 	<tr>
				 		<td>'.$row["fID"].'</td>
				 		<td>'.$row["FirstName"].$row["LastName"].'</td>';

				 $feedback_select =	"SELECT * FROM `feedback` WHERE fID=\"$username\" and Branch=\"$branch\"and Semester=\"$sem\"";
				$feedback_select_Query=mysqli_query($dbconnected, $feedback_select);				
				$numRow = mysqli_num_rows($feedback_select_Query);
				// echo "numRow:$numRow<br>";
				if($numRow > 0) {
					$sum=0;
					while($row=mysqli_fetch_array($feedback_select_Query, MYSQLI_ASSOC))
					{
						 $sum=$row["Result"]+$sum; 
					}
					// echo "sum: $sum";
					// echo "<br>";
					$cal=($sum/($numRow*5))*100;
					echo '
						<td>'.$cal.'</td>
						<td></td>
					';
				} 
				else{
					echo "unsuccess<br><br>";
				} 		


			}
		} 
		else{
			echo "unsuccess";
		} 		
	}
}
 ?>
 </body>
</html>