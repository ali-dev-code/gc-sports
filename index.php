<?php require_once 'include/config/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>GC ^$\n SPORTS</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Custom Fonts font awesome -->
	<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Fancybox gallery plugin -->
	<link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="assets/css/custom.css?v=<?php echo time(); ?>">

<body data-spy="scroll" data-target='#collapsibleNavbar'>
	<!-- Navigation bar -->
	<section id="HEADER">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
			<!-- Brand -->
			<div class="container">
				<a class="navbar-brand" style="font-family:cursive;" href="#">Gc SP<img src="assets/img/logo/main-logo-2.png" alt="Logo" style="width:40px; "> RTS
				</a>
				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto text-center">
						<li class="nav-item  mr-1">
							<a class="nav-link px-3  active  " href="#HEADER">HOME</a>
						</li>
						<li class="nav-item mr-1">
							<a class="nav-link px-3" href="#UPCOMING">UPCOMING TOURNAMENT</a>
						</li>
						<li class="nav-item mr-1">
							<a class="nav-link px-3" href="#SPORTS">SPORTS</a>
						</li>
						<li class="nav-item mr-1">
							<a class="nav-link px-3 " href="#COACH">COACH</a>
						</li>
						<li class="nav-item mr-1">
							<a class="nav-link px-3" href="#GALLERY">GALLERY</a>
						</li>
						<li class="nav-item mr-1">
							<a class="nav-link px-3" href="#CONTACT">CONTACT</a>
						</li>
						<li class="nav-item mr-3">
							<a class="nav-link btn btn-success " style="border-radius:0px;" href="signup2.php" target="_blank">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- end navigation bar -->
		<!-- Slider starts here -->
		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
				<li data-target="#demo" data-slide-to="3"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="assets/img/slider/one.jpg" alt="Los Angeles" class="img-fluid">
					<div class="carousel-caption">
						<h3>WELOCOME TO GC SPORTS</h3>
						<p>We had such a great time in LA!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="assets/img/slider//two.jpg" alt="Chicago" class="img-fluid">
					<div class="carousel-caption">
						<h3>GC SPORTS EVENTS!</h3>
						<p>Thank you, Lorem ipsum dollar sesit!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="assets/img/slider/three.jpg" alt="New York" class="img-fluid">
					<div class="carousel-caption">
						<h3>New York</h3>
						<p>We love the Big Apple!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="assets/img/slider/four.jpg" alt="New York" class="img-fluid">
					<div class="carousel-caption">
						<h3>New York</h3>
						<p>We love the Big Apple!</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</section>
	<!-- end of header Section -->
	<section id="UPCOMING" class="setting">
		<div class="container">
			<div class="heading">
				<h1 class="text-center"><span>UPCOMING TOURNAMENT</span></h1>
			</div>
			<div class="row">

				<?php
				$viewQuery = " SELECT * FROM upcoming_sports ";
				$executeViewQuery = mysqli_query($Connection,$viewQuery);
				while ($row = mysqli_fetch_array($executeViewQuery)) {
					  $image = $row['image']; // joh name database table me hai
					  $name = $row['sport_name'];
					  $details= $row['details'];
					  $date = $row['date'];
					  $daysLeft = $row['days_left'];
				?>

				<div class="col-sm-4 m-auto">
					<div class="card pb-3 up">
						<img class="card-img-top img-fluid" src="admin/upload/upcoming/<?php echo $image;  ?>"
						 alt="Card image cap">
						<div class="card-block">
							<h5 class="card-title px-3 pt-2"><?php echo $name; ?></h5>
							<p class="card-text px-3"><?php echo $details; ?></p>
							<span class="pl-3"> <small><?php echo $date; ?></small> </span>
							<span class="float-right pr-3 text-muted"> <small> <?php echo $daysLeft; ?> </small> </span>
						</div>
					</div> <!-- end of card -->
				</div> <!-- end of col -->

				<?php } ?>
			</div> <!-- end of row 1 -->


		</div>
		<!--container end -->
	</section> <!-- end of upcoming section -->
	<!-- sports -->
	<section id="SPORTS" class="setting">
		<div class="container">
			<div class="heading">
				<h1 class="text-center"> <span> SPORTS </span> </h1>
			</div>
			<div class="row text-white">
				<?php
        $querySports = '  SELECT * FROM sports ';
        $executeSportsQuery = mysqli_query($Connection, $querySports);
        while ($row = mysqli_fetch_array($executeSportsQuery)) {
            $sportId = $row['id'];
            $sportImage = $row['image'];
            $sportName = $row['name']; ?>
				<div class="col-md-6">
					<div class="card custom-card crd-img ">
						<img class="card-img-top img-fluid" src="admin/upload/sports/<?php echo $sportImage; ?>">
						<div class="card-img-overlay">
							<h4 class="card-title"><?php echo $sportName; ?>
							</h4>
							<a href="sport-register.php?id=<?php echo $sportId; ?>" class="btn btn-success btn-sm ">Details / Register</a>
						</div>
					</div>
				</div> <!-- end of col -->
				<?php
        }  ?>
			</div> <!-- end of row 1 -->
		</div>
	</section> <!-- end of sports section -->
	<section id="COACH" class="setting">
		<div class="container">
			<div class="heading">
				<h1 class="text-center"> <span> ENROLL WITH YOUR COACH </span> </h1>
			</div>
			<div class="row">
				<?php
        $query = '  SELECT * FROM teachers ';
        $execute = mysqli_query($Connection, $query);
        while ($row = mysqli_fetch_array($execute)) {
            $teacherId = $row['id'];
            $teacherImage = $row['image'];
            $teacherName = $row['name'];
            $teacherDetails = $row['details'];
            $teacherShort = $row['short_details']; ?>
				<div class="col-md-4">
					<div class="coach">
						<img src="admin/upload/teachers/<?php echo $teacherImage ?>" alt="Teacher" style="width:100%">
						<h4 class="mx-2 mt-1"><?php echo $teacherName ?> </h4>
						<p class="title"><?php echo $teacherDetails ?> </p>
						<p><?php echo $teacherShort ?> </p>
						<a href="#"><i class="fas fa-envelope"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-linkedin"></i></a>
						<a href="#"><i class="fab fa-facebook"></i></a>
						<a href=" teacher-enroll.php?id=<?php echo $teacherId ?>" class="btn enrollB font-weight-bold mt-1 "> ENROLL </a>
					</div> <!-- end of coah -->
				</div> <!-- end of col -->
				<?php
        } ?>
			</div> <!-- end of row 1 -->
		</div>
	</section> <!-- end of coach section   --->
	<!-- Gallery section  -->
	<section id="GALLERY" class="setting">
		<div class="container">
			<div class="heading">
				<h1 class="text-center"> <span> GALLERY </span> </h1>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="gallery">
						<a href="assets//fancybox/images/1.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/1-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/2.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/2-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/3.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/3-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/4.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/4-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/5.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/5-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/6.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/6-thumb.jpg ">
						</a>
						<!-- second -->
						<a href="assets//fancybox/images/1.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/1-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/2.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/2-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/3.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/3-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/4.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/4-thumb.jpg ">
						</a>
						<a href="assets//fancybox/images/5.jpg" data-fancybox="gallery" data-caption="Title goes here!">
							<img src="assets//fancybox/images/5-thumb.jpg ">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section> <!--  End of gallery section  -->
	<section id="CONTACT" class="setting ceoB text-white ">
		<div class="container">
			<div class="row no-gutters ">
				<div class="col-sm-6 m-auto px-3">
					<div class="contact-heading mb-3">
						<h6>__ CONTACT US</h6>
					</div>
					<div class="ceo-heading">
						<h1 class=""> KATHERINE ALIE </h1>
						<span> <strong>HEAD OF SPORTS MANAGEMENT</strong> </span>
						<p class="p-2">
							<a href="#" style="font-size:26px; color:#D44136 ;"><i class="fas fa-envelope mr-2"></i></a>
							<a href="#" style="font-size:26px; color:#55ACEE "><i class="fab fa-twitter  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#4C75A3 "><i class="fab fa-linkedin  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#3B5999; "><i class="fab fa-facebook  mr-2 "></i></a>
						</p>
						<div class="ceo-paragraph">
							<blockquote class="blockquote">
								<p class="mb-0 " style="font-size:15px;"> "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
									do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris
									nisi ut aliquip ex ea commodo consequat."</p>
								<footer class="blockquote-footer"> KATHERINE ALIE <cite title="Source Title"></cite></footer>
							</blockquote>
						</div>
					</div>
					<div class="team-help mt-5">
						<h5>Need to get in touch with the team? We’re all ears.</h5>
						<div class="team-help-button">
							<button class="btn button-team" type="button" name="button">CONTUCT US</button>
						</div>
					</div>
				</div> <!-- end of col -->
				<div class="col-sm-6">
					<div class="ceo-img">
						<img class="img-fluid" src="assets/img/contact/contact-hero.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section> <!-- end of ceo setcion -->
	<section id="TEAM" class="setting text-center">
		<div class="container">
			<div class="heading">
				<h1 class="text-center"> <span>THE TEAM</span> </h1>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="team-img">
						<img src="assets/img/team/team.jpg" style="width:70%; " class="rounded-circle  mx-auto d-block" alt="">
						<h6 class="pt-2">John Doe</h6>
						<span>Student President</span>
						<div class="img-icons text-center mt-2">
							<a href="#" style="font-size:26px; color:#D44136 ;"><i class="fas fa-envelope mr-2"></i></a>
							<a href="#" style="font-size:26px; color:#55ACEE "><i class="fab fa-twitter  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#4C75A3 "><i class="fab fa-linkedin  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#3B5999; "><i class="fab fa-facebook  mr-2 "></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="team-img">
						<img src="assets/img/team/team.jpg" style="width:70%; " class="rounded-circle  mx-auto d-block" alt="">
						<h6 class="pt-2">John Doe</h6>
						<span>Student President</span>
						<div class="img-icons text-center mt-2">
							<a href="#" style="font-size:26px; color:#D44136 ;"><i class="fas fa-envelope mr-2"></i></a>
							<a href="#" style="font-size:26px; color:#55ACEE "><i class="fab fa-twitter  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#4C75A3 "><i class="fab fa-linkedin  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#3B5999; "><i class="fab fa-facebook  mr-2 "></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="team-img">
						<img src="assets/img/team/team.jpg" style="width:70%; " class="rounded-circle  mx-auto d-block" alt="">
						<h6 class="pt-2">John Doe</h6>
						<span>Student President</span>
						<div class="img-icons text-center mt-2">
							<a href="#" style="font-size:26px; color:#D44136 ;"><i class="fas fa-envelope mr-2"></i></a>
							<a href="#" style="font-size:26px; color:#55ACEE "><i class="fab fa-twitter  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#4C75A3 "><i class="fab fa-linkedin  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#3B5999; "><i class="fab fa-facebook  mr-2 "></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="team-img">
						<img src="assets/img/team/team.jpg" style="width:70%; " class="rounded-circle  mx-auto d-block" alt="">
						<h6 class="pt-2">John Doe</h6>
						<span>Student President</span>
						<div class="img-icons text-center mt-2">
							<a href="#" style="font-size:26px; color:#D44136 ;"><i class="fas fa-envelope mr-2"></i></a>
							<a href="#" style="font-size:26px; color:#55ACEE "><i class="fab fa-twitter  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#4C75A3 "><i class="fab fa-linkedin  mr-2 "></i></a>
							<a href="#" style="font-size:26px; color:#3B5999; "><i class="fab fa-facebook  mr-2 "></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<?php include 'include/footer.php'; ?>
	<!-- modal for signup
  <button class="btn btn-primary" data-toggle="modal" data-target="#modal-signup">Large modal</button>
 <div class="modal fade" id="modal-signup">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Sign Up</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <span class="sr-only">Close</span>
         </button>
       </div>
       <div class="modal-body">
         <form  method="post">
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary">Save changes</button>
       </div>
     </div>
   </div>
 </div>
 -->
	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/img-select-name.js"></script>
</body>

</html>
