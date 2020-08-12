<!DOCTYPE html>
<html lang="en">

<head>
   <title>List</title>  
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<Nav id="mainNav1" class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
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
                <a class="nav-link" href="list.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <li class="nav-item active" >
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Saved Lists
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <button class="btn btnDemo1" id="Demo1" >Demo List 1</button>
                      <button class="btn btnDemo2" id="Demo2" >Demo List 2</button>
                      <button class="btn btnDemo3" id="Demo3" >Demo List 3</button>
                    </div>
                  </div>
              </li>
            </ul>
          </div>
        </div>
    </Nav>