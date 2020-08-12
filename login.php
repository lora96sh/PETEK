
<?php
require 'db.php';
session_start();
 $loginDate= isset($_SESSION['loginDate'])? $_SESSION['loginDate']:
        isset($_COOKIE['loginDate'])?$_COOKIE['loginDate']:null;
$email=$_POST['email'];
$password=$_POST['password'];
if(empty($email)|| empty($password) ){

    header("Location:index.php?status=showMsg");
    exit();
}else{
    $sql ="SELECT * FROM customers WHERE email = '$email' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!empty($row)){
    if($row['password'] !== $password){
        header("location: index.php?error=wrongpassword");
        exit();
    }else{
        $_SESSION['email'] = $email;
        $_SESSION['loginDate'] = $loginDate;
        if ($_POST['stayloggedin']=='on'){
            setcookie('email',$email, time()+(60*60*24));
            setcookie('loginDate',$loginDate, time()+(60*60*24));
        }
            header("location:list.php?status=success");
            exit();
        


    }

    }header("location: index.php?error=nouser");

}

