<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>

<?php
if (isset($_GET['id'])) {
    $idFromUrl = $_GET['id'];
}

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
        <a href="index.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fas fa-tachometer-alt"></i> </span> Dashboard
        </a>
        <a href="add-teachers.php" class="list-group-item list-group-item-action active">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Teachers
        </a>
        <a href="registered-teachers.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Teachers
        </a>
        <a href="add-sports.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Sport
        </a>
        <a href="upcoming-sport.php" class="list-group-item list-group-item-action ">
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
                <?php  echo $_SESSION['adminName']  ?>
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
        <div class="card my-4 ">
          <div class="card-header bg-success ">
            <div class="d-flex justify-content-between">
              <div>
                <h6>Students Enrolled</h6>
              </div>
              <div>
                <a class="btn btn-danger btn-sm float-right " href="delete-all-teacher-students.php?id=<?php echo $idFromUrl; ?>"
                  role="button" onclick="return confirm('Are you sure to delete all record?')"> Delete Record
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Teacher Name</th>
                    <th>Studen Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                            $TeacherIDFromURL = $_GET['id'];
                            $viewStudents = " SELECT student_name, teacher FROM teacher_enroll WHERE teacher_id = '$TeacherIDFromURL' ";
                            $executeViewStudents = mysqli_query($Connection, $viewStudents);
                            $srn = 0;
                            while ($datarows = mysqli_fetch_array($executeViewStudents)) {
                                $studenName = $datarows['student_name'];
                                $teacherName = $datarows['teacher'];
                                $srn++; ?>
                  <tr>
                    <td> <?php echo $srn; ?> </td>
                    <td><?php echo $teacherName  ?></td>
                    <td> <?php echo $studenName ?> </td>
                  </tr>
                  <?php
                            } ?>

                </tbody>
              </table>
            </div>
          </div>
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
