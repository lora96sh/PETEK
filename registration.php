

<?php
  session_start();

    $email= isset($_SESSION['email'])? $_SESSION['email']:
        isset($_COOKIE['email'])?$_COOKIE['email']:null;

    $phone= isset($_SESSION['phone'])? $_SESSION['phone']:
        isset($_COOKIE['phone'])?$_COOKIE['phone']:null;

    $nickname= isset($_SESSION['nickname'])? $_SESSION['nickname']:
       isset($_COOKIE['nickname'])?$_COOKIE['nicknaeme']:null;
    
    $password =  isset($_SESSION['password'])? $_SESSION['password']:
    isset($_COOKIE['password'])?$_COOKIE['password']:null;


    if(isset($_POST["email"])){
      $email=htmlspecialchars($_POST['email']);
      $password=htmlspecialchars($_POST['password']);
      $phone=htmlspecialchars($_POST['phone']);
      $nickname=htmlspecialchars($_POST('nickname'));
     
           $_SESSION['email'] = $email;
           $_SESSION['password'] = $password;
           $_SESSION['phone']=$phone;
           $_SESSION['nickname']=$nickname;
  
       
   }
  
    $_SESSION['email'] = $email;
    $_POST['email']=$email;
    $_SESSION['phone'] = $phone;
    $_SESSION['nickname'] = $nickname;
    $_SESSION['password'] = $password;


        require_once("db.php");
  ?>
  

<?php  require_once "Parts/Header.php"; ?>

<body >
  <div class="registrationBox">
    <div class="container">
      <h2>Registration</h2>
      <form method="post" class="form-signup" action="insertCustomer.php" >
        <div class="form-group" >
          <label for="email"> email: </label>
                <input type="text" name="email" id="email" class="form-control" placeholder="email" required>
          <label for="email2"> verification email: </label>      
                <input type="text" name="email2" id="email2" class="form-control" placeholder="verifate email" required>
          <label for="nickname">nick name: </label>      
                <input type="text" name="nickname" id="nickname" class="form-control"placeholder="nickname">
          <label for="phone"> phone: </label> 
                <input type="number" name="phone" id="phoneNum" class="form-control" placeholder="Phone Number">
          <label for="password"> password: </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
          <label for="password"> verification password: </label>
                <input type="password" name="password-repeat" id="password" class="form-control" placeholder=" verifate password" required>
          <button type="submit" name="signup-submit"  class="btn btn-primary">SingUp</button>
        </div>
      </form>
    </div>
  </div>

    <footer >
        <div class="textP">
            © 2020 by Lora Shimshon & Shay Ben Haim 
        </div>
    </footer>
    
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