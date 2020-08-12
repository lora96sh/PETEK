<?php
require_once('db.php');
$pName=$_POST['pName'];
$id=$_POST['id'];
$sql = "UPDATE `AllProducts`
SET `pName`='$pName'
 WHERE id=$id";
if ($conn->query($sql)===TRUE) {
    header("Location:products.php");
}else {
    $conn->error;
}

// end of the file
$conn->close();