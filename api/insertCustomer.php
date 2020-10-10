<?php require("../db.php");?>

<?php

 if(filter_has_var(INPUT_POST,'submit')){
$email=$_POST['email'];
$email2=$_POST['email2'];
$nickname=$_POST['nickname'];
$phone=$_POST['phone'];
$password=$_POST['password'];

if(!empty($password)){

    
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("location:../registration.php?error=incorrectPassword");
        exit();
        
    }
}
if(!empty($email) || !empty($email2) ){

    
    if($email !== $email2){

        header("location:registration.php?error=notMatching");
        exit();
        } 

    
$sql1 = "INSERT INTO `Customers`( `email`, `password`, `nickname`,`phone`)
 VALUES ('$email','$password','$nickname','$phone')";

if ($conn->query($sql1)===TRUE) {
    header("location: ../loginScreen.php?message=registSuccess");
}else {
    header("location:registration.php?error=userTaken");
}
}
}