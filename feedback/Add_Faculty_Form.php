<?php
echo '<form action="Add_Faculty.php" method="POST">';
echo '
	<html>
	<h1>Faculty form</h1>
	<body>
		<table>
			<tr>
				<td><input type="hidden" name="ID"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="Name"></td>
			</tr>
			<tr>
				<td>Phone No.</td>
				<td><input type="text" name="PhoneNo" value=" "></td>
			</tr>
			<tr>
				<td>Email ID</td>
				<td><input type="text" name="EmailID"></td>
			</tr>
			<tr>
				<td>Branch</td>
				<td><input type="text" name="Branch"></td>
			</tr>
			<tr>
				<td>Semester</td>
				<td><input type="text" name="Semester"></td>
			</tr>
		</table>
	</body>
</html>
';
echo "<br/><br/>";
echo '<input type="submit" value="ADD"/>';
echo '</form>';
?>
				
