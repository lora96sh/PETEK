<?php
require 'db.php';
session_start();
$_SESSION['loginDate'] = date("h:i:sa");
 $loginDate= isset($_SESSION['loginDate'])? $_SESSION['loginDate']:
        isset($_COOKIE['loginDate'])?$_COOKIE['loginDate']:null;

$email=$_POST['email'];
$_SESSION['email']=$email;
$password=$_POST['password'];
if(empty($email)|| empty($password) ){
    session_destroy();
    header("Location:loginScreen.php?message=empty");
    exit();
}else{
    $sql ="SELECT * FROM customers WHERE email = '$email' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!empty($row)){
    if($row['password'] !== $password){
        session_destroy();
        header("location: loginScreen.php?message=wrongpassword");
        exit();
    }else{
        $loginDate = date("h:i:sa");
        $_SESSION['email'] = $email;
        $_SESSION['loginDate'] = $loginDate;
        if ($_POST['stayloggedin']=='on'){
            setcookie('email',$email, time()+(60*60*24));
            setcookie('loginDate',$loginDate, time()+(60*60*24));
        }
            header("location:list.php?status=success");
            exit();
        


    }

    }else{
        session_destroy();

    header("location: loginScreen.php?message=nouser");

}
}