<?php require_once("db.php");  ?>
 
 <?php 
 if (!isset($_GET["status"])){
     header("Location:index.php?status=showMsg");
     exit();
 }
 ?>

    <?php  
 $loginDate= isset($_SESSION['loginDate'])? $_SESSION['loginDate']:
        isset($_COOKIE['loginDate'])?$_COOKIE['loginDate']:null;
 $email= isset($_SESSION['email'])? $_SESSION['email']:
        isset($_COOKIE['email'])?$_COOKIE['email']:null;

require_once "Parts/Header.php";
 ?> 
<body >
    <br><br>
    <div class="container my-3">
     <h5>you logged in at <?=$loginDate?></h5>
        <br>
        <button type="button" data-toggle="modal" data-target=".add-product-modal" 
                class="btn btn-primary">Add New Product</button>
                <button type="button" name="btnRefreshTable" id="btnRefreshTable" class="btn btn-primary">Refresh Table</button>
            <a href="products.php"> <button id="productsList" class="btn btn-primary" style="margin-left:50%; ">Products List</button></a>
            <br><br>
            <h3>Products To Buy</h3>
            <table class="table" id="products">
                <div class="container">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </div>
                <tbody>
                     <!-- Products will be added -->
                 <?php
                $sql = "SELECT * FROM Products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                ?>
                    <?php  while($row = $result->fetch_assoc()):?>
                    <!-- html code in the loop -->
                    <tr data-id="<?= $row['id'] ;?>">
                        <td class="pName"><?php echo $row['pName'] ;?></td>
                        <td class="pQnt"><?= $row['pQnt'] ;?></td>
                        <td>
                            <button class="btn btnAdd">Confirm Buy</button> |
                            <button class="btn btnRemove">Remove</button>
                        </td>
                    </tr>
                    <?php endwhile;?>
                    <?php  } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
    </div>

    <div class="modal fade remove" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You are about to delete </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnRemoveConfirm btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="add-product-modal modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body" id="modalBodyaddProduct">

                    <form id="addProduct" method="POST" action="insert.php">
                        <div class="row">
                        <div class="ui-widget">
                            <div class="col md-6">
                                <label for="prodName" class="">Product*: </label><br>
                                <input id="prodName" type="text" class="form-control" placeholder="Product" 
                                    aria-describedby="helpId" required> 
                            </div>
                        </div>
                            <div class="col md-6">
                                <label for="prodQuantity" class="">Quantity*: </label><br>
                                <input id="prodQuantity" type="text" class="form-control" placeholder="Quantity" 
                                    aria-describedby="helpId" required> 
                            </div>
                        </div>
                        <input type="submit" class="d-none btnSubmit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnAddProduct btn-primary">Add Product</button>
                    <button type="button" class="btn btn-secondary resetAddProductsForm" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br><br>
        <div class="container">
            <h3>Your List</h3>
        </div>
        <table class="container" id="list">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <div class="row my-3">
            <div class="col">
            <button id="confirm" type="submit" class="btn btn-primary btnConfitmList">Save List</button>
        </div>
    </div>
    </div> 
    <br><br>

    <div class="footer">
        © 2020 by Lora Shimshon & Shay Ben Haim 
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script src="javascript.js" ></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>