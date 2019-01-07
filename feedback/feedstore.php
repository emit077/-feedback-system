<?php 	
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "student_feedback";
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
		$sID=$_POST["sID"];
		$fID=$_POST["select"];

		echo "$sID <br>";
		echo "$fID<br>";
		$ans1=$_POST["ans1"];
		$ans2=$_POST["ans2"];
		$ans3=$_POST["ans3"];
		$ans4=$_POST["ans4"];
		$ans5=$_POST["ans5"];
		$ans6=$_POST["ans6"];
		$ans7=$_POST["ans7"];
		$ans8=$_POST["ans8"];
		$ans9=$_POST["ans9"];
		$ans10=$_POST["ans10"];
		$Branch=$_POST["Branch"];
		$Semester=$_POST["Semester"];
		$Result=($ans1+$ans2+$ans3+$ans4+$ans5+$ans6+$ans7+$ans8+$ans9+$ans10)/10;
		$table = "feedback";
		
	 	$select_sqlStudent = "SELECT is_submit FROM `student` WHERE sID=$sID";
		$student_SQLselect_Query = mysqli_query($dbconnected, $select_sqlStudent);
		While($row = mysqli_fetch_array($student_SQLselect_Query, MYSQLI_ASSOC))
		{
	 	   	$is_submit = $row['is_submit'];	
	 	   	echo "$is_submit<br>";
	 	}
	 	if ($is_submit>0&&$is_submit<6) 
		{ 
			$select_Student = "SELECT fID FROM `feedback` WHERE tempID=$sID";
			$student_SQLselect = mysqli_query($dbconnected, $select_Student);
			$count=0;
			While($row = mysqli_fetch_array($student_SQLselect, MYSQLI_ASSOC))
			{
	 	   		/*$tempID = $row['tempID'];	
	 	   		echo "$tempID <br>";*/
	 	   		$facID = $row['fID'];	
	 	   		echo "$facID <br>";
	 	   		$count++;
	 	   	}	
	 	   	echo "$count";
	 	   	if ($fID==$facID) 
	 	   	{
				echo "already submited for this faculty";
				echo '<a href="index.php">back to feedback</a>';
	 	   	}
			else
			{ 	
			 	$insert_sql = "INSERT INTO ".$table."( `tempID`, `fID`, `Semester`,  `Branch`,`Result`) VALUES ( '" .$sID . "', '" . $fID . "', '" . $Semester . "', '" . $Branch . "', '" . $Result . "')";
				if(mysqli_query($dbconnected,$insert_sql))
				{
					echo "Successful inserted on feedback table <br/>";
		 	   		$update_student="UPDATE `student` SET `is_submit`=$count+1 WHERE sID=$sID";
			 		if (mysqli_query($dbconnected, $update_student)) 
			 		{
						echo " student is_submited  update Successful.<br /><br />";
						//header("Location:sFeedback.php");
					}
					else
					{
						echo "student is_submit  update FAILED.<br /><br />";
						echo '<a href=index.php">back to feedback</a>';
		           	}
				}
				else
				{
						echo "Failed to insert on feedback table<br><br />";
						echo '<a href="index.php">back to feedback</a>';
				}
			}
		}
		else
		{
			echo "alreaady submited iscount is  greater than 6";
			echo '<a href="index.php">back to feedback</a>';
		}

		if ($is_submit==0) 
		{ 
			$insert_sql = "INSERT INTO ".$table."( `tempID`, `fID`, `Semester`,  `Branch`,`Result`) VALUES ( '" .$sID . "', '" . $fID . "', '" . $Semester . "', '" . $Branch . "', '" . $Result . "')";
		 	
			if(mysqli_query($dbconnected,$insert_sql))
			{
				echo "Successful Added <br/>";
			 	 $update_student="UPDATE `student` SET `is_submit`=1 WHERE sID=$sID";
			 	if (mysqli_query($dbconnected, $update_student)) 
			 	{
					echo " update is_submit Successful on student.<br /><br />";
				}
				else
				{
					echo "update is_submit FAILED on student.<br /><br />";
					echo '<a href="index.php">back to feedback</a>';
	 	       	}

			}
			else
			{
				echo "insert Failed on feedback";
				echo '<a href="index.php">back to feedback</a>';
			}
		}
	}		
?>