<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("connectdb.php");
//$db_handle = new DBController();


	$query ="SELECT distinct faculty.FirstName,faculty.LastName,faculty.fID, faculty.Contact_no,faculty.Email FROM faculty_assignment join faculty on faculty.fID=faculty_assignment.fID WHERE Branch = '" . $_POST["Searchid"] . "'";
	$results = $dbhandle->query($query);
?>
	<!-- <option value="">Select State</option> -->
	<table border="1" style="width: 900px">
		<tr>	
			<td >Faculty ID</td>
			<td >Name</td>
			<td >Contact no.</td>
			<td>Email Address</td>
		</tr>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<tr>
		<td><?php echo $rs["fID"]?></td>
		<td><?php echo $rs["FirstName"].$rs["LastName"] ?></td>
		<td><?php echo $rs["Contact_no"]?></td>
		<td><?php echo $rs["Email"]?></td>
	</tr>
	<!-- <option value="<?php echo $rs["fID"] ?>"><?php echo $rs["FirstName"].$rs["LastName"] ?></option> -->
	
	
<?php

}
?>
</table>
</body>
</html>