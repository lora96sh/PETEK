<?php require_once("db.php");  ?>
<?php  

 $loginDate= isset($_SESSION['loginDate'])? $_SESSION['loginDate']:
        isset($_COOKIE['loginDate'])?$_COOKIE['loginDate']:null;
 $email= isset($_SESSION['email'])? $_SESSION['email']:
        isset($_COOKIE['email'])?$_COOKIE['email']:null;

 $id = htmlspecialchars($_GET["id"]);

//    $sql = "SELECT * FROM products WHERE id='$id'";
//    $result = $conn->query($sql);
//    $product = $result->fetch_assoc();

 $data = mysqli_query($conn,"select * from purchasedProducts where id='$id'");
 $product = mysqli_fetch_assoc($data);


require_once "Parts/Header.php";
 ?>

<body>
    <br><br>
    <div class="container my-3">

        <form id="editProduct" method="POST" action="UpdateProductName.php">
            <div class="row">
                <div class="ui-widget">
                    <div class="col md-6">
                        <label for="pName" class="">Product*: </label><br>
                        <input type="text" name="pName" id="pName" class="form-control" aria-describedby="helpId"
                            value="<?=$product['pName'];?>" required>
                    </div>

                    <input type="hidden" name="id" value="<?=$product['id'];?>" />
                    <input type="submit" value="save" class="btn mt-5 btn-primary btnSubmit">
        </form>
    </div>




    <div class="footer">
        © 2020 by Lora Shimshon & Shay Ben Haim
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    </link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="javascript.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>