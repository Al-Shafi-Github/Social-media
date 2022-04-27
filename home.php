<?php 

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    
    
    <title>Connect In</title>
</head>
<body>
<header>
    
    <div class="menu-btn"></div>
    <div class="navigation">
      <div class="navigation-items">
        <a href="#">Home</a>
        <a href="#">Our Vision</a>
        <a href="FAQs.php">FAQ's</a>
        <a href="#">Contact</a>
      </div>
    </div>
</header>

<div class="hero">
<section class="hero">
  <div class="inner-text">
    <p class="p1">CONNECT</p>
    <p class="p2">IN</p>
  </div>
  <a class="hero-down" href="#this">
    <div class="btn-react"></div>
    <i class="fa fa-chevron-down"></i>
  </a>

<!-- for login -->
  <div class="login-box">
  <h2>𝐋𝐨𝐠𝐢𝐧</h2>
  <form action="index.php" method="post">
    <div class="user-box">
      <input type="text" name="email"value="<?php 
		if(isset($_SESSION['email'])){
			echo $_SESSION['email'];
		} ?>" required />
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required>
      <label>Password</label>
    </div>

    <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
		<input type="submit" name="login_button" value="Login">
		<br>

    <a href="#" name="login_button">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a>
   

    <p class="p3">Don't have an account? 
    <a id ="btn2" href="authR.php">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
       Sign UP
    </a> 
    </p>
    
  
    
  </form>
</div>

</section>
</div>

<!-- for login -->

<script src="Js/home.js"></script>
</body>
</html>







<style>
  html {
    height: 100%;
    margin:0;
    padding:0;

  }
  body{
    height: 100%;
    margin:0;
    padding:0;
  }

  body {
    font-family: 'Roboto';
    text-align: center;
    color: #f5f5f5;
  }

  header{
  position: absolute;
  top: 0;
  left: 0;
  width: 93%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 50px;
  transition: 0.5s ease;
}



header .navigation{
  position: relative;
  top:15px;
  
}

header .navigation .navigation-items a{
  position: relative;
  color: #fff;
  font-size: 1.1em;
  font-weight: 500;
  text-decoration: none;
  margin-left: 30px;
  transition: 0.3s ease;
  color: White;
  
}

header .navigation .navigation-items a:before{
  content: '';
  position: absolute;
  background: #fff;
  width: 0;
  height: 3px;
  bottom: 0;
  left: 0;
  transition: 0.3s ease;
}

header .navigation .navigation-items a:hover:before{
  width: 100%;
}


.hero {
  background: url('images/pris2.jpg') no-repeat center;
  background-size: cover;


   height: 100%;
   width:100%;
}

.inner-text {
    position: relative;
    top: 5%;
    right: 33%;
    transform: translateY(-50%);
    font-size: 45px;
    @media only screen and (min-width: 320px) {
      padding-left: 15px;
      padding-right: 15px; 
    }
    @media only screen and (min-width: 400px) {
      padding-left: 40px;
      padding-right: 40px; 
    }

  }
  
  .p1 {
    display: inline-block;
    font-size: 0.5em;
    font-weight: 900;
    margin: 0;
    line-height: 1;
    
    @media only screen and (max-width: 465px) {
      display: block;
      position: absolute;
      top: -25%;
      left: 50%;
      transform: translateX(-50%);
    }
  }

  .p2 {
    display: inline-block;
    font-size: 0.5em;
    font-weight: 100;
    margin: 0;
    line-height: 1;
    color: #00FFFF;
    @media only screen and (max-width: 465px) {
      position: relative;
      top: 0.6em;
    }
  }
  .p3{
    display: inline-block;
  
  }



  /* for log in */
 

.login-box {
  position: absolute;
  top: 40%;
  left: 17%;
  width: 350px;
  height: 370px;
  padding: 10px;
  transform: translate(-50%, -50%);
  
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,255,255,1.0) ; 
  border-radius: 10px;
  color: #03e9f4;

}

.login-box h2 {
  margin: 0 0 30px;
  padding-top: 25px;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 8px 20px;
  color: #03e9f4;
  font-size: 13px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 10px;
  letter-spacing: 4px;
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #B3E5FC,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #B3E5FC;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

#btn2{
  top:12px;
  display: inline-block;
  margin-top: 10px;
  font-size: 13px;
}

</style>
