<?php
session_start();
if(isset($_POST['login'])){

  require 'php/database/Db.php';
  
  $email    = htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);

  $result = mysqli_query(DB::connect(), "SELECT * FROM `teacher` WHERE `email` = '".$email."' AND `password` = '".$password."'");

  if( mysqli_num_rows($result) === 1 ) 
  {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['teacher_id'] = $row['teacher_id'];
    header('Location: dashboard.php');
  }
  else
  {
    echo "<script>alert('Wrong username or password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Muhammad Umer Sheikh">

  <title>Teacher Portal - Login :: Attendance System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Teacher Login :: Attendance System</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login" name="login">
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
