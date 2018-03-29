


<?php



    mysqli_select_db($con,"j430003045");
    $result2 = mysqli_query($con,"SELECT * FROM test2 WHERE name='$name")
    or die("Query error: ".mysqli_error($result));
    echo '<table class="table">
          <tr>
          <th>Name</th>
          <th>Email</th>
          </tr>';
    while($row2 = mysqli_fetch_row($result2))
    {
      echo "<tr>";
      echo "<td>".$row2['Name']."</td>";
      echo "<td>".$row2['Email']."</td>";
      echo "</tr>";
    }
      echo "</table>";
    mysqli_close($con);