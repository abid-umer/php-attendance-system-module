<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header('Location: index.php');
}

if(!isset($_GET['date'])){
    header('Location: courses.php');
}

$dateFilter = htmlentities($_GET['date']);

require 'php/database/Db.php';

$teacherID = (int) $_SESSION['teacher_id'];
?>
<?php include 'layout/top.php'; ?>
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Course Attendance</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            All the courses assigned to you</div>
          <div class="card-body">
              <div class="row mb-3">
                  <div class="col-md-8"></div>
                  <div class="col-md-2">
                      <input type="date" value="<?= $dateFilter ?>" id="date" class="form-control">
                  </div>
                  <div class="col-md-2">
                      <a href="#" onclick="setDate()" class="btn btn-block btn-primary">Set Date</a>
                  </div>
              </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>No of Roster</th>
                    <th>No of Student Registered</th>
                    <th>Present</th>
                    <th>Absent</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>No of Roster</th>
                    <th>No of Student Registered</th>
                    <th>Present</th>
                    <th>Absent</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $courseResult = mysqli_query(DB::connect(), "SELECT * FROM `course` c JOIN course_teacher ct ON c.course_id = ct.course_id WHERE ct.teacher_id = ". $teacherID);
                  while($courseRow = mysqli_fetch_assoc($courseResult)):
                  ?>
                  <tr>
                    <td><?= $courseRow['course_code'] ?></td>
                    <td><?= $courseRow['course_title'] ?></td>
                    <?php //number of roster
                    $numOfRosterR = mysqli_query(DB::connect(), "SELECT * FROM attendance_log WHERE course_id = ".$courseRow['course_id']." AND date = '".$dateFilter."' AND teacher_id = ".$teacherID." GROUP BY roster_id");
                    $numOfRoster = mysqli_num_rows($numOfRosterR);
                    ?>
                    <td><?= $numOfRoster ?></td>
                    <?php //fetching all students
                    $allStudentR = mysqli_query(DB::connect(), "SELECT * FROM attendance_log WHERE course_id = ".$courseRow['course_id']." AND date = '".$dateFilter."' AND teacher_id = ".$teacherID." GROUP BY student_id");
                    $numOfStudent = mysqli_num_rows($allStudentR);
                    ?>
                    <td><?= $numOfStudent ?></td>
                    <?php //fetching all present students
                    $presentR = mysqli_query(DB::connect(), "SELECT count(*) as present FROM attendance_log WHERE course_id = ".$courseRow['course_id']." AND date = '".$dateFilter."' AND teacher_id = ".$teacherID." AND attendance = 'Present' ");
                    $present = mysqli_fetch_assoc($presentR);
                    ?>
                    <td><?= $present['present'] ?></td>
                    <?php //fetching all present students
                    $absentR = mysqli_query(DB::connect(), "SELECT count(*) as absent FROM attendance_log WHERE course_id = ".$courseRow['course_id']." AND date = '".$dateFilter."' AND teacher_id = ".$teacherID." AND attendance = 'Absent' ");
                    $absent = mysqli_fetch_assoc($absentR);
                    ?>
                    <td><?= $absent['absent'] ?></td>
                  </tr>
                  <?php
                  endwhile;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
      <script>
          function setDate(){
              var date = $('#date').val();
              window.location = '?date='+date;
          }
      </script>
<?php include 'layout/bottom.php'; ?>