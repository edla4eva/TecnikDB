
<!DOCTYPE html>
<html>
<body>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

// Check conection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT id, first_name, sur_name FROM efamily";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["first_name"]. " " . $row["sur_name"] . "<br>";
    }
} else {
    echo "0 results";
}

$con->close();
?>

</body>
</html>
