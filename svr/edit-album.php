<?php
$msg="";
if (array_key_exists('delete_file', $_POST)) {
$path = "..";
$filename =  $path . "/" . $_POST['delete_file']; // build the full path here
//$filename =   $_POST['delete_file']; // get the full path here
    if (file_exists($filename)) {
        unlink($filename);
        $msg= 'File ' . $filename . ' has been deleted';
    } else {
        $msg=  'Could not delete ' . $filename . ', file does not exist';
    }
}else{
    
    $msg=  'error';
}
//include "../sections/nav.php";
echo '<h2>'.$msg.'<br> Click <a href="../album.php">here</a> to return to album </h2>'
?>