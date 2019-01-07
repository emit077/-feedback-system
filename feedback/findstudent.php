 <?php  
 $connect = mysqli_connect("localhost", "root", "", "student_feedback");  
 if(isset($_GET["studentname"]))  
 {  
      $query = "SELECT * FROM student WHERE FirstName LIKE '%".$_GET["studentname"]."%'";  
      $result = mysqli_query($connect, $query);   
        echo '<div  style="width: 100%;height: 300px; overflow: auto; position: absolute; top: 200px;text-align: center;">';
        echo '<table border="2" style="width: 90%; border-radius: 10px;margin-left: 25px">';
        echo '
        <tr>
          <td>Student ID</td>
          <td>Name</td>
          <td>Branch</td>
          <td>Semester</td>
          <td>Edit</td>
        ';

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
              echo '<tr>';
                  echo '<td>'.$row["sID"].'</td> ';
                  echo '<td  >'.$row["FirstName"].$row["LastName"].'</td>';
                  echo '<td  >'.$row["sBranch"].'</td>';
                  echo '<td  >'.$row["sSemester"].'</td>';
                  echo '<td><input type="button" value="edit" onclick="updateStu('.$row["sID"].')"></td> ';
               echo " </tr>";

           }  
      }  
      else  
      {  
           // $output .= '<li>student Not Found</li>';  
      }  
      echo "</table>" ;
      echo "</div>";
 } 
 $_GET["studentname"]=" "; 
 ?>
<script type="text/javascript">
    function updateStu(v2){
     /*alert(v2);*/
      $.ajax({
          type: "GET",
          url: "Supdateform.php",
          data:{'studetail':v2},
          
          success: function(data){
            $("#sForm").html(data);
            // alert(data);
          }
        });

 }
</script>