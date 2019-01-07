<?php
$id = $_POST["ID"];
$fname = $_POST["FirstName"];
$lname = $_POST["LastName"];
$phone = $_POST["PhoneNo"];
$email = $_POST["EmailID"];
$hostname = "localhost";
$username = "root";
$psw = "";
$dbname = "student_feedback";
$dbconnect = @mysqli_connect($hostname, $username, $psw, $dbname);
if($dbconnect){
	echo "connection ok";
	$dbSuccess = true;
}
else{
	$dbSuccess = false;
}
if($dbSuccess)
{
	$table = "faculty";
	$insert_sql = "INSERT INTO ".$table."(`FirstName`, `LastName`, `Contact_no`, `Email`) VALUES ( '"  . $fname . "', '" . $lname ."', '" . $phone . "', '" . $email . "')";

	if(mysqli_query($dbconnect,$insert_sql)){
		echo "Successful Added ";
	}
	else{
		echo "Failed";
	}
}

?>