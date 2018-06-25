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
$result = mysqli_query($con, "SELECT * from student as S inner join guardian as G inner join guar_stu as GS on S.stu_regid = GS.student_stu_regid where stu_regid='$stu_regid'") or die('Error in parsing!');
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
      <div>
        <div class="col-md-6 col-sm-12 col-xs-12" style="float: left;">
          <div class="panel panel-danger">
            <div class="panel-heading">
              Student's Information
            </div>
          </div>
          <table class="table table-striped">
            <th>Student ID</th>
            <td align="right"><?php echo $row['stu_regid']; ?></td>
          </table>
                <table class="table table-striped">
                  <th>First Name</th>
                  <td align="right"><?php echo $row['stu_fname']; ?></td>
                </table>
                <table class="table table-striped">
                  <th>Middle Name</th>
                  <td align="right"><?php echo $row['stu_mname'];?></td>
                </table>
                <table class="table table-striped">
                  <th>Last Name</th>
                  <td align="right"><?php echo $row['stu_lname']; ?></td>
                </table>
                <table class="table table-striped">
                    <th>Gender</th>
                    <td align="right"><?php echo $row['stu_gender']; ?></td>
                  </table>
                      <table class="table table-striped">
                      <th>Grade</th>
                    <td align="right"><?php echo $row['grade_g_id']; ?></td>
                    </table>
                    <table class="table table-striped">
                    <th>Address</th>
                    <td align="right"><?php echo $row['stu_add']; ?></td>
                    </table>
                    <table class="table table-striped">
                    <th>Date Of Birth</th>
                  <td align="right"><?php echo $row['stu_dob']; ?></td>
                </div>
              </table>

                <div class="col-md-12 col-sm-6 col-xs-12" style="float: left;">
<div class="panel-success">
<div class="panel-heading">
  Guardian's Information
</div>
</div>
<br>
                  <table class="table table-striped">
                  <th>First Name</th>
                  <td align="right"><?php echo $row['guar_fname']; ?></td>
                  </table>
                  <table class="table table-striped">
                  <th>Middle Name</label>
                  <td align="right"><?php echo $row['guar_mname']; ?></td>
                  </table>
                  <table class="table table-striped">
                  <th>Last Name</th>
                  <td align="right"><?php echo $row['guar_lname']; ?></td>
                  </table>
                  <table class="table table-striped">
                  <th>Address</th>
                  <td align="right"><?php echo $row['guar_add']; ?></td>
                  </table>
                  <table class="table table-striped">
                  <th>Contact number</th>
                <td align="right"><?php echo $row['guar_cont']; ?></td>
                </table>
                <table class="table table-striped">
                  <th>Email</th>
                  <td align="right"><?php echo $row['guar_email']; ?></td>
                  </table>
                  <table class="table table-striped">
                  <th>Relation</th>
                  <td align="right"><?php echo $row['relation']; ?> </td>
                  </table>
              </form>
            </div>
          </div>
        </div>

      </div>

<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<?php
include 'footer.php';
?>
