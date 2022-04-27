<?php 

$fname="";
$lname="";
$email="";
$password="";
$conpassword="";
$age=" ";
$phone="";
$gender="";
$error_array=array();

	if (isset($_POST['reg_submit'])){
		
	$fname = strip_tags($_POST['fname']); //removing html tags
	$fname = str_replace('','',$fname); // space removal
	$fname = ucfirst(strtolower($fname)); //uppercase 
	$_SESSION['fname']=$fname;

	$lname = strip_tags($_POST['lname']);
	$lname = str_replace('','', $lname);
	$lname = ucfirst(strtolower ($lname));
	$_SESSION['lname']=$lname;

	$phone = strip_tags($_POST['phone']);
	$phone = str_replace('','',$phone);
	$_SESSION['phone']=$phone;

	$gender = $_POST['gender'];
    $_SESSION['gender']=$gender;

	$dateofbirth =$_POST['dateofbirth'];
    $currentDate = date("m/d/y");
    $calc = date_diff(date_create($dateofbirth),date_create($currentDate));
    $age = $calc ->format("%y");
	


	$email = strip_tags($_POST['email']);
	$email = str_replace('','',$email);
	$_SESSION['email']=$email;

	$password = strip_tags($_POST['pass']);
	$password = str_replace('','',$password);

	$conpassword = strip_tags($_POST['cpass']);
	$conpassword = str_replace('','',$conpassword);
	

	//checking duplicate mails
	$e_check = mysqli_query ($con, "SELECT email FROM authr WHERE email='$email'");

	$num_rows = mysqli_num_rows($e_check);

	if ($num_rows > 0){
		array_push($error_array, "Email already in use <br>");
	}
	else {
		//name conditions
		if (strlen($fname)> 25 || strlen($fname)<2){
			array_push($error_array,"Your first name should be between 2 and 25 characters <br>");
		}elseif (strlen($lname)> 25 || strlen($lname)< 2) {
			array_push($error_array, "Your first name should be between 2 and 25 characters <br>");
		}else{
	//password conditons
		if($password != $conpassword){
		array_push($error_array, "Your passwrod don't match <br>");
		 }else {
			if(preg_match ('/[^A-Za-z0-9]/',$password)){
				array_push($error_array,"Your password can only contains english characters or numbers <br>");
			   }else{
				   // paswrod limit
				   if(strlen($password) >30 || strlen($password)<5){
					array_push($error_array, "Your passwrod must be betweem 5 and 30 characters <br>");
				}else{
					$stmt = $con->prepare("INSERT INTO authr(fname,lname,email,password,age,phone,gender)
					values(?,?,?,?,?,?,?)");
					$stmt->bind_param("ssssiis",$fname,$lname,$email,$password,$age,$phone,$gender);
					$stmt->execute();
					echo "Registered Succesfull";
					$stmt->close();
					$con->close();
					header("location:authR.php");
					
				}
			   }
			}
		}
		
	}

}



?>