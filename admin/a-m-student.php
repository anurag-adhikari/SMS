<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
if(isset($_POST['submit'])){
  if (isset($_POST['search_user'])){
  $search_user =$_POST['search_user'];
  }
$sql= "SELECT student.stu_fname, student.stu_mname,student.stu_lname, student.stu_gender, student.stu_regid, student.grade_g_id, guardian.guar_fname, guardian.guar_mname, guardian.guar_lname, guardian.guar_cont, guardian.guar_email, guar_stu.relation FROM student INNER JOIN guardian INNER JOIN guar_stu ON student.stu_regid = guar_stu.student_stu_regid WHERE guardian.guar_regid = guar_stu.guardian_guar_regid AND (stu_fname LIKE '%$search_user%' OR stu_mname LIKE '%$search_user%' OR stu_lname LIKE '%$search_user%' OR stu_regid LIKE '%$search_user%' OR grade_g_id LIKE '%$search_user%' OR guar_fname LIKE '%$search_user%' OR guar_mname LIKE '%$search_user%' OR guar_lname LIKE '%$search_user%' OR relation LIKE '%$search_user%' )";
//$sql4="SELECT * FROM guardian";
//$result3= $con->query($sql3);
//$result4= $con->query($sql4);
}
else {
  $sql="SELECT student.stu_fname, student.stu_mname,student.stu_lname, student.stu_gender, student.stu_regid, student.grade_g_id, guardian.guar_fname, guardian.guar_mname, guardian.guar_lname, guardian.guar_cont, guardian.guar_email, guar_stu.relation
  FROM student INNER JOIN guardian INNER JOIN guar_stu
  ON student.stu_regid = guar_stu.student_stu_regid WHERE guardian.guar_regid = guar_stu.guardian_guar_regid";
}
$result=$con->query($sql);
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
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"  align="center">Teachers' Section</h1>
                        <h1 class="page-subhead-line" align="center">Students' Information</h1>
                        <div class="row">
                            <div class="col-md-12">

                                      <div class="panel panel-default">
                                          <div class="panel-heading">
                                            Marks
                                          </div>
                                          <div class="panel-body">
                                            <form role="form" method="post" class="col-md-12">
                                            <div class="form-group">
                                              <input class="form-control" type="search" name="search_user" placeholder="Search..">
                                            </div>
                                            <button type="submit" class="btn btn-danger col-md-1" name="submit">Submit</button>
                                          </br>
                                          </form>
                                              <div class="table-responsive">
                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>#</th>
                                                              <th>Student's Name</th>
                                                              <th>Grade</th>
                                                              <th>Gender</th>
                                                              <th>Guardian's Name</th>
                                                              <th>Contact</th>
                                                              <th>Modify</th>
                                                              <th>Delete</th>
                                                          </tr>
                                                      </thead>
                                                      <?php
                                                      if($result->num_rows){
                                                        while($row= $result->fetch_assoc()){
                                                      ?>
                                                      <tbody>
                                                          <tr>
                                                              <td><?php echo $row['stu_regid']; echo $row['grade_g_id'];  ?></td>
                                                              <td><?php echo $row['stu_fname']; echo " "; echo$row['stu_mname']; echo " "; echo $row['stu_lname'];  ?></td>
                                                              <td><?php echo $row['grade_g_id']; ?></td>
                                                              <td><?php echo $row['stu_gender']; ?></td>
                                                              <td><?php echo $row['guar_fname'];echo " "; echo$row['guar_mname']; echo " "; echo $row['guar_lname'];  ?></td>
                                                              <td><?php echo $row['guar_cont']; ?></td>
                                                              <td><a href="a-r-m-student.php?stu_regid=<?php echo $row['stu_regid']; ?>">Modify</a></td>
                                                              <td><a href="delete-s.php?stu_regid=<?php echo $row['stu_regid']; ?>">Delete</a></td>
                                                        </tr>
                                                          <?php
                                                        }}
                                                          else{
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="2">No data found!!</th>
                                                                </tr>
                                                            </tbody>
<?php
                                                          }


?>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                                    </div>
                            </div>
                            </div>
                </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php
    include 'footer.php';
    ?>
