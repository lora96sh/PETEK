<?php require_once("db.php");  ?>
 
 <?php
 require_once "Parts/Header.php";

  session_start();
 $id = "";
 $fName = "";
 $adminEmail = "";
// if (!isset($_GET["familyId"])){
     $id = htmlspecialchars($_GET["familyId"]);
     $_SESSION['familyId'] = $id;
     $sql ="SELECT * FROM families WHERE id = '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!empty($row)){
        $fName = $row['fName'];
        $adminEmail = $row['admin_email'];
    }
//     exit();
// }
 ?>

<body >
    <div id="app">
    <br><br>
    <div class="container my-3">
        <h2 style="color: #007BFF">Welcome to family <?=$fName?></h2>
        <h4>A family created by <?=$adminEmail?></h4>
     <br>
        <div>
        <button type="button" data-toggle="modal" data-target=".add-product-modal" class="btn btn-primary">Add New Product</button>
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
                <tr v-for="item in products" data-id="">
                    <td class="pName">{{ item.pName }}</td>
                    <td class="pQnt">{{ item.pQnt }}</td>
                    <td>
                        <button class="btn" @click="purchase(item)">Confirm Buy</button> |
                        <button class="btn" @click="deleteModal(item.id)">Remove</button>
                    </td>
                </tr>
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
                    <button type="button" class="btn btn-danger" @click="deleteProduct">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade confirm" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Item Purchased Successfully :)</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
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

                    <form id="addFamilyProduct" method="POST" action="api/familyApis.php">
                        <div class="row">
                        <div class="ui-widget">
                            <div class="col md-6">
                                <label for="prodName" class="">Product*: </label><br>
                                <input id="prodName" type="text" name="pName" class="form-control" placeholder="Product"
                                    aria-describedby="helpId" required> 
                            </div>
                        </div>
                            <div class="col md-6">
                                <label for="prodQuantity" class="">Quantity*: </label><br>
                                <input id="prodQuantity" type="text" name="pQnt" class="form-control" placeholder="Quantity"
                                    aria-describedby="helpId" required> 
                            </div>
                        </div>
                        <input type="hidden" name="familyId" value="<?=$id?>">
                        <input type="hidden" name="addProduct" value="1">
<!--                        <input type="submit" class="d-none btnSubmit">-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="addFamilyProduct" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary resetAddProductsForm" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div> 
    <br><br>

    <div class="footer">
        © 2020 by Lora Shimshon & Shay Ben Haim 
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>
</html>
<script>
    let application = new Vue({
        el:'#app',
        data () {
            return{
                products: [],
                productToDel: 0
            }
        },
        created () {
            console.log('in family created')
            this.getAllProducts()
        },
        methods: {
            getAllProducts (){
                var self = this;
                $.ajax({
                    url: 'api/familyApis.php',
                    method: 'POST',
                    data:{allProducts:1},
                    success: function (data) {
                        if (data) {
                            self.products = data;
                            console.log('all family products-->', data)
                        }
                    },
                    error: function (error) {
                        console.log("error",error);
                    }
                });
            },
            deleteModal (id) {
                $(".remove.modal").modal("show");
                this.productToDel = id
            },
            deleteProduct (){
                console.log('product delete',this.productToDel);
                $.ajax({
                    url: 'api/deleteProduct.php',
                    method: 'POST',
                    data: {id:this.productToDel},
                    success: function () {
                        console.log('deleted successfully')
                        $(".remove.modal").modal("hide");
                        this.productToDel = 0
                    },
                    error: function (error) {
                        console.log("error",error);
                    }
                });
                this.getAllProducts();
            },
            purchase (item) {
                console.log('item purchase',item);
                $.ajax({
                    url: 'api/purchaseProduct.php',
                    method: 'POST',
                    data: {name: item.pName},
                    success: function () {
                        console.log('purchased successfully')
                        $(".confirm.modal").modal("show");
                    },
                    error: function (error) {
                        console.log("error",error);
                    }
                });
            }
        }
    });
</script>