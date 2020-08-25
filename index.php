
<?php  require_once "Parts/Header.php"; ?>



<body >

        <div class="container text-center">
        <br><br><br><br>
        <?php if (isset($_GET["status"]) && $_GET["status"]=="fail"):?>
          <div class="alert alert-danger" role="alert">
              <strong>Login Failed</strong><br>wrong username or password
          </div>
        <?php endif;?>
        <?php if (isset($_GET["status"]) && $_GET["status"]=="showMsg"):?>
            <div class="alert alert-warning" role="alert">
                You must be logged in in order to view the page
            </div>
        <?php endif;?>
        <?php if (isset($_GET["registration"]) && $_GET["registration"]=="success"):?>
          <div class="success" >
              <h3><strong style="color:green" >Registration success! log in please </strong> </h3>
          </div>
        <?php endif;?>

        <?php if (isset($_GET["error"]) && $_GET["error"]=="wrongpassword"):?>
          <div class="success" >
              <h3><strong style="color:red" >Wrong Password</strong> </h3>
          </div>
        <?php endif;?>

        <?php if (isset($_GET["error"]) && $_GET["error"]=="nouser"):?>
          <div class="success" >
              <h3><strong style="color:red" >No User For This Email</strong> </h3>
          </div>
        <?php endif;?>






            <h4>Login Here:</h4>
            <form method="post" class="login m-auto" action="login.php">

              <label for="email">Email address:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="" required>
              <label for="password">password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="" required>
              <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="stayloggedin" id="stayloggedin"
                        value="on" checked>
                    Stay logged in
                </label>
              <input type="hidden" name="loginDate" value="<?= date("d.m.Y") ;?>" > 
              <button type="submit" name="login-submit" class="btn btn-primary btn-block">login</button>

              
                    <br><br>
                    <a href="registration.php">Create Account</a>
                    <br>
                    <a href="forgotPassword.php">Forgot Your Password?</a>
            </form>
            <br><br>
            <footer>
                © 2020 by Lora Shimshon & Shay Ben Haim
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