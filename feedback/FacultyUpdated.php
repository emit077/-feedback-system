<?php
$hostname = "localhost";
$username = "root";
$psw = "";
$dbname = "Student_Feedback_System";
$dbconnect = @mysqli_connect($hostname, $username, $psw, $dbname);
if($dbconnect){
	echo "mysql connection successful<br>";
	$dbSuccess = true;
}
else{
	echo "mysql connection fail<br>";
	$dbSuccess = false;
}
if($dbSuccess)
	{
		$id = $_POST["id"];
		$n = $_POST["name"];
		$p = $_POST["phone"];
		$e = $_POST["email"];
		$b = $_POST["branch"];
		$s = $_POST["sem"];
		$update_sql = 'UPDATE Faculty_Table SET Name="'.$n.'",PhoneNo="'.$p.'",EmailID="'.$e.'",Branch="'.$b.'",Semester="'.$s.'" WHERE ID='.$id;

	if (mysqli_query($dbconnect, $update_sql)) {

		echo "UPDATED FACULTY DATA SUCCESSFULLY<br>";
	
	}
	else{
		echo "UPDATE FAILED<br>";
	}
	echo "<br/><br/>";
	echo '<a href = "FacultyUpdate.php"> Edit Another Data</a>';
}
?>