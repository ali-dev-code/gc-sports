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
      <div class="sidebar-heading "> <i class="mr-2 fas fa-user"></i> User Panel
        <hr>
      </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action  active">
          <span class="mr-1"> <i class="fas fa-chalkboard-teacher"></i> </span> Teachers
        </a>
        <a href="user-profile.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="far fa-user-circle"></i> </span> Profile
        </a>
        <a href="user-status.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fas fa-thermometer-three-quarters"></i> </span> Status
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
                <?php echo $_SESSION['userName']; ?>
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
        <h6 class="ml-3 text-dark">Enrolled Coach</h6>


       <div class="row">
       <?php
        $query = ' SELECT * FROM teacher_enroll WHERE user_id = ' . $_SESSION['userId'] . '  ';
        $result = mysqli_query($Connection, $query);
        while ($row = mysqli_fetch_array($result)) {
            $teacherId = $row['teacher_id'];
            $userTeacherEnrollId = $row['id']; ?>
        <?php
            $query2 = " SELECT * FROM teachers WHERE id = '$teacherId'  ";
            $result2 = mysqli_query($Connection, $query2);
            while ($row2 = mysqli_fetch_array($result2)) {
                ?>
         <div class="col-lg-4" >
         <div class="card  my-5 ">
          <div class="card-header bg-success">
            <h6 class="text-white">Coach</h6>
          </div>
          <div class="card-body p-2">
            <div class="card">
              <img class="card-img-top img-fluid" src="../admin/upload/teachers/<?php echo $row2['image']; ?>" alt="Card image">
              <div class="card-body">
                <h6 class="card-title text-dark"><?php echo $row2['name']; ?>
                </h6>
                <p class="card-text"> <span class="font-weight-bold"> </span> <?php echo $row2['details']; ?> </p>
                <i class="fa fa-envelope text-success mr-1 my-2" aria-hidden="true"> </i>
                <span><?php echo $row2['email']; ?></span>
                <br>
                <i class="fa fa-phone mr-1 text-success my-2" aria-hidden="true">  </i>
                <span><?php echo $row2['phone']; ?></span>
                <br>
                <a href="view-enroll-students.php?id=<?php echo $teacherId; ?>" class="btn btn-primary mt-3 btn-sm mr-2">View Enrolld
                  Studens</a>
                <a href="disenroll-teacher.php?id=<?php echo $userTeacherEnrollId; ?>"
                  class="btn btn-danger mt-3 btn-sm  ">Dis-Enroll</a>
              </div>
            </div>
          </div>
        </div>
         </div>

        <?php
            } ?>
        <?php
        } ?>
         </div>

      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>
