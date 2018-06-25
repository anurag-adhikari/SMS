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
$notice_id = $_GET['notice_id'];
if(!isset($notice_id)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * FROM notice WHERE notice_id='$notice_id'");
$row = mysqli_fetch_assoc($result);
if(isset($_POST['cancel'])){
header ('location:a-m-notice.php');
}
if(isset($_POST['submit'])){
$sql1 = "DELETE FROM `notice` WHERE notice_id='$notice_id'";
$result1=mysqli_query($con,$sql1);
$hi = mysqli_error($con);
if(!$result1){
echo ('failed');
}
else {
header ('Location: a-notice.php');
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
            Delete Notification
            </div>
            <div class="panel-body">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?notice_id=' . $notice_id; ?>" method="post">
                <div class="form-group">
                  <div class="alert alert-danger text-center">
                      <h4> Are you sure you want to delete this Notice?</h4>
                      <hr />
                        <i class="fa fa-warning fa-4x"></i>
                      <p>
                        <label>ID</label>
                        <label><?php echo $row['notice_id']; ?></label>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <?php echo $row['notice_id'];?>
                              <br>
                                <?php echo $row['notice_date'] ?>
                          </div>
                          <div class="panel-heading">
                            <p class="lead"><?php echo $row['subject'] ?></p>
                          </div>
                          <div class="panel-body">
                              <p>
                                <?php echo $row['description']; ?>
                              </p>
                              <br>
                              <p class="text-left"><?php echo $row['n_post_by'];?></p>
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
