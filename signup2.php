<?php require_once 'include/config/config.php'; ?>
<?php loginAdminRedirect(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sign Up</title>
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
          <li class="nav-item  mr-1">
            <a class="nav-link px-3 " href="#HEADER">HOME</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link px-3 active" href="signup2.php">STUDENT</a>
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link px-3" data-toggle="modal" href="#modal-teacher">TEACHER</a>
          </li>

          <?php if (!loginAdmin() && !loginTeacher()): ?>

          <li class="nav-item mr-2">
            <a class="nav-link" data-toggle="modal" href="#modal-admin" data-toggle="tooltip" data-placement="top" title="Admin">
              <i class="fas fa-user-shield px-2"></i>
            </a>
          </li>
          <?php endif; ?>
          <!-- Dropdown -->
          <?php if (login()): ?>

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
              <?php echo $_SESSION['userName']; ?>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="users/index.php">Portal</a>
              <a class="dropdown-item " href="include/users/logout.php">Logout</a>
            </div>
          </li>
          <?php endif; ?>


          <?php if (loginTeacher()): ?>

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">
              <?php echo $_SESSION['teacherName']; ?>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="users/index.php">Portal</a>
              <a class="dropdown-item " href="teachers/include/logout-teacher.php">Logout</a>
            </div>
          </li>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
  <section id="signup" class="container setting">
    <br>
    <div class="col-md-6 mx-auto">
      <h2 class="text-center">Student</h2>
      <div class="">
        <?php
         errorMsg();
        successMsg();                ?>

      </div>
      <?php if (login()): ?>

      <div class="text-center alert alert-success">
        You are login ! <?php echo $_SESSION['userName'] ?>
      </div>
      <?php endif; ?>

      <br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs text-center " role="tablist">
        <li class="nav-item">
          <?php if (!login()): ?>

          <a class="nav-link active" data-toggle="tab" href="#register">Sign Up</a>
          <?php endif; ?>

        </li>
        <li class="nav-item">
          <?php if (!login()): ?>

          <a class="nav-link" data-toggle="tab" href="#login">Login</a>
          <?php endif; ?>

        </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <?php if (!login()): ?>
        <div id="register" class="container tab-pane active"><br>
          <h5 class="mb-2"> Student Registration </h5>
          <div class="form-setting clearfix">
            <form action="include/users/user-register.php" method="POST">
              <div class="form-group">
                <label for="name" id="name"> <span class="input-color">Name*</span> </label>
                <input type="text" name="name" id="name" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="email" id="email"> <span class="input-color">Email*</span> </label>
                <input type="email" name="email" id="email" class="form-control" value=" ">
              </div>
              <div class="form-group">
                <label for="reg" id="reg"> <span class="input-color">Reg#</span> </label>
                <input type="text" name="reg" id="reg" class="form-control" value=" ">
              </div>
              <div class="form-group">
                <label for="password" id="password"><span class="input-color"> password*</span> </label>
                <input type="password" name="password" id="password" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="password2" id="password2"><span class="input-color"> Confirm Password* </span> </label>
                <input type="password" name="password2" id="password2" class="form-control" value="">
              </div>
              <div class="from-group">
                <button type="submit" name="signupSubmit" class="btn btn-success float-right"> Sign up </button>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <?php if (!login()): ?>
        <div id="login" class="container tab-pane fade"><br>
          <h5 class="my-3"> Student Login </h5>
          <div class="form-setting clearfix">
            <form action="" method="POST">
              <?php loginUser(); ?>
              <div class="form-group">
                <label for="email" id="email"><span class="input-color"> Email* </span> </label>
                <input type="email" name="email" id="email" class="form-control" value=" ">
              </div>
              <div class="form-group">
                <label for="password" id="password"> <span class="input-color"> Password </span> </label>
                <input type="password" name="password" id="password" class="form-control" value="">
              </div>
              <div class="from-group ">
                <button type="submit" name="signinSubmit" class="btn btn-success float-right "> Login </button>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php include 'include/footer.php'; ?>
  <!-- Modal for admin -->
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
  </div><!-- /.end modal admin-->

  <!-- modal for teacher -->
  <div class="modal fade " id="modal-teacher">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h4 class="modal-title  "> Teacher</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <?php teacherLogin(); ?>
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
          <button type="submit" name="teacherLogin" class="btn btn-success">Login</button>
        </div>
      </div><!-- /.modal-content -->
      </form>
    </div><!-- /.modal-dialog -->
  </div><!-- /.end modal admin-->



  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
