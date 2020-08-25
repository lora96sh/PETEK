<?php require("../db.php");?>
<?php
session_start();
$email= isset($_SESSION['email'])? $_SESSION['email']:
    isset($_COOKIE['email'])?$_COOKIE['email']:null;
$userData = mysqli_query($conn,"select * from products where user_email='$email' ORDER BY pName");
$response = array();

while($row = mysqli_fetch_assoc($userData)){

    $response[] = $row;
}

echo json_encode($response);
exit;


$conn->close();