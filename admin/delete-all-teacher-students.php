<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>
<?php

if (isset($_GET['id'])) {
    $idFromUrl = $_GET['id'];

    $sql = " DELETE  FROM teacher_enroll WHERE teacher_id = '$idFromUrl'  " ;
    $execute = mysqli_query($Connection, $sql);
    if ($execute) {
        $_SESSION['success'] = ' Record delted successfully  ';
        Redirect_to('registered-teachers.php');
    }
}

?>
