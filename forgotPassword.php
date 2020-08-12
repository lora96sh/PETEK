<?php
  require "Parts/Header.php";
  // the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("lorashamshom@hotmail.com","My subject",$msg);
?>

<body>
   <div class="logIn">
        <div class="container">
            <br><br>
            <h1>Please Enter Your Mail Address</h1>
            <form >
                    <p>Email address</p> 
                    <input class="mailAndpass" type="email" placeholder="Enter Email Address" name="" required>
                    
                     <a href="password.html"> <button id="forgotPassword" class="btn btn-primary" > Login
                    </button></a>
                    <br>
                    <br>
            </form>
         </div>
    </div> 

    <footer>
        <div class="textP">
             © 2020 by Lora Shimshon & Shay Ben Haim 
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="Script/javascript.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>