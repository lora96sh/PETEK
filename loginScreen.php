<?php  require_once "Parts/Header.php"; ?>
<?php 
if(isset($_GET['message'])){
    switch($_GET['message']){
        case "registSuccess":
          $massege = "Registed successfully! Please login" ;
        break;
        
        case "wrongpassword":
            $massege = "Wrong Password";
        break;

        case "empty" :
            $massege ="Empty field";
        break;

        case "nouser":
            $massege=" user is not exist";
        break;
    }
}

?>

<body>


    <body class="loginbody">
        <?php if(isset($massege))
        echo '<h3 style="text-align:center">'.$massege.'</h3>' ; 
        ?>
        <div class="container ">

            <div class="row">
                <div class="col"></div>
                <div class="col-sm-12 col-md-6">
                    <div class="card card-signin">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="Pics/new1.png" class="img-fluid img-signin">
                                    <form class="login-form" method="post" action="login.php">
                                        <div class=" form-group">
                                            <input type="email" name="email" class="form-control" id="Email"
                                                aria-describedby="emailHelp" placeholder="email">
                                        </div>
                                        <div class="form-group">

                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <div class="form-check">

                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox">
                                                Remember me
                                            </label>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                    <a href="registration.php" class="createAccount-btn"> Create Account </a>
                </div>
                <div class="col"></div>
            </div>
        </div>



        <?php  require_once "Parts/footer.php"; ?>


    </body>

    </html>