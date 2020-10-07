<?php 

 require 'db.php';


 if(filter_has_var(INPUT_POST,'submit')){
$email=$_POST['email'];
$email2=$_POST['email2'];
$nickname=$_POST['nickname'];
$phone=$_POST['phone'];
$password=$_POST['password'];

if(!empty($email) || !empty($email2) || !empty($password)){
 
if($email !== $email2){

header("location:registration.php?error=emailcheck&email=".$email."&email2=".$email2);
exit();
}

$sql1 = "INSERT INTO `Customers`( `email`, `password`, `nickname`,`phone`)
 VALUES ('$email','$password','$nickname','$phone')";

if ($conn->query($sql1)===TRUE) {
    header("location: index.php?registration=success");
}else {
    header("location:registration.php?error=userTaken");
}
 }

}