<?php
require_once('db.php');
$pName=$_POST['pName'];
$pQnt=$_POST['pQnt'];

$id=$_POST['id'];

$sql = "UPDATE `Customers`
 SET `pName`='$pName',`pQnt`='$pQnt'
  WHERE id=$id";

if ($conn->query($sql)===TRUE) {
    header("Location:list.php");
}else {
    $conn->error;
}


// end of the file
$conn->close();