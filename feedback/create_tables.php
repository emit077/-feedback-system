<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="Student_feedback";
$dbconnected=@mysqli_connect($hostname,$username,$password,$dbname);
$dbsuccess=true;
if ($dbconnected) {
}
else
{
	echo "connection failed";
	$dbsuccess=false;
}
if ($dbsuccess) {
	$createTable_SQL = "CREATE TABLE Student_feedback.Student( ";
	$createTable_SQL .="sID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
	$createTable_SQL .= "password VARCHAR(50) NOT NULL, ";
	$createTable_SQL .= "FirstName VARCHAR(50) NOT NULL, ";
	$createTable_SQL .= "LastName VARCHAR(50) NOT NULL, ";
	$createTable_SQL .= "sBranch VARCHAR(150) NOT NULL, ";
	$createTable_SQL .= "sSemester VARCHAR(150) NOT NULL, ";
	$createTable_SQL .= "tempID int(10) NOT NULL, ";
	$createTable_SQL .= "is_submit VARCHAR(10) NULL)";
	if (mysqli_query($dbconnected,$createTable_SQL)) {
		echo "created table Student";
		# code...  
	}
	else{
		echo "table student not created";
	}
	//for  faculty TABLE  
	$createPersonTable_SQL = "CREATE TABLE Student_feedback.Faculty ( ";
	$createPersonTable_SQL .="fID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
	$createPersonTable_SQL .="FirstName VARCHAR(50) NOT NULL, ";
	$createPersonTable_SQL .="LastName VARCHAR(50) NOT NULL, ";
	$createPersonTable_SQL .="Contact_no INT(11) NOT NULL, ";
	$createPersonTable_SQL .="Email  VARCHAR(100) NOT NULL)";
	echo "$createPersonTable_SQL";
	if (mysqli_query($dbconnected,$createPersonTable_SQL)) {
		echo "created table FACULTY";
		# code...
	}
	else{
		echo "table FACULTY not creted";
	}


	//for faculty Assignment TABLE  
	$createPersonTable_SQL = "CREATE TABLE Student_feedback.Faculty_Assignment ( ";
	$createPersonTable_SQL .="fID INT(11) NOT NULL, ";
	$createPersonTable_SQL .="Semester VARCHAR(50) NOT NULL, ";
	$createPersonTable_SQL .="Branch VARCHAR(50) NOT NULL, ";
	$createPersonTable_SQL .="Subject VARCHAR(50) NOT NULL)";
	if (mysqli_query($dbconnected,$createPersonTable_SQL)) {
		echo "created table FACULTY Assignment";
		# code...
	}
	else{
		echo "table FACULTY Assignment not creted";
	}

	//for faculty Assignment TABLE  
	$createPersonTable_SQL = "CREATE TABLE Student_feedback.Feedback( ";
	$createPersonTable_SQL .="tempID INT(11) NOT NULL, ";
	$createPersonTable_SQL .="fID INT(11) NOT NULL, ";
	$createPersonTable_SQL .="Semester VARCHAR(50) NOT NULL, ";
	$createPersonTable_SQL .="Branch VARCHAR(50) NOT NULL, ";
	$createPersonTable_SQL .="Result INT(11) NOT NULL)";
	if (mysqli_query($dbconnected,$createPersonTable_SQL)) {
		echo "created table Feedback";
		# code...
	}
	else{
		echo "table Feedback not creted";
	}


}
	

?>