<?php ob_start(); ?>
<?php require_once("include/DB.php");?>
<?php require_once("include/Session.php");?>
<?php require_once("include/Functions.php");?>

<?php

if(isset($_POST["Submit"])){
$Name = mysqli_real_escape_string($Connection,$_POST["name"]);
$email = mysqli_real_escape_string($Connection,$_POST["email"]);
$password = mysqli_real_escape_string($Connection,$_POST["password"]);
$password2 = mysqli_real_escape_string($Connection,$_POST["password2"]);

 if (empty($Name)|| empty($email) || empty($password) || empty($password2)) {
   $_SESSION["ErrorMessage"]= "All fields are required";


 }

 if (strlen($Name)<3) {
   $_SESSION["ErrorMessage"]= "name is short";
   Redirect_to("signup.php");

 }

 if (strlen($password)<3) {
   $_SESSION["ErrorMessage"]= "password is short";
   Redirect_to("signup.php");

 }





}


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign Up</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom Fonts font awesome -->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="assets/css/custom.css?v=<?php echo time(); ?>">

  </head>
  <body>


    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <!-- Brand -->
      <div class="container">

        <a class="navbar-brand" style="font-family:cursive;" href="#">Gc SP<img src="assets/img/logo/main-logo-2.png" alt="Logo" style="width:40px; "> RTS </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto text-center">



            <li class="nav-item mr-3">
              <a class="nav-link btn btn-success " style="border-radius:0px;" href="signup.php" target="_blank" >Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section  id="signup" class="container setting" >





      <div class="col-md-5 mx-auto ">

        <?php   echo Message();
         echo SuccessMessage(); ?>

        <form action="signup.php" method="POST">
          <div class="form-group">
            <label for="name" id="name" > Name  </label>
            <input type="text" name="name" id="name" class="form-control"  value="">
          </div>

          <div class="form-group">
            <label for="email" id="email" > Email  </label>
            <input type="text" name="email" id="email" class="form-control"  value=" ">
          </div>

          <div class="form-group">
            <label for="password" id="password" > password  </label>
            <input type="password" name="password" id="password" class="form-control"  value="">
          </div>

          <div class="form-group">
            <label for="password2" id="password2" > Confirm Password  </label>
            <input type="password" name="password2" id="password2" class="form-control"  value="">
          </div>

          <div class="from-group">

            <button  type="submit" name="Submit" class="btn btn-success "> Signup </button>

          </div>


        </form>

      </div>

    </section>


      <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
      <script type="text/javascript" src="assets/js/popper.min.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


  </body>
</html>
