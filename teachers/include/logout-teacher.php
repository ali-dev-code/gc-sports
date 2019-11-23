
<?php require_once '../../include/config/config.php'; ?>

<?php

unset($_SESSION["teacherId"]);
unset($_SESSION["teacherName"]);
unset($_SESSION["teacherEmail"]);
unset($_SESSION["teacherImage"]);
unset($_SESSION["teacherDetails"]);

$_SESSION["success"]= "You are successfully logout!";
Redirect_to("../../signup2.php");


 ?>
