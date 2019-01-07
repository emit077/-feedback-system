  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "student_feedback");  
    echo $_POST["facbranch"];
      $query = "SELECT distinct faculty.FirstName,faculty.LastName,faculty.fID,faculty_assignment.Branch,faculty_assignment.Semester FROM faculty_assignment join faculty on faculty.fID=faculty_assignment.fID WHERE Branch = '" . $_POST["facbranch"] . "'";
      $result = mysqli_query($connect, $query);   
        echo '<table>
        <tr>
          <td>Faculty ID</td>
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
                  echo '<td>'.$row["fID"].'</td> ';
                  echo '<td  >'.$row["FirstName"].$row["LastName"].'</td>';
                  echo '<td  >'.$row["Branch"].'</td>';
                  echo '<td  >'.$row["Semester"].'</td>';
                  echo '<td><input type="button" value="delete" onclick="deleteFac('.$row["fID"].')"></td> ';
               echo " </tr>";

           }  
      }  
      else  
      {  
           // $output .= '<li>student Not Found</li>';  
      }  
      echo "</table>" ;
      echo '<div id="deleted"></div>';

 //$_GET["studentname"]=" "; 
 ?>
<script type="text/javascript">
    function deleteFac(v21){
     alert(v21);
      $.ajax({
          type: "POST",
          url: "deletefac.php",
          data:{'facid':v21},
          
          success: function(data){
            $("#deleted").html(data);
            // alert(data);
          }
        });

 }
</script>