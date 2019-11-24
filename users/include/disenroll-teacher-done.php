<?php require_once '../../include/config/config.php'; ?>
<?php confirmLogin(); ?>

<?php

if (isset($_GET['id'])) {

  $idFromUrl = $_GET['id'];
  $query = " DELETE FROM teacher_enroll WHERE id = ' $idFromUrl ' ";
  $executeQuery = mysqli_query($Connection,$query);
  if ($executeQuery) {
    $_SESSION['success'] = " You are successfully disenrolled ";
    Redirect_to("../index.php");
  }

}


?>
