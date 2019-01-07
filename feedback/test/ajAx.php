<?php 
 session_start();
  ?>
<html>
<head>
<style type="text/css">
	.btn {
    border: none;
    outline: none;
    padding: 10px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
    font-size: 18px;
	}

.active, .btn:hover {
    background-color: #666;
    color: white;
}
</style>
<title>Untitled Document</title>
</head>
<body>
<?php
require_once("connectdb.php");

$branch=$_POST['Branch'];
$sem=$_POST['Semester'];
$_SESSION['branch'] = $branch;
$_SESSION['sem'] = $sem;
if ($branch){

	if ($sem){
		echo '<div id="myDIV">';
				echo '<input  class="btn active" hidden="hidden">';
		$query = "SELECT distinct faculty.FirstName,faculty.LastName,faculty.fID, faculty.Contact_no,faculty.Email,faculty_assignment.Subject FROM faculty_assignment join faculty on faculty.fID=faculty_assignment.fID WHERE Branch = \"$branch\" AND semester=\"$sem\"";
		$results = $dbhandle->query($query);                                               
 		while($rs=$results->fetch_assoc()) 
		{
			
			// echo '<span class="btn" onclick="showstatus('.$rs["fID"].')">'.$rs["FirstName"].' '.$rs["LastName"].'</span>';
			echo  '
				<input  class="btn" type="button" name="btn1" value="'.$rs["FirstName"].' '.$rs["LastName"].'"  onclick="showstatus('.$rs["fID"].')">
			';
		}
			echo "</div>";
	} 
}

?>

<script type="text/javascript">
     function showstatus(v4){   -
           $.ajax({
           	type: "POST",
            url: "getstatus.php",
            data:{'facID':v4,},
          	success: function(data){	
            $("#subStatus").html(data);
            // alert(data);
          }
        });

	}

var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
</body>
</html>
