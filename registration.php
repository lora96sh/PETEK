<?php  require_once "Parts/Header.php"; ?>
<?php  

if(isset($_GET['error'])){
    switch ($_GET['error']) {
        case "notMatching":
          $massege = "Emails are not matching";
          break;
          
        case "userTaken":
            $massege= "User is taken";
        break;

        case "incorrectPassword":
            $massege = "Password must be at least 8 characters, include at least one upper case letter, one number, one special character.";
        break;
}
}
?>

<body>

    <div class="container-fluid">
        <?php if(isset($massege))
     
        echo '<br><h3 style="text-align:center;color:Red;text-shadow:none;">'.$massege.'</h3>';
        ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-sm-12 col-md-4">
                <div class="card-body regist-card">
                    <div class="row">
                        <div class="col-sm-12 middle-regist">
                            <h2>Registration </h2>
                            <form class="registForm" action="api/insertCustomer.php" method="post">
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
            <br><br><br>
        </div>
    </div>



    <?php  require_once "Parts/footer.php"; ?>

</body>

</html>