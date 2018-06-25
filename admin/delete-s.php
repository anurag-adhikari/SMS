<?php
session_start();
$database = "school";
$con =  new mysqli("localhost:3306","root","",$database);
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
$result = mysqli_query($con, "SELECT * from student as S inner join guardian as G inner join guar_stu as GS on S.stu_regid = GS.student_stu_regid where stu_regid='$stu_regid'") or die('Error in parsing!');
$row = mysqli_fetch_assoc($result);
if(isset($_POST['cancel'])){
header ('location:a-m-student.php');
}
if(isset($_POST['submit'])){
$temp1 = substr($stu_regid,1);
$guar_id1= "G{$temp1}";
$sql2 = "DELETE FROM `student` WHERE stu_regid='$stu_regid'";
$sql3 = "DELETE FROM `guar_stu` WHERE student_stu_regid='$stu_regid'";
$sql4 = "DELETE FROM `result` WHERE student_stu_regid='$stu_regid'";
$sql1= "DELETE FROM `guardian` WHERE guar_regid='$guar_id1'";
$result1=mysqli_query($con,$sql1);
$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);
$hi = mysqli_error($con);
if(!$result1 && !$result2 && !$result3){
  echo ('failed');
}
else {
header ('Location: a-m-student.php');
}
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
                  <div class="alert alert-danger text-center">
                      <h4> Are you sure you want to delete this student's record? </h4>
                      <hr />
                        <i class="fa fa-warning fa-4x"></i>
                      <p>
                        <label>ID</label>
                        <label><?php echo $row['stu_regid']; ?></label>
                      </div>
                      <label>Student's Name:</label>
                      <label><?php echo $row['stu_fname'];echo " ";echo $row['stu_mname'];echo " "; echo $row['stu_lname'];?></label>
                    </div>
                    <label>Grade:</label>
                    <label><?php echo $row['grade_g_id'];?></label>
                    <br>
                    <label>Guardian's Name:</label>
                    <label><?php echo $row['guar_fname'];echo " ";echo $row['guar_mname'];echo " "; echo $row['guar_lname'];?></label>
                  </div>

                    </p>
                      <hr />
                      <div class="form-group">
                       <button type="submit" class="btn btn-danger col-md-6" name="submit">Yes</button>
                     </div>
                     <div class="form-group">
                <button class="btn btn-success col-md-6" name="cancel">No</button>
                    </div>
                </div class="form-group">
              </form>
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
