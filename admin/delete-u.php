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
$user_id = $_GET['user_id'];
if(!isset($user_id)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * from users where user_id='$user_id'") or die('Error in parsing!');
$row = mysqli_fetch_assoc($result);
if(isset($_POST['cancel'])){
header ('location:userm.php');
}
if(isset($_POST['submit'])){
$sql1 = "DELETE FROM users WHERE user_id='$user_id'";
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
                    Users's Information
                  </div>
                  <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?user_id=' . $user_id; ?>" method="post">
                      <div class="form-group">
                        <div class="alert alert-danger text-center">
                            <h4> Are you sure you want to delete this user's record? </h4>
                            <hr />
                              <i class="fa fa-warning fa-4x"></i>
                            <p>
                              <label>ID</label>
                              <label><?php echo $row['user_id']; ?></label>
                            </div>
                            <label>Username:</label>
                            <label><?php echo $row['username'];?></label>
                          </div>
                          <label>Type:</label>
                          <label><?php echo $row['type'];?></label>
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
