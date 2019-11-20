
<?php require_once '../../include/config/config.php'; ?>

<?php

unset($_SESSION["adminId"]);
unset($_SESSION["adminName"]);
unset($_SESSION["adminEmail"]);

$_SESSION["success"]= "You are successfully logout!";
Redirect_to("../../signup2.php");


 ?>
