<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>

<?php

if (isset($_GET['id'])) {
    $idFromUrl = $_GET['id'];

    $sql = " SELECT * FROM teacher_enroll WHERE teacher_id = '$idFromUrl' ";
    $execute = mysqli_query($Connection, $sql);

    if (mysqli_num_rows($execute) > 0) {
        $_SESSION['error'] = ' Sorry we can not delete this yracher beacause it
      has enrolled students. please delete record associated to this teacher  first! ' ;
        Redirect_to('registered-teachers.php');
    } else {
        $sql = " DELETE FROM teachers where id = '$idFromUrl' ";
        $execute = mysqli_query($Connection, $sql);
        if ($execute) {
            $_SESSION['success'] = 'teacher is deletd successfully';
            Redirect_to('registered-teachers.php');
        }
    }
}

?>
