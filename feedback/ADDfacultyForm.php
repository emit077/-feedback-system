  <!-- <div class="overlay-content" style="position: absolute;left: 0px;top:90px; width:100%; height: 80%; padding-top:35px">
  <div style="width: 42%;text-align: left; margin-left:29% "> -->

    <style type="text/css">
      
    </style>
    <form action="Add_Faculty.php" method="POST">
         <input type="hidden" name="ID">
         <table style="width: 100%;border-right: 3px; border-color:#1e90ff; margin-left: 20px ">
          <tr>
            <td><label class="labletxt"> First Name</label></td>
            <td><input type="text" class="textinput" name="FirstName" placeholder="First Name" style="margin-bottom: 0px" ></td>
          </tr>
          <tr>
            <td><label class="labletxt"> Last Name</label></td>
            <td><input type="text" class="textinput" name="LastName" placeholder="Last Name" style="margin-bottom: 0px"><br></td>
          </tr>
          <tr>
            <td><label class="labletxt">Phone No</label></td>
            <td><input type="text" class="textinput" name="PhoneNo" placeholder="12345467890" style="margin-bottom: 0px"></td>
          </tr>
          <tr>
            <td><label class="labletxt">Email ID</label><br></td>
            <td><input type="text" class="textinput" name="EmailID" placeholder="xyz@abc.com" style="margin-bottom: 0px"></td>
          </tr>
          <tr>
            <td><label class="labletxt">Branch</label></td>
            <td>
              <select class="combo" name="Branch" style="margin-bottom: 0px">
                <option value="0">select Branch</option>
                <option value="IT">Information Technology</option>
                <option value="CSE">Computer Science </option>
                <option value="ME">Mechanical</option> 
                <option value="ETC">Electronics & Telecommunication</option>
                <option value="EEE">Elecreical & Elecreonics</option> 
                <option value="Civil">Civil</option>
                <option value="MEX">Mechatronic</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label class="labletxt">Semester</label></td>
            <td>
              <select class="combo" name="Semester" style="margin-bottom: 0px">
                <option value="0">select Semester</option>
                <option>1st</option> <option>2nd</option>
                <option>3rd</option> <option>4th</option>
                <option>5th</option> <option>6th</option>
                <option>7th</option> <option>8th</option>
              </select>
            </td>
          </tr>
        </table><br>
          <input type="submit" value="ADD" style="width: 50%; border: none;font-family: verdana,san sarif; font-size: 18px; background-color: #1e90ff; color: white; border-radius: 5px" /><br><br>
      </form>
 <!--    </div>
  </div> -->