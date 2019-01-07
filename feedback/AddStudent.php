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
		$Fname=$_POST["FirstName"];
		$Lname=$_POST["LastName"];
		$branch=$_POST["Branch"];
		$sem=$_POST["Semester"];
		{
			$query_insert="INSERT INTO `student`( `password`, `FirstName`, `LastName`, `sBranch`, `sSemester`) VALUES (\"cool\",\"$Fname\",\"$Lname\",\"$branch\",\"$sem\")";
			/*"INSERT INTO `student`(`password`, `FirstName`, `LastName`, `sBranch`, `sSemester`) VALUES (\'common\',\'$Fname\', \'$Lname\', \'$branch\', \'$sem\' )";*/
			echo "$query_insert";
			if (mysqli_query($dbconnected,$query_insert)) 
			{
		 		header("Location:adminpanel.php");
			}
			else{	
				echo "not inserted";
			
			}
		}
	}

 ?>