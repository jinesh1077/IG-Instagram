<?php
session_start();

$username=$_SESSION['username'];
$id=$_GET['data'];
echo $id;


$qry2 = "CREATE DATABASE sem6";



$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
    mysqli_select_db($con,"sem6")or
        mysqli_query($con,$qry2);


		$post=0;
        if($username!=NULL){
$q2="DELETE FROM post where id='$id'";


if(mysqli_query($con,$q2))
{
    echo '<script>alert("Successfully deleted!!!");location="Info.php";</script>';
}
else {
    echo '<script>alert("Did not added!!!");</script>';
}
	//echo "Inserted!";
}
?>