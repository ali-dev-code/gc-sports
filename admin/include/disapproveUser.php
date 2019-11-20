<?php require_once '../../include/config/config.php'; ?>

<?php

if (isset($_GET['dissaproveUser'])) {
  $userIdFromUrl = $_GET['dissaproveUser'];

  $query = " DELETE FROM users  WHERE id = '$userIdFromUrl'  ";
  $execute = mysqli_query($Connection, $query);

  if ($execute) {

    $_SESSION['success'] = " user has been successfully deleted";
    Redirect_to( " ../students.php " );

  } else {
    die( "QUEry Failed". mysqli_error($Connection) );
  }



}

 ?>
