<?php
session_start();
require "Parts/Header.php";
require 'db.php';

$message = "";
$subMsg= "";
$error = "";
if(isset($_POST['SubmitButton'])) {
    $to_email = isset($_POST["email"]) ? $_POST["email"] : null;
    $sql ="SELECT * FROM customers WHERE email = '$to_email' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!empty($row)) {

        $subject = "Email Reset Request";
        $body = 'Password Reset link
         Click this link to reset your password!
         http://localhost/HW/password.php';
        $headers = "From: lorashamshoom@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
            $message = "Email Sent Successfully to $to_email ...";
            $subMsg = "Check your email to reset password.";
            $_SESSION["email"] = $to_email;
        } else {
            echo "Email sending failed...";
            $error = "Error Occurred while Sending Email";
        }
    }else{
        $error = "No User Exist with this Email";
    }
}
?>

<body>
   <div class="logIn">
        <div class="container">
            <br><br>
            <div>
                <h1 style="color: green"><?php echo $message; ?></h1>
                <h4><?php echo $subMsg; ?></h4>
            </div>
            <h1>Please Enter Your Mail Address</h1>
            <form method="post" action="">
                    <p>Email address</p> 
                    <input class="mailAndpass" type="email" placeholder="Enter Your Email Address" name="email" required>
                     <button id="forgotPassword" type="submit" name="SubmitButton" class="btn btn-primary" > Reset </button>
                    <br>
                <h6 style="color: red"><?php echo $error; ?></h6>
                <br>
            </form>
         </div>
       <br><br>
    </div>
   <div class="container my-3">
       <footer>
           <div class="textP">
               © 2020 by Lora Shimshon & Shay Ben Haim
           </div>
       </footer>
   </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="Script/javascript.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>