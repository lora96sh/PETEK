<?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
session_start();
if (isset($_POST['addList'])) {
    $lName = $_POST['lName'];
    $userEmail = $_SESSION['email'];
    $sql = "INSERT INTO `lists`( `lName`, `user_email`)
 VALUES ('$lName','$userEmail')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $data = mysqli_query($conn,"select * from products where user_email='$userEmail'");
        $response = array();

        while($row = mysqli_fetch_assoc($data)){
            $response[] = $row;
        }
        foreach ($response as $key => $value) {
            $pName = $value['pName'];
            $sql = "INSERT INTO list_products (pName,list_id) VALUES ('$pName','$last_id')";
            if ($conn->query($sql) === false) {
                die('Invalid query: ' . $conn->error);
            }
        }

        $sql = "DELETE FROM products WHERE user_email='$userEmail'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../listProducts.php?listId=$last_id");
        }else{
            echo json_encode($conn->error);
        }
    } else {
        echo json_encode($conn->error);
    }
}

if (isset($_POST['allProducts'])){
    $listId = $_SESSION['listId'];
    $data = mysqli_query($conn,"select * from list_products where list_id='$listId'");

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

if (isset($_POST['delList'])){
    $listId = $_SESSION['listId'];
    // sql to delete a record
    $sql = "DELETE FROM list_products WHERE list_id='$listId'";

    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM lists WHERE id='$listId'";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../list.php?status=success");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    exit;
}

if (isset($_GET['listId'])){
    $listId = htmlspecialchars($_GET["listId"]);
    $data = mysqli_query($conn,"select * from list_products where list_id='$listId'");
    $response = array();

    while($row = mysqli_fetch_assoc($data)){
        $response[] = $row;
    }
    foreach ($response as $key => $value) {
        $pName = $value['pName'];
        $pQnt = 1;
        $email = $_SESSION['email'];
        $sql = "INSERT INTO products (pName,pQnt,user_email) VALUES ('$pName','$pQnt','$email')";
        if ($conn->query($sql) === false) {
            die('Invalid query: ' . $conn->error);
        }
    }
    header("Location: ../list.php?status=success");
}

// end of the file
$conn->close();