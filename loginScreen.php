<html lang="en">

<head>
    <title>Start</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./CSS/dark.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<?php  require_once "Parts/Header.php"; ?>

<body>

    <body class="loginbody">


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