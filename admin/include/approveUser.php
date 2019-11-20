<?php require_once '../../include/config/config.php'; ?>

<?php

if (isset($_GET['approveUser'])) {
  $userIdFromUrl = $_GET['approveUser'];

  $query = " UPDATE users SET status = '1' WHERE id = '$userIdFromUrl'  ";
  $execute = mysqli_query($Connection, $query);

  if ($execute) {

    $_SESSION['success'] = " user has been successfully approved ";
    Redirect_to( " ../students.php " );

  } else {
    die( "QUEry Failed". mysqli_error($Connection) );
  }



}

 ?>
