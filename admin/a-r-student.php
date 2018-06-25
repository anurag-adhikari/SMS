<?php
  if(isset($_POST['submit'])){
    $database = "school";
    $con =  new mysqli("localhost:3306","root","",$database);
    if(!$con)
    {
      die("Connection Error" .$con->connect_error);
    }
if (isset($_POST['stu_fname'])){
$stu_fname =$_POST['stu_fname'];
}
if (isset($_POST['stu_mname'])){
$stu_mname =  $_POST['stu_mname'];
}
if (isset($_POST['stu_fname'])){
$stu_lname =  $_POST['stu_lname'];
}
if (isset($_POST['stu_gender'])){
$stu_gender =  $_POST['stu_gender'];
}
if (isset($_POST['stu_dob'])){
$stu_dob =  $_POST['stu_dob'];
}
if (isset($_POST['stu_add'])){
$stu_add =  $_POST['stu_add'];
}
if (isset($_POST['grade_g_id'])){
$grade_g_id = $_POST['grade_g_id'];
}
$stu_regdate = date('Y-m-d H:i:s');
$su1= date('YmdHis');
$temp1=substr($su1, 2);
$stu_regid="S{$temp1}{$grade_g_id}";
$guar_regid="G{$temp1}{$grade_g_id}";
$guar_stuid="GS{$temp1}{$grade_g_id}";
if (isset($_POST['guar_fname'])){
$guar_fname =  $_POST['guar_fname'];
}
if (isset($_POST['guar_mname'])){
$guar_mname =  $_POST['guar_mname'];
}
if (isset($_POST['guar_lname'])){
$guar_lname =  $_POST['guar_lname'];
}
if (isset($_POST['guar_add'])){
$guar_add =  $_POST['guar_add'];
}
if (isset($_POST['guar_cont'])){
$guar_cont =  $_POST['guar_cont'];
}
if (isset($_POST['guar_email'])){
$guar_email =  $_POST['guar_email'];
}
if (isset($_POST['relation'])){
$relation =  $_POST['relation'];
}
$sql1 = "INSERT INTO student (stu_fname, stu_mname, stu_lname, stu_dob, stu_gender, stu_add, stu_regdate, grade_g_id,stu_regid) VALUES ('$stu_fname', '$stu_mname' , '$stu_lname', '$stu_dob', '$stu_gender', '$stu_add', '$stu_regdate', '$grade_g_id','$stu_regid');";
$sql2 = "INSERT INTO guardian (guar_fname, guar_mname, guar_lname,guar_add, guar_cont, guar_email,guar_regid) VALUES ('$guar_fname', '$guar_mname' ,'$guar_lname', '$guar_add', '$guar_cont', '$guar_email','$guar_regid');";
$sql3 = "INSERT INTO guar_stu (guar_stuid, relation, guardian_guar_regid, student_stu_regid) VALUES ('$guar_stuid','$relation','$guar_regid','$stu_regid')";
$sql4= "INSERT INTO result (student_stu_regid,percentage) VALUES ('$stu_regid','0')";
//echo $sql3;
//echo $sql1;
   //.echo $sql1;
   //$hi = mysqli_error($con);
   //echo $hi;
  $result1 = mysqli_query($con,$sql1);
  $result2 = mysqli_query($con,$sql2);
  $result3 = mysqli_query($con,$sql3);
  $result4 =mysqli_query($con,$sql4);
  //echo $hi;
  //echo $result1;
  if(!$result1 && !$result2 && !$result3 && !$result4){
    echo ('failed');
  }
  else {
    echo ('Done!');
  }

}
  ?>
  <?php include 'header.php'; ?>
                                             <!-- /. NAV TOP  -->

                                            <?php include 'navbar.php'; ?>
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
                            <form role="form" method="post">
                                           <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" name="stu_fname" required>
								</div>
                                  <div class="form-group">
                                    <label>Middle Name</label>
                                            <input class="form-control" type="text" name="stu_mname">
								</div>
                                  <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="stu_lname" required>
								</div>
                                                                  <div class="form-group">
 										<div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="stu_gender" required>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>                                            </select>
                                        </div>
                                          	<div class="form-group">
                                            <label>Grade</label>
                                            <select class="form-control" name="grade_g_id">
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
                                            <input class="form-control" type="text" name="stu_add" required>
								</div>
                                   <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input class="form-control" type="text" name="stu_dob" required placeholder="YYYY-MM-DD">
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
                                            <input class="form-control" type="text" required name="guar_fname">

                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name<Name></Name></label>
                                            <input class="form-control" type="text" name="guar_mname">

                                        </div>
                                        <div class="form-group">
                                            <label>Last Name<Name></Name></label>
                                            <input class="form-control" type="text" required name="guar_lname">
                                        </div>
                                        <div class="form-group">
                                            <label>Address<Name></Name></label>
                                            <input class="form-control" type="text" required name="guar_add">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact number<Name></Name></label>
                                            <input class="form-control" type="text" requireds name="guar_cont">
                                        </div>

                                 <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" required name="guar_email">
                             <!--        <p class="help-block">Enter valid email</p> -->
								</div>
                                          <div class="form-group">
                                            <label>Relation<Name></Name></label>
                                            <input class="form-control" type="text" required name="relation">

                                      </div class="form-group">
                                      <div class ="form-group">
                                      <button type="submit" class="btn btn-danger col-md-12" name="submit">Register </button>
</div>
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
