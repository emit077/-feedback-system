<?php
	$hostname = "localhost";
	$username = "root";
	$psw = "";
	$dbname = "Student_Feedback_System";
	$dbconnect = @mysqli_connect($hostname, $username, $psw, $dbname);
	if($dbconnect){
		echo "Success";
		$dbSuccess = true;
	}
	else{
		echo "mysql connection fail<br>";
		$dbSuccess = false;
	}
	if($dbSuccess)
	{
		$select_sql = "SELECT  * FROM Faculty_Table ORDER BY Branch";
		$result = mysqli_query($dbconnect,$select_sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1'>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Phone No</th>
							<th>Email ID</th>
							<th>Branch</th>
							<th>Semester</th>
						</tr>";
					
			while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td> ".$row['ID']." </td>
								<td> ".$row['Name']." </td>
								<td> ".$row['PhoneNo']." </td>
								<td> ".$row['EmailID']." </td>
								<td> ".$row['Branch']." </td> 
								<td> ".$row['Semester']. " </td>
								<td> <a href = 'FacultyUpdateForm.php?ID=".$row['ID']."'> edit</a> </td>
							</tr>";
							
			}
			echo "</table>";
			
		}
		else{
			echo "0 result";
		}
	}
	$dbconnect->close();
?>