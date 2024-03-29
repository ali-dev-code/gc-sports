<?php require_once 'include/config/config.php'; ?>
<?php confirmLogin(); ?>
<?php
  if (isset($_GET['id'])) {
      $sportId = $_GET['id'];
      $query = "SELECT * FROM sports WHERE id = '$sportId' " ;
      $execute = mysqli_query($Connection, $query);
      $row = mysqli_fetch_array($execute);
      $sportName = $row['name'];
  }
?>
<?php

if (isset($_POST['submit'])) {
    $sportId;
    $teachertId = $_POST['teacher_id'];
    $userId = $_SESSION['userId'];
    $studenName = $_SESSION['userName'];
    $studenEmail = $_SESSION['userEmail'];
    $teacher = $_POST['teacherName'];
    $sportName;
    $checkAlreadyTeacher = " SELECT * FROM teacher_enroll
    WHERE user_id ='$userId'  AND sport_id = '$sportId'  ";
    // see if user is registed already with the teacher and try to register again
    $resultcheckAlreadyTeacher = mysqli_query($Connection, $checkAlreadyTeacher);
    $chaeckTecherCount = " SELECT * FROM teacher_enroll WHERE user_id =  $userId "; // see if studnt registration limit increase (2)
    $resultCheckTeacherCount = mysqli_query($Connection, $chaeckTecherCount);
    if (mysqli_num_rows($resultcheckAlreadyTeacher) == 1) {
        $_SESSION['error'] = ' Your are already enroll with this sport or teacher  ';
    } elseif (mysqli_num_rows($resultCheckTeacherCount) == 2) {
        $_SESSION['error'] = ' You can only enroll two Coach at one time.  ';
    } else {
        $query = " INSERT INTO teacher_enroll(student_name,student_email,teacher,sport,teacher_id, user_id,sport_id)
  VALUES('$studenName','$studenEmail','$teacher','$sportName','$teachertId','$userId','$sportId')   ";
        $execute = mysqli_query($Connection, $query);
        if ($execute) {
            $_SESSION['success'] = ' You are successfully enrolled with this coach  ';
        } else {
            die('query failed' . mysqli_error($Connection));
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Teache Enroll </title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Custom Fonts font awesome -->
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="assets/css/custom.css?v=<?php echo time(); ?>">
  <style>
  body {
    background-color: #F9F9F9;
  }

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <!-- Brand -->
    <div class="container">
      <a class="navbar-brand" style="font-family:cursive;" href="#">Gc SP
        <img src="assets/img/logo/main-logo-2.png" alt="Logo" style="width:40px; "> RTS
      </a>
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto text-center">
          <li class="nav-item mr-3">
            <a class="nav-link  " style="border-radius:0px;" href="index.php">Home</a>
          </li>
          <!-- Dropdown -->
          <?php if (login()): ?>

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
              <?php echo $_SESSION['userName']; ?>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="users/index.php">Portal</a>
              <a class="dropdown-item " href="users/include/user-logout.php">Logout</a>
            </div>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--  carousal  -->

  <div class="carousel">
    <?php

        $viewQuery = "SELECT * FROM sports WHERE id='$sportId'";
        $execute = mysqli_query($Connection, $viewQuery);
        $row = mysqli_fetch_array($execute)
        ?>

    <img src="admin/upload/sports/<?php echo $row['image']; ?>" class="img-fluid"
     style=" -webkit-filter: brightness(20%);
              filter:brightness(50%);">
    <div class="carousel-caption slideCon">
      <h3 class="font-weight-bold text-light ">Enroll Your Desired Sport</h3>
      <p class="font-weight-bold text-light  pt-2"><?php echo $row['name'];?></p>
    </div>
  </div>

  <section class="container setting">
    <div class="container">
      <div class="my-4">
        <?php  errorMsg(); successMsg();  ?>
      </div>
      <div class="heading">
        <h1 class="text-center"><span> COACHES </span></h1>
      </div>
      <div class="row">
        <?php
                $sportIdFromUrl = $_GET['id'];
                $query = " SELECT * FROM teachers WHERE sport_id = '$sportIdFromUrl' ";
                $execute = mysqli_query($Connection, $query);
                while ($rows = mysqli_fetch_array($execute)) {
                    ?>
        <div class="col-md-3">
          <div class="card crd my-2" style="">
            <img class="card-img-top img-fluid" src="admin/upload/teachers/<?php echo $rows['image']; ?>" alt="Card image" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $rows['name']; ?> </h5>
              <p class="card-text"> <span class="font-weight-bold"> Coach
                </span> <br /> <span class="text-muted"> <?php echo $rows['details']; ?></span>
              </p>
              <p class="card-text"> <span class="font-weight-bold"> Contact
                </span> <br /> <span class="text-muted"> <i class="fa fa-phone py-2" aria-hidden="true"></i> <?php echo $rows['phone']; ?></span><br>
                 <span class="text-muted"> <i class="fa fa-envelope" aria-hidden="true"></i>  <?php echo $rows['email'] ?></span>
              </p>
              <form action="sport-register.php?id=<?php  echo $sportIdFromUrl; ?>" method="post">
                <input type="hidden" name="teacher_id" value=" <?php  echo $rows['id']   ?> ">
                <input type="hidden" name="teacherName" value="<?php  echo $rows['name']  ?>">
                <button type="submit" name="submit" id="" class="btn btn-success btn-lg btn-block btn-sm "> Enroll </button>
              </form>
            </div>
          </div>
        </div>
        <?php
                }  ?>
      </div>
    </div>
  </section>
  <?php include 'include/footer.php'; ?>

  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
