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
$tea_regid = $_GET['tea_regid'];
if(!isset($tea_regid)) {
  die('Error, No id!');
}
$result = mysqli_query($con, "SELECT * from teacher where tea_regid='$tea_regid'") or die('Error in parsing!');
$row = mysqli_fetch_assoc($result);
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
        <div class="col-md-6 col-sm-12 col-xs-12" style="float: left;">
          <div class="panel panel-danger">
            <div class="panel-heading">
              Teacher's Information
            </div>
          </div>
          <table class="table table-striped">
            <th>Teacher ID</th>
            <td align="right"><?php echo $row['tea_regid']; ?></td>
          </table>
                <table class="table table-striped">
                  <th>First Name</th>
                  <td align="right"><?php echo $row['tea_fname']; ?></td>
                </table>
                <table class="table table-striped">
                  <th>Middle Name</th>
                  <td align="right"><?php echo $row['tea_mname'];?></td>
                </table>
                <table class="table table-striped">
                  <th>Last Name</th>
                  <td align="right"><?php echo $row['tea_lname']; ?></td>
                </table>
                <table class="table table-striped">
                    <th>Gender</th>
                    <td align="right"><?php echo $row['tea_gender']; ?></td>
                    </table>
                      <table class="table table-striped">
                      <th>Grade</th>
                    <td align="right"><?php echo $row['grade_g_id']; ?></td>
                    </table>
                    <table class="table table-striped">
                    <th>Address</th>
                    <td align="right"><?php echo $row['tea_add']; ?></td>
                  <table class="table table-striped">
                  <th>Subject</th>
                  <td align="right"><?php echo $row['subject']; ?></td>
                  </table>
                  <table class="table table-striped">
                  <th>Contact number</th>
                <td align="right"><?php echo $row['tea_cont']; ?></td>
                </table>
                <table class="table table-striped">
                  <th>Email</th>
                  <td align="right"><?php echo $row['tea_email']; ?></td>
                  </table>
                  <table class="table table-striped">
            </div>
          </div>
        </div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<?php
include 'footer.php';
?>
