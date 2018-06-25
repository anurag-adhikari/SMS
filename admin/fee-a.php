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
$grade_g_id = $_GET['grade_g_id'];
if(!isset($grade_g_id)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * FROM fee INNER JOIN grade ON fee.grade_g_id=grade.g_id WHERE grade_g_id='$grade_g_id'") or die('Error in parsing!');
$row = mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
$fee =$_POST['fee'];
$sql1= "UPDATE fee SET fee='$fee' WHERE grade_g_id='$grade_g_id'";
$result=mysqli_query($con,$sql1);
header ('location:fee.php');
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
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?grade_g_id=' . $grade_g_id; ?>" method="post">
                <div class="form-group">
                  <label>Gade</label>
                  <?php echo $row['grade_g_id']; ?>
                <div class="form-group">
                  <label>Fees</label>
                  <input class="form-control" type="number" name="fee">
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
