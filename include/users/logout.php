<?php require_once '../config/config.php';  ?>


<?php

unset($_SESSION["userId"]);
unset($_SESSION["userName"]);
unset($_SESSION["userEmail"]);

$_SESSION["success"]= "You are successfully logout!";
Redirect_to("../../signup2.php");


 ?>
