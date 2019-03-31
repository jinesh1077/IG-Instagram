<?php

$qry2 = "CREATE DATABASE sem6";
$qry3 = "Drop table ig";
$qry4 = "Drop table blogs";
$qry5 = "Drop table post";
$qry6 = "Drop table comments";


$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
    mysqli_select_db($con,"sem6")or
        mysqli_query($con,$qry2);
		
mysqli_query( $con,$qry3);	
mysqli_query( $con,$qry4);	
mysqli_query( $con,$qry5);	
mysqli_query( $con,$qry6);	

	/*	
        if($email!=NULL){
$qry = "INSERT INTO `ig`(name,email,password,contact) VALUES('$name','$email','$password','$contact')";
if(mysqli_query($con,$qry))
{
    echo '<script>alert("Successfully added!!!");location="login.php";</script>';
}
else {
    echo '<script>alert("Account already exist!!!");location="signup.php";</script>';
}
	//echo "Inserted!";
}*/
?>