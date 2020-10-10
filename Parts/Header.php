<?php require_once("db.php");  ?>

<?php
 session_start();
$email = isset($_SESSION['email'])? $_SESSION['email']:null;



$data = mysqli_query($conn,"select * from lists where user_email='$email'");

$lists = array();
if($data){
while($row = mysqli_fetch_assoc($data)){
    $lists[] = $row;
}
}

$data = mysqli_query($conn,"select DISTINCT * from family_members where memberEmail='$email'");

$joinedFamilies = array();
if($data){
while($row = mysqli_fetch_assoc($data)){
    $joinedFamilies[] = $row;
}
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <title>Start</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="./CSS/dark.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

</head>


<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="Pics/shopping logo.jpg" width="45" height="45" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="top-right">
                <ul class="navbar-nav top-right">
                    <?php if (!isset($email)):?>
                    <li class="nav-item active">
                        <a class="nav-link" href="loginScreen.php">sign in</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="registration.php">Regist</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item active">
                        <a class="nav-link " href="logout.php">logout</a>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            family
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target=".add-family-modal">Create
                                a family</a>
                            <a class="dropdown-item" href="MyFamilies.php">My families</a>
                            <a class="dropdown-item " href="joinedfamilies.php">Joined families</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="allFamilies.php">all families</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">My Lists</a>
                        <div class="dropdown-menu">
                            <?php
                        if(empty($lists))
                        
                            echo '<a class="dropdown-item" href="#"> No lists</a>';
                            ?>
                            <php else: ?>
                                <?php foreach ($lists as $key=> $value)
                                echo '<a class="dropdown-item" href="listProducts.php?listId='. $value['id'] .'">'.$value['lName'].'</a>';
                                ?>

                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="products.php">All Products</a>
                    </li>

                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>


    <div class="add-family-modal modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:black; text-shadow:none; " class=" modal-title">Add Family</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBodyaddProduct">

                    <form id="addFamily" method="POST" action="api/familyApis.php">
                        <div class="row">
                            <div class="ui-widget">
                                <div class="col md-12">
                                    <label for="familyName" class="">Family Name : </label><br>
                                    <input id="familyName" type="text" name="fName" class="form-control"
                                        placeholder="Enter Family Name" aria-describedby="helpId" required>
                                </div>
                                <input name="addFamily" type="hidden" value="1">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="addFamily" class="btn btn-primary">Add Family</button>
                    <button type="button" class="btn btn-secondary resetAddProductsForm"
                        data-dismiss="modal">cancel</button>
                </div>
            </div>
        </div>
    </div>