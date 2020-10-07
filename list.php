<?php  
require_once "Parts/Header.php";
 ?>

<body>

    <style>
    h3 {
        text-align: center;
    }

    .btn-primary {
        background-color: #ff6600;
        border-style: none;
        color: white;
    }

    .btn-primary:hover,
    .btn-primary:visited,
    .btn-primary:active {
        background-color: #ff6600;
    }

    .table th {
        text-align: center;
    }

    .table tr {
        text-align: center;
        padding: auto;
    }

    table.tb {
        margin-left: auto;
        margin-right: auto;
        display: table;
    }
    </style>
    <div id="app">
        <br><br>
        <div class="container list-container">
            <div class="row mainButtonList">
                <div class="col"></div>
                <div class="col-sm-12 col-md-6">

                    <button type="button" data-toggle="modal" data-target=".add-product-modal"
                        class="btn btn-primary ">Add New Product</button>
                    <button type="button" data-toggle="modal" data-target=".add-list-modal"
                        class="btn btn-primary ">Save
                        List</button>
                    <button type="button" @click="deleteListModal()" class=" btn btn-primary ">Delete
                        List</button>
                    <!--add from previous list start-->
                    <a id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <button class="btn btn-primary ">
                            Add from previous Lists</button>
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
                <div class="col"></div>

            </div>

            <br><br>
            <div class="row">
                <div class="col">
                    <h3>My List</h3>
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
                </div>
            </div>
            <br><br>


        </div>



        <!-- modalss -->


        <div class=" modal fade deleteList" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You are about to delete the current list</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="deleteList()">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
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
                        <button type="button" class="btn btn-danger" @click="deleteProduct()">Delete</button>
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
                                        <input id="prodName" type="text" name="pName" class="form-control"
                                            placeholder="Product" aria-describedby="helpId" required>
                                    </div>
                                </div>
                                <div class="col md-6">
                                    <label for="prodQuantity" class="">Quantity*: </label><br>
                                    <input id="prodQuantity" type="text" name="pQnt" class="form-control"
                                        placeholder="Quantity" aria-describedby="helpId" required>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="product" class="btn btn-primary">Add Product</button>
                        <button type="button" class="btn btn-secondary resetAddProductsForm"
                            data-dismiss="modal">Cancel</button>
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
                                        <input id="listName" type="text" name="lName" class="form-control"
                                            placeholder="Enter List Name" required>
                                    </div>
                                </div>
                            </div>
                            <input name="addList" type="hidden" value="1">
                            <!--                            <input type="submit" class="d-none btnSubmit">-->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addList" class="btn btn-primary">Add List</button>
                        <button type="button" class="btn btn-secondary resetAddProductsForm"
                            data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <?php require_once "Parts/footer.php"; ?>
</body>

</html>
<script>
let application = new Vue({
    el: '#app',
    data() {
        return {
            products: [],
            productToDel: 0
        }
    },
    created() {
        console.log('page created')
        this.getAllProducts()
    },
    methods: {
        getAllProducts() {
            var self = this;
            console.log('page created')
            $.ajax({
                url: 'api/getProducts.php',
                method: 'GET',
                success: function(data) {
                    self.products = JSON.parse(data);
                    console.log('resp-->', JSON.parse(data))
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        },
        deleteListModal() {
            $(".deleteList.modal").modal("show");

        },
        deleteList() {
            var self = this;
            const data = {
                deleteList: 1
            };
            $.ajax({
                url: 'api/listApis.php',
                method: 'POST',
                data: data,
                success: function() {
                    $('.deleteList').modal('hide');
                    self.getAllProducts();
                },
                error: function(error) {
                    console.log("error", error);
                }

            });

        },
        deleteModal(id) {
            $(".remove").modal("show");
            this.productToDel = id
            console.log('prod to del', this.productToDel);
        },
        deleteProduct() {
            const self = this;
            console.log('product delete', this.productToDel);
            const data = {
                id: this.productToDel,
                listProdDel: 1
            };
            $.ajax({
                url: 'api/deleteProduct.php',
                method: 'POST',
                data: data,
                success: function() {
                    console.log('deleted successfully')
                    self.getAllProducts();
                    $(".remove").modal("hide");
                    this.productToDel = 0
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        },
        purchase(item) {
            const self = this;
            console.log('item purchase', item);
            const data = {
                id: item.id,
                name: item.pName
            }
            $.ajax({
                url: 'api/purchaseProduct.php',
                method: 'POST',
                data: data,
                success: function() {
                    console.log('purchased successfully')
                    self.getAllProducts();
                    $(".confirm.modal").modal("show");
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        }
    }
});
</script>