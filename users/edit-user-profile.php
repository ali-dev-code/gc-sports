<?php require_once '../include/config/config.php'; ?>
<?php confirmLogin(); ?>

<?php

if (isset($_POST['EditProfileSubmit'])) {
    $userId = $_SESSION['userId'];
    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $password = mysqli_real_escape_string($Connection, $_POST['password']);
    $nameWithoutNumbers = '/[0-9]+$/';

    $emailCheck = " SELECT * FROM users WHERE email = '$email' AND id != '$userId' ";
    $executeEmailCheck = mysqli_query($Connection, $emailCheck);

    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['error'] = ' All fields are required ';
    } elseif (preg_match($nameWithoutNumbers, $name) || strlen($name) < 3) {
        $_SESSION['error'] = ' name field can not contain numbers, And name minum length is 3 characters  ';
    } elseif (mysqli_num_rows($executeEmailCheck) == 1) {
        $_SESSION['error'] = ' This email is already registered. please use your new email! ';
    } elseif (strlen($password) < 6) {
        $_SESSION['error'] = ' Password minimum length is 6 characters  ';
    } else {
        $sql = " UPDATE users SET name = '$name' ,  name = '$name' , password = '$password' WHERE id = '$userId' ";
        $Execute = mysqli_query($Connection, $sql);

        if ($Execute) {
            unset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userEmail']);

            $_SESSION['success'] = 'User Profile has been updated successfully please login again';
            Redirect_to('../signup2.php');
        }
    }
} // end of if isset

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- Cutom font CSS -->
   <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
<link rel="stylesheet" href="assets/css/simple-sidebar.css?v=<?php echo time(); ?>">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading "> <i class="mr-2 fas fa-user"></i> User Panel <hr> </div>
            <div class="list-group list-group-flush">

                <a href="index.php" class="list-group-item list-group-item-action">
                    <span class="mr-1"> <i class="fas fa-chalkboard-teacher"></i> </span> Teachers
                </a>
                <a href="user-profile.php" class="list-group-item list-group-item-action active">
                    <span class="mr-1"> <i class="far fa-user-circle"></i> </span> Profile
                </a>
                <a href="#" class="list-group-item list-group-item-action ">
                    <span class="mr-1"> <i class="fas fa-thermometer-three-quarters"></i> </span> Status
                </a>
            </div>
        </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <a href="#"   id="menu-toggle" >  <img src="assets/img/menu.png" alt=""  style="width: 32px;" >  </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['userName']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="../include/users/logout.php"> Logut </a>

              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">


        <div class="col-md-6 m-auto py-4" >

          <div class="card" style="width: 350px;" >
            <div class="card-header bg-success">
              <h6>Update Profile</h6>
            </div>
               <div class="card-body px-3" >
              <div class="card" >
                <img class="card-img-top " src="assets/img/default.png"   alt="Card image">
                <div class="mt-2">
                  <?php successMsg(); errorMsg();?>

              <div class="card-body">

               <form  action=""  method="post" >

                <div class="from-group">
                  <label for="name"> Name* </label>
                  <input type="text" name="name" value="<?php echo $_SESSION['userName'] ?> " id="name"  class="form-control">
                </div>

                     <div class="from-group">
                   <label for="email"> Email* </label>
                  <input type="text" name="email" value="<?php echo $_SESSION['userEmail'] ?> " id="email"  class="form-control">
                </div>

                <div class="from-group">
                  <label for="password"> Password* </label>
                  <input type="password" name="password"  id="password"  class="form-control">
                </div>

              <div class="form-group mt-3">

                <button type="submit" class="btn btn-primary"  name="EditProfileSubmit">Update</button>

              </div>

            </form>

             </div>
           </div>


           </div>
         </div>

        </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
