<!-- <?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
$email=$_POST['email'];
$password=$_POST['password'];

$result = $conn->query("SELECT email FROM Customers WHERE email = '$email'");
if($result->num_rows == 0) {
    
    $sql = "INSERT INTO `Customers`( `email`, `password`)
    VALUES ('$email','$password')";

    if ($conn->query($sql)===TRUE) {
        echo json_encode($conn->insert_id);
    }else {
        echo json_encode($conn->error);
    }
} else {
    echo json_encode($conn->error);
}
$mysqli->close();



// end of the file
$conn->close();  -->