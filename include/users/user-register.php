<?php require_once '../config/config.php';  ?>


<?php

if (isset($_POST['signupSubmit'])) {

 $name = mysqli_real_escape_string($Connection, $_POST['name']);
 $email = mysqli_real_escape_string($Connection, $_POST['email']);
 $reg = mysqli_real_escape_string($Connection, $_POST['reg']);
 $password = mysqli_real_escape_string($Connection, $_POST['password']);
 $password2 = mysqli_real_escape_string($Connection, $_POST['password2']);

 $nameWithoutNumbers = "/[0-9]+$/";


 if (empty($name) || empty($email) || empty($password) || empty($password2) || empty($reg) ) {
  $_SESSION['error'] = " All fields are required ";
  Redirect_to("../../signup2.php");

} elseif (preg_match($nameWithoutNumbers,$name) || strlen($name)<3 ) {


  $_SESSION['error'] = " name fiel can not contain numbers, And name minum length is 3 characters  ";
  Redirect_to("../../signup2.php");

} elseif (emailExist($email)) {

  $_SESSION['error'] = " email is already registered ";
  Redirect_to("../../signup2.php");

} elseif (strlen($password)<6) {
  $_SESSION['error'] = " Password minimum length is 6 characters  ";
  Redirect_to("../../signup2.php");

} elseif ($password !== $password2 ) {

  $_SESSION['error'] = " Password dont mtach  ";
  Redirect_to("../../signup2.php");

} else {

  $query = " INSERT INTO users(name,email, reg, status ,password) VALUES('$name','$email', '$reg', 0 ,  '$password') ";
  $execute =  mysqli_query($Connection, $query) ;
  if ($execute) {
    $_SESSION['success'] = " You are successfully registered  ";
    Redirect_to("../../signup2.php");
  } else {
    die( "QUERY FAILED". mysqli_error($Connection) );
  }

}



}

 ?>
