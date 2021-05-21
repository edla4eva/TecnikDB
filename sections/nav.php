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


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Member Area<?php echo $usernamePara; ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="tree.php?id=<?php echo $id; ?>">User Page/Profile</a>
          <a class="dropdown-item" href="update.php?id=<?php echo $id; ?>">Update Records</a>
          <hr>
          <a class="dropdown-item" href="input.php?id=<?php echo $id; ?>">Add New Record</a>
          <hr>
          <a class="dropdown-item" href="album.php?username=<?php echo $username; ?>&id=<?php echo $id; ?>">Update Album</a>
          <a class="dropdown-item" href="upload.php?username=<?php echo $username; ?>">Upload Pix</a>
          <a class="dropdown-item" href="albumize/index.php?username=<?php echo $username; ?>">View Album</a>
          <hr>
          <a class="dropdown-item" href="password.php?username=<?php echo $username; ?>">Change Password</a>
          <a class="dropdown-item" href="admin/index.php?username=<?php echo $username; ?>">Switch to Admin</a>
          <a class="dropdown-item" href="svr/logout.php">Sign Out (Exit)</a>
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
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" id="search_str" name="search_str" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Search</button>
    </form>
  </div>
</nav>