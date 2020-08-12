

$(document).ready(function(){

    function buildTable() {
        for (product of productsList) {
            addProductToTable(product);
        }
    };
    //buildTable();
    $(".remove.modal").modal({
        'backdrop': "static",
        'show': false,
    })
    let rowToRemove = "";

    $(document).on('click', '.btnRemove', function () {
        $(".remove.modal").modal("show");
        rowToRemove = $(this).parents("tr");
        const pName = $(this).parents("tr").find(".pName").text();
        $(".remove.modal .modal-body p").html(`You are about to delete <i>${pName}</i>`)
    })

    $(".btnRemoveConfirm").click(function () {
        $(".remove.modal").modal("hide");
        $.ajax({
            url:"api/deleteProduct.php",
            type:"POST",
            data:({id:rowToRemove.data("id")}),
            success:function(response){
                rowToRemove.fadeOut();
            },
            error:function(xhr,status,error)  {
                console.log(error);
            }
        })
    })

    $(".btnAddProduct").click(function () {
        $("form#addProduct .btnSubmit").click();
    })

    $("form#addProduct").submit(function (e) {
        e.preventDefault();
        let pName = $("#prodName").val();
        let pQnt = $("#prodQuantity").val();
        $.ajax({
            url:"api/addProduct.php",
            type:"POST",
            data:({pName:pName,pQnt:pQnt}),
            success:function(response){
                let id = response;
                addProducts(id,pName, pQnt);
            },
            error:function(xhr,status,error)  {
                console.log(error);
            }
        })
        resetAddProductsForm();
        $("#prodName").focus();
    })

    $(".resetAddProductsForm").click(function(){
        resetAddProductsForm();
        console.log("hello");
    })

    function resetAddProductsForm() {
        $("#prodName").val("");
        $("#prodQuantity").val("");
    }

    function addProducts(id,pName, pQnt) {
        //const id = productsList[productsList.length - 1].id + 1;
        const product = { id, pName, pQnt };
        //productsList.push(product);
        addProductToTable(product);
    }

    function addProductToTable(product) {
        let tr = `<tr data-id=${product.id}>
            <td class="pName">${product.pName}</td>
            <td class="pQnt">${product.pQnt}</td>
            <td class="action">
                <button class="btn btnAdd">Confirm Buy</button> |
                <button class="btn btnRemove">Remove</button>
                </td>
        </tr>`;
        $("table#products tbody").append(tr);
    }

// Ajax and JSON 
    $("#btnRefreshTable").click(function(){
        $.ajax(
            {
                url:"api/getProducts.php",
                type:"GET",
                success: function(data) {
                    $("table#products tbody").html("");
                    for (item of data ){
                        product = {"pName":item['pName'],"pQnt":item['pQnt']}
                        addProductToTable(product);
                    }

                }
            }
        );
    })
        
    $(document).on('click', '.btnAdd', function () {
        let tr = $(this).parents("tr");
        $("#list tbody").append(tr);
        $('#list td:nth-child(3)').html(`<td>
                                            <button class="btn btnCancel">Cancel</button> |
                                            <button class="btn">Remove</button>
                                        </td>`);
    });

    $(document).on('click', '.btnCancel', function () {
        let tr = $(this).parents("tr");
        $("#products tbody").append(tr);
        $('#products td:nth-child(3)').html(`<td>
                                            <button class="btn btnAdd">Confirm Buy</button> |
                                            <button class="btn btnRemove">Remove</button>
                                        </td>`);
    });

    


    $("button#demo2").on('click',  function () {
        buildTableFromBtn();
    });

    $(document).on('click', '#loginBtn', function () {
        $(this).parents("tr").fadeOut(function () {
            $(this).remove();
        })
    })

    $("div#confirm").button(function (e) {
        e.preventDefault();
        let list = $("table#products tbody").val();
        $("table#products tbody").append(list);
    })

    $("form.form-signup").submit(function (e) {
        pas1= document.getElementById("pass1").value;
        if (pas1.length < 5){
            document.getElementById("massage").innerHTML="password should have 5 or more characters";
            return false;
            }

    })

    $("#forgotPassword").click(function(){
        alert("We sand you varification message. Please check your mail");
    })

    function checkform(){
    var a  = document.getElementById("email1").value;
    var b = document.getElementById("email2").value;
    if(a!=b){
        document.getElementById("massages").innerHTML="not equal";
        return false;
    }
    phone = document.getElementById("phoneNum").value;
    if(phone.length!=10 && phone.length!=0){
        document.getElementById("massages2").innerHTML="phone number must have 10 numbers";
        return false;
    }

    }
});