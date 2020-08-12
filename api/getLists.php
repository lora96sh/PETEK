<?php require("../db.php");?>
<?php 
header('Content-Type: application/json');
$sql = "SELECT * FROM Lists";
$result = $conn->query($sql);
$lists = array();
while($row = $result->fetch_assoc()){
    $lists[]=$row;
}

echo json_encode($lists);
$conn->close();