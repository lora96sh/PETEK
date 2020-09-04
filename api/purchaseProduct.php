<?php require("../db.php");?>
<?php
session_start();
header('Content-Type: application/json');
$name=$_POST['name'];
$prodId = $_POST['id'];
$userId=$_SESSION['email'];

if (isset($_POST['family'])){
    $sql = "UPDATE family_products SET purchased=true WHERE id='$prodId'";
}else {
    $sql = "UPDATE products SET purchased=true WHERE id='$prodId'";
}

if ($conn->query($sql) === TRUE) {
    $sql = "INSERT INTO `purchasedProducts`( `pName`,`customer_email`)
    VALUES ('$name','$userId')";

    if ($conn->query($sql)===TRUE) {
        header("Location: ../list.php?status=success");
    }else {
        echo json_encode($conn->error);
    }
} else {
    echo json_encode($conn->error);
}


$conn->close();