<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header('Location: index.php');
}

require 'php/database/Db.php';

$teacherID = (int) $_SESSION['teacher_id'];

$today = date('Y-m-d');

//check assigned course
$courseResult = mysqli_query(DB::connect(), "SELECT * FROM `course_teacher` WHERE teacher_id = ".$teacherID);
$numOfCourses = mysqli_num_rows($courseResult);

//check todays roaster
$roasterResult = mysqli_query(DB::connect(), "SELECT * FROM `roster` WHERE `teacher_id` = ".$teacherID." AND `date` = '".$today."'");
$numOfRoasters = mysqli_num_rows($roasterResult);

//check todays pending roaster
$pendingRoasterResult = mysqli_query(DB::connect(), "SELECT * FROM `roster` WHERE `teacher_id` = ".$teacherID." AND `date` = '".$today."' AND active = 1");
$numOfPendingRoasters = mysqli_num_rows($pendingRoasterResult);

//check students
$studentResult = mysqli_query(DB::connect(), "SELECT * FROM `course_teacher` ct JOIN course c ON c.course_id = ct.course_id JOIN course_student cs ON c.course_id = cs.course_id WHERE ct.teacher_id = ".$teacherID);
$numOfStudent = mysqli_num_rows($studentResult);
?>

<?php include 'layout/top.php'; ?>
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?= $numOfCourses ?> Courses assigned!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="courses.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?= $numOfRoasters ?> Roasters created!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="roaster.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?= $numOfPendingRoasters ?> Pending roasters!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="roaster.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><?= $numOfStudent ?> students enrolled!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="courses.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
<?php include 'layout/bottom.php'; ?>