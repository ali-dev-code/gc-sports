<?php require_once '../include/config/config.php'; ?>
<?php confirmLogin(); ?>
<?php

?>
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
	<!-- Cutom font CSS -->
	<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="assets/css/simple-sidebar.css?v=<?php echo time(); ?>">
</head>

<body>
	<div class="d-flex" id="wrapper">
		<!-- Sidebar -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading "> <i class="mr-2 fas fa-user"></i> User Panel
				<hr>
			</div>
			<div class="list-group list-group-flush">
				<a href="index.php" class="list-group-item list-group-item-action active">
					<span class="mr-1"> <i class="fas fa-chalkboard-teacher"></i> </span> Teachers
				</a>
				<a href="user-profile.php" class="list-group-item list-group-item-action ">
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
								<?php echo $_SESSION['userName']; ?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="include/user-logout.php"> Logut </a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<div class="container-fluid">
				<div class="card my-5">
					<div class="card-header">
						<strong> Students Enrolled </strong>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Sr No</th>
										<th>Coach Name</th>
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
