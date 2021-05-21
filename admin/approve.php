<?php 
	define('BASEPATH', '');  // Path to the system directory
  session_start();
  if (!isset( $_SESSION['UserData']['inputEmail'])) {
    header("location:index.php") ;
  } else {
    $usernamePara='('.$_SESSION['UserData']['inputEmail'].')';
    $username=$_SESSION['UserData']['inputEmail'];
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
      <title>Approve Data</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

      <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

  
    <style>
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

            /* The Modal (background) */
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      /* Modal Content/Box */
      .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
      }

      /* The Close Button */
      .close {
        color: black;
        float: right;
        font-size: 14px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: #aaa;
        text-decoration: none;
        cursor: pointer;
      } 
      </style>


      <!-- Custom styles for this template -->
      <!-- <link href="css/signin.css" rel="stylesheet"> -->
  </head>
  <body style = "padding-top: 65px;">
  <?php 
          $current_page="Approvals";
          $current_page_link="approve.php";
          include "sections/nav.php";
      ?>
      <!-- id 	first_name 	sur_name 	title 	parent_idr 	has_children 	children_names 	dob  year 	is_alive 	gender 	pix 	bio 	paternal_maternal 	dod 	 -->
    <div class="container">
      <div class="header"><h1 class="text-center">Approve Data</h1> <hr></div>
      <div class="row">
        
        <div class="col-sm-3 input-box" id="input">
            <h3> Instructions</h3>
            Users have requested changes to the database. Review and approve.
          </br>
          <!-- Button to Open the Modal -->
          <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myBootstrapModal">   Lookup Unique Numbers  </button> -->
        </div> <!-- col1 -->

        <div class="col-sm-6 input-box" id="input">
        <h1 class="h3 mb-3 font-weight-normal">Please Review Info and approve</h1> 
        
        <?php if (isset($msg)) echo $msg; 
            //include 'svr/approve-data.php';
        
        ?>
        <table class="table">
        <thead>
            <tr>
                <td><strong>Id</strong></td>
                <td><strong>First Name</strong></td>
                <td><strong>Surname</strong></td>
                <td></td>
                <td></td>

        </thead>
        <tbody>
        </tr>
 
        <?php
            try{
            require_once 'connect.php';
            $sql = "SELECT * FROM efamily WHERE approved=0 LIMIT 30";
            $result = $con->query($sql);
            }catch(Exception $e){
              echo 'error!';
            }
            while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['sur_name']); ?></td>
                    <!-- Just use AJAX instead -->
                    <td><button id="approve" class="approve btn btn-primary" 
                    href="../svr/api.php/records/efamily/<?php echo htmlspecialchars($row['id']); ?>">Approve
                    </button>
                    
                    <button id="revoke" class="revoke btn btn-primary" 
                    href="../svr/api.php/records/efamily/<?php echo htmlspecialchars($row['id']); ?>">Revoke
                    </button></td>
                    <td><a href="update-approve.php?id=<?php echo htmlspecialchars($row['id']); ?>">Approve</a></td>
                </tr>

        <?php
        }
        ?>
        </tbody>
        </table>
        
        <br><hr>
        <form class= "form-signin" method="post" action="../svr/input-data.php">  <!-- form action="svr/login.php" or button onClick="pasuser(this.form)"  -->
          <h1 class="h3 mb-3 font-weight-normal">Please Check and Update the Information</h1>
          

            <label for="first_name" class="sr-only">Name of Family Member</label>
          <input type="text" id="first_name" name="first_name" class="form-control" placeholder="*first name" required>
            <label for="other_names" class="sr-only">Other names of Family Member</label>
          <input type="text" id="other_names" name="other_names" class="form-control" placeholder="Other names">
            <label for="sur_name" class="sr-only">Surname of Family Member</label>
          <input type="text" id="sur_name" name="sur_name" class="form-control" placeholder="*Surname" required>
            <label for="title" class="sr-only">Title</label>
          <input type="text" id="title" name="title" class="form-control" placeholder="*Title" required>

            <label for="parent_idr">Unique number of Parent of Family Member. look it up <span id="myBtn"  class="btn btn-secondary">here</span></label>
          <input type="text" id="parent_idr" name="parent_idr" class="form-control" placeholder="Parent Unique No." >
          
          <label for="has_children">Children (no. of male & no of female)</label>
          <input type="text" id="has_children" name="has_children" class="form-control" placeholder="Children (no. of male & no of female)" >
            <label for="children_names">Names of Children (Seperate with comma)</label>
          <input type="text" id="children_names" name="children_names" class="form-control" placeholder="children_names">
          <label for="dob" class="sr-only">Date of Birth (yyyy-mm-dd)</label>
          <input type="text" id="dob" name="dob" class="form-control" placeholder="DOB (yyyy-mm-dd)" >
            <label for="is_alive" class="sr-only">Gender</label>
          <input type="text" id="gender" name="gender" class="form-control" placeholder="*Gender (Male/Female)?" required>
          
          <label for="pix">Picture</label>
          <input type="file" id="pix" name="pix" class="form-control" placeholder="Picture">
          <label for="bio" class="sr-only">Bio</label>
          <input type="text" id="bio" name="bio" class="form-control" placeholder="Bio" >
          <label for="bio" class="sr-only">How are you related? Paternal or Maternal?</label>
          <input type="text" id="paternal_maternal" name="paternal_maternal" class="form-control" placeholder="*Paternal/Maternal?" required>
          <div id="late">
                <label for="is_alive">Is this data for you (Yes), Are you entering it for a deceased family member (No)</label>
                <input type="text" id="is_alive" name="is_alive" class="form-control" placeholder="Alive?" required>

                <label for="dod" class="sr-only">Date of Death - If applicable (yyyy-mm-dd)</label>
                <input type="text" id="dod" name="dod" class="form-control" placeholder="DOD (yyyy-mm-dd)">
            </div>
          
          <div class="information" id='validate_msg' style="display:none">Please Read the Information Carefully</div>
          </br>
          <span class="btn btn-lg btn-primary btn-block" onClick="showConfirmation();">Request for Update</span>
          <button class="btn btn-lg btn-primary btn-block"  type="submit" 
          name ="submit" id ="submit" style="display: none;">Confirm Update</button>
        </form>
        <?php
            echo 'Test';
        ?>

        </div> <!-- col2 -->
          
        <div class="col-sm-3 input-box" id="input">
            <h4>Info</h4>
        </div> <!-- col3 -->
      
      </div>
      <div class="footer"><p class="mt-5 mb-3  text-center text-muted">&copy; 2017-2020</p></div>
    </div>

    <div id="scripts">
  
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>

        <script language="javascript">
 
            //Call API using AJAX
            $(document).ready( function() {
                $('table tr td .approve').click(function() {
                    //alert('yeh: ' + $(this).attr('href'));
                    $.ajax({
                        type: 'PUT',
                        url: $(this).attr('href'), //'svr/api.php/records/efamily/19',
                        data: {'approved' : '1'},
                        dataType: 'json',
                        cache: false,
                        success: function(result) {
                            $('#approve').after(' (approved!)');
                            
                            var dR;
                            dR= JSON.stringify(result);
                            alert('Approveed: ' + $(this).attr('href') + ' returned' + dR);
                        },
                    });
                });
                //Next for revoke
                $('#revoke').click(function() {
                    alert('yeh: ' + $(this).attr('href'));
                    $.ajax({
                        type: 'PUT',
                        url: $(this).attr('api'), // 'svr/api.php/records/efamily/19',
                        data: {'approved' : '0'},
                        dataType: 'json',
                        cache: false,
                        success: function(result) {
                            $('#approve').after(' (revoked!)');
                            var dR;
                            dR= JSON.stringify(result);
                        },
                    });
                });

                //auto fill form
                $('.input-data').on("change", function() {
                    
                    var id= $('.input-data').val();
                    //alert('yeh: changed id = ' + id);
                    //$('#first_name').val('auto filled: '); //dR;
                    $.ajax({
                        type: 'GET',
                        url:  '../svr/api.php/records/efamily/'+ id,
                        data: {'approved' : '1'},
                        dataType: 'json',
                        cache: false,
                        success: function(result) {
                            
                            
                            var dR;
                            dR= JSON.stringify(result);
                            $('#first_name').val('auto filled: ' + result["first_name"]);
                            
                            $('#sur_name').val('auto filled: ' + dR);
                            //alert('yeh: ' + ' returned' + dR);
                        },
                    });
                });

            }); //doc


        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" type="text/javascript"></script>
    </div>
  </body>
</html>
