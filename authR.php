<?php 
$con = mysqli_connect ("localhost","root","","connectin");
if (mysqli_connect_errno())
{
	echo "Failed to connect:" .mysqli_connect_errno();
}

// $query = mysqli_query($con,"INSERT INTO authr VALUES('2','Optimus Prime')");

$fname="";
$lname="";
$email="";
$password="";
$conpassword="";
$date="";
$phone="";
$gender="";
$error_array=array();

	if (isset($_POST['reg_submit'])){
		
	$fname = strip_tags($_POST['fname']); //removing html tags
	$fname = str_replace('','',$fname); // space removal
	$fname = ucfirst(strtolower($fname)); //uppercase 

	$lname = strip_tags($_POST['lname']);
	$lname = str_replace('','', $lname);
	$lname = ucfirst(strtolower ($lname));

	$phone = strip_tags($_POST['phone']);
	$phone = str_replace('','',$phone);

	$email = strip_tags($_POST['email']);
	$email = str_replace('','',$email);

	$password = strip_tags($_POST['pass']);
	$password = str_replace('','',$pass);

	$conpassword = strip_tags($_POST['cpass']);
	$conpassword = str_replace('','',$cpass);
	$date= date("Y-m-d");

	//checking duplicate mails
		$e_check = mysqli_query ($con, "SELECT email FROM authr WHERE email='$email'");

		$num_rows = mysqli_num_rows($e_check);

		if ($num_rows > 0){
			array_push($error_array, "Email already in use");
		}
		else {
			array_push($error_array,"Emails don't match");
		}

	//name conditions

		if(strlen($fname)> 25 || strlen($fname)<2){
			array_push($error_array,"Your first name should be between 2 and 25 characters");
		}
		if (strlen($lname)> 25 || strlen($lname)< 2) {
			array_push($error_array, "Your first name should be between 2 and 25 characters");
		}

	//password conditons
		if($password != $conpassword){
			array_push($error_array, "Your passwrod don't match");
		}
		else {
			if(preg_match ('/[^A-Za-z0-9]/',$password)){
				array_push($error_array,"Your password can only contains english characters or numbers");
		       }
		     }
    // paswrod limit
		if(strlen($password) >30 || strlen($password)<5){
			array_push($error_array, "Your passwrod must be betweem 5 and 30 characters");
		}
	}

	// $stmt = $con->prepare("INSERT INTO authr(fname,lname,email,password,date,phone,gender)
	// values(?,?,?,?,?,?,?)");
	// $stmt->bind_param("sssssis",$fname,$lname,$email,$password,$date,$phone,$gender);
	// $stmt->execute();
	// echo "Registered Succesfull";
	// $stmt->close();
	// $con->close();
	// header("location:authR.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <title>Sign Up</title>
</head>
<body>
    <!-- multistep form -->
<div class="login-box">
<form id="msform" action= "#" method="POST">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="fname" placeholder="First Name" required/>
    <input type="text" name="lname" placeholder="Last Name" required />
    <input type="text" name="phone" placeholder="Phone" required />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <select style="color: white" name = "gender" required>
        <option selected disabled>Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <input style="color: white" type="date" required >
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
   
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
 
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="pass" placeholder="Password" required />
    <input type="password" name="cpass" placeholder="Confirm Password"  required/>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="reg_submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>
</div>

<script src="Js/authR.js"> </script>
</body>
</html>


<style>
    /*custom font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

html {
	height: 100%;
	/*Image only BG fallback*/
	
	/*background = gradient + image pattern combo*/
	background: url('images/authR4.jpg') no-repeat center;

    background-size: cover;
}

body {
	font-family: montserrat, arial, verdana;
}
.select{
	color:white;
}

/*form styles*/

#msform {
	width: 365px;
	margin: 50px auto;
	text-align: center;
	position: relative;
    top: 90px;
    right:10px;
}
#msform fieldset {
	background: transparent;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: relative;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea, #msform select , #msform date {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: black;
	font-size: 13px;
    background: transparent;
}

#msform option{
    color:black;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: black;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: black;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: 33.33%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}

::placeholder {
  color: white;
  font-size: 16px;
  opacity: 1;
}

</style>