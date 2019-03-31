<?php



$qry2 = "CREATE DATABASE sem6";

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
    mysqli_select_db($con,"sem6")or
        mysqli_query($con,$qry2);
		
		$i=1;

	$result3=mysqli_query($con,"SELECT * FROM ig");
    while($row3 = mysqli_fetch_array( $result3))
    {
	  $email=$row3['email'];
	  $permission=$_POST[$i];
	  echo $permission;
	  $i++;
	  $q1="update ig set permission='$permission' where email='$email'";
	  mysqli_query($con,$q1);
	}
		
	echo '<script>alert("Successfully Permitted!!!");location="adminHome.php";</script>';
	?>	
	