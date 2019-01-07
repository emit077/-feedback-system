<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "student_feedback";
	$dbconnect = @mysqli_connect($hostname, $username, $password, $db);
	$dbsuccess = true;
if($dbconnect)
	{
	}
else
	{
		echo "Mysql connection failed<br />";
		$dbsucess = false;
	}
if ($dbsuccess) 
	{
		echo '<form method=GET" action="Student_List.php">
			<label class="labletxt" for="Branch">Branch</label><br>
               <select class="combo" name="Branch">
                  <option value="0">select Branch</option>
                  <option >Information Technology</option>
                  <option >Computer Science </option>
                  <option >Mechanical</option> 
                  <option >Electronics & Telecommunication</option>
                  <option >Elecreical & Elecreonics</option>
                  <option >Civil</option>
                  <option >Mechatronic</option>
               </select><br>
               
               <label class="labletxt" for="Semester">Semester</label><br>
               <select class="combo" name="Semester">
                  <option value="0">select Semester</option>
                  <option>1st</option> <option>2nd</option>
                  <option>3rd</option> <option>4th</option>
                  <option>5th</option> <option>6th</option>
                  <option value="7th">7th</option> <option>8th</option>
               </select><br>
               <input type="submit" name="submit">
          	 </form>
			';
		$b=isset($_GET["Branch"]) ? $_GET["Branch"] : null;
		$a=isset($_GET["Semester"]) ? $_GET["Semester"] : null;

		if ($b!=null AND $a!=null) 
		{
			$select_sql = "SELECT * FROM `student` WHERE sBranch=\"$b\" And sSemester=\"$a\"";;
			$result = mysqli_query($dbconnect,$select_sql);
			echo '<table table border="1px">
				<tr> 
					<th>student ID</th>
					<th>Name</th>
					<th>Branch</th>
					<th>Semester</th>
				</tr>';	
				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				{
				echo "<tr>
						<td style='text-align:center; '> ".$row['sID']." </td>
						<td> ".$row['FirstName']." ".$row['LastName']." </td>
						<td> ".$row['sBranch']." </td>
						<td> ".$row['sSemester']. " </td>
					</tr>";				
				}
			echo "</table>";
		}
	}
?>