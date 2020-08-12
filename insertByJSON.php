<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "hwDB";
$conn = new mysqli($servername, $username, $password,$dbName);
$filename = "products.json";
$data = file_get_contents($filename);
$Products = json_decode($data, true);
foreach ($Products['product'] as $product) {
    $sql ="INSERT INTO Products(`pName`,`pQnt`) VALUES('".$product['pName']." ',' ".$product['pQnt']." ')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();