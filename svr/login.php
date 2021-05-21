<?php 
// error_reporting(E_ALL); //TODO: remove error reporting
// ini_set('display_errors', 1);
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
   // $password=hash('sha256',$password); //todo: encrypt
   try{
    if ($con->connect_error) {
        $msg="<span style='color:red'>Invalid Login Details</span>";
        header("location:../sign-in.php?msg=-2");
        exit;
    }
       // echo "input username: ".$username;
        $sql = 'SELECT * FROM users WHERE (username= ? AND password= ?);';
        $row = $con->prepare($sql);
        $row->bind_param( "ss", $username, $password);

        
        $row->execute();
        $result=$row->get_result();//print_r($result);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            // echo "id: " . $row["user_id"]. " - username: " . $row["username"].  "<br>";
            // echo "efamily id: " . $row["efamily_id"];
                $_SESSION['UserData']['inputEmail']=$username;
                $_SESSION['UserData']['username']=$username;
                // $_SESSION['UserData']['password']=$password;
                $id=$row['efamily_id'];
                $_SESSION['UserData']['id']=$id;
                 change_status($con, $username, $password);
                header("location:../home.php"); //redirect to home page on successful login
                exit;
            }
        } else {
            //echo "0 results";
            header("location:../sign-in.php?msg=-1");
            exit;
        }
        $con->close();
    }  catch(Exception $e) {
        //We cant add tell user
        $msg="<span style='color:red'>Invalid Login Details</span>";
        header("location:../sign-in.php?msg=-1");
        exit;
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function change_status($con, $username, $password) {
    $sql = 'UPDATE users SET `status`=1 WHERE (username= ? AND password= ?);';
    $row = $con->prepare($sql);
    $row->bind_param( "ss", $username, $password);
    $row->execute();
    $result=$row->get_result(); //print_r($result);
    return $username;
  }
?>