<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>
<?php

if (isset($_POST['addT'])) {
    //for image
    $image = $_FILES['image']['name'];
    $Target = 'upload/teachers/' . basename($_FILES['image']['name']); // is me image upload ogi bhai jaan uski directory di hai
    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $details = mysqli_real_escape_string($Connection, $_POST['details']);
    $short = mysqli_real_escape_string($Connection, $_POST['short']);
    $sport = mysqli_real_escape_string($Connection, $_POST['sport']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $password = mysqli_real_escape_string($Connection, $_POST['password']);
    $phone = mysqli_real_escape_string($Connection, $_POST['phone']);
    if (empty($image) || empty($name) || empty($details) || empty($short) || empty($sport) || empty($email) || empty($phone)) {
        $_SESSION['error'] = 'All fields are required';
        Redirect_to('teachers.php');
    } elseif (strlen($name) < 3) {
        $_SESSION['error'] = 'name is short';
        Redirect_to('add-teachers.php');
    } else {
        $Query = "INSERT INTO teachers (name, details,short_details,image,password,phone,email,sport_id)
         VALUES('$name','$details','$short','$image','$password','$phone','$email',$sport')";
        $Execute = mysqli_query($Connection, $Query);
        move_uploaded_file($_FILES['image']['tmp_name'], $Target);
        if ($Execute) {
            $_SESSION['success'] = 'Teacher has been added successfully';
            Redirect_to('add-teachers.php');
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
			<div class="sidebar-heading "> <i class="fas fa-user-shield"></i> Admin Panel
				<hr>
			</div>
			<div class="list-group list-group-flush">
				<a href="index" class="list-group-item list-group-item-action  ">
					<span class="mr-1"> <i class="fas fa-tachometer-alt"></i> </span> Dashboard
				</a>
				<a href="add-teachers.php" class="list-group-item list-group-item-action active">
					<span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Teachers
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
				<a href="index" class="list-group-item list-group-item-action  ">
					<span class="mr-1"> <i class="fas fa-user-friends"></i> </span> Teachers
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
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<?php  echo $_SESSION['adminName']  ?>
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
						<h6>Add Teacher as Coach</h6>
					</div>
					<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="image"> Image </label>
								<input type="file" name="image" id="image" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="Name"> Name </label>
								<input type="text" name="name" id="name" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="details"> Details </label>
								<input type="text" name="details" id="details" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="short"> Short </label>
								<input type="text" name="short" id="short" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="sportselect">Sports:</label>
								<select class="form-control" id="sportselect" name="sport">
									<?php
                  $ViewQuery = 'SELECT * FROM sports ';
                  $Execute = mysqli_query($Connection, $ViewQuery);
                  while ($DataRows = mysqli_fetch_array($Execute)) {
                      $Id = $DataRows['id']; //jo name datbase me hai id
                      $sportsName = $DataRows['name']; //jo name datbase me hai name?>
									<option value="<?php echo $Id; ?>  "> <?php echo $sportsName; ?></option>
									<?php
                  } ?>
								</select>
              </div>
              <div class="form-group">
								<label for="short"> Email </label>
								<input type="email" name="email" id="email" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="short"> Password </label>
								<input type="text" name="password" id="password" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="phone"> Phone No </label>
								<input type="text" name="phone" id="phone" class="form-control" value="">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" name="addT"> Add </button>
							</div>
						</form>
					</div>
				</div>
				<!--  show teachers  -->
				<div class="card  my-4">
					<div class="card-header bg-success">
						<h6>Registered Teachers</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>SR no</th>
										<th>Name</th>
										<th>Sport</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php   $srNo = 0;
                                $viewQuery = ' SELECT * FROM teachers ';
                                          $executeQuery = mysqli_query($Connection, $viewQuery);
                                          while ($row = mysqli_fetch_array($executeQuery)) {
                                              $srNo++
                         ?>
										<td scope="row"> <?php  echo $srNo; ?> </td>
										<td> <?php  echo $row['name']; ?> </td>
										<td> <?php  echo $row['details'] ?> </td>
										<td> <a i class="btn btn-danger btn-sm mb-1" href="delete-teacher.php?id=<?php echo $row['id']; ?>"> Delete </a> </td>
										<td> <a i class="btn btn-primary mb-1 btn-sm" href="view-teacher-enroll-students.php?id=<?php echo $row['id']; ?>"> View Enrolled
												Student </a> </td>
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
