<?php 
session_start(); /* Starts the session */
$msg="";
$id="1";
$username='';
if (!isset( $_SESSION['UserData']['inputEmail'])) {
  header("location:admin-sign-in.php") ;
} else {
  if (isset($_GET["msg"])) $msg = $_GET["msg"];
  if ($msg=="-1") $msg="Could not add record! Please check the inputs and try again </br>";
  if (isset($_GET["id"])) $id = $_GET["id"];
  if (isset($_SESSION['UserData']['inputEmail'])) $username=$_SESSION['UserData']['inputEmail'];
  if (isset($_SESSION['UserData']['inputEmail'])) $usernamePara='('.$_SESSION['UserData']['inputEmail'].')';
  //Get what we need from DB
  define('BASEPATH', '');
  include 'get-admin-data-info.php';
}


//}
?>
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Jekyll v4.0.1">
      <title>Admin Tasks</title>

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
          $current_page="";
          $current_page_link="../home.php";
          include "sections/nav.php";
      ?>
      <!-- id 	first_name 	sur_name 	title 	parent_idr 	has_children 	children_names 	dob  year 	is_alive 	gender 	pix 	bio 	paternal_maternal 	dod 	 -->
    <div class="container">
      <div class="header"><h1 class="text-center">Admin Tasks</h1> <hr></div>
      <div class="row">
        
        <div class="col-sm-3 input-box" id="input">
            <h3> Instructions</h3>
             Use the 'Admin Task' menu above to navigate the admin page.
             Here you can upload pictures and edit content of the applicatiion     
                    
                    </br>
          <!-- Button to Open the Modal -->
          <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myBootstrapModal">   Lookup Unique Numbers  </button> -->
        </div> <!-- col1 -->

        <div class="col-sm-6 input-box" id="input">
            
          <form class= "form-signin" method="post" action="../svr/update-data.php">  <!-- form action="svr/login.php" or button onClick="pasuser(this.form)"  -->
        
            
            <p>Please enter requested information</p>
            <?php if (isset($msg)) echo $msg; ?>
            </br><hr>

            <h2> Registry (Family Info)</h2>
            <label for="registry"  >Enter information about the package</label>
            <textarea  type="text" id="registry" name="registry" class="form-control" value="<?php echo $family_info ; ?>" rows="10" cols="50" required>
              <?php echo $family_info ; ?>"
            </textarea>
            </br>

            </br> <hr>
            <h2> Picture Upload (for Album)</h2>
            <label for="pix">Picture</label>
            <input type="file" id="pix" name="pix" class="form-control" placeholder="Picture">
            <label for="pix_description"  >Enter Description</label> 
            <input  type="text" id="pix_description" name="pix_description" value="<?php // echo implode(" - ",$album_array[0]); //array of arrays //print_r( $album_array); ?>"  class="form-control" placeholder="picture description" >

            <hr> <br>

           
            <div class="information" id='validate_msg' style="display:none">Please Read the Information Carefully</div>
            </br>
            <span class="btn btn-lg btn-primary btn-block" onClick="showConfirmation();">Request for Update</span>
            <button class="btn btn-lg btn-primary btn-block"  type="submit" 
            name ="submit" id ="submit" style="display: none;">Confirm Update</button>
          </form>
          <br><hr><br>

          <form class= "form-signin" method="post" action="update-admin.php">  <!-- form action="svr/login.php" or button onClick="pasuser(this.form)"  -->

            <?php if (isset($msg)) echo $msg; ?>

            <h2> Family History </h2>
            <br>
              <label for="family_history"  >Enter/Edit Content of Fmily History</label>
            <textarea  type="text" id="family_history" name="family_history" value="<?php echo $family_history ; ?>"  class="form-control" placeholder="family_history names" rows="10" cols="50">
            <?php echo $family_history ; ?>"
            </textarea>
            <hr>

            <span class="btn btn-lg btn-primary btn-block" onClick="showConfirmation();">Request for Update</span>
            <button class="btn btn-lg btn-primary btn-block"  type="submit" 
            name ="submit" id ="submit" style="display: none;">Confirm Update</button>
          </form>
        </div> <!-- col2 -->
          
        <div class="col-sm-3 input-box" id="input">
            <h4></h4>
        </div> <!-- col3 -->
      
      </div>
      <div class="footer"><p class="mt-5 mb-3  text-center text-muted">&copy; 2017-2020</p></div>
    </div>

    <div id="scripts">
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" type="text/javascript"></script>
        <script language="javascript">
          //show late div
          function showLateDiv(dVal){
            if (dVal==1) 
            this.document.getElementById("late").style="display:block"
            else
            this.document.getElementById("late").style="display:none"
          }

          function showConfirmation(){
            this.document.getElementById("submit").style="display:block"
            
          }
        </script>

        <script language="javascript">
                    
                      var modal = document.getElementById("myModal");   // Get the modal         
                      var btn = document.getElementById("myBtn");// Get the button that opens the modal
                      var span = document.getElementsByClassName("close")[0];// Get the <span> element that closes the modal
                      var btnRefresh = document.getElementById('btnRefresh');
                      btn.onclick = function() {    // When the user clicks on the button, open the modal
                        modal.style.display = "block";
                      }

                      span.onclick = function() {   // When the user clicks on <span> (x), close the modal
                        modal.style.display = "none";
                      }
                      window.onclick = function(event) { // When the user clicks anywhere outside of the modal, close it
                        if (event.target == modal) {
                          modal.style.display = "none";
                        }
                      } 
                      

              
              
              var btnRefresh = document.getElementById('btnRefresh');
          
              btnRefresh.onclick = function() {    // When the user clicks on the button, clear text
                inputT = document.getElementById('myInput');
                  inputT.value="";
                
              }

              function mySearchFunction() {
              // Declare variables
              var input, filter, ul, li, a, i, txtValue;
              input = document.getElementById('myInput');
          
              filter = input.value.toUpperCase();
              ul = document.getElementById("myULSearch");
              li = ul.getElementsByTagName('li');
              ul.style.display = "" //first show all
              // Loop through all list items, and hide those who don't match the search query
              for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
                } else {
                  li[i].style.display = "none";
                }
              }
            }
        </script>
        
        <script  type="text/javascript">
                //auto fill form
                $(document).ready( function() {
                //$('.form-control').on("change", function() {
                    
                    var id= $('#id').val();
                    //alert('yeh: got the id = ' + id);
                    //$('#first_name').val('auto filled: '); //dR;
                    $.ajax({
                        type: 'GET',
                        url:  'svr/api.php/records/efamily/'+ id,
                        data: {'other_names' : '1'},
                        dataType: 'json',
                        cache: false,
                        success: function(result) {
                            var dR;
                            dR= JSON.stringify(result);
                            $('#first_name').val(result["first_name"]);
                            $('#sur_name').val(result["sur_name"]);
                            $('#title').val(result["title"]);
                            $('#parent_idr').val(result["parent_idr"]);
                            $('#has_children').val(result["has_children"]);
                            $('#children_names').val(result["children_names"]);
                            $('#dob').val(result["dob"]);
                            $('#is_alive').val(result["is_alive"]);
                            $('#gender').val(result["gender"]);
                            $('#pix').val(result["pix"]);
                            $('#bio').val(result["bio"]);
                            $('#paternal_maternal').val(result["paternal_maternal"]);
                            $('#dod').val(result["dod"]);
                            $('#other_names').val(result["other_names"]);
                            //alert('yeh: ' + ' returned' + dR);
                        },
                    });
                });
        
        </script>
    
    
    </div>
  </body>
</html>
