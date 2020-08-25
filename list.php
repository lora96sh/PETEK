<?php require_once("db.php");  ?>
 
 <?php
// session_start();

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
    <div id="app">
    <br><br>
    <div class="container my-3">
     <h5>You logged in at <?=$loginDate?></h5>
        <br>
        <div class="row">
            <div class="col-md-12">
            <button type="button" data-toggle="modal" data-target=".add-product-modal" class="btn btn-primary">Add New Product</button>
        <a href="products.php"> <button type="button" id="productsList" class="btn btn-primary">Purchased Products List</button></a>
            <button type="button" data-toggle="modal" data-target=".add-family-modal" class="btn btn-primary">Create Family</button>
            <button type="button" data-toggle="modal" data-target=".add-list-modal" class="btn btn-primary">Save List</button>
            <!--add from previous list start-->
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add from previous Lists
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <ul style="list-style-type:none;">
                    <?php
                    foreach ($lists as $key => $value) {
                        echo '<li><a href="api/listApis.php?listId='. $value['id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $value['lName'].'</button></a></li>';
                    }
                    if (count($lists)==0){
                        echo '<button class="btn btnDemo1" id="Demo">No List exist</button></a>';
                    }
                    ?>
                    </ul>
            </div>
            <!--add from previous list end-->
            </div>
        </div>
<!--        <button type="button" name="btnRefreshTable" id="btnRefreshTable" class="btn btn-primary">Refresh Table</button>-->
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
                <tr v-if="products.length === 0">
                    <td><b>Empty list!</b></td>
                </tr>
                <tr v-for="item in products" :class="{ 'color' : item.purchased === '1'}">
                    <td class="pName">{{ item.pName }}</td>
                    <td class="pQnt">{{ item.pQnt }}</td>
                    <td>
                        <button class="btn" @click="purchase(item)">Confirm Buy</button> |
                        <button class="btn" @click="deleteModal(item.id)">Remove</button>
                    </td>
                </tr>
                </tbody>
            </table>
        <br><br>

        <div class="footer">
            © 2020 by Lora Shimshon & Shay Ben Haim
        </div>
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

                <form id="product" method="POST" action="api/addProduct.php">
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
<!--                        <input type="submit" class="d-none btnSubmit">-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="product" class="btn btn-primary">Add Product</button>
                    <button type="button" class="btn btn-secondary resetAddProductsForm" data-dismiss="modal">Cancel</button>
                </div>
        </div>
            </div>
        </div>
    </div>

        <div class="add-family-modal modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Family</h5>
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
                                        <input id="familyName" type="text" name="fName" class="form-control" placeholder="Enter Family Name"
                                               aria-describedby="helpId" required>
                                    </div>
                                    <input name="addFamily" type="hidden" value="1">
                                </div>
                            </div>
<!--                            <input type="submit" class="d-none btnSubmit">-->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addFamily" class="btn btn-primary">Add Family</button>
                        <button type="button" class="btn btn-secondary resetAddProductsForm" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-list-modal modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalBodyaddProduct">

                        <form id="addList" method="POST" action="api/listApis.php">
                            <div class="row">
                                <div class="ui-widget">
                                    <div class="col sm-12">
                                        <label for="listName" class="">List Name : </label>
                                        <input id="listName" type="text" name="lName" class="form-control" placeholder="Enter List Name"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <input name="addList" type="hidden" value="1">
                            <!--                            <input type="submit" class="d-none btnSubmit">-->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addList" class="btn btn-primary">Add List</button>
                        <button type="button" class="btn btn-secondary resetAddProductsForm" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

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
<style>
    .color {
        background-color: #90EE90;
    }
</style>
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
            console.log('page created')
            this.getAllProducts()
        },
        methods: {
            getAllProducts (){
                var self = this;
                $.ajax({
                    url: 'api/getProducts.php',
                    method: 'GET',
                    success: function (data) {
                        self.products = JSON.parse(data);
                        console.log('resp-->', JSON.parse(data))
                    },
                    error: function (error) {
                        console.log("error",error);
                    }
                });
            },
            deleteModal (id) {
                $(".remove.modal").modal("show");
                this.productToDel = id
                console.log('prod to del', this.productToDel);
            },
            deleteProduct (){
                const self = this
                console.log('product delete',this.productToDel);
                const data = {
                  id: this.productToDel,
                    listProdDel:1
                };
                $.ajax({
                    url: 'api/deleteProduct.php',
                    method: 'POST',
                    data: data,
                    success: function () {
                        console.log('deleted successfully')
                        self.getAllProducts();
                        $(".remove.modal").modal("hide");
                        this.productToDel = 0
                    },
                    error: function (error) {
                        console.log("error",error);
                    }
                });
            },
            purchase (item) {
                const self = this;
                console.log('item purchase',item);
                const data = {
                    id: item.id,
                    name: item.pName
                    }
                $.ajax({
                    url: 'api/purchaseProduct.php',
                    method: 'POST',
                    data: data,
                    success: function () {
                        console.log('purchased successfully')
                        self.getAllProducts();
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