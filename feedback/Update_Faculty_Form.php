	<?php
	$hostname = "localhost";
	$username = "root";
	$psw = "";
	$dbname = "Student_Feedback_System";
	$dbconnect = @mysqli_connect($hostname, $username, $psw, $dbname);
	if($dbconnect){
		$dbSuccess = true;
	}
	else{
		$dbSuccess = false;
	}
	if($dbSuccess)
	{	
		$id = isset($_GET['ID'])?$_GET['ID']:null;
		if ($id>0) {
			$sql = " SELECT  * FROM Faculty_Table WHERE ID=$id";
			$result = mysqli_query($dbconnect,$sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$ID = $row['ID'];
				$Name = $row['Name'];
				$phone = $row['PhoneNo'];
				$email = $row['EmailID'];
				$branch = $row['Branch'];
				$sem = $row['Semester'];
			}
			
		}
		
	}
	else{
		echo "0 result";
	}
	echo '<form action="FacultyUpdated.php" method="POST">
<html>
	<h1>company form</h1>
	<body>
		<input type="hidden" name="id" value="'.$ID.'">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="'.$Name.'"></td>
			</tr>
			<tr>
				<td>PhoneNo</td>
				<td><input type="text" name="phone" value="'.$phone.'"></td>
			</tr>
			<tr>
				<td>EmailID</td>
				<td><input type="text" name="email" value="'.$email.'"></td>
			</tr>
			<tr>
				<td>Branch</td>
				<td><input type="text" name="branch" value="'.$branch.'"></td>
			</tr>
			<tr>
				<td>Semester</td>
				<td><input type="text" name="sem" value="'.$sem.'"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"></td>
			</tr>
		</table>
	</body>
</html>
</form>
';

?>