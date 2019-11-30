<?php require_once '../../include/config/config.php'; ?>
<?php confirmLoginTeacher(); ?>
<?php

    $idFromUrl = $_GET['id'];
    $query = " DELETE FROM teachers WHERE id =  ' " . $_SESSION['teacherId'] . "  '  ";
    $execute = mysqli_query($Connection, $query);
    if ($execute) {
        unset($_SESSION['teacherId'], $_SESSION['teacherName'], $_SESSION['teacherEmail'], $_SESSION['teacherImage'], $_SESSION['teacherDetails']);

        $_SESSION['success'] = 'Your are successfully removed from our system.';
        Redirect_to('../../signup.php');
    }

?>
