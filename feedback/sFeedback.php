<?php 
session_start();
if (!isset($_SESSION["studentId"]))
{
	header("Location:login.php");
}
else
{
	$name=$_GET['name'];
	echo '
	<!DOCTYPE html>
	<html>
	<head>
		<title>admin panel</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/sFeedback.css">
	</head>
	<body>

		<header>
			<div id="headcontainer">
				<h1>FEEDBACK SYSTEM</h1>
			</div>
			<div class="navbar">
		      <a class="active" href="index.php"><img src="images/home.svg" style="width: 50px;height: 50px;"><br>Home
		      	</a>
		 	  <a href="#contact"><img src="images/contact-128.png" style="width: 50px;height: 50px;"><br>Contact Us</a>
		      <a href="#about"><img src="images/aboutUs2.png" style="width: 50px;height: 50px;"><br>About Us</a>
		      <a href="logout.php" style="position: absolute;right: 0px;"><img src="images/login2.svg" style="width: 50px;height: 50px;"><br>'.$name.'</a>
			</div>
		</header>';
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$db = "student_feedback";
				//include('D:\xampp\htconfig\dbconfig2.php');
				$dbconnected = @mysqli_connect($hostname, $username, $password, $db);
				$dbsuccess = true;
				/*if($dbconnected)
				{
					//echo "Mysql connection ok<br />";
				}
				else
				{
					echo "Mysql connection failed<br />";
					$dbsucess = false;
				}*/
				if ($dbsuccess) 	
				{
					$sID=$_SESSION['studentId']; 
					$Branch=$_SESSION['branch']; 
					$Semester=$_SESSION['sem']; 
					$student_SQLselect= "SELECT * FROM faculty_assignment JOIN faculty ON faculty.fID=faculty_assignment.fID WHERE faculty_assignment.Semester=\"$Semester\"AND faculty_assignment.Branch=\"$Branch\"";
		
					$student_SQLselect_Query=mysqli_query($dbconnected, $student_SQLselect);

					echo '<center>
					<form method="POST" action="feedstore.php">
					<select name="select" style="border-color: #4236f48c;" required="required">
		   				<option value="" selected="selected">---select faculty---</option> ' ;
						$index=1;
						while($row=mysqli_fetch_array($student_SQLselect_Query, MYSQLI_ASSOC))
						{		
							$FirstName=$row['FirstName'];
							$LastName=$row['LastName'];
							$Subject=$row['Subject'];
							$fID=$row['fID'];
							echo "<option value='$fID'>".$FirstName." ".$LastName."</option>";
							//$index++;
						}	
					echo "</select>";
				}
				echo "</center>";
				echo '<input type="hidden" name="Semester" value="'.$Semester.'">
				<input type="hidden" name="Branch" value="'.$Branch.'">
				<input type="hidden" name="sID" value="'.$sID.'">';
				echo '
					<center>
						<table style="text-align: left; width: 65%; background-color: white;border-radius: 5px; border-collapse: collapse; margin-bottom: 20px; ">
							<tr>
							<td>1. Does the Faculty comes on time?</td>
							<td> 
								 <input type="radio" name="ans1" value="1" required="required"> Always<br>
								 <input type="radio" name="ans1" value="2"> Usually<br>
								 <input type="radio" name="ans1" value="3"> Often<br>
							 	 <input type="radio" name="ans1" value="4"> Sometime<br>
							 	 <input type="radio" name="ans1" value="5"> Never
							</td>
						</tr>
						<tr>
							<td>2. Faculty is well planned and prepared.</td>
							<td> 
								 <input type="radio" name="ans2" value="1" required="required"> Always<br>
								 <input type="radio" name="ans2" value="2"> Usually<br>
								 <input type="radio" name="ans2" value="3"> Often<br>
								 <input type="radio" name="ans2" value="4"> Somtime<br>
								 <input type="radio" name="ans2" value="5"> Never
							</td>
						</tr>
						<tr>
							<td>3. Faculty speaks clearly and audibly.</td>
							<td> 
								 <input type="radio" name="ans3" value="1" required="required"> Always<br>
								 <input type="radio" name="ans3" value="2"> Usually<br>
								 <input type="radio" name="ans3" value="3"> Often<br>
								 <input type="radio" name="ans3" value="4"> Sometime<br>
								 <input type="radio" name="ans3" value="5"> Never
							</td>
						</tr>
						<tr>
							<td>4. Faculty writes/draws clearly.</td>
							<td> 
								 <input type="radio" name="ans4" value="1" required="required"> Always<br>
								 <input type="radio" name="ans4" value="2"> Usually<br>
								 <input type="radio" name="ans4" value="3"> Often<br>
								 <input type="radio" name="ans4" value="4"> Sometime<br>
								 <input type="radio" name="ans4" value="5"> Never
							</td>
						</tr>
						<td>5. Faculty provides real time example.</td>
							<td> 
								 <input type="radio" name="ans5" value="1" required="required"> Always<br>
								 <input type="radio" name="ans5" value="2" required="required"> Usually<br>
								 <input type="radio" name="ans5" value="3"> Often<br>
								 <input type="radio" name="ans5" value="4"> Sometime<br>
								 <input type="radio" name="ans5" value="5"> Never
							</td>
						</tr>
						</tr>
						<td>6. The Faculty used a variety of instrctional methods to reach the course objectives(e.g. GD,studentent presentation,etc.).</td>
							<td> 
								 <input type="radio" name="ans6" value="1" required="required"> Always<br>
								 <input type="radio" name="ans6" value="2"> Usually<br>
								 <input type="radio" name="ans6" value="3"> Often<br>
								 <input type="radio" name="ans6" value="4"> Sometime<br>
								 <input type="radio" name="ans6" value="5"> Never
							</td>
						</tr>
						
						<td>7. The Faculty was accessible outside of class.</td>
							<td> 
								 <input type="radio" name="ans7" value="1" required="required"> Always<br>
								 <input type="radio" name="ans7" value="2" required="required"> Usually<br>
								 <input type="radio" name="ans7" value="3"> Often<br>
								 <input type="radio" name="ans7" value="4"> Sometime<br>
								 <input type="radio" name="ans7" value="5"> Never
							</td>
						</tr>
						<tr>
						<td>8. The syllabus was explained at the beginning of the course.</td>
							<td> 
								 <input type="radio" name="ans8" value="1" required="required"> Always<br>
								 <input type="radio" name="ans8" value="2"> Usually<br>
								 <input type="radio" name="ans8" value="3"> Often<br>
								 <input type="radio" name="ans8" value="4"> Sometime<br>
								 <input type="radio" name="ans8" value="5"> Never
							</td>
						</tr>
						<tr>
						<td>9. How often has this teacher taught you things that you did not know before taking the class.</td>
							<td> 
								 <input type="radio" name="ans9" value="1"required="required"> Always<br>
								 <input type="radio" name="ans9" value="2"> Usually<br>
								 <input type="radio" name="ans9" value="3"> Often<br>
								 <input type="radio" name="ans9" value="4"> Sometime<br>
								 <input type="radio" name="ans9" value="5"> Never
							</td>
						</tr>
						<tr>
							<td>10. The faculty was able to capture the attention of the student.</td>
								<td> 
									 <input type="radio" name="ans10" value="1"required="required"> Always<br>
									 <input type="radio" name="ans10" value="2"> Usually<br>
									 <input type="radio" name="ans10" value="3"> Often<br>
									 <input type="radio" name="ans10" value="4"> Sometime<br>
									 <input type="radio" name="ans10" value="5"> Never
								</td>
						</tr>
						<tr>

								<td colspan="2" style=" text-align:  center;">
									<input type="submit" name="submit feedback" value="submit">
								</td>
							</tr>
						</table>
					</center>
					</form>
			
			<footer>
      			<div id="footcontainer" style=" height: 50px;">
        			||<a href="index.php">Home</a>||
        			<a href="contact.php">Contact Us</a>||
        			<a href="about.php">About Us</a>|| <br>
        			Feedback System is optimized to give feedback.We do not warrent the correctness of its content.     <br>
        			&copy; 2018 by amitrimaanjali. All rights reserved

     			 </div>
  			</footer>
		</body>
	</html>';
	}
?>