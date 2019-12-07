<?php require_once '../../include/config/config.php';  ?>


<?php

session_unset();
session_destroy();

Redirect_to('../../signup.php');

 ?>
