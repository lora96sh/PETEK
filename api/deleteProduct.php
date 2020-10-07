<?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
$id=$_POST['id'];

if (isset($_POST['family'])){
    $sql = "DELETE FROM family_products WHERE id='$id'";
}elseif (isset($_POST['listProdDel'])){
    $sql = "DELETE FROM products WHERE id='$id'";
} else {
    $sql = "DELETE FROM purchasedproducts WHERE id='$id'";
}

if ($conn->query($sql)===TRUE) {
    echo json_encode(1);
}else {
    echo json_encode($conn->error);
}

$conn->close();