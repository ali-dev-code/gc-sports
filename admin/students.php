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
        <a href="index.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fas fa-tachometer-alt"></i> </span> Dashboard
        </a>
        <a href="add-teachers.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Teachers
        </a>
        <a href="add-sports.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Sport
        </a>
        <a href="upcoming-sports.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fa fa-caret-down" aria-hidden="true"></i> </span> Upcoming Sports
        </a>
        <a href="index" class="list-group-item list-group-item-action active">
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
                <a class="dropdown-item" href="include/addminLogout.php">Logout</a>
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
          <div class="card-header bg-success">
            <h6> Students </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Reg #</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = '  SELECT * FROM users ';
                  $execute = mysqli_query($Connection, $query);
                  $srn = 0;
                  while ($row = mysqli_fetch_array($execute)) {
                      $id = $row['id'];
                      $name = $row['name'];
                      $email = $row['email'];
                      $regno = $row['reg'];
                      $staus = $row['status'];
                      $srn++; ?>

                  <tr>
                    <td> <?php echo $srn; ?> </td>
                    <td> <?php echo $name ?> </td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $regno; ?></td>
                    <td>
                      <?php if ($staus == 0) : ?>

                      <a href="include/approveUser.php?approveUser=<?php echo $id; ?>" class="btn btn-success btn-sm mb-2">
                        Approve
                      </a>
                      <?php endif; ?>

                      <a href="include/disapproveUser.php?dissaproveUser=<?php echo $id ?>  "
                        onclick="return confirm('Are you sure to Disapprove this user?')" class="btn btn-danger btn-sm mb-2 ">
                        Disapprove
                      </a>
                    </td>
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
