<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header('Location: index.php');
}

require 'php/database/Db.php';

$teacherID = (int) $_SESSION['teacher_id'];

if(isset($_GET['course_id'])){
    $rosterID       = uniqid();
    $course_id      = (int) $_GET['course_id'];
    $date           = date('Y-m-d');
    $sq = "INSERT INTO `roster`(`r_id`, `roster_code`, `course_id`, `teacher_id`, `date`, `active`) VALUES (NULL, '".$rosterID."', ".$course_id.", ".$teacherID.", '".$date."', 1)";

    
    if(mysqli_query(DB::connect(), $sq)){
        echo "<script>alert('Roster Created.');</script>";
    }else{
        echo "<script>alert('Error.');</script>";
    }
}


?>
<?php include 'layout/top.php'; ?>
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            All the courses assigned to you</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Action</th>
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
                    <td><a href="?course_id=<?= $courseRow['course_id'] ?>" class="btn btn-sm btn-primary">Generate Roaster</a></td>
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

<?php include 'layout/bottom.php'; ?>