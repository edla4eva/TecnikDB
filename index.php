<?php 
define('BASEPATH', '');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>TecnikDB Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">
  <script> 
          
      // Function to check Whether both passwords 
      // is same or not. 
      function checkPassword(form) { 
          password1 = form.password1.value; 
          password2 = form.password2.value; 

          // If password not entered 
          if (password1 == '') 
              alert ("Please enter Password"); 
                
          // If confirm password not entered 
          else if (password2 == '') 
              alert ("Please enter confirm password"); 
                
          // If Not same return False.     
          else if (password1 != password2) { 
              alert ("\nPassword did not match: Please try again...") 
              return false; 
          } 

          // If same return True. 
          else{ 
              alert("Password Match: Welcome to GeeksforGeeks!") 
              return true; 
          } 
      } 
  </script> 
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

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
    <link href="css/welcome.css" rel="stylesheet">
  </head>
  <body>
  <?php include "sections/nav_index.php"; ?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">TecnikDB Online!</h1>
      <h4></h4>
      <p><?php //include 'svr/get_welcome_message.php'; ?></p>
      <p>Welcome to the TecnikDB online. Our passion is to ensure that all cars receive precise care for your comfort. 
      This system was designed to facilitate our business</p>
    </br><a class="btn btn-primary btn-lg" href="sign-in.php" role="button">Sign In &raquo;</a>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Sign Up</h2> <a id="signup"></a>
        <p>Fill the information below to sign up, its quick and easy</p>
        <span class="text-danger"><?php // echo $msg; ?></span>
      <form class= "form-signin" method="post" action="svr/sign-up.php">  <!-- form action="svr/login.php" or button onClick="pasuser(this.form)"  -->
          <!-- <img class="mb-4" src="brand/tree.jpg" alt="" width="72" height="72"> -->
        <label for="username" class="sr-only">Email address</label>
        <input type="text" id="username" name="username"  class="form-control" placeholder="Username" required autofocus>

        <label for="inputEmail" class="sr-only">Email address (Optional)</label>
        <input type="email" id="inputEmail" name="inputEmail"  class="form-control" placeholder="Email address">
        <label for="phone" class="sr-only">Phone Number</label>
        <input type="text" id="phone" name="phone"  class="form-control" placeholder="Phone" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <div class="input-group">
          <input type="password" id="inputPassword1" name="inputPassword1" class="form-control pwd"  placeholder="Password" required>
          <span class="input-group-btn">
            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i>Show/Hide</button>
          </span>          
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password again" required>

        <button class="btn btn-lg btn-primary btn-block"  type="submit" name ="submit">Sign Up</button>
        
      </form>

        
      </div>
      <div class="col-md-8">
        <h2>Quick Guide</h2>
        
        <p>This Web application can be used to access the wide range of services we offer our customers. We take deliberate steps to
         ensure that we provide the necessary information to help you monitor your car's journey
         </p>
        
        <a class="btn btn-primary btn-lg" href="guide.php" role="button">Learn More &raquo;</a>
        </br> </br>


        <h2>News</h2><a id="news"></a>
        
        <h4><?php //echo $news_headline; ?></h4> 
        <?php //echo $news; ?>
        
        
        

        <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
        <h4>Quick Links</h4>
        <p>There is a lot happening on social media, connect on social media or 
          send an email
        </p>
        <div class="col-md-4 ">
          <ul class="list-unstyled">
            <li><a href="http://facebook.com" class="text-black">Like on Facebook</a></li>
            <li><a href="mailto:admin@yahoo.com?subject=eFamily" class="text-black">Email Us</a></li>

          </ul>
        </div>

      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Company 2017-2020</p>
</footer>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
-->
<script src="js/jquery.min.js"> </script> 
<script src="js/bootstrap.bundle.js"></script>
<script>
    $(".reveal").on('click',function() {
      var $pwd = $(".pwd");
      if ($pwd.attr('type') === 'password') {
          $pwd.attr('type', 'text');
      } else {
          $pwd.attr('type', 'password');
      }
    });
</script>

</html>
