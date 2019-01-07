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
		echo "student ID:$sID <br>";
		$query = "SELECT distinct tempID FROM `feedback` WHERE fID=$fID";
		$results = $dbhandle->query($query);                                               
			while($rs=$results->fetch_assoc()) 
		{
			// echo '<span>'.$rs["tempID"].'</span>';	
			// echo " ,";
			if ($sID!=$rs["tempID"]) 
			{	echo " notsubmit:";
				echo $row["sID"];
				echo ","	;
			} else{
				echo "submited:";
				echo $row["sID"];
				echo ",";

			}

		} 
	}
}
?>

</body>
</html>
