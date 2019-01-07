 <?php  
 $connect = mysqli_connect("localhost", "root", "", "student_feedback");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT DISTINCT FirstName, LastName FROM student WHERE FirstName LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul >';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["FirstName"].'</li>';  
                
           }  
      }  
      else  
      {  
           $output .= '<li>Student Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>