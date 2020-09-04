<?php var_dump($_POST); ?>
<?php
require "Parts/Header.php";
require 'db.php';

session_start();
$error = "";
$message = "";
if(isset($_POST['passSubmit'])) {
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password2'];
    if ($pass1 == $pass2){
        $userEmail = isset($_SESSION["email"]) ? $_SESSION["email"] : null;
        if ($userEmail !== null){
            $sql = "UPDATE `Customers`
            SET `password`='$pass1'
             WHERE email='$userEmail'";
            if ($conn->query($sql)===TRUE) {
                $message = "Password Changed Successfully!";
            } else {
                $conn->error;
            }
        }else{
            $error = "No User to Update Password!";
        }
    } else {
        $error = "Passwords do not match!";
    }
}
  ?>

<body >
<div class="container my-3">
    <br><br>
 <div class="passwordBox">
    <h1>Choose Password</h1>
<!-- onsubmit="return checkPassword()"*/ -->
      <form id="passwordForm" method="post" action="">
          <h2 style="color: green"><?php echo $message?></h2>
          <h4 style="color: red"><?php echo $error?></h4>
          <br><br>
        <div class="form-group" >
        <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="" required>
        </div>

        <div class="form-group" >
          <label for="password2">Varification Password:</label><br>
          <input  name="password2" class="form-control" type="password" id="pass2" value="" placeholder="password" required>
        </div>
        <br>

        <div class="form-group" >
<!--          <button class="btn btn-primary" >-->
          <button type="submit" name="passSubmit" class="btn btn-primary btn-block">Regist!</button>

          </button>
        </div>
      </form>
  </div> 

    <footer>
        © 2020 by Lora Shimshon & Shay Ben Haim 
    </footer>

</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="Script/javascript.js" type="text/javascript"></script>

</body>
</html>