<?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);
    
$dbName = "HW";
if (!mysqli_select_db($conn,$dbName)){ // בודק עם מסד הנתונים לא קיים כבר
    $sql = "CREATE DATABASE $dbName";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    }else {
        echo "Error creating database: " . $conn->error;
    }
}

$conn = new mysqli($servername, $username, $password,$dbName);


$sql =" SELECT id FROM Customers ";
if (!$conn->query($sql)){
    $sql = "CREATE TABLE Customers(email VARCHAR(100) PRIMARY KEY,password VARCHAR(100),
    `phone` varchar(999),`nickname` varchar(100));";
    if ($conn->query($sql) === TRUE) {
        echo "Table Customers created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}


$sql =" SELECT id FROM Products ";
if (!$conn->query($sql)){
    $sql = "CREATE TABLE Products(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     pName VARCHAR(999),pQnt INT(6));";
    if ($conn->query($sql) === TRUE) {
        echo "Table Products created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$sql =" SELECT id FROM AllProducts ";
if (!$conn->query($sql)){
    $sql = "CREATE TABLE AllProducts(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     pName VARCHAR(999));";
    if ($conn->query($sql) === TRUE) {
        echo "Table Products created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}


$sql =" SELECT id FROM List ";
if (!$conn->query($sql)){

      $sql = "CREATE TABLE List ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, products JSON NOT NULL ,
       userEmail VARCHAR(99) NOT NULL);";
    if ($conn->query($sql) === TRUE) {
        echo "Table Lists created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
