<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header('Location: index.php');
}

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
          <li class="breadcrumb-item active">Student Attendance</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Check students attendance in course
          <div class="card-body">
            <div class="row mb-3">
                  <div class="col-md-7"></div>
                  <div class="col-md-3">
                      <select class="form-control" id="course">
                          <?php
                          $courseResult = mysqli_query(DB::connect(), "SELECT * FROM `course` c JOIN course_teacher ct ON c.course_id = ct.course_id WHERE ct.teacher_id = ". $teacherID);
                          while($courseRow = mysqli_fetch_assoc($courseResult)):
                          ?>
                          <option value="<?= $courseRow['course_id'] ?>"><?= $courseRow['course_title'] ?></option>
                          <?php
                          endwhile;
                          ?>
                      </select>
                  </div>
                  <div class="col-md-2">
                      <a href="#" onclick="setCourse()" class="btn btn-block btn-primary">Set Course</a>
                  </div>
              </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Registration Number</th>
                    <th>Student Name</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Total</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Percentage</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>Registration Number</th>
                      <th>Student Name</th>
                      <th>Course Code</th>
                      <th>Course Title</th>
                      <th>Total</th>
                      <th>Present</th>
                      <th>Absent</th>
                      <th>Percentage</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php if(isset($_GET['course'])):
                        $course = (int) $_GET['course'];
                        $authR = mysqli_query(DB::connect(), "SELECT * FROM course_teacher WHERE teacher_id = ".$teacherID." AND course_id = ".$course);
                        if(mysqli_num_rows($authR) < 1){
                            header('Location: courses.php');
                        }
                        $studentR = mysqli_query(DB::connect(), "SELECT * FROM course_student cs JOIN student s ON cs.student_id = s.student_id JOIN course c ON cs.course_id = c.course_id WHERE cs.course_id = ".$course);
                        if(mysqli_num_rows($studentR) > 0):
                            while($student = mysqli_fetch_assoc($studentR)):
                    ?>
                    <tr>
                      <td><?= $student['student_reg_no'] ?></td>
                      <td><?= $student['student_name'] ?></td>
                      <td><?= $student['course_code'] ?></td>
                      <td><?= $student['course_title'] ?></td>
                      <?php
                      $allR = mysqli_query(DB::connect(), "SELECT * FROM `attendance_log` WHERE student_id = ".$student['student_id']." AND course_id = ".$student['course_id']." AND teacher_id = ".$teacherID);
                      $all = mysqli_num_rows($allR);
                      ?>
                      <td><?= $all ?></td>
                      <?php
                      $presentR = mysqli_query(DB::connect(), "SELECT * FROM `attendance_log` WHERE student_id = ".$student['student_id']." AND course_id = ".$student['course_id']." AND attendance = 'Present' AND teacher_id = ".$teacherID);
                      $present = mysqli_num_rows($presentR);
                      ?>
                      <td><?= $present ?></td>
                      <?php
                      $absentR = mysqli_query(DB::connect(), "SELECT * FROM `attendance_log` WHERE student_id = ".$student['student_id']." AND course_id = ".$student['course_id']." AND attendance = 'Absent' AND teacher_id = ".$teacherID);
                      $absent = mysqli_num_rows($absentR);
                      ?>
                      <td><?= $absent ?></td>
                      <?php $percentage = round(($present/$all)*100, 2) ?>
                      <td class="text-<?= ($percentage < 80)? "danger": "success"; ?>"><?= $percentage; ?>%</td>
                    </tr>
                    
                    <?php
                            endwhile;
                        endif;
                    endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Attendance System 
                <script>
                  document.write(new Date().getFullYear());
                </script></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
    <script>
        function setCourse(){
            var courseID = $("#course").val();
            window.location = "?course="+courseID;
        }
    </script>
<?php include 'layout/bottom.php'; ?>