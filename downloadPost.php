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
			
			
$sql = "select * from post where id=$id ";
 $qry="UPDATE post SET `download`=`download`+1 WHERE `id` = '$id'";
			mysqli_query($con,$qry);

$res = $con->query($sql);
$name="";
$image="";
while($row = $res->fetch_assoc())
{ 
    $name = $row['postname'];
    $image = $row['posttmp'];
}

header("Content-Disposition: attachment; filename=$name");
ob_clean();
flush();
echo $image;
exit();

}
?>