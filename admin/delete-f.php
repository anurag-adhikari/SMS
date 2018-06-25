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
$f_id = $_GET['f_id'];
if(!isset($f_id)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * FROM feedback WHERE f_id='$f_id'");
$row = mysqli_fetch_assoc($result);
if(isset($_POST['cancel'])){
header ('location:v-feedback.php');
}
if(isset($_POST['submit'])){
$sql1 = "DELETE FROM `feedback` WHERE f_id='$f_id'";
$result1=mysqli_query($con,$sql1);
$hi = mysqli_error($con);
if(!$result1){
  echo ('failed');
}
else {
header ('Location: v-feedback.php');
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
            Delete Feedback
            </div>
            <div class="panel-body">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?f_id=' . $f_id; ?>" method="post">
                <div class="form-group">
                  <div class="alert alert-danger text-center">
                      <h4> Are you sure you want to delete this Feedback?</h4>
                        <i class="fa fa-warning fa-4x"></i>
                      <p>
                        <label>ID</label>
                        <label><?php echo $row['f_id']; ?></label>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <?php echo $row['f_id'];?>
                              <br>
                                <?php echo $row['f_time'] ?>
                          </div>
                          <div class="panel-heading">
                            <p class="lead"><?php echo $row['f_name'] ?></p>
                          </div>
                          <div class="panel-body">
                              <p>
                                <?php echo $row['f_comment']; ?>
                              </p>
                              <br>
                              <p class="text-left"><?php echo $row['f_email'];?></p>
                          </div>
                      </div>
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
