<?php require_once '../include/config/config.php'; ?>
<?php
confirmLoginAdmin();
?>
<?php

if (isset($_POST["addS"])) {
    //for image
    $image = $_FILES["image"]["name"];
    $Target = "upload/sports/" . basename($_FILES["image"]["name"]); // is me image upload ogi bhai jaan uski directory di hai
    $name = mysqli_real_escape_string($Connection, $_POST["name"]);
	 $details = mysqli_real_escape_string($Connection, $_POST["details"]);
	 $checkAlreadySport = " SELECT * FROM sports WHERE name ='$name' ";
	 $executeAlreadySport = mysqli_query($Connection,$checkAlreadySport);
    if (empty($image) || empty($name) || empty($details)) {
        $_SESSION["error"] = "All fields are required";
        Redirect_to("sports.php");
    } elseif (strlen($name) < 3) {
        $_SESSION["error"] = "your title is short";
        Redirect_to("add-sports.php");
	 }elseif (mysqli_num_rows($executeAlreadySport) == 1) {
		$_SESSION["error"] = "sport is already Registered";
		Redirect_to("add-sports.php");
	 }
	  else {
        $Query = "INSERT INTO sports (name, image,details)
         VALUES('$name', '$image', '$details')";
        $Execute = mysqli_query($Connection, $Query);
        move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["success"] = "Sport has been added successfully";
            Redirect_to("add-sports.php");
        } else {
            die("QUERY FAILED" . mysqli_error($Connection));
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
				<a href="index.php" class="list-group-item list-group-item-action  ">
					<span class="mr-1"> <i class="fas fa-tachometer-alt"></i> </span> Dashboard
				</a>
				<a href="add-teachers.php" class="list-group-item list-group-item-action ">
					<span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Teachers
				</a>
				<a href="add-sports.php" class="list-group-item list-group-item-action active ">
					<span class="mr-1"> <i class="fa fa-plus-circle"></i> </span> Add Sport
				</a>
				<a href="upcoming-sports.php" class="list-group-item list-group-item-action ">
					<span class="mr-1"> <i class="fa fa-caret-down" aria-hidden="true"></i> </span> Upcoming Sports
				</a>
				<a href="index" class="list-group-item list-group-item-action ">
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
				<i href="#" id="menu-toggle"> <i class="fas fa-toggle-off toggler-fa "></i> </i>
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
				<div class="card  my-4  ">
					<div class="card-header bg-success">
						<h6>Add Sports</h6>
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
								<textarea class="form-control" name="details" id="details" cols="3" rows="3"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" name="addS"> Add </button>
							</div>
						</form>
					</div>
				</div>
				<div class="card  my-5  ">
					<div class="card-header bg-success ">
						<h6> Registered sports </h6>
					</div>
					<div class="care-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th> Sport </th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
                                    $query = " SELECT * FROM sports ";
                                    $execute = mysqli_query($Connection, $query);
                                    $srNo = 0;
                                    while ($row = mysqli_fetch_array($execute)) {
                                        $srNo++; ?>
									<tr>
										<td> <?php echo $srNo;   ?> </td>
										<td> <?php echo $row['name'];   ?> </td>
										<td> <img src="upload/sports/<?php echo $row['image']; ?>" style="width:140px;" alt=""> </td>
										<td>
											<a href="edit-sport.php?edit= <?php echo $row['id'];   ?> " class="btn btn-warning btn-sm"> Edit
											</a>
											<a href="delete-sport.php?delete= <?php echo $row['id'];   ?>" class="btn btn-danger btn-sm"> Delete
											</a>
										</td>
									</tr>
								</tbody>
								<?php
                            } ?>
							</table>
						</div>
					</div>
				</div>
				<!-- /#page-content-wrapper -->
			</div>
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
