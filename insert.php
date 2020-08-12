<?php
require_once('db.php');
$pName=$_POST['pName'];
$pQnt=$_POST['pQnt'];

$sql = "INSERT INTO `Products`( `pName`, `pQnt`)
 VALUES ('$pName','$pQnt')";

if ($conn->query($sql)===TRUE) {
    header("Location:list.php");
}else {
    $conn->error;
}

$sql = "INSERT INTO `AllProducts`( `pName`)
 VALUES ('$pName')";

if ($conn->query($sql)===TRUE) {
    header("Location:list.php");
}else {
    $conn->error;
}

// end of the file
$conn->close();