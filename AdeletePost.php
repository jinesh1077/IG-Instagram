<?php

$detail=$_GET['data'];
echo $detail;


$qry2 = "CREATE DATABASE sem6";



$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
    mysqli_select_db($con,"sem6")or
        mysqli_query($con,$qry2);


		$post=0;
        if($detail!=NULL){
$q2="DELETE FROM post where detail='$detail'";

mysqli_query($con,$q2);

if(mysqli_query($con,$q3))
{
    echo '<script>alert("Successfully deleted!!!");</script>';
}
else {
    echo '<script>alert("Did not added!!!");</script>';
}
	//echo "Inserted!";
}
?>