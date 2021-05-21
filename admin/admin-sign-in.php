<?php 	
define('BASEPATH', '');
session_start(); /* Starts the session */
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["msg"])) $msg = $_GET["msg"];
  
  if ($msg=="-1") $msg="Could not signIn! wrong credentials".'<br> Click <a href="../index.php>here</a> to return home"';
  if ($msg=="-2") $msg="Could not  signIn! Database error".'<br> Click <a href="../index.php>here</a> to return home"';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin Sign In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <!-- FACEBOOK   Step 1: Include the JavaScript SDK on your page once, 
ideally right after the opening body tag. -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="zvTMv7NE"></script>

  <!--   <form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  post to sme page-->
    <?php if (isset($msg)) echo $msg; ?>
  <form class= "form-signin" method="post" action="login.php">  <!-- form action="svr/login.php" or button onClick="pasuser(this.form)"  -->
      <img class="mb-4" src="../brand/tree.jpg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Admin Sign in</h1>
    <label for="username" class="sr-only">Username (or Email)</label>
    <input type="text" id="username" name="username"  class="form-control" placeholder="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
   
    <!-- An element to toggle between password visibility -->
    <input type="checkbox" onclick="myFunction()"> Show Password 
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block"  type="submit" name ="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
  

<!-- Step 2: Place this code wherever you want the plugin to appear on your page. -->
<div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>

</script>
<script language="javascript">
<!--//
/*This Script allows people to enter by using a form that asks for a
UserID and Password*/
function myFunction() {
  var x = document.getElementById("inputPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
function pasuser(form) {
  if (form.inputEmail.value=="admin@admin.com") { 
  if (form.inputPassword.value=="admin") {  
        // Put this in your login function, just before the redirect
      var sessionTimeout = 1; //hours
      var loginDuration = new Date();
      loginDuration.setTime(loginDuration.getTime()+(sessionTimeout*60*60*1000));
      document.cookie = "CrewCentreSession=Valid; "+loginDuration.toGMTString()+"; path=/";
      //redirect            
      location="tree.html" 
  } else {
  alert("Invalid Password")
  }
  } else {  alert("Invalid UserID")
  }
}
//-->
</script>
</body>
</html>
