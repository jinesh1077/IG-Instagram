<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
session_start();


	

	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
mysqli_select_db($con,"sem6")or
 die("Could not select db: " . mysql_error());
 
 $qry2 = "CREATE DATABASE sem6";
$qry3 = "create table ig(
   name VARCHAR(20) NOT NULL,
   email VARCHAR(50) NOT NULL,
   username VARCHAR(20) NOT NULL,
   password VARCHAR(40) NOT NULL,
   birthdate Date NOT NULL,
   gender VARCHAR(10) NOT NULL,
   country VARCHAR(20) NOT NULL,
   contact VARCHAR(10) NOT NULL,
   imagetmp longblob NOT NULL,
   imagename varchar(255) NOT NULL,
   PRIMARY KEY (email,username)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$qry4 = "create table post(
   id int AUTO_INCREMENT,
   username VARCHAR(20) NOT NULL,
   posttmp longblob NOT NULL,
   postname varchar(255) NOT NULL,
   hashtag VARCHAR(200) NOT NULL,
   date Date NOT NULL,
   download INT NOT NULL,
   PRIMARY KEY(id)
);";

$qry5 = "create table searchtag(
   id int AUTO_INCREMENT,
   hashtag VARCHAR(200) NOT NULL,
   count INT NOT NULL,
   PRIMARY KEY(id)
);";


mysqli_query( $con,$qry3);		
mysqli_query( $con,$qry4);
mysqli_query( $con,$qry5);

  

$name="";
$email="";
$password="";
$date="";
$birthdate = "";
$gender="";
$country="";
$contact="";
$username="";
$otpValue="";

if(isset($_POST['confirm'])){
	$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$date=$_POST['birthdate'];
$birthdate = date('Y-m-d', strtotime($date));
$gender=$_POST['gender'];
$country=$_POST['country'];
$contact=$_POST['contact'];
$imagename=$_FILES['profileimage']['name'];
$imagetmp=addslashes(file_get_contents($imagename));
//$otpValue=$_POST['otpValue'];
//$otp=$_POST['otp'];




$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
    mysqli_select_db($con,"sem6")or
        mysqli_query($con,$qry2);
	

	

		
    //if($otp==$otpValue){
		$qry = "INSERT INTO `ig`(name,email,username,password,birthdate,gender,country,contact,imagetmp,imagename) VALUES('$name','$email','$username','$password','$birthdate','$gender','$country','$contact','$imagetmp','$imagename')";
		if(mysqli_query($con,$qry))
		{
			echo '<script>alert("Successfully added!!!");location="login.php";</script>';
		}
		else {
			echo '<script>alert("Account already exist!!!");</script>';
		}	
	/*}else{
		echo '<script>alert("Wronge OTP!!!");location="signup.php";</script>';
	}*/
	
}
if(isset($_POST['btn'])){
	$name=$_POST['name'];
$email=$_POST['email'];
$imagename=$_FILES['profileimage']['username'];
$username=$_POST['username'];
$password=$_POST['password'];
$date=$_POST['birthdate'];
$birthdate = date('Y-m-d', strtotime($date));
$gender=$_POST['gender'];
$country=$_POST['country'];
$contact=$_POST['contact'];
$otpValue=rand(100000,999999);


	
}



?>

<html>
<head>
  <title>Blog</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
  
  
</head>


<body>



<header id="header">
		<div id="nav">
			<div id="nav-top">
				<div class="container" height="70px">
					<ul class="nav-social">
						<a href="login.php" class="logo"><h1 style="font-size:50px;">Instagram<h1></a>
					</ul>
					
					</div>
				</div>
			</div>	
		</div>
	</header>

<div class="container">
  
  <form class="form-horizontal" method="post"  enctype="multipart/form-data" >
    
	
    <div class="form-group">
      <div class="col-sm-10">
        <center><h2>IG SignUp</h2></center>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="name">Name :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $name;?>" required  placeholder="name" name="name">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value="<?php echo $email;?>" required placeholder="Email" name="email">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" value="<?php echo $username;?>" required placeholder="Username" name="username">
      </div>
    </div>
    
	<div class="form-group">
      <label class="control-label col-sm-2" for="password">Password :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" value="<?php echo $password;?>" required placeholder="password" name="password">
      </div>
    </div>
	
	
	
	
	
	
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="birthdate">Birthdate :</label>
        <div class="col-sm-10">
		<input type="date" max="2018-01-01" id="birthdate" class="form-control" value="<?php echo $birthdate;?>" required name="birthdate" >
        </div>
    </div>
	
	
	
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="gender">Gender :</label>
		<div class="col-sm-10">
          <select class="form-dropdown" id="gender" name="gender" value="<?php echo $gender;?>" required style="width:150px" data-component="dropdown">
            <option value="male" name="male"> Male </option>
            <option value="female" name="female"> Female </option>           
          </select>
		  </div>
    </div>
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="country">Country :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="country" value="<?php echo $country;?>" required placeholder="country" name="country">
      </div>
    </div>
	
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact :</label>
      <div class="col-sm-10">
        <input type="text" pattern="[1-9]{1}[0-9]{9}" id="contact" class="form-control" value="<?php echo $contact;?>" required  placeholder="contact" name="contact">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="Profile Image">Profile Image :</label>
      <div class="col-sm-10">
        <input type="file" id="profileimage"  name="profileimage">
      </div>
    </div>
		
		

	<div class="form-group" style="display:none;" id="otpDiv">
      <label class="control-label col-sm-2" for="otp">OTP :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="otp"  name="otp">
      </div>
    </div>
	
	<input type="hidden" class="form-control" id="otpValue" value="<?php echo $otpValue;?>" required name="otpValue">
	
	<div class="form-group" style="display:none;" id="btn">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default"  name="btn">Sign Up</button>
      </div>
    </div>
	
    <div class="form-group"  id="submitBtn">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="confirm">Sign Up</button>
      </div>
    </div>
	
	<?php


if(isset($_POST['btn'])){

	echo "<script>	document.getElementById('btn').style.display='none';
	document.getElementById('otpDiv').style.display='block';
	document.getElementById('submitBtn').style.display='block';
	document.getElementById('name').readOnly=true;
	document.getElementById('email').readOnly=true;
	document.getElementById('password').readOnly=true;
	document.getElementById('birthdate').readOnly=true;
	document.getElementById('gender').readOnly=true;
	document.getElementById('country').readOnly=true;
	document.getElementById('contact').readOnly=true;
	</script>";
	
	
	
	$mail = new PHPMailer(true);       
		try {
  
			$mail->isSMTP();               
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;                               
			$mail->Username = 'jinesh1076@gmail.com';               
			$mail->Password = 'A@123456';                           
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;                                    

			$mail->setFrom('jinesh1076@gmail.com','jinesh patel');
			
			
			
			$mail->addAddress($email);
			$mail->isHTML(true);                               
			$mail->Subject = "Verfication";
			$mail->Body    = "This is Your OTP : ".$otpValue."\n Don't Share With anyone.";
    
			$mail->send();
			echo "<script>alert('OTP has been sent');</script>";
		} 
		catch (Exception $e) {
			
			echo "<script>alert('OTP hasnot been sent...".$mail->ErrorInfo."');</script>";
		}
	
	
	
	
}?>
	
  </form>
  <div  align="center" >
      <p  >If You Have Already Account Then Please <a href="login.php" style="font-weight:bold;">Login</a></p>
    </div>
</div>
</body>
</html>


<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries ="<?php echo $tags;?>".split(',');

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
