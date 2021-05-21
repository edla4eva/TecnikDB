<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">eFamily</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign-in.php">Sign In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="services.php" tabindex="-1" >Our Services</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tasks</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="guide.php">Guide</a>
          <a class="dropdown-item" href="index.php#signup">New Member Registration</a>
          <a class="dropdown-item" href="home.php">Existing Member Access</a>
          <a class="dropdown-item" href="guide.php#enquiry">Enquiry</a>
          <a class="dropdown-item" href="svr/logout.php">Sign Out (Exit)</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About the Package</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="guide.php#how">How to access</a>
          <a class="dropdown-item" href="guide.php#who">Who can Access</a>
          <a class="dropdown-item" href="guide.php#enquiry">Enquiry</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="admin/admin-sign-in.php">Sign In</a>
          <a class="dropdown-item" href="admin/admin-sign-in.php?signout=1">Sign Out</a>
         </div>
      </li>



    </ul>
  </div>
</nav>