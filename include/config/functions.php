<?php
// helper functions
// for Redirect_to other page
function Redirect_to($New_Location)
{
    header("Location:  {$New_Location} ");
    exit;
}

function errorMsg()
{
    if (isset($_SESSION['error'])) {
        $Output = "<div class='alert alert-danger alert-dismissible fade show '>";
        $Output .= htmlentities($_SESSION['error']);
        $Output .= "<button type='button'class='close' data-dismiss='alert' aria-label='Close'>";
        $Output .= "<span aria-hidden='true'>&times;</span>";
        $Output .= '</div>';

        echo $Output;
        unset($_SESSION['error']);
    }
}
function successMsg()
{
    if (isset($_SESSION['success'])) {
        $Output = "<div class='alert alert-success alert-dismissible fade show '>";
        $Output .= htmlentities($_SESSION['success']);
        $Output .= "<button type='button'class='close' data-dismiss='alert' aria-label='Close'>";
        $Output .= "<span aria-hidden='true'>&times;</span>";
        $Output .= '</div>';

        echo $Output;
        unset($_SESSION['success']);
    }
}

// check if emqil is already existed
function emailExist($email)
{
    global $Connection;
    $sql = " SELECT id from users WHERE email = '$email' ";
    $execute = mysqli_query($Connection, $sql);
    if (mysqli_num_rows($execute) == 1) {
        return true;
    } else {
        return false;
    }
}

// loginUser function

function loginUser()
{
    global $Connection;
    if (isset($_POST['signinSubmit'])) {
        $email = mysqli_real_escape_string($Connection, $_POST['email']);
        $password = mysqli_real_escape_string($Connection, $_POST['password']);

        $sql = " SELECT * FROM users WHERE email = '$email' AND password = '$password' AND status = '1' ";
        $execute = mysqli_query($Connection, $sql);

        if (mysqli_num_rows($execute) == 0) {
            $_SESSION['error'] = ' your credentials do not match our records.';
            Redirect_to('signup2.php');
        } else {
            $row = mysqli_fetch_assoc($execute);
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userName'] = $row['name'];
            $_SESSION['userEmail'] = $row['email'];
            $_SESSION['success'] = " Your are login  {$_SESSION['userName']} ";
            Redirect_to('index.php');
        }
    }
} // end of login

//if user login

function login()
{
    if (isset($_SESSION['userId'])) {
        return true;
    }
}

// Confirm_Login function

function confirmLogin()
{
    if (!login()) {
        $_SESSION['error'] = ' You must login first. ';
        Redirect_to('signup2.php');
    }
}

////////////////**********Admin functions***********///////////////////////

// admin login

function adminLogin()
{
    global $Connection;
    if (isset($_POST['adminLogin'])) {
        $email = mysqli_real_escape_string($Connection, $_POST['email']);
        $password = mysqli_real_escape_string($Connection, $_POST['password']);

        $query = " SELECT * FROM admins WHERE email = '$email' AND password = '$password' ";
        $execute = mysqli_query($Connection, $query);

        if (mysqli_num_rows($execute) == 1) {
            $row = mysqli_fetch_array($execute);
            $_SESSION['adminId'] = $row['id'];
            $_SESSION['adminName'] = $row['name'];
            $_SESSION['adminEmail'] = $row['eamil'];

            $_SESSION['success'] = " Welcome Back!  {$_SESSION['adminName']} ";
            Redirect_to('admin/index.php');
        } else {
            return false;
        }
    }
} // end of function

function loginAdmin()
{
    if (isset($_SESSION['adminId'])) {
        return true;
    }
}

function confirmLoginAdmin()
{
    if (!loginAdmin()) {
        $_SESSION['error'] = ' You must login first. ';
        Redirect_to('../signup2.php');
    }
}

// if admin is login and try to visit login page

function loginAdminRedirect()
{
    if (isset($_SESSION['adminId'])) {
        Redirect_to('admin');
    }
}

// ******** Teacher Login    *****   //

function teacherLogin()
{
    global $Connection;
    if (isset($_POST['teacherLogin'])) {
        $email = mysqli_real_escape_string($Connection, $_POST['email']);
        $password = mysqli_real_escape_string($Connection, $_POST['password']);

        $query = " SELECT * FROM teachers WHERE email = '$email' AND password = '$password' ";
        $execute = mysqli_query($Connection, $query);

        if (mysqli_num_rows($execute) == 1) {
            $row = mysqli_fetch_array($execute);
            $_SESSION['teacherId'] = $row['id'];
            $_SESSION['teacherName'] = $row['name'];
            $_SESSION['teacherEmail'] = $row['email'];
            $_SESSION['teacherImage'] = $row['image'];
            $_SESSION['teacherDetails'] = $row['details'];
            $_SESSION['teacherPhone'] = $row['phone'];
            $_SESSION['success'] = " Welcome Back!  {$_SESSION['teacherName']} ";
            Redirect_to('teachers/index.php');
        } else {
            return false;
        }
    }
}

function loginTeacher()
{
    if (isset($_SESSION['teacherId'])) {
        return true;
    }
}

function confirmLoginTeacher()
{
    if (!loginTeacher()) {
        $_SESSION['error'] = ' You must login first. ';
        Redirect_to('../signup2.php');
    }
}

// if teacher is login and try to visit login page

function loginTeacherRedirect()
{
    if (isset($_SESSION['teacherId'])) {
        Redirect_to('teachers');
    }
}
