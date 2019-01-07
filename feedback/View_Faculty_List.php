<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "student_feedback";
	$dbconnect = @mysqli_connect($hostname, $username, $password, $db);
	if($dbconnect)
	{
		echo "Success";
		$dbSuccess = true;
	}
	else
	{
		echo "mysql connection fail<br>";
		$dbSuccess = false;
	}
	if($dbSuccess)
	{
		$select_sql = "SELECT * FROM `faculty` ORDER by fID";
		$result = mysqli_query($dbconnect,$select_sql);
		echo '<table table border="1px">
			<tr>
				<th>faculty ID</th>
				<th>Name</th>
				<th>Contact no</th>
				<th>Email</th>
			</tr>';	
			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
			{
			echo "<tr>
					<td style='text-align:center; '> ".$row['fID']." </td>
					<td> ".$row['FirstName']." ".$row['LastName']." </td>
					<td> ".$row['Contact_no']." </td>
					<td> ".$row['Email']. " </td>
				</tr>";				
			}
		echo "</table>";
	}
	else
	{
		echo "0 result";
	}
?>