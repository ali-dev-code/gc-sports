<?php require_once '../include/config/config.php'; ?>
<?php confirmLogin(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Panel</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link rel="stylesheet"
    href="assets/css/simple-sidebar.css?v=<?php echo time(); ?>">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">User Panel </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="user-teachers.php" class="list-group-item list-group-item-action bg-light active">Teachers</a>

        <a href="user-profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <a href="#" id="menu-toggle"> <img src="assets/img/menu.png" alt="" style="width: 32px;"> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
        <div class="card my-5">
          <div class="card-header">
            <h6>Coches </h6>
          </div>

          <div class="card-body">

            <div class="">

              <?php

           $query = ' SELECT * FROM teacher_enroll WHERE user_id = ' . $_SESSION['userId'] . '  ';
           $result = mysqli_query($Connection, $query);
           while ($row = mysqli_fetch_array($result)) {
               ?>

              <ul class="list-group">
                <li class="list-group-item"> <?php echo $row['teacher'] ?>
                  <a class=" mx-2 btn btn-danger btn-sm float-right"
                    href="disenroll.php?id=<?php echo $row['teacher_id'] ?> ">
                    DisEnnrol</a>
                  <a class=" btn btn-danger btn-sm float-right"
                    href="view-enroll-students.php?id=<?php echo $row['teacher_id'] ?> ">
                    View Enroll Students </a> </li>
                <?php
           } ?>
              </ul>

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