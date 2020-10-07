<!-- header before changes-->
<Nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
    <div class="container">
        <a class="navbar-brand" href="list.php">
            <img src="Pics/shopping logo.jpg" width="45" height="45" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <?php if (isset($email)):?>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Saved Lists
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <ul style="list-style-type:none;">
                                <?php
                        foreach ($lists as $key => $value) {
                            echo '<li><a href="listProducts.php?listId='. $value['id'] .'">
                            <button class="btn btnDemo1" id="Demo'. $key .'">'. $value['lName'].'</button></a></li>';
                        }
                        if (count($lists)==0){
                            echo '<li><button class="btn btnDemo1" id="Demo">No List exist</button></a></li>';
                        }
                        ?>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Families
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <ul style="list-style-type:none;">
                                <?php
                    foreach ($families as $key => $value) {
                        echo '<li><a href="family.php?familyId='. $value['id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $value['fName'].'</button></a></li>';
                    }
                    if (count($families)==0){
                        echo '<li><button class="btn btnDemo1" id="Demo">No Family exist</button></a></li>';
                    }
                    ?>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Joined Families
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <ul style="list-style-type:none;">
                                <?php
                          foreach ($joinedFamilies as $key => $value) {
                              $fId = $value['family_id'];
                              $data = mysqli_query($conn,"select * from families where id='$fId'");
                              $family = mysqli_fetch_assoc($data);

                              echo '<li><a href="family.php?familyId='. $value['family_id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $family['fName'].'</button></a></li>';
                          }
                          if (count($joinedFamilies)==0){
                              echo '<li><button class="btn btnDemo1" id="Demo">No Family joined!</button></a></li>';
                          }
                          ?>
                            </ul>
                        </div>
                    </div>
                </li>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="allFamilies.php">Families</a>
                </li>
                <li class="nav-item active" style="margin-right: 50px">
                    <a class="nav-link " href="logout.php">logout</a>
                </li>
                <li style="margin-top: 9px">
                    <p style="color: white">Dark Mode</p>
                </li>
                <li style="margin-top: 10px; margin-left: 10px; margin-right: -190px">
                    <!-- Rounded switch -->
                    <label class="switch">
                        <input type="checkbox" name="themeColor">
                        <span class="slider round"></span>
                    </label>
                </li>
                <?php else:?>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">login</a>
                </li>
                <?php endif;?>

            </ul>
        </div>
        <script>
        var checkbox = document.querySelector('input[name=themeColor]')
        checkbox.addEventListener("change", function() {
            if (this.checked) {
                trans()
                document.documentElement.setAttribute('data-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-theme', 'light')
            }
        })
        let trans = () => {
            document.documentElement.classList.add('transition');
            window.setTimeout(() => {
                document.documentElement.classList.remove('transition')
            }, 1000)
        }
        </script>
    </div>
</Nav>
<br><br> -->
<!-- index before changing -->


<?php  require_once "Parts/Header.php"; ?>



<body>

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
        <div class="success">
            <h3><strong style="color:green">Registration success! log in please </strong> </h3>
        </div>
        <?php endif;?>

        <?php if (isset($_GET["error"]) && $_GET["error"]=="wrongpassword"):?>
        <div class="success">
            <h3><strong style="color:red">Wrong Password</strong> </h3>
        </div>
        <?php endif;?>

        <?php if (isset($_GET["error"]) && $_GET["error"]=="nouser"):?>
        <div class="success">
            <h3><strong style="color:red">No User For This Email</strong> </h3>
        </div>
        <?php endif;?>






        <h4>Login Here:</h4>
        <form method="post" class="login m-auto" action="login.php">

            <label for="email">Email address:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="" required>
            <label for="password">password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" required>
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="stayloggedin" id="stayloggedin" value="on"
                    checked>
                Stay logged in
            </label>
            <input type="hidden" name="loginDate" value="<?= date("d.m.Y") ;?>">
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
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>

</html>