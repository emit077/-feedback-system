<?php
$id = $_POST["id"];
$Semester = $_POST["Semester"];
$Branch = $_POST["Branch"];
$Subject = $_POST["Subject"];
//$facultyid = $_POST["faculty"];
$hostname = "localhost";
$username = "root";
$psw = "";
$dbname = "student_feedback";
$dbconnect = @mysqli_connect($hostname, $username, $psw, $dbname);
if($dbconnect){
	echo "dbSuccess";
	$dbSuccess = true;
}
else{
	echo "fail";
	$dbSuccess = false;
}
if($dbSuccess)
{
	echo $id;
	$table = "faculty_assignment";
	$insert_sql = "INSERT INTO ".$table."(`fID`,`Semester`, `Branch`, `Subject`) VALUES (  '" . $id ."', '"  . $Semester . "', '" . $Branch ."', '" . $Subject . "')";

	if(mysqli_query($dbconnect,$insert_sql)){
		echo "Successful Added ";
	}
	else{
		echo "Failed";
	}
}
?>