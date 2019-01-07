<?php 
	session_start();
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "student_feedback";
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
		$username=$_POST["username"];
		$password=$_POST["password"];

		$_SESSION['studentdentId'] = '';
		$_SESSION['branch'] = '';
		$_SESSION['sem'] = '';
		$student_SQLselect ="SELECT ";
		$student_SQLselect .="* ";
		$student_SQLselect .="FROM ";
		$student_SQLselect .="student where sID = ". $username ." and password = '".$password."'";
		//echo "$student_SQLselect";
		$student_SQLselect_Query=mysqli_query($dbconnected, $student_SQLselect);
		$numRow = mysqli_num_rows($student_SQLselect_Query);
		if($numRow > 0) {
			while($row=mysqli_fetch_array($student_SQLselect_Query, MYSQLI_ASSOC)) {
				$_SESSION['studentId'] = $row["sID"];
				$_SESSION['branch'] = $row["sBranch"];
				$_SESSION['sem'] = $row["sSemester"];
				$name=$row["FirstName"];
			}
			header("Location:sFeedback.php?name=$name");
		} 
		else{
			
				$username=$_POST["username"];
				$password=$_POST["password"];
				echo "$username";
				echo "<br>$password";
				$Admin_SQLselect =	"SELECT * FROM `admin` WHERE username=\"$username\" and password=\"$password\"";
				echo "$Admin_SQLselect";
				$Admin_Query=mysqli_query($dbconnected, $Admin_SQLselect);
				$numRo = mysqli_num_rows($Admin_Query);
				if($numRo > 0) {
					while($row=mysqli_fetch_array($Admin_Query, MYSQLI_ASSOC)) {
						$_SESSION['adminName'] = $row["username"];
					}
						header("Location:adminpanel.php");
				} 
				else{
						//echo "unsuccess";
						header("Location:login.php");
				}

		}

	}

 ?>