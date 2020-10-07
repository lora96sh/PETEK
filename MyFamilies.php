<?php require_once("Parts/Header.php")  
?>
<?php
$email = isset($_SESSION['email'])? $_SESSION['email']:null;



//try without response
$data = mysqli_query($conn,"select * from families where admin_email='$email'");
$response = array();
$Myfamilies = array();
if($data){
    while($row = mysqli_fetch_assoc($data)){
        $Myfamilies[] = $row;
  }
  }
  
  ?>

<style>
h1 {
    color: #ff6600;
    text-shadow: 2px 2px black;
    text-align: center;
}

.container-fluid {

    margin-top: 30px;
}

.list-group {
    margin-top: 40px;
    margin-bottom: 25%;

}

.list-group li {
    padding: 25px 30px;
    text-align: center;
    font-weight: bold;

}

.btn-primary {
    margin-top: 20%;
    margin-left: 30%;
    background-color: #ff6600;
    color: white;
    border-style: none;
}
</style>


<div class="container-fluid">
    <h1> My Families</h1>

    <div class="row">


        <div class="col"></div>
        <div class="col-sm-10 col-md-6">

            <ul class="list-group list-group-flush">
                <?php foreach ($Myfamilies as $key => $value)
                echo '<a href="family.php?familyId='. $value['id'] .'" ><li class="list-group-item">'. $value['fName'] .'</li></a>';
                ?>
            </ul>
        </div>
        <div class="col">
            <a href="list.php?status=success"><button class="btn btn-primary btn-lg"> Back </button> </a>
        </div>

    </div>
</div>


<?php require_once("Parts/footer.php") ?>
</body>

</html>