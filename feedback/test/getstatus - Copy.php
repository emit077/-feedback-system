<?php 
session_start();
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
require_once("connectdb.php");

$fID=$_POST['facID'];
$sbranch=$_SESSION['branch']; 
$sSem= $_SESSION['sem'];
if ($fID){
	
	$sudentquery = "SELECT * FROM `student` WHERE sBranch=\"$sbranch\" AND sSemester=\"$sSem\"";
	$results1 = $dbhandle->query($sudentquery);                                               
		while($row=$results1->fetch_assoc()) 
	{	
		$sID=$row["sID"];
		$query = "SELECT tempID FROM `feedback` WHERE fID=$fID AND tempID=$sID";
		$results = $dbhandle->query($query);                                               
			while($rs=$results->fetch_assoc()) 
		{
			echo '<span>'.$rs["tempID"].'</span>';	
			echo " ,";
		} 
	}
}
?>

</body>
</html>
