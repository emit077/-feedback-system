<?php
echo '
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<form action="Add_Faculty.php" method="POST">';
echo '
	<h1>Faculty form</h1>
		<table>
			<tr>
				<td><input type="hidden" name="ID"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="FirstName" placeholder="First Name">
					<input type="text" name="LastName" placeholder="Last Name"></td>
				</td>
			</tr>

			<tr>
				<td>Phone No.</td>
				<td><input type="text" name="PhoneNo" placeholder="12345467890"></td>
			</tr>
			<tr>
				<td>Email ID</td>
				<td><input type="text" name="EmailID" placeholder="xyz@abc.com"></td>
			</tr>
			<tr>
				<td>Branch</td>
				<td>
					<select class="combo" name="Branch">
			            <option value="0">select Branch</option>
			            <option value="IT">Information Technology</option>
			            <option value="CSE">Computer Science </option>
			            <option value="ME">Mechanical</option> 
			            <option value="ETC">Electronics & Telecommunication</option>
			            <option value="EEE">Elecreical & Elecreonics</option> 
			            <option value="Civil">Civil</option>
			            <option value="MEX">Mechatronic</option>
			        </select><br>

				</td>
			</tr>
			<tr>
				<td>Semester</td>
				<td>
					<select class="combo" name="Semester">
			            <option value="0">select Semester</option>
			            <option>1st</option> <option>2nd</option>
			            <option>3rd</option> <option>4th</option>
			            <option>5th</option> <option>6th</option>
			            <option>7th</option> <option>8th</option>
			        </select>
				</td>
			</tr>
		</table>

';
echo "<br/><br/>";
echo '<input type="submit" value="ADD"/>';
echo '</form>';
echo '<input type="button" name="abc" onclick="Faculty_assignment()" >';
echo '<div id="edit" ></div>';
?>
<script type="text/javascript">
	function Faculty_assignment(){
		alert("hello")
		 $.ajax({
		url: "Add_Faculty_Assignment.php",
          success: function(data){
            $("#edit").html(data);
            // alert(data);
          }
        });
	}
</script>
				
