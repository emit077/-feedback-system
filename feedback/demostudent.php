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
               <select class="combo" name="Branch" onchange="get_states();>
                  <option value="0">select Branch</option>
                  <option >Information Technology</option>
                  <option >Computer Science </option>
                  <option >Mechanical</option> 
                  <option >Electronics & Telecommunication</option>
                  <option >Elecreical & Elecreonics</option>
                  <option >Civil</option>
                  <option >Mechatronic</option>
               </select>
			';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
function get_state()
 { // Call to ajax function
    var country = $('#country').val();
    var dataString = "country="+country;
    $.ajax
    ({
        type: "POST",
        url: "getstate.php", // Name of the php files
        data: dataString,
        success: function(html)
        {
            $("#get_state").html(html);
        }
    });
}
</script>

</head>
<body>

</body>
</html>
