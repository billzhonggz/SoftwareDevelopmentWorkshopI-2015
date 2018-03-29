<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Me to the Team</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script><style type="text/css" adt="123"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  <body>

    <div class="container">
      <!-- Check post method-->
      <!--<p>Name = <?php echo $_POST['name']; ?></p>
      <p>Email = <?php echo $_POST['email']; ?></p>-->
      <?php
      //echo "You have clicked ".sprintf("<p> %s", $_POST['sub'])."button.";
      //Store inputs to variables.
      $name = $_POST['name'];
      $email = $_POST['email'];
      // //Check variables.
      // echo "Check variables. ".$name." ".$email;
      // //Connect to the database.
      // echo "Go to connection.";
      if($_POST['sub'] == "save")
      {
        $con = mysqli_connect("cstserver.uic.edu.hk","j430003045","123456");
        if(!$con)
        {
          die('Connect error: '.mysqli_error());
        }
        else
        {
          //echo "Go to check duplicates.";
          //Check duplicates.
          mysqli_select_db($con,"j430003045");
          $result = mysqli_query($con,"SELECT name FROM test2") 
          or die("Query error: ".mysqli_error($result));
          // echo "Before while loop.";
          // print_r($result);
         while($row = mysqli_fetch_row($result))
         {
           // echo "IN while loop.";
            // print_r($row);
            foreach($row as $data)
            {
              if ($data == $name)
              {
                echo "<h3>Welcome back! " .$name.".</h3>";
                break;
              }
              else 
              {
                $ins = "INSERT INTO test2(name,email)
                        VALUE('$name','$email')";
                if(mysqli_query($con,$ins) == TRUE)
                {
                  echo "<h3>Saved successfully.</h3>";
                  break 2;
                }
                else
                {
                  echo "Error: ".$ins."<br>".$con->error;
                  break 2;
                }
              }
            }
          }
        }
        echo '<a class="btn btn-default" href="index.html" role="button">Back</a>';
        mysqli_close($con);
      }
        else if ($_POST['sub'] == "show")
        {
          $con = mysqli_connect("cstserver.uic.edu.hk","j430003045","123456");
          if(!$con)
          {
             die('Connect error: '.mysqli_error());
          }
          else
          {
            mysqli_select_db($con,"j430003045");
            $result2 = mysqli_query($con,"SELECT * FROM test2")
            or die("Query error: ".mysqli_error($result2));
            echo '<h3>Team Members</h3>
                  <table class="table">
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  </tr>';
            while($row2 = mysqli_fetch_array($result2))
            {
              echo "<tr>";
              echo "<td>".$row2['id']."</td>";
              echo "<td>".$row2['name']."</td>";
              echo "<td>".$row2['email']."</td>";
              echo "</tr>";
            }
            echo "</table>";
          mysqli_close($con);
          echo '<a class="btn btn-default" href="index.html" role="button">Back</a>';
         }
        }

      
      ?>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

</body></html>