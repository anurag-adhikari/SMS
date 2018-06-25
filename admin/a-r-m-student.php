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
if(isset($_POST['submit'])){
$stu_fname =$_POST['stu_fname'];
$stu_mname =  $_POST['stu_mname'];
$stu_lname =  $_POST['stu_lname'];
$stu_gender =  $_POST['stu_gender'];
$stu_dob =  $_POST['stu_dob'];
$stu_add =  $_POST['stu_add'];
$grade_g_id = $_POST['grade_g_id'];
$guar_fname =  $_POST['guar_fname'];
$guar_mname =  $_POST['guar_mname'];
$guar_lname =  $_POST['guar_lname'];
$guar_add =  $_POST['guar_add'];
$guar_cont =  $_POST['guar_cont'];
$guar_email =  $_POST['guar_email'];
$relation =  $_POST['relation'];
$sql1 = "UPDATE student SET stu_fname='$stu_fname', stu_mname='$stu_mname', stu_lname='$stu_lname', stu_dob='$stu_dob', stu_gender='$stu_gender', stu_add='$stu_add', grade_g_id='$grade_g_id' WHERE stu_regid='$stu_regid'";
$sql2 = "UPDATE guardian SET  guar_fname='$guar_fname', guar_mname='$guar_mname', guar_lname='$guar_lname', guar_add='$guar_add', guar_cont='$guar_cont', guar_email='$guar_email' WHERE guar_regid='$stu_regid')";
$sql3 = "UPDATE guar_stu SET relation ='$relation' WHERE ";
$result1=mysqli_query($con,$sql1);
$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);
$hi = mysqli_error($con);
if(!$result1 && !$result2 && !$result3){
  echo ('failed');
}
else {
  echo ('Done!');
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
                  <label>First Name</label>
                  <input class="form-control" type="text" name="stu_fname" required value="<?php echo $row['stu_fname']; ?>">
                </div>
                <div class="form-group">
                  <label>Middle Name</label>
                  <input class="form-control" type="text" name="stu_mname" value="<?php echo $row['stu_mname'];?>">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" type="text" name="stu_lname" required value="<?php echo $row['stu_lname']; ?>">
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="stu_gender" required value="<?php echo $row['stu_gender']; ?>">
                      <option value="male">Male</option>
                      <option value="female">Female</option></select>
                    </div>
                    <div class="form-group">
                      <label>Grade</label>
                      <select class="form-control" name="grade_g_id" value="<?php echo $row['grade_g_id']; ?>">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                        <option value="7">Seven</option>
                        <option value="8">Eight</option>
                        <option value="9">Nine</option>
                        <option value="10">Ten</option>
                      </select>
                    </div>
                    <div class="form-group">
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="stu_add" required value="<?php echo $row['stu_add']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input class="form-control" type="text" name="stu_dob" required placeholder="YYYY-MM-DD" value="<?php echo $row['stu_dob']; ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                Guardian's information
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label>First Name<Name></Name></label>
                  <input class="form-control" type="text" required name="guar_fname" value="<?php echo $row['guar_fname']; ?>">
                </div>
                <div class="form-group">
                  <label>Middle Name<Name></Name></label>
                  <input class="form-control" type="text" name="guar_mname" value="<?php echo $row['guar_mname']; ?>">
                <div class="form-group">
                </div>
                  <label>Last Name<Name></Name></label>
                  <input class="form-control" type="text" required name="guar_lname" value="<?php echo $row['guar_lname']; ?>">
                </div>
                <div class="form-group">
                  <label>Address<Name></Name></label>
                  <input class="form-control" type="text" required name="guar_add" value="<?php echo $row['guar_add']; ?>">
                </div>
                <div class="form-group">
                  <label>Contact number<Name></Name></label>
                  <input class="form-control" type="text" requireds name="guar_cont" value="<?php echo $row['guar_cont']; ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" type="text" required name="guar_email" value="<?php echo $row['guar_email']; ?>">
                  <!--        <p class="help-block">Enter valid email</p> -->
                </div>
                <div class="form-group">
                  <label>Relation<Name></Name></label>
                  <input class="form-control" type="text" required name="relation" value="<?php echo $row['relation']; ?>">
                  <button type="submit" class="btn btn-danger col-md-12" name="submit">Submit</button>

                </div class="form-group">

              </form>
            </div>
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
