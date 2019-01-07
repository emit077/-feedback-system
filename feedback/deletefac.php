 <?php  
 $connect = mysqli_connect("localhost", "root", "", "student_feedback");  
 if(isset($_POST["facid"]))  
 {    
  echo $_POST["facid"];
    $query = ""DELETE FROM `faculty` WHERE fID='".$_POST["facid"]."'"; 
    $result = mysqli_query($connect, $query);   
    if(mysqli_num_rows($result) > 0)  
    {  
        echo "deleted";

      }  
      else  
      {  
           echo "notfound"; 
      }  
      
 }  
 echo '<div id="deleted"></div>';
 ?>
