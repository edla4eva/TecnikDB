<?php 
define('CONNECTPATH', '');
try {
    require_once 'connect.php';
}  catch(Exception $e) {
    //header("location:fancy-error.php?msg=db");
    require_once 'fancy-error.php'; //also works
    exit;
 }
session_start(); /* Starts the session */


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? test_input($_POST['username']) : '';
    $password = isset($_POST['inputPassword']) ? test_input($_POST['inputPassword']) : '';
    if ($con->connect_error) {
        $msg="<span style='color:red'>Invalid Login Details</span>";
        header("location:index.php");
        exit;
    }
       
    $sql = 'SELECT * FROM users WHERE (username="'.$username.'" AND password="'.$password.'");';
    
    try{
        $result = $con->query($sql);  
        if($result->num_rows>0){
            /* Success: Set session variables and redirect to Protected page  */
            $_SESSION['UserData']['inputEmail']=$username;
            $_SESSION['UserData']['username']=$username;
            header("location:index.php");
            exit; //000webhost and make sure nothing is echoed
        } else {
            $msg="<span style='color:red'>Invalid Login Details</span>";
            header("location:admin-sign-in.php?msg=-1");
            exit; //000webhost
        }
    }  catch(Exception $e) {
        //We cant add tell user
        $msg="<span style='color:red'>Invalid Login Details</span>";
        header("location:admin-sign-in.php?msg=-2");
        exit;


    }
} //enf if POST

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// function change_status($con, $username, $password) {
//     // $sql = 'UPDATE users SET `status`=1 WHERE (username= ? AND password= ?);';
//     // $row = $con->prepare($sql);
//     // $row->bind_param( "ss", $username, $password);
//     // $row->execute();
//     // $result=$row->get_result(); //print_r($result);
//     return $username;
//   }
?>