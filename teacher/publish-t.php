<?php
session_start();
$database = "school";
$con =  new mysqli("localhost:3307","root","",$database);
if(!$con)
{
  die("Connection Error" .$con->connect_error);
}
?>
<?php
$stu_regid = $_GET['stu_regid'];
if(!isset($stu_regid)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * FROM student INNER JOIN result ON result.student_stu_regid=student.stu_regid WHERE stu_regid='$stu_regid'") or die('Error in parsing!');
$row = mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
$percentage =$_POST['percentage'];
$sql1= "UPDATE result SET percentage='$percentage' WHERE student_stu_regid='$stu_regid'";
$result=mysqli_query($con,$sql1);
header ('location:publish.php');
}
else{
echo "Error!";
}
?>
<?php
include 'header.php';
?>                                           <!-- /. NAV TOP  -->
<?php
include 'navbar.php';
?>
        <!-- /. NAV SIDE  -->
  <div id="page-wrapper">
    <div id="page-inner">
      <div>
        <div class="col-md-12 col-sm-6 col-xs-12" style="float: left;">
          <div class="panel panel-danger">
            <div class="panel-heading">
              Student's Information
            </div>
            <div class="panel-body">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?stu_regid=' . $stu_regid; ?>" method="post">
                <div class="form-group">
                  <label>Student ID</label>
                  <?php echo $row['stu_regid']; ?>

                  <div class="form-group">
                    <label>First Name</label>
                    <?php echo $row['stu_fname']; ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <?php echo $row['stu_lname']; ?>
                </div>
                <div class="form-group">
                  <label>Percentage</label>
                  <input class="form-control" type="number" name="percentage">
                </div>
                    <div class="form-group">
                  <button type="submit" class="btn btn-info col-md-12" name="submit">Submit</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<?php
include 'footer.php';
?>
