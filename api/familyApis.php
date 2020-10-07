<?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
session_start();
$email= isset($_SESSION['email'])? $_SESSION['email']:null;

    
if (isset($_POST['addFamily'])) {
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

if (isset($_POST['addProduct'])){
    $familyId = $_POST['familyId'];
    $pName = $_POST['pName'];
    $pQnt = $_POST['pQnt'];
    $sql = "INSERT INTO `family_products`( `pName`, `pQnt`, `family_id`)
    VALUES ('$pName','$pQnt','$familyId')";

    if ($conn->query($sql)===TRUE) {
        header("Location: ../family.php?familyId=$familyId");
    }else {
        echo json_encode($conn->error);
    }
}

if (isset($_POST['joinFamily'])){
    $familyId = $_POST['familyId'];
    $from = $_SESSION['email'];
    $to = $_POST['to'];

    $data = mysqli_query($conn,"select * from requests where (`fromEmail`= '$from' && family_id='$familyId')");
    $response = array();
    while($row = mysqli_fetch_assoc($data)){
        $response[] = $row;
    }
    if (count($response) > 0){
        echo json_encode(false);
        exit();
    }else {

        $sql = "INSERT INTO `requests`( `fromEmail`, `toEmail`, `family_id`)
    VALUES ('$from','$to','$familyId')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode($conn->insert_id);
        } else {
            echo json_encode($conn->error);
        }
    }
}

if (isset($_POST['allProducts'])) {
    $familyId = $_SESSION['familyId'];
    $data = mysqli_query($conn,"select * from family_products where family_id='$familyId'");

    $response = array();

    while($row = mysqli_fetch_assoc($data)){
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['allFamilies'])) {
    $data = mysqli_query($conn,"select * from families where admin_email != '$email'");

    $response = array();

    while($row = mysqli_fetch_assoc($data)){
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['requests'])) {
    $familyId = $_SESSION['familyId'];
    $data = mysqli_query($conn,"select * from requests where (family_id='$familyId' && accepted=false)");

    $response = array();

    while($row = mysqli_fetch_assoc($data)){
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['acceptReq'])) {
    $familyId = $_SESSION['familyId'];
    $customer = $_POST['customer'];
    $reqId = $_POST['reqId'];

    $sql = "UPDATE `requests`
    SET `accepted`=true WHERE id=$reqId";
    if ($conn->query($sql)===TRUE) {
        $sql = "INSERT INTO `family_members`( `memberEmail`,`family_id`)
        VALUES ('$customer','$familyId')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode($conn->insert_id);
        } else {
            echo json_encode($conn->error);
        }
    }else {
        $conn->error;
    }
    exit;
}

if (isset($_POST['members'])) {
    $familyId = $_SESSION['familyId'];
    $data = mysqli_query($conn,"select * from family_members where family_id='$familyId'");

    $response = array();

    while($row = mysqli_fetch_assoc($data)){
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['delMember'])) {
    $delId = $_POST['idToDel'];
    // sql to delete a record
    $sql = "DELETE FROM family_members WHERE id='$delId'";

    if ($conn->query($sql) === TRUE) {
        echo true;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    exit;
}

if (isset($_POST['rejectReq'])){
    $delId = $_POST['reqId'];
    // sql to delete a record
    $sql = "DELETE FROM requests WHERE id='$delId'";

    if ($conn->query($sql) === TRUE) {
        echo true;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    exit;
}
 

    

// end of the file
$conn->close();