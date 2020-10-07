<?php
 require_once "Parts/Header.php";
 ?>

<body>
    <div id="app">
        <br><br>
        <div class="container my-3">
            <div>
                <h3>Families that you can join</h3>
                <table class="table" id="products">
                    <div class="container">
                        <thead>
                            <tr>
                                <th>Family Name</th>
                                <th>Family Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </div>
                    <tbody>
                        <tr v-for="item in families" data-id="">
                            <td class="pName">{{ item.fName }}</td>
                            <td class="pQnt">{{ item.admin_email }}</td>
                            <td>
                                <button class="btn btn-primary" @click="joinRequest(item)">Join</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade confirmation" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">{{ message }}</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="addFamilyProduct" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary resetAddProductsForm" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div> -->

        </div>
    </div>
    </div>
    <?php require_once("Parts/footer.php") ?>
</body>

</html>
<script>
let application = new Vue({
    el: '#app',
    data() {
        return {
            families: [],
            message: ''
        }
    },
    created() {
        console.log('in family created')
        this.getAllFamilies()
    },
    methods: {
        getAllFamilies() {
            var self = this;
            $.ajax({
                url: 'api/familyApis.php',
                method: 'POST',
                data: {
                    allFamilies: 1
                },
                success: function(data) {
                    if (data) {
                        self.families = data;
                        console.log('all family-->', data)
                    }
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        },
        joinRequest(family) {
            console.log('request to join family id ', family);
            const data = {
                joinFamily: 1,
                to: family.admin_email,
                familyId: family.id
            };
            var self = this;
            $.ajax({
                url: 'api/familyApis.php',
                method: 'POST',
                data: data,
                success: function(data) {
                    if (!data) {
                        console.log('already requested-->', data)
                        self.message = "Already Requested for this Family!";
                        $(".confirmation.modal").modal("show");
                    } else {
                        self.message = "Request Sent Successfully!";
                        $(".confirmation.modal").modal("show");
                    }
                },
                error: function(error) {
                    console.log("error", error);
                }
            });
        }
    }
});
</script>