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


// $sql =" SELECT id FROM Customers ";
// if (!$conn->query($sql)){
//    $sql = "CREATE TABLE Customers(email VARCHAR(100) PRIMARY KEY,password VARCHAR(100),
//    `phone` varchar(999),`nickname` varchar(100));";
//    if ($conn->query($sql) === TRUE) {
//        echo "Table Customers created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }
// }


// $sql =" SELECT id FROM Products ";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE Products(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      pName VARCHAR(999),pQnt INT(6), user_email VARCHAR(999),purchased BOOLEAN default false);";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table Products created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM purchasedProducts ";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE purchasedProducts(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      pName VARCHAR(999),customer_email VARCHAR(100));";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table purchasedProducts created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM families";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE families(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      fName VARCHAR(999),admin_email VARCHAR(100));";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table families created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM family_products ";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE family_products(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      pName VARCHAR(999),pQnt INT(6),family_id INT(6) UNSIGNED,purchased BOOLEAN default false);";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table family products created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM requests";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE requests(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      fromEmail VARCHAR(999),toEmail VARCHAR(999),family_id INT(6) UNSIGNED,accepted BOOLEAN default false);";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table families created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM family_members";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE family_members(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      memberEmail VARCHAR(999),family_id INT(6) UNSIGNED);";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table families created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM lists";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE lists(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      lName VARCHAR(999),user_email VARCHAR(100));";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table families created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }

// $sql =" SELECT id FROM list_products ";
// if (!$conn->query($sql)){
//     $sql = "CREATE TABLE list_products(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      pName VARCHAR(999),list_id INT(6) UNSIGNED);";
//     if ($conn->query($sql) === TRUE) {
//         echo "Table list products created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
// }
