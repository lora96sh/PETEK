<?php require_once("db.php");  ?>

<?php
 session_start();
// $userEmail = $_SESSION['email'];
$email= isset($_SESSION['email'])? $_SESSION['email']:
    isset($_COOKIE['email'])?$_COOKIE['email']:null;
$data = mysqli_query($conn,"select * from families where admin_email='$email'");

$response = array();
$families = array();

while($row = mysqli_fetch_assoc($data)){
    $response[] = $row;
}
$families = $response;

$data = mysqli_query($conn,"select * from lists where user_email='$email'");

$lists = array();

while($row = mysqli_fetch_assoc($data)){
    $lists[] = $row;
}

$data = mysqli_query($conn,"select DISTINCT * from family_members where memberEmail='$email'");

$joinedFamilies = array();

while($row = mysqli_fetch_assoc($data)){
    $joinedFamilies[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head >
  <title>Start</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="./CSS/dark.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
#mainNav{

}

</style>

<Nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
        <div class="container">
          <a class="navbar-brand" href="list.php">
                <img src="Pics/shopping logo.jpg" width="45" height="45" alt="">
              </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
             
              <li class="nav-item active">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <?php if (isset($email)):?>
                  <li class="nav-item">
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Saved Lists
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <ul style="list-style-type:none;">
                        <?php
                        foreach ($lists as $key => $value) {
                            echo '<li><a href="listProducts.php?listId='. $value['id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $value['lName'].'</button></a></li>';
                        }
                        if (count($lists)==0){
                            echo '<li><button class="btn btnDemo1" id="Demo">No List exist</button></a></li>';
                        }
                        ?>
                        </ul>
                    </div>
                  </div>
                </li>
                  <li>
                  <div class="dropdown">
                  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Families
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                    <ul style="list-style-type:none;">
                    <?php
                    foreach ($families as $key => $value) {
                        echo '<li><a href="family.php?familyId='. $value['id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $value['fName'].'</button></a></li>';
                    }
                    if (count($families)==0){
                        echo '<li><button class="btn btnDemo1" id="Demo">No Family exist</button></a></li>';
                    }
                    ?>
                    </ul>
                </div>
               </div>
                  </li>
                  <li>
                  <div class="dropdown">
                      <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Joined Families
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                          <ul style="list-style-type:none;">
                          <?php
                          foreach ($joinedFamilies as $key => $value) {
                              $fId = $value['family_id'];
                              $data = mysqli_query($conn,"select * from families where id='$fId'");
                              $family = mysqli_fetch_assoc($data);

                              echo '<li><a href="family.php?familyId='. $value['family_id'] .'"><button class="btn btnDemo1" id="Demo'. $key .'">'. $family['fName'].'</button></a></li>';
                          }
                          if (count($joinedFamilies)==0){
                              echo '<li><button class="btn btnDemo1" id="Demo">No Family joined!</button></a></li>';
                          }
                          ?>
                          </ul>
                      </div>
                  </div>
                  </li>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link " href="allFamilies.php">Families</a>
                  </li>
                  <li class="nav-item active" style="margin-right: 50px">
                      <a class="nav-link " href="logout.php">logout</a>
                  </li>
              <li style="margin-top: 9px"><p style="color: white">Dark Mode</p></li>
                  <li style="margin-top: 10px; margin-left: 10px; margin-right: -190px">
                  <!-- Rounded switch -->
                  <label class="switch">
                      <input type="checkbox" name="themeColor">
                      <span class="slider round"></span>
                  </label>
              </li>
                    <?php else:?>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">login</a>
                    </li>
                    <?php endif;?>
          
            </ul>
          </div>
            <script>
                var checkbox =document.querySelector('input[name=themeColor]')
                checkbox.addEventListener('change',function () {
                    if (this.checked){
                        trans()
                        document.documentElement.setAttribute('data-theme','dark')
                    }else {
                        document.documentElement.setAttribute('data-theme','light')
                    }
                })
                let trans = () =>{
                    document.documentElement.classList.add('transition');
                    window.setTimeout(() => {
                        document.documentElement.classList.remove('transition')
                    }, 1000)
                }
            </script>
        </div>
    </Nav>
    <br><br>