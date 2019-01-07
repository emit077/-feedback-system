 <?php  
 $connect = mysqli_connect("localhost", "root", "", "student_feedback");  
 if(isset($_GET["studetail"]))  
 {    
 
    $query = "SELECT * FROM student WHERE sID='".$_GET["studetail"]."'"; 
    $result = mysqli_query($connect, $query);   
    if(mysqli_num_rows($result) > 0)  
    {  
      $row = mysqli_fetch_array($result);
      echo '  
      <div class="overlay-content" style="position: absolute;left: 0px;top:0px; width:100%;height: 100%; padding-top:35px">
        <div style="width: 42%;text-align: left; margin-left:29% ">
          <form action="updateSrudentDetail.php">
            <label class="labletxt" for="Student ID">Student ID</label><br>          
            <input  type="text" name="FirstName" placeholder="Enter First Name" class="textinput" value='.$row["sID"].' ><br>
         
            <label class="labletxt" for="LastName" >First Name</label><br>
            <input type="text" name="LastName" placeholder="Enter First Name"  class="textinput" value='.$row["FirstName"].' ><br>

            <label class="labletxt" for="LastName" >Last Name</label><br>
            <input type="text" name="LastName" placeholder="Enter Last Name"  class="textinput" value='.$row["LastName"].' ><br>
           
            <label class="labletxt" for="Branch">Branch</label><br>
            <select class="combo" name="Branch" value='.$row["sBranch"].'>
              <option value="0">select Branch</option>
              <option value="IT">Information Technology</option>
              <option value="CSE">Computer Science </option>
              <option value="ME">Mechanical</option> 
              <option value="ETC">Electronics & Telecommunication</option>
              <option value="EEE">Elecreical & Elecreonics</option> 
              <option value="Civil">Civil</option>
              <option value="MEX">Mechatronic</option>
            </select><br>
         
           <label class="labletxt" for="Semester">Semester</label><br>
           <select class="combo" name="Semester" value='.$row["sSemester"].'>
              <option value="0">select Semester</option>
              <option>1st</option> <option>2nd</option>
              <option>3rd</option> <option>4th</option>
              <option>5th</option> <option>6th</option>
              <option>7th</option> <option>8th</option>
           </select><br>
           <button class= "submit" type="submit" onclick="ale()"> >> </button>
          </form>
        </div>
     </div>';
 
      }  
      else  
      {  
           echo "notfound"; 
      }  
      
 }  
 ?>