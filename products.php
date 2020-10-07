<?php
require_once "Parts/Header.php";
 ?>

<body>
    <br><br>
    <div class="container my-3">
        <h3>Your Products </h3>
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
                        <a href="EditProductName.php?id=<?= $row['id'] ;?>"> <button class="btn btnAdd">Edit
                                Name</button> </a>
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
        <a href="list.php?status=success"><button class="btn btn-primary"> Back </button> </a>
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
    <?php require_once("Parts/footer.php"); ?>
</body>

</html>