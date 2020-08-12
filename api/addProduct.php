<?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
$pName=$_POST['pName'];
$pQnt=$_POST['pQnt'];

$sql = "INSERT INTO `products`( `pName`, `pQnt`)
 VALUES ('$pName','$pQnt')";

if ($conn->query($sql)===TRUE) {
    echo json_encode($conn->insert_id);
}else {
    echo json_encode($conn->error);
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