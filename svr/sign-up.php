<?php 
    define('CONNECTPATH', '');
    require_once 'connect.php';
    session_start(); /* Starts the session */
    /* Check Login form submitted */
    if(isset($_POST['submit'])){

    /* Check and assign submitted Username and Password to new variable */
    $inputEmail = isset($_POST['inputEmail']) ? test_input($_POST['inputEmail']) : '';
    $password1 = isset($_POST['inputPassword1']) ? test_input($_POST['inputPassword1']) : '';
    $username = isset($_POST['username']) ? test_input($_POST['username']) : '';
    $phone = isset($_POST['phone']) ? test_input($_POST['phone']) : '';
    $password = isset($_POST['inputPassword']) ? test_input($_POST['inputPassword']) : '';


    /* Check Username and Password existence in db */
    if ($con->connect_error) {
        error_log("Connection failed: " . $con->connect_error);
    }
    $sql = 'SELECT * FROM users WHERE (username="'.$username.'");';
    try{
    $result = $con->query($sql);  


        if($result->num_rows>0){

            //We cant add tell user
            $msg="<span style='color:red'>Invalid Login Details</span>";
            header("location:../signup.php?msg=-1"); //-1 usename exists
            exit; //000webhost
        } else {
            $_SESSION['UserData']['inputEmail']=$username; //auto login
            $sql = 'INSERT INTO `users` (`user_id`, `name`, `address`, `email`, `username`, `password`, `phone`, `status`) VALUES (NULL, "'.$username.'", "", "'.$inputEmail.'", "'.$username.'", "'.$password.'", "'.$phone.'", "1"); ';
            $result = $con->query($sql);
            $con->close();
            header("location:login-success.php");
            exit; //000webhost

        }

    $con->close();
    exit; //000webhost
    } catch(Exception $e) {
        //We cant add tell user
        $msg="<span style='color:red'>Invalid Login Details</span>";
        header("location:../signup.php?msg=-2");
        exit; //000webhost alsomake sure there is no echo stmt

    }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>