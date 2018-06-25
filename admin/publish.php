<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
$sql="SELECT * FROM student INNER JOIN RESULT WHERE student.stu_regid = result.student_stu_regid";
$result= $con->query($sql);
?>

<?php include 'header.php' ?>
<!-- /. NAV TOP  -->
<?php include 'navbar.php' ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
              <div id="page-inner">
                  <div class="row">
                      <div class="col-md-12">
                          <h1 class="page-head-line"  align="center">ADMIN Section</h1>
                          <h1 class="page-subhead-line" align="center">Teachers' Information</h1>
                          <div class="row">
                              <div class="col-md-12">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                              Marks
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Grade</th>
                                                                <th>Gender</th>
                                                                <th>Percentage</th>
                                                                <th>Modify</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        if($result->num_rows >0){
                                                          while($row = $result->fetch_assoc()){

                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $row['stu_regid'];  ?></td>
                                                                <td><?php echo $row['stu_fname'] ;echo " " ; echo $row['stu_mname'] ;echo " " ; echo $row['stu_lname'] ;  ?></td>
                                                                <td><?php echo $row['grade_g_id'];  ?></td>
                                                                <td><?php echo $row['stu_gender'];  ?></td>
                                                                <td><?php echo $row['percentage']; ?></td>
                                                                <td><a href="publish-a.php?stu_regid=<?php echo $row['stu_regid']; ?>">Modify</a></td>
                                                            </tr>
                                                            <?php
                                                          }
                                                        }
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
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <php include 'footer.php' ?>
