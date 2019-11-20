<?php require_once 'include/config/config.php'; ?>
<?php confirmLogin(); ?>


<?php

if (isset($_GET['id'])) {
    $TeacherIDFromURL = $_GET['id']; // yahan pr hme ne id li hai teacher ki jo foreign key hai

    $query = "SELECT * FROM teachers WHERE id='$TeacherIDFromURL'";
    $execute = mysqli_query($Connection, $query);
    if (mysqli_num_rows($execute) == 1) {
        $row = mysqli_fetch_array($execute);
        $teacherName = $row['name'];
        $sportId = $row['sport_id'];
    }
} else { // ager set ni hai id
}

if (isset($_POST['TeacherEnrollSubmit'])) {
    $userId = $_SESSION['userId']; // foregn key
    $studenName = mysqli_real_escape_string($Connection, $_POST['name']);
    $studenEmail = mysqli_real_escape_string($Connection, $_POST['email']);
    $teacher = mysqli_real_escape_string($Connection, $_POST['teacher']);
    $sport = mysqli_real_escape_string($Connection, $_POST['sport']);

    $checkAlreadyTeacher = " SELECT * FROM teacher_enroll
     WHERE user_id ='$userId' AND sport_id = '$sportId'  ";
    // see if user is registed already with the teacher and try to register again
    $resultcheckAlreadyTeacher = mysqli_query($Connection, $checkAlreadyTeacher);

    $chaeckTecherCount = " SELECT * FROM teacher_enroll WHERE user_id =  $userId "; // see if studnt registration limit increase (2)
    $resultCheckTeacherCount = mysqli_query($Connection, $chaeckTecherCount);

    if (mysqli_num_rows($resultcheckAlreadyTeacher) == 1) {
        $_SESSION['error'] = ' Your are already enroll with this sport or coach  ';
    } elseif (mysqli_num_rows($resultCheckTeacherCount) == 2) {
        $_SESSION['error'] = ' Your can only enroll two Coach at one time.  ';
    } else {
        $query = " INSERT INTO teacher_enroll(student_name,student_email,teacher,sport,teacher_id, user_id,sport_id)
  VALUES('$studenName','$studenEmail','$teacher','$sport','$TeacherIDFromURL','$userId','$sportId')   ";
        $execute = mysqli_query($Connection, $query);
        if ($execute) {
            $_SESSION['success'] = ' You are successfully enrolled with this coach ';
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

      <a class="navbar-brand" style="font-family:cursive;" href="#">Gc SP<img src="assets/img/logo/main-logo-2.png" alt="Logo" style="width:40px; "> RTS </a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto text-center">

          <li class="nav-item mr-3">
            <a class="nav-link  " data-toggle="modal" data-target="#modal-admin" style="border-radius:0px;" href="">Admin</a>
          </li>

          <li class="nav-item mr-3">
            <a class="nav-link  " style="border-radius:0px;" href="users/index.php">User</a>
          </li>

          <li class="nav-item mr-3">
            <a class="nav-link  " style="border-radius:0px;" href="index.php">Home</a>
          </li>




        </ul>
      </div>
    </div>
  </nav>

  <section id="signup" class="container setting">

    <div class="">
      <?php successMsg();
      errorMsg(); ?>
    </div>

    <br>

    <div class="row">


      <div class="col-md-8 ">

        <div class="details">
          <?php

          $viewTeacher = " SELECT * FROM teachers WHERE id = '$TeacherIDFromURL'  ";
          $executeViewTeacher = mysqli_query($Connection, $viewTeacher);
          $diplayTeacher = mysqli_fetch_array($executeViewTeacher);
          ?>

          <div class="card my-2" style="width:300px;">
            <img class="card-img-top img-fluid" src="admin/upload/teachers/<?php echo $diplayTeacher['image']; ?>" alt="Card image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $diplayTeacher['name'];  ?></h5>
              <p class="card-text"> <span class="font-weight-bold"> Coach </span> <br /> <span class="text-muted"> <?php echo $diplayTeacher['details']; ?></span> </p>
              <p class="card-text"> <span class="font-weight-bold"> Contact </span> <br /> <span class="text-muted"><?php echo $diplayTeacher['phone']; ?></span> </p>

            </div>
          </div>





        </div>
      </div>

      <div class="col-md-4">
        <div class="form-setting clearfix">
          <h5 class="text-center  my-3 ">Enroll Coach</h5>
          <form action="teacher-enroll.php?id=<?php echo $TeacherIDFromURL ?>" method="POST">
            <div class="form-group">
              <label for="name" id="name"> <span class="input-color">Name*</span> </label>
              <input type="text" name="name" id="name" class="form-control" readonly value="<?php echo $_SESSION['userName'] ?>">
            </div>

            <div class="form-group">
              <label for="email" id="email"> <span class="input-color">Email*</span> </label>
              <input type="email" name="email" id="email" class="form-control" readonly value=" <?php echo   $_SESSION['userEmail']; ?> ">
            </div>

            <div class="form-group">
              <label for="reg" id="teacher"> <span class="input-color">Teacher*</span> </label>
              <input type="text" name="teacher" id="teacher" class="form-control" readonly value="<?php echo $teacherName; ?> ">
            </div>
            <div class="form-group">
              <label for="reg" id="sport"> <span class="input-color">Sport*</span> </label>
              <?php
              $queryForSportName = "SELECT * FROM sports WHERE id = '$sportId' ";
              $executeForSportName = mysqli_query($Connection, $queryForSportName);
              $sportName = mysqli_fetch_array($executeForSportName);

              ?>
              <input type="text" name="sport" id="sport" class="form-control" readonly value="<?php echo $sportName['name']; ?> ">
            </div>



            <div class="from-group">

              <button type="submit" name="TeacherEnrollSubmit" class="btn btn-success float-right my-2"> Enroll </button>

            </div>


          </form>

        </div>
      </div>

    </div>
  </section>

  <?php include 'include/footer.php'; ?>



  <div class="modal fade " id="modal-admin">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header ">

          <h4 class="modal-title  "> Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <?php adminLogin(); ?>
            <div class="form-group">

              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="">

            </div>
            <div class="form-group">

              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="">

            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" name="adminLogin" class="btn btn-success">Login</button>
        </div>
      </div><!-- /.modal-content -->
      </form>
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->






  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


</body>

</html>