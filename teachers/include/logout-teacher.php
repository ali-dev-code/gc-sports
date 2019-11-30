
<?php require_once '../../include/config/config.php'; ?>
<?php confirmLoginTeacher(); ?>

<?php

unset($_SESSION['teacherId'], $_SESSION['teacherName'], $_SESSION['teacherEmail'], $_SESSION['teacherImage'], $_SESSION['teacherDetails']);

$_SESSION['success'] = 'You are successfully logout!';
Redirect_to('../../signup.php');

 ?>
