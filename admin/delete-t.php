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
$tea_regid = $_GET['tea_regid'];
if(!isset($tea_regid)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * from teacher where tea_regid='$tea_regid'") or die('Error in parsing!');
$row = mysqli_fetch_assoc($result);
if(isset($_POST['cancel'])){
header ('location:a-m-teacher.php');
}
if(isset($_POST['submit'])){
$sql1 = "DELETE FROM teacher WHERE tea_regid='$tea_regid'";
//echo $sql1;
$hi = mysqli_error($con);
$result1=mysqli_query($con,$sql1);
if(!$result1){
  echo ('Failed!!!');
  echo (mysqli_error($con));
}
else {
  header ('Location: a-m-teacher.php');
}

}
?>
<?php
include 'header.php';
?>
                                           <!-- /. NAV TOP  -->
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
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?tea_regid=' . $tea_regid; ?>" method="post">
                      <div class="form-group">
                        <div class="alert alert-danger text-center">
                            <h4> Are you sure you want to delete this teacher's record? </h4>
                            <hr />
                              <i class="fa fa-warning fa-4x"></i>
                            <p>
                              <label>ID</label>
                              <label><?php echo $row['tea_regid']; ?></label>
                            </div>
                            <label>Teacher's Name:</label>
                            <label><?php echo $row['tea_fname'];echo " ";echo $row['tea_mname'];echo " "; echo $row['tea_lname'];?></label>
                          </div>
                          <label>Grade:</label>
                          <label><?php echo $row['grade_g_id'];?></label>
                          <br>
                          <label>Subject</label>
                          <label><?php echo $row['subject'];?></label>
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
