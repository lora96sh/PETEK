<?php require_once("Parts/Header.php")?>
<?php
$email = isset($_SESSION['email'])? $_SESSION['email']:null;

// maybe select , from and where should be regular letters
$data=mysqli_query($conn,"SELECT family_id FROM family_members WHERE memberEmail='$email'");
$joinedFamilies=array();
if($data){
    while($row = mysqli_fetch_assoc($data)){
        $joinedFamilies[] = $row;
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
    <h1> Joined Families</h1>

    <div class="row">


        <div class="col"></div>
        <div class="col-sm-10 col-md-6">

            <ul class="list-group list-group-flush">
                <?php foreach ($joinedFamilies as $key => $value){
                  $fId = $value['family_id'];
                  $data = mysqli_query($conn,"select * from families where id='$fId'");
                  $family = mysqli_fetch_assoc($data);
                  echo '<a href="family.php?familyId='.$family['id'] .'"><li class="list-group-item">'.$family['fName'] .'</li></a>';
              //or    echo '<li><a href="family.php?familyId='. $value['family_id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $family['fName'].'</button></a></li>';

                }?>
                <?php if(count($joinedFamilies)==0){
                    echo '<h4> There is no joined family Yet </h4>';
                }
                ?>
            </ul>
        </div>
        <div class="col">
            <a href="list.php?status=success"><button class="btn btn-primary btn-lg"> Back </button> </a>
        </div>

    </div>
</div>










<?php require_once("Parts/footer.php"); ?>
</body>

</html>