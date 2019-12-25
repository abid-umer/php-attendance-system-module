<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header('Location: index.php');
}

require 'php/database/Db.php';

$teacherID = (int) $_SESSION['teacher_id'];

if(!isset($_GET['roster'])){
    header('Location: roster.php');
}

$roster = htmlentities($_GET['roster']);
$allStudents = [];

//get roster details
$getRosterResult = mysqli_query(DB::connect(), "SELECT * FROM `roster` WHERE roster_code = '$roster'");
$getRoster = mysqli_fetch_assoc($getRosterResult);
$course = $getRoster['course_id'];

$getStudentR = mysqli_query(DB::connect(), "SELECT * FROM course_student cs JOIN student s ON cs.student_id = s.student_id WHERE cs.course_id = $course");

?>
<?php include 'layout/top.php'; ?>
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Attendance</li>
        </ol>

        <!-- DataTables Example -->
        <form method="post" action="">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Date: <b><?= $getRoster['date'] ?></b></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Present</th>
                    <th>Registration Number</th>
                    <th>Student Name</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>Present</th>
                      <th>Registration Number</th>
                      <th>Student Name</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php
                    while($getStudent = mysqli_fetch_assoc($getStudentR)):
                    ?>
                    <tr>
                      <td><input type="checkbox" value="<?= $allStudents[] = $getStudent['student_id'] ?>" name="attendance[]"></td>
                      <td><?= $getStudent['student_reg_no'] ?></td>
                      <td><?= $getStudent['student_name'] ?></td>
                    </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="text-right p-4"><button class="btn btn-primary" type="submit" name="mark">Submit Attendance</button></div>
        </div>
      </form>
      </div>
      <!-- /.container-fluid -->
      
<?php

if(isset($_POST['mark'])){
    $presentStudent = $_POST['attendance'];
    $date = date('Y-m-d');
    
    foreach($allStudents as $student){
        $attend = (in_array($student, $presentStudent))? "Present": "Absent";
        $sql = "INSERT INTO `attendance_log`(`a_id`, `roster_id`, `student_id`, `course_id`, `teacher_id`, `attendance`, `date`) 
        VALUES (NULL, '".$roster."', '".$student."', '".$course."', '".$teacherID."','".$attend."','".$date."')";
        if(mysqli_query(DB::connect(), $sql)){
            mysqli_query(DB::connect(), "UPDATE roster SET active = 0 WHERE roster_code = '$roster'");
            header('Location: roaster.php');
        }
    }
    echo "<script>alert('Cannot mark attendance.');</script>";
}

?>
<?php include 'layout/bottom.php'; ?>