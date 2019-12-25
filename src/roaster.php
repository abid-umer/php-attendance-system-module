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
          <li class="breadcrumb-item active">Roaster</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Today's Roasters for Attendance</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $courseResult = mysqli_query(DB::connect(), "SELECT * FROM roster r JOIN course c ON r.course_id = c.course_id WHERE r.teacher_id = ". $teacherID." AND active = 1");
                  while($courseRow = mysqli_fetch_assoc($courseResult)):
                  ?>
                    <tr>
                      <td><?= $courseRow['course_code'] ?></td>
                      <td><?= $courseRow['course_title'] ?></td>
                      <td><?= $courseRow['date'] ?></td>
                      <td><a href="attendance.php?roster=<?= $courseRow['roster_code'] ?>" class="btn btn-primary btn-sm">Mark Attendance</a></td>
                    </tr>
                  <?php
                  endwhile;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">All the old roasters are hidden</div>
        </div>

      </div>
      <!-- /.container-fluid -->
<?php include 'layout/bottom.php'; ?>