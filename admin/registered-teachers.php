<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel</title>
  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Cutom font CSS -->
  <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../portal-assets/css/simple-sidebar.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading "> <i class="fas fa-user-shield"></i> Admin Panel
        <hr>
      </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fas fa-tachometer-alt"></i> </span> Dashboard
        </a>
        <a href="add-teachers.php" class="list-group-item list-group-item-action">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Teachers
        </a>
        <a href="registered-teachers.php" class="list-group-item list-group-item-action active ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Teachers
        </a>
        <a href="add-sports.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Sport
        </a>
        <a href="upcoming-sports.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fa fa-caret-down" aria-hidden="true"></i> </span> Upcoming Sports
        </a>
        <a href="students.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fas fa-users"></i> </span> Students
        </a>
        <a href="admin-profile.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="far fa-user-circle"></i> </span> Profile
        </a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <a href="#" id="menu-toggle"> <i class="fas fa-toggle-off toggler-fa "></i> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['adminName']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../include/logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="my-3">
          <?php successMsg();
          errorMsg(); ?>
        </div>
        <div class="row">
          <?php
         $query = ' SELECT * FROM teachers ';
         $execute = mysqli_query($Connection, $query);
         while ($row = mysqli_fetch_array($execute)) {
             ?>
          <div class=" col-lg-4  col-md-6 col-sm-6">
            <div class="card my-4 ">
              <div class="card-header bg-success  ">
                <h6>Teacher</h6>
              </div>
              <img class="card-img-top mx-auto mt-2 img-thumbnail " src="upload/teachers/<?php echo $row['image']; ?>"
                alt="Card image" style="width:50%;">
              <div class="card-body">
                <h6 class="card-title text-dark"><?php echo  $row['name'];
             ; ?> </h6>
                <p class="card-text"> <span class="font-weight-bold"> </span> <?php echo $row['details']; ?> </p>
                <i class="fa fa-envelope text-success mr-1 my-2" aria-hidden="true"> </i>
                <span><?php echo $row['email']; ?></span>
                <br>
                <i class="fa fa-phone mr-1 text-success my-2" aria-hidden="true"> </i>
                <span><?php echo $row['phone']; ?></span>
                <br>
                <a class="btn btn-danger btn-sm mt-4" onclick="return confirm('Are you sure to delete?')"
                  href="delete-teacher.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
                <a class="btn btn-primary btn-sm float-right mt-4 "
                  href="view-teacher-enroll-students.php?id=<?php echo $row['id']; ?>" role="button">Students</a>

              </div>
            </div>
          </div>
          <?php
         } ?>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="../assets/js/jquery-3.4.1.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/img-select-name.js"></script>
  <!-- Menu Toggle Script -->
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
</body>

</html>
