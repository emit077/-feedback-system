<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
require_once("connectdb.php");

$branch=$_GET['Branch'];
$sem=$_GET['Semester'];
if ($branch){

	if ($sem){
		$query = "SELECT  * FROM student WHERE sBranch=\"$branch\" AND sSemester=\"$sem\"";
		$results = $dbhandle->query($query);                                               
		echo '<div class="container">
			<table border="1"class="table table-hover" style="width: 50%;">
 		<thead>
 			<tr>	
 				<th >student ID</th>
 				<th >Name</th>
 			</tr>
 		</thead>
 		<tbody >';
 		while($rs=$results->fetch_assoc()) 
		{
			echo '<tr>';
			?>
			<td style="text-align: center;"><?php echo $rs["sID"]?></td>
 			<td style="text-align: center;"><?php echo $rs["FirstName"].$rs["LastName"] ?></td>
 			</tr>
 			<?php
		}

		echo "</tbody>
		</table>";

	}

}

?>
