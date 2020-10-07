<?php
//   session_start();

//     $email= isset($_SESSION['email'])? $_SESSION['email']:
//         isset($_COOKIE['email'])?$_COOKIE['email']:null;

//     $phone= isset($_SESSION['phone'])? $_SESSION['phone']:
//         isset($_COOKIE['phone'])?$_COOKIE['phone']:null;

//     $nickname= isset($_SESSION['nickname'])? $_SESSION['nickname']:
//        isset($_COOKIE['nickname'])?$_COOKIE['nicknaeme']:null;
    
//     $password =  isset($_SESSION['password'])? $_SESSION['password']:
//     isset($_COOKIE['password'])?$_COOKIE['password']:null;


//     if(isset($_POST["email"])){
//       $email=htmlspecialchars($_POST['email']);
//       $password=htmlspecialchars($_POST['password']);
//       $phone=htmlspecialchars($_POST['phone']);
//       $nickname=htmlspecialchars($_POST('nickname'));
     
//            $_SESSION['email'] = $email;
//            $_SESSION['password'] = $password;
//            $_SESSION['phone']=$phone;
//            $_SESSION['nickname']=$nickname;
  
       
//    }
  
//     $_SESSION['email'] = $email;
//     $_POST['email']=$email;
//     $_SESSION['phone'] = $phone;
//     $_SESSION['nickname'] = $nickname;
//     $_SESSION['password'] = $password;


      
  ?>


<?php  require_once "Parts/Header.php"; ?>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card-body regist-card">
                    <div class="row">
                        <div class="col-sm-12 middle-regist">
                            <h2>Registration </h2>
                            <form class="registForm" action="insertCustomer.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" name="email" class=" form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="email2">Verification email:</label>
                                    <input type="email2" name="email2" class=" form-control" id="email2" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="numbers" name="phone" class="form-control" id="phone">
                                </div>
                                <div class="form-group">
                                    <label for="nickname">NickName</label>
                                    <input type="text" name="nickname" class="form-control" id="nickname">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">regist</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>



    </div>





    <?php  require_once "Parts/footer.php"; ?>

</body>

</html>