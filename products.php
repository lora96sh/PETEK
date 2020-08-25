<?php require_once("db.php");  ?>
 <?php
 session_start();
 $loginDate= isset($_SESSION['loginDate'])? $_SESSION['loginDate']:
        isset($_COOKIE['loginDate'])?$_COOKIE['loginDate']:null;
 $email= isset($_SESSION['email'])? $_SESSION['email']:
        isset($_COOKIE['email'])?$_COOKIE['email']:null;

require_once "Parts/Header.php";
 ?> 

<body>
<br><br>
<div class="container my-3">
            <h3>Your Products Products</h3>
            <br>
            <table class="table" id="productsList">
                <div class="container">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </div>
                <tbody>
                     <!-- Products will be added -->
                 <?php
                $sql = "SELECT * FROM purchasedProducts WHERE customer_email='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                ?>
                    <?php  while($row = $result->fetch_assoc()):?>
                    <!-- html code in the loop -->
                    <tr data-id="<?= $row['id'] ;?>">
                        <td class="pName"><?php echo $row['pName'] ;?></td>
                        <td>
                       <a href="EditProductName.php?id=<?= $row['id'] ;?>"> <button class="btn btnAdd">Edit Name</button> </a>
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
            <a href="list.php?status=success"><button  class="btn btn-primary"> Back </button> </a>
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