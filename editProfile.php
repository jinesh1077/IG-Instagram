
<?php

session_start();

	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
mysqli_select_db($con,"sem6")or
 die("Could not select db: " . mysql_error());

  
 $tags='';
	$result=mysqli_query($con,"SELECT * FROM ig");
		while($n=mysqli_fetch_array($result))
		{
			$user=$n['username'];
			$tags.="$user,";
		}

if(isset($_POST['confirm'])){
	
	$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$date=$_POST['birthdate'];
$birthdate = date('Y-m-d', strtotime($date));
$gender=$_POST['gender'];
$country=$_POST['country'];
$contact=$_POST['contact'];
$permission=$_POST['permission'];

$qry2 = "CREATE DATABASE sem6";



$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
    mysqli_select_db($con,"sem6")or
        mysqli_query($con,$qry2);

		 $re5=mysqli_query($con,"SELECT * FROM ig WHERE email='$email' AND password='$password'");
    $j5=mysqli_num_rows($re5);
	if($j5)
	{

	
		$q1="DELETE FROM ig WHERE email = '$email'";	
		mysqli_query( $con,$q1);
		
        if($email!=NULL){
			$qry = "INSERT INTO `ig`(name,email,password,birthdate,gender,country,contact,permission) VALUES('$name','$email','$password','$birthdate','$gender','$country','$contact','$permission')";
			if(mysqli_query($con,$qry))
			{
				echo '<script>alert("Successfully Updated!!!");location="igInfo.php";</script>';
			}
			else {
				echo '<script>alert("Account already exist!!!");</script>';
			}
				//echo "Inserted!";
		}
	}else{
		echo '<script>alert("Wrong  Password!!!");location="igInfo.php";</script>';
		
	}
}

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
mysqli_select_db($con,"sem6")or
 die("Could not select db: " . mysql_error());

	$email=$_SESSION['email'];

	


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
						<a href="home.php" class="logo"><h1 style="font-size:50px;">Instagram<h1></a>
					</ul>
					<div class="nav-btns">
					<form autocomplete="off"  action="igDetail.php" method="GET">
					<input class="input"  id="myInput" name="data" placeholder="Enter your search...">
					<button type="submit" style="float: right;" >search</button>
					</form>
						
						</div>
					</div>
				</div>
			</div>
			<div id="nav-bottom">
				<div class="container">
					<ul class="nav-menu">
						
					<li><a href="igHome.php"  >Home</a></li>
					<li><a href="addBlog.php"  >Add Blog</a></li>
					<li><a href="igInfo.php"  >Profile</a></li>
					<li><a href="changePassUser.php"  >Change Password</a></li>
					<li><a href="logout.php"  >Logout</a></li>
					</ul>
				</div>
			</div>		
		</div>
	</header>

<div class="container">
  
  <form class="form-horizontal" method="post" action="" >
    
	
    <div class="form-group">
      <div class="col-sm-10">
        <center><h2>Edit Profile</h2></center>
      </div>
    </div>
	<?php
	$result3=mysqli_query($con,"SELECT * FROM ig where email='$email'");
    while($row3 = mysqli_fetch_array( $result3))
    {
	  $name=$row3['name'];
	  $email=$row3['email'];
	  $birthdate=$row3['birthdate'];
	  $gender=$row3['gender'];
	  $country=$row3['country'];
      $contact=$row3['contact'];
	  $permission=$row3['permission'];
      
      
	  ?>
	
		<div class="form-group">
      <label class="control-label col-sm-2" for="name">Name :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $name;?>" placeholder="name" name="name" readonly>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value="<?php echo $email;?>" placeholder="Email" name="email" readonly>
      </div>
    </div>
    
	
	
	
	
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="birthdate">Birthdate :</label>
        <div class="col-sm-10">
		<input type="date" max="2018-01-01" class="form-control" value="<?php echo $birthdate;?>" name="birthdate" id="birthdate">
        </div>
    </div>
	
	
	
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="gender">Gender :</label>
		<div class="col-sm-10">
          <select class="form-dropdown" id="gender" name="gender" value="<?php echo $gender;?>" style="width:150px" data-component="dropdown">
            <option value="Male"> Male </option>
            <option value="Female"> Female </option>           
          </select>
		  </div>
    </div>
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="country">Country :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="country" value="<?php echo $country;?>" placeholder="country" name="country">
      </div>
    </div>
	
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact :</label>
      <div class="col-sm-10">
        <input type="text" pattern="[1-9]{1}[0-9]{9}" class="form-control" id="contact" placeholder="contact" value="<?php echo $contact;?>" name="contact">
      </div>
    </div>
	
	<input type="hidden" class="form-control" id="permission" value="<?php echo $permission;?>" placeholder="permission" name="permission">
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="password">Password :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="name" placeholder="password"  name="password">
      </div>
    </div>
	
	<?php
	}
	?>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="confirm">Sign Up</button>
      </div>
    </div>
	
	
	
  </form>
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