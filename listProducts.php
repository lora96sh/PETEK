<?php require_once("db.php");  ?>

<?php
// session_start();
 require_once "Parts/Header.php";
 $id = "";
 $lName = "";
 $adminEmail = "";
 if (isset($_GET["listId"])){
     $id = htmlspecialchars($_GET["listId"]);
     $_SESSION['listId'] = $id;
     $sql ="SELECT * FROM lists WHERE id = '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!empty($row)){
        $lName = $row['lName'];
        $userEmail = $row['user_email'];
    }
 }
 ?>

<body>
    <div id="app">
        <br><br>
        <div class="container my-3">
            <h2 style="color: #007BFF">List page for <?=$lName?></h2>
            <br>
            <div>
                <button type="button" data-toggle="modal" data-target=".remove-list-modal"
                    class="btn btn-primary">Delete List</button>
                <br><br>
                <h3>Products</h3>
                <table class="table" id="products">
                    <div class="container">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </div>
                    <tbody>
                        <tr v-for="item in products" data-id="">
                            <td class="pName">{{ item.pName }}</td>
                            <td>
                                <button class="btn" @click="deleteModal(item.id)">Remove</button>
                            </td>
                        </tr>
                        <tr v-if="products.length === 0">
                            <td><b>Empty list!</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade remove remove-list-modal" tabindex="-1" role="dialog">
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
                        <form id="listDelete" method="post" action="api/listApis.php"><input type="hidden"
                                name="delList" value="1"></form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" form="listDelete">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 
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
    </div> -->

            <br><br>
            <div class="footer">
                © 2020 by Lora Shimshon & Shay Ben Haim
            </div>
        </div>

    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>

</html>
<script>
let application = new Vue({
    el: '#app',
    data() {
        return {
            products: [],
            productToDel: 0,
            isAdmin: false,
            requests: [],
            members: [],
            message: null,
            memToDel: 0
        }
    },
    created() {
        console.log('in family created')
        this.getListProducts();
    },
    methods: {
        getListProducts() {
            var self = this;
            $.ajax({
                url: 'api/listApis.php',
                method: 'POST',
                data: {
                    allProducts: 1
                },
                success: function(data) {
                    if (data) {
                        self.products = data;
                        console.log('all list products-->', data)
                    }
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        },
        deleteModal(id) {
            $(".remove.modal").modal("show");
            this.productToDel = id
        },
        deleteProduct() {
            console.log('product delete', this.productToDel);
            const data = {
                family: 1,
                id: this.productToDel
            };
            $.ajax({
                url: 'api/deleteProduct.php',
                method: 'POST',
                data: data,
                success: function() {
                    console.log('deleted successfully')
                    $(".remove.modal").modal("hide");
                    this.productToDel = 0
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
            this.getListProducts();
        },
        deleteList() {
            $.ajax({
                url: 'api/listApis.php',
                method: 'POST',
                data: {
                    delList: 1
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        }
    }
});
</script>