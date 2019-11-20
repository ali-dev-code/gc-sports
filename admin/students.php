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
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link rel="stylesheet" href="assets/css/simple-sidebar.css?v=<?php echo time(); ?>">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="teachers.php" class="list-group-item list-group-item-action bg-light">Add Teachers</a>
        <a href="sports.php" class="list-group-item list-group-item-action bg-light">Add Sport</a>
        <a href="students.php" class="list-group-item  list-group-item-action bg-light active">Approve Students</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ALI ASGHAR
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
        <div class="card my-5 ">
          <div class="card-header"> Students </div>
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

                  $query = "  SELECT * FROM users ";
                  $execute = mysqli_query($Connection, $query);
                  $srn = 0;
                  while ($row = mysqli_fetch_array($execute)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $regno  = $row['reg'];
                    $staus  = $row['status'];
                    $srn++;



                    ?>

                    <tr>
                      <td> <?php echo $srn; ?> </td>
                      <td> <?php echo $name ?> </td>
                      <td><?php echo $email ?></td>
                      <td><?php echo $regno; ?></td>
                      <td> <?php if ($staus == 0) : ?>
                          <a href="include/approveUser.php?approveUser=<?php echo $id; ?>" class="btn btn-success btn-sm mb-2"> Approve </a>
                        <?php endif; ?>
                        <a href="include/disapproveUser.php?dissaproveUser=<?php echo $id ?>  " onclick="return confirm('Are you sure to Disapprove this user?')" class="btn btn-danger btn-sm mb-2 "> Disapprove </a>
                      </td>


                    </tr>
                  <?php } ?>
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