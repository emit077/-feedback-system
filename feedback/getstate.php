if ($_POST) {
    $country = $_POST['country'];
    if ($country != '') {
       $sql1 = "SELECT * FROM state WHERE country=" . $country;
       $result1 = mysql_query($sql1);
       echo "<select name='state'>";
       echo "<option value=''>Select</option>"; 
       while ($row = mysql_fetch_array($result1)) {
          echo "<option value='" . $row['state_id'] . "'>" . $row['state_name'] . "</option>";}
       echo "</select>";
    }
    else
    {
        echo  '';
    }
}