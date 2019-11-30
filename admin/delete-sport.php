<?php require_once '../include/config/config.php'; ?>
<?php confirmLoginAdmin();?>

<?php

if (isset($_GET['delete'])) {
    $idFromUrl = $_GET['delete'];
    $sql1 = " SELECT * FROM teacher_enroll WHERE sport_id = '$idFromUrl' ";
    $execute1 = mysqli_query($Connection, $sql);
    $sql2 = " SELECT * FROM teachers WHERE sport_id = '$idFromUrl' ";
    $execute2 = mysqli_query($Connection, $sql2);

    if (mysqli_num_rows($execute) > 0) {
        $_SESSION['error'] = ' Sorry we can not delete this sport beacause it
        has enrolled students. please delete record from enroll table first! ' ;
        Redirect_to('add-sports.php');
    }elseif (mysqli_num_rows($execute2) > 0) {
      $_SESSION['error'] = ' Sorry we can not delete this sport beacause it
      is associated with a teacher. please remeove the teacher first! ' ;
      Redirect_to('add-sports.php');
    }


    else {
      $sql = " DELETE FROM sports where id = '$idFromUrl' ";
      $execute = mysqli_query($Connection,$sql);
      if ($execute) {
      $_SESSION['success'] = "Sport is deletd successfully";
      Redirect_to("add-sports.php");
      }
    }
}
