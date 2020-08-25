<?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
session_start();
if (isset($_POST['add'])) {
    $fName = $_POST['fName'];
    $adminEmail = $_SESSION['email'];
    $sql = "INSERT INTO `families`( `fName`, `admin_email`)
 VALUES ('$fName','$adminEmail')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        header("Location: ../family.php?familyId=$last_id");
    } else {
        echo json_encode($conn->error);
    }
}

// end of the file
$conn->close();