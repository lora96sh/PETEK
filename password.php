<?php var_dump($_POST); ?>
<?php
  session_start();

    $email= isset($_SESSION['email'])? $_SESSION['email']:
        isset($_COOKIE['email'])?$_COOKIE['email']:null;

    $phone= isset($_SESSION['phone'])? $_SESSION['phone']:
        isset($_COOKIE['phone'])?$_COOKIE['phone']:null;

    $nickname= isset($_SESSION['nickname'])? $_SESSION['nickname']:
       isset($_COOKIE['nickname'])?$_COOKIE['nicknaeme']:null;
    
    $password = htmlspecialchars($_POST['password']);  
  
    $_SESSION['email'] = $email;
    $_POST['email']=$email;
    $_SESSION['phone'] = $phone;
    $_SESSION['nickname'] = $nickname;
    $_SESSION['password'] = $password;


        require_once("db.php");
  ?>
  

  <?php  require_once "Parts/HeaderStart.php"; ?>




<body >
 <div class="passwordBox">
    <h1>Choose Password</h1>
<!-- onsubmit="return checkPassword()"*/ -->
      <form id="passwordForm" method="post" action="insertCustomer.php">
        <br><br>
        <div class="form-group" >
        <label for="password">password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="" required>
        </div>

        <div class="form-group" >
          <label for="password2">Varification Password:</label><br>
          <input  name="password2" class="form-control" type="password" id="pass2" value="" placeholder="password" required>
        </div>
        <br>

        <div class="form-group" >
          <button class="btn btn-primary" >
    <button type="submit" class="btn btn-primary btn-block">Regist!</button>

          </button>
        </div>
      </form>
  </div> 

    <footer>
        © 2020 by Lora Shimshon & Shay Ben Haim 
    </footer>

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