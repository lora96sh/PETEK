<?php
session_start();
$_SESSION = array();
session_destroy();
unset($_COOKIE['email']);
unset($_COOKIE['loginDate']);
setcookie('email',$email, time()-(60*60*24));
setcookie('loginDate',$loginDate, time()-(60*60*24));
header("Location: index.php");
?>