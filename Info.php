
<?php

session_start();
$SEemail=$_SESSION['username'];


$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	
mysqli_select_db($con,"sem6")or
 die("Could not select db: " . mysql_error());

	$username=$_SESSION['username'];
	
	

 $tags='';
	$result=mysqli_query($con,"SELECT * FROM ig");
		while($n=mysqli_fetch_array($result))
		{
			$user=$n['username'];
			if($user==$SEemail){
				$imagePr=$n['imagetmp'];
			}
			$tags.="$user,";
		}
		$result5=mysqli_query($con,"SELECT * FROM post");
		while($n=mysqli_fetch_array($result5))
		{
			preg_match_all('/#([^\s]+)/', $n['hashtag'], $matches);
			//print_r($matches);

			$hash = implode(',', $matches[1]);
			$myArray = explode(',', $hash);
			foreach($myArray as $my_Array){
				$tags.="#$my_Array,"; 
			}
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
						<a href="home.php" class="logo"><h1 style="font-size:50px;">Instagram<h1></a>
					</ul>
					<div class="nav-btns">
					<form autocomplete="off"  action="Detail.php" method="GET">
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
						
					<li><a href="UserHome.php"  >Home</a></li>
					<li><a href="addPost.php"  >Add Post</a></li>
					<li><a href="logout.php"  >Logout</a></li>
					<li style="float:right;">
					
					<a href="Info.php"><span  style="font-size:18px;font-weight:900;" >
	 <?php
	  echo "
		<img src='data:image/png;base64,".base64_encode($imagePr)."' alt='Profile Picture' style='width:30px;border-radius: 50%;' >
		";
?>
      <?php echo $SEemail; ?></span></a>
					
					</li>
					</ul>
				</div>
			</div>		
		</div>
	</header>
<div class="container">

<?php

	
	$result3=mysqli_query($con,"SELECT * FROM ig where username='$username' ");
    while($row3 = mysqli_fetch_array( $result3))
    {
	  $name=$row3['name'];
	  $email=$row3['email'];
	  $imagetmp=$row3['imagetmp'];
	  $birthdate=$row3['birthdate'];
	  $gender=$row3['gender'];
	  $country=$row3['country'];
      $contact=$row3['contact'];
	  
	 
	  echo "<div>
		<img src='data:image/png;base64,".base64_encode($row3['imagetmp'])."' alt='Profile Picture' style='width:100px' >
		</div>";
      
      
	  ?>
	  
	 
	  
	  
	  <div class="form-group">
      <label>Name :</label>
      <span><?php echo $name; ?></span>
      </div>
	
	<div class="form-group">
      <label>Email :</label>
      <span><?php echo $email; ?></span>
      </div>
	  
	<div class="form-group">
      <label>Birthdate :</label>
      <span><?php echo $birthdate; ?></span>
      </div>

	<div class="form-group">
      <label>Gender :</label>
      <span><?php echo $gender; ?></span>
      </div>	  
    
	<div class="form-group">
      <label>Country :</label>
      <span><?php echo $country; ?></span>
      </div>  
	  
    
	<div class="form-group">
      <label>Contact :</label>
      <span><?php echo $contact; ?></span>
      </div>
	  <div class="section">
	  <h3>Post:</h3>
	  
	  <?php
	  
    }
	
	
	$result2=mysqli_query($con,"SELECT * FROM ig where username='$username'");
	  while($row2=mysqli_fetch_array($result2)){$username=$row2['username'];}
  
    $result=mysqli_query($con,"SELECT * FROM post where username='$username' ORDER BY id DESC");
    while($row = mysqli_fetch_array( $result))
    {
      $id=$row['id'];
	  $hashtag=$row['hashtag'];
	  $posttmp=$row3['posttmp'];

      //echo $job;
	  
	  
	  
	  
	  ?>
	  <div class="section">
	  <a href="deletePost.php?data=<?php echo $id;?>" >
	  <span  style="font-size:15px;color:Red; "  >Delete</span></a>&nbsp;&nbsp;
	   <a href="downloadPost.php?data=<?php echo $id;?>" style="margin-left:270px;">
	  <span  style="font-size:15px;color:Red; "  >Downlaod</span></a>&nbsp;&nbsp;
	  <?php
	  echo "<div>
		<img src='data:image/png;base64,".base64_encode($row['posttmp'])."' alt='Profile Picture' style='width:400px' >
		</div>";
		?>
      <span  style="font-size:21px;" ><?php echo $hashtag; ?></span>
	  
	  <br><br>
     </div>
	  
	  
	  <?php
	  
    }
  
?>
</div>

</div><br>
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
