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
if(isset($_POST['submit'])){
  if (isset($_POST['tea_fname'])){
    $tea_fname =$_POST['tea_fname'];
  }
  if (isset($_POST['tea_mname'])){
    $tea_mname =  $_POST['tea_mname'];
  }
  if (isset($_POST['tea_lname'])){
    $tea_lname =  $_POST['tea_lname'];
  }
  if (isset($_POST['tea_gender'])){
    $tea_gender =  $_POST['tea_gender'];
  }
  if (isset($_POST['tea_dob'])){
    $tea_dob =  $_POST['tea_dob'];
  }
  if (isset($_POST['tea_add'])){
    $tea_add =  $_POST['tea_add'];
  }
  if (isset($_POST['grade_g_id'])){
    $grade_g_id = $_POST['grade_g_id'];
  }
  if (isset($_POST['tea_cont'])){
    $tea_cont =  $_POST['tea_cont'];
  }
  if (isset($_POST['tea_email'])){
    $tea_email =  $_POST['tea_email'];
  }
  if (isset($_POST['subject'])){
    $subject =  $_POST['subject'];
  }
$sql1 = "UPDATE teacher SET tea_fname='$tea_fname', tea_mname='$tea_mname', tea_lname='$tea_lname', tea_dob='$tea_dob', tea_gender='$tea_gender', tea_add='$tea_add', grade_g_id='$grade_g_id',tea_cont='$tea_cont',tea_email='$tea_email',subject='$subject'";
//echo $sql1;
$hi = mysqli_error($con);
$result1=mysqli_query($con,$sql1);
if(!$result1){
  echo ('failed');
}
else {
  echo ('Done!');
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
                  <label>First Name</label>
                  <input class="form-control" type="text" name="tea_fname" required value="<?php echo $row['tea_fname']; ?>">
                </div>
                <div class="form-group">
                  <label>Middle Name</label>
                  <input class="form-control" type="text" name="tea_mname" value="<?php echo $row['tea_mname']; ?>">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" type="text" name="tea_lname" required value="<?php echo $row['tea_lname']; ?>">
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="tea_gender" required value="<?php echo $row['tea_gender']; ?>">
                      <option value="Male" >Male</option>
                      <option value="Female">Female</option></select>
                    </div>
                    <div class="form-group">
                      <label>Teaching Grade</label>
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
                    <input class="form-control" type="text" name="tea_add" required value="<?php echo $row['tea_add']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input class="form-control" type="text" name="tea_dob" required placeholder="YYYY-MM-DD" value="<?php echo $row['tea_dob']; ?>">
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <label>Subject<Name></Name></label>
                      <input class="form-control" type="text" required name="subject" value="<?php echo $row['subject']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" type="text" required name="tea_email" value="<?php echo $row['tea_email']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Contact</label>
                      <input class="form-control" type="text" required name="tea_cont" value="<?php echo $row['tea_cont']; ?>">
                    </div>
                  <button type="submit" class="btn btn-danger col-md-12" name="submit">Update</button>

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
