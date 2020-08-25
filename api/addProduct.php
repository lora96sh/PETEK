<?php require("../db.php");?>
<?php
session_start();
header('Content-Type: application/json');
$pName=$_POST['pName'];
$pQnt=$_POST['pQnt'];
$userEmail = $_SESSION['email'];

$sql = "INSERT INTO `products`( `pName`, `pQnt`,`user_email`)
 VALUES ('$pName','$pQnt','$userEmail')";

if ($conn->query($sql)===TRUE) {
        header("Location: ../list.php?status=success");
}else {
    echo json_encode($conn->error);
}

// end of the file
$conn->close();