<html>
    <body>
        Welcome <?php echo $_POST["usrname"]; ?>!<br />
        Your current skill is <?php echo $_POST["current_skill"]; ?>.
        Your expected working city is <?php echo $_POST["city"]; ?>.
        Your working experience is <?php echo $_POST["experience"];?>.
        Your position is <?php echo $_POST["position"];?>.
        Your recent jobs is <?php echo $_POST["jobs"];?>.
        Save to database...
        <?php
        	$con = mysqli_connect("cstserver.uic.edu.hk","j430003045","123456");
        	if (!$con)
        	{
        		die ('Connect error: ' .mysqli_error());
        	}
        	else
        	{
        		mysqli_select_db($con,"j430003045");
				//Insert data to db.
				$name = $_POST['usrname'];
        		$skill = $_POST['current_skill'];
        		$city = $_POST['city'];
        		$experience = $_POST['experience'];
        		$position = $_POST['position'];
        		$recjobs = $_POST['jobs'];
				$ins = "INSERT INTO jobs(name,skill,city,experience,position,recjobs)
						VALUE ('$name','$skill','$city','$experience','$position','$recjobs')";
        		if ($con -> query($ins) == TRUE)
				{
					echo "Save soccessfully.";
				}
				else
				{
					echo "Error: ". $ins . "<br>" . $con->error;
				}
        	}
			$con->close();
        ?>
    </body>
</html>