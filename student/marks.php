<?php session_start(); ?>
<?php
include 'connect.php';
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
                        <h1 class="page-head-line"  align="center">Students' Section</h1>
                        <h1 class="page-subhead-line" align="center">Result Information</h1>
                        <div class="row">
                            <div class="col-md-12">

                                      <div class="panel panel-default">
                                          <div class="panel-heading">
                                            Marks
                                          </div>
                                          <div class="panel-body">
                                            <form role="form" method="post" class="col-md-12">
                                              <div class="form-group">
                                            </div>
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
                                                          <th>Name</th>
                                                          <th>Grade</th>
                                                          <th>Percentage</th>
                                                      </tr>
                                                  </thead
                                                  <?php
                                                  if(!isset($_POST['submit'])){
                                                    include 'connect.php';
                                                    $db = mysqli_select_db($con,$database);
                                                    $sql="SELECT student.stu_regid, student.stu_fname, student.stu_mname, student.stu_lname, student.grade_g_id, result.student_stu_regid, result.percentage
                                                     FROM student INNER JOIN result ON student.stu_regid=result.student_stu_regid";
                                                     $result= $con->query($sql);
                                                  }
                                                  elseif(isset($_POST['submit'])){
                                                  include 'connect.php';
                                                  $db = mysqli_select_db($con,$database);
                                                  if (isset($_POST['search_user'])){
                                                  $search_user =$_POST['search_user'];
                                                  }
                                                  $sql="SELECT student.stu_regid, student.stu_fname, student.stu_mname, student.stu_lname, student.grade_g_id, result.student_stu_regid, result.percentage
                                                    FROM student INNER JOIN result ON student.stu_regid=result.student_stu_regid
                                                    WHERE grade_g_id LIKE '%$search_user%' AND stu_fname LIKE '%$search_user%'
                                                    OR stu_mname LIKE '%$search_user%' OR stu_regid LIKE '%$search_user%' OR stu_lname LIKE '%$search_user%'
                                                    OR percentage LIKE '%$search_user%'";
                                                  $result= $con->query($sql);
                                                }
                                                  if($result->num_rows >0){
                                                    while($row = $result->fetch_assoc()){
                                                  ?>
                                                  <tbody>
                                                      <tr>
                                                          <td><?php echo $row['stu_regid'];  ?></td>
                                                          <td><?php echo $row['stu_fname'] ;echo " "; echo $row['stu_mname'] ;echo " "; echo $row['stu_lname'] ; ?></td>
                                                          <td><?php echo $row['grade_g_id']; ?></td>
                                                          <td><?php echo $row['percentage'];  ?></td>
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
                                        </div>

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
    <?php
    include 'footer.php';
    ?>
