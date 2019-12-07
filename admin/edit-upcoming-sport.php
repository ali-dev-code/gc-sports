<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>
<?php

if (isset($_POST['submit'])) {
    $idFromUrl = $_GET['edit'];
    //for image
    $image = $_FILES['image']['name'];
    $Target = 'upload/upcoming/' . basename($_FILES['image']['name']); // is me image upload ogi bhai jaan uski directory di hai
    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $details = mysqli_real_escape_string($Connection, $_POST['details']);
    $date = mysqli_real_escape_string($Connection, $_POST['date']);
    $left = mysqli_real_escape_string($Connection, $_POST['left']);

    // if admin update sport withou changing the pic
    if (empty($image)) {
        $sql = " SELECT * FROM upcoming_sports WHERE id = '$idFromUrl' ";
        $execute = mysqli_query($Connection, $sql);
        while ($row = mysqli_fetch_array($execute)) {
            $image = $row['image'];
        }
    }

    if (empty($name) || empty($details) || empty($date) || empty($left)) {
        $_SESSION['error'] = 'All fields are required';
        Redirect_to('upcoming-sports.php');
    } else {
        $query = " UPDATE upcoming_sports SET image = '$image', sport_name = '$name', details = '$details' ,
         date = '$date' , days_left = '$left' WHERE id='$idFromUrl'";
        $execute = mysqli_query($Connection, $query);
        move_uploaded_file($_FILES['image']['tmp_name'], $Target);
        if ($execute) {
            $_SESSION['success'] = 'sport has been updated successfully';
            Redirect_to('upcoming-sports.php');
        } else {
            die('QUERY FAILED' . mysqli_error($Connection));
        }
    }
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
        <a href="add-teachers.php" class="list-group-item list-group-item-action ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Teachers
        </a>
        <a href="registered-teachers.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Teachers
        </a>
        <a href="add-sports.php" class="list-group-item list-group-item-action  ">
          <span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Sport
        </a>
        <a href="upcoming-sports.php" class="list-group-item list-group-item-action active">
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
        <div class="card  my-4  ">
          <div class="card-header bg-success">
            <h6>Update Upcoming Sport</h6>
          </div>
          <div class="card-body">
            <?php

                $idFromUrl = $_GET['edit'];
                $query = " SELECT * FROM upcoming_sports WHERE id = '$idFromUrl'  ";
                $execute = mysqli_query($Connection, $query);
                if (!$execute) {
                    die('failed' . mysqli_error($Connection));
                }
                while ($row = mysqli_fetch_array($execute)) {
                    $image = $row['image'];
                    $name = $row['sport_name'];
                    $details = $row['details'];
                    $date = $row['date'];
                    $left = $row['days_left'];
                }
                ?>

            <form action="edit-upcoming-sport.php?edit=<?php echo $idFromUrl; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <span class="FieldInfo"> Existing Image</span>
                <img class="ml-3" src="upload/upcoming/<?php echo $image; ?>" width="130px" ; height="60px;">
                <br>
                <label for="image"> Image </label>
                <input type="file" name="image" id="image" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="Name"> Sport name </label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
              </div>
              <div class="form-group">
                <label for="details"> Details </label>
                <textarea class="form-control" name="details" id="details" cols="3" rows="3"><?php echo $details; ?></textarea>
              </div>
              <div class="form-group">
                <label for="date"> Date </label>
                <textarea class="form-control" name="date" id="date" cols="3" rows="3"><?php echo $date; ?></textarea>
              </div>
              <div class="form-group">
                <label for="left"> Days left </label>
                <textarea class="form-control" name="left" id="left" cols="1" rows="1"><?php echo $left; ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit"> Update </button>
              </div>
            </form>
          </div>
        </div>

        <!-- /#page-content-wrapper -->
      </div>
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
