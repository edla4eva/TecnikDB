<?php 
	// Path to the system directory
	define('BASEPATH', '');
  session_start();
  if (!isset( $_SESSION['UserData']['inputEmail'])) {
    header("location:admin-sign-in.php") ;
  } else {
    $usernamePara='('.$_SESSION['UserData']['inputEmail'].')';
    $username=$_SESSION['UserData']['inputEmail'];
  }
  //print_r($_SESSION); //debug
?>
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Obadan Admin Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
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

      .card {
      overflow: hidden;
    }
    
    .card-block .rotate {
      z-index: 8;
      float: right;
      height: 100%;
    }
    
    .card-block .rotate i {
      color: rgba(20, 20, 20, 0.15);
      position: absolute;
      left: 0;
      left: auto;
      right: -10px;
      bottom: 0;
      display: block;
      -webkit-transform: rotate(-44deg);
      -moz-transform: rotate(-44deg);
      -o-transform: rotate(-44deg);
      -ms-transform: rotate(-44deg);
      transform: rotate(-44deg);
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/welcome.css" rel="stylesheet">
  </head>
  <body>
      <?php 
          $current_page="Dashboard";
          $current_page_link="dashboard.php";
          include "sections/nav.php";
      ?>

    <div class="container-fluid">
      <!-- Example row of columns -->
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#first-generation">
                  <span data-feather="file"></span>
                  First Generation
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#second-generation">
                  <span data-feather="shopping-cart"></span>
                  Second Generation
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="#contact">
                  <span data-feather="users"></span>
                  Contact
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#all-daugters">
                  <span data-feather="bar-chart-2"></span>
                  All Daughters
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="#maternal">
                  <span data-feather="layers"></span>
                  Maternal relations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#users">
                  <span data-feather="layers"></span>
                  Users
                </a>
              </li>
            </ul>

           
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h1">Admin Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>

            </div>
          </div>
          <p>Welcome to the Admin section of the Obadan family directory, you can configure the application from this section. Use the "Admin Tasks" 
          menu above.</p>
          <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="200"></canvas> -->

          <?php include 'get-admin-data.php'; ?>
          <div class="row mb-3">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                  <div class="rotate">
                    <i class="fa fa-user fa-5x"></i>
                  </div>
                  <h6 class="text-uppercase">Users</h6>
                  <h1 class="display-1"><?php echo $count_all; ?></h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-danger">
                <div class="card-block bg-info">
                  <div class="rotate">
                    <i class="fa fa-child fa-4x"></i>
                  </div>
                  <h6 class="text-uppercase">Sons</h6>
                  <h1 class="display-1"><?php echo $count_sons; ?></h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-info">
                <div class="card-block bg-danger">
                  <div class="rotate">
                    <i class="fa fa-female fa-5x"></i>
                  </div>
                  <h6 class="text-uppercase">Daughters</h6>
                  <h1 class="display-1"><?php echo $count_daughters; ?></h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-warning">
                <div class="card-block bg-warning">
                  <div class="rotate">
                    <i class="fa fa-user-friends fa-5x"></i>
                  </div>
                  <h6 class="text-uppercase">Maternal relations</h6>
                  <h1 class="display-1"><?php echo $count_maternal; ?></h1>
                </div>
              </div>
            </div>
          </div>
          <!--/row-->

          <hr>
                      


          <hr><a id="first-generation"></a>
          <h2>First Generation</h2> 

          <p>All children of Obadan are referred to as first generation. There are currently
          <?php echo $count_first_gen; ?> first generation sons and daughters
            <br> 
            <?php //echo $first_gen_family_list; ?>
            <?php echo $first_gen_family_table; ?>


          <h2>Summary</h2> <a id="second-generation"></a>
          <p>All grand children of Obadan are referred to as second generation. There are currently
          <?php echo $count_second_gen; ?> first generation sons and daughters
          <?php //echo $second_gen_table; ?>
          <div class="table-responsive">
              <table class="table table-striped">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>Male</th>
                    <th>Female</th>
                    <th>Maternal</th>
                    <th>Paternal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2</td>
                    <td><?php echo $count_sons; ?></td>
                    <td><?php echo $count_daughters; ?></td>
                    <td><?php echo $count_maternal; ?></td>
                    <td><?php echo $count_paternal; ?></td>
                  </tr>
                  
                  </tr>
                </tbody>
              </table>
          </div>

          <h2>Maternal Relations</h2> <a id="maternal"></a>
           <?php //echo $contact_table; ?>
           <hr>

           <h2>Users</h2> <a id="users"></a>
           <?php echo $users_table; ?>
           <hr>

                       
           <h2>Contact</h2> 
            <a id="contact"></a>
            <?php echo $contact_table; ?>
            <hr>

 
           
        </main>

      </div>

      <hr>

    </div> <!-- /container -->


    <footer class="container">
      <p>&copy; Company 2017-2020</p>
    </footer>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
    -->
    <script src="../js/jquery.min.js"> </script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/home-search.js"></script>
  </body>
</html>
