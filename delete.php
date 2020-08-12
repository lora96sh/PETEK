<?php
require_once('db.php');
$id=$_GET['id'];
$sql = "DELETE FROM Products WHERE id=$id";

if ($conn->query($sql)===TRUE) {
    header("Location:list.php");
}else {
    $conn->error;
}


// end of the file
$conn->close();