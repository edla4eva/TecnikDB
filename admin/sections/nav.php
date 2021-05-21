
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../index.php">eFamily</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item dropdown text-nowrap active">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Tasks<span class="sr-only">(current)</span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="admin.php#family">Family History</a>
                  <a class="dropdown-item" href="admin.php#registry">Registry</a>
                  <a class="dropdown-item" href="admin.php#pix">Picture Upload</a>
                  <a class="dropdown-item" href="admin.php#rank">Ranking/Seniority</a>
                  <a class="dropdown-item" href="approve.php">Approvals</a>
                  <a class="dropdown-item" href="password.php?username=<?php echo $username; ?>">Change Password</a>
                  <a class="dropdown-item" href="admin-sign-in.php?signout=1">Sign Out</a>
                </div>
            </li>
          </ul>
      <!--     <form class="form-inline my-2 my-lg-0">
            <input id="myGenSearchInput" class="form-control mr-sm-2" onkeyup="mySearchFunction();" type="text" placeholder="Search for Family Member" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
          </form> -->
        </div>
    </nav>