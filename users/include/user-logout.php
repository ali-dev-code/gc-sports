<?php require_once '../../include/config/config.php';  ?>


<?php

unset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userEmail']);

$_SESSION['success'] = 'You are successfully logout!';
Redirect_to('../../signup.php');

 ?>
