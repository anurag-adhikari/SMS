<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
if(!isset($_POST['submit']))
{
$sql="SELECT * FROM teacher";
}
else{
  if (isset($_POST['search_user'])){
  $search_user =$_POST['search_user'];
  }
  $sql="SELECT * FROM teacher WHERE tea_fname LIKE '%$search_user%' OR tea_mname LIKE '%$search_user%' OR tea_lname LIKE '%$search_user%' OR tea_regid LIKE '%$search_user%' OR tea_cont LIKE '%$search_user%' OR tea_gender LIKE '%$search_user%'";
}
$result= $con->query($sql);
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
                                          <br>
                                          <form role="form" method="post" class="col-md-12">
                                          <div class="form-group">
                                            <input class="form-control" type="search" name="search_user" placeholder="Search..">
                                          </div>
                                          <button type="submit" class="btn btn-danger col-md-1" name="submit">Submit</button>
                                        </br>
                                        </form>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>#</th>
                                                              <th>Name</th>
                                                              <th>Grade</th>
                                                              <th>Subject</th>
                                                              <th>Contact No.</th>
                                                              <th>Address</th>
                                                              <th>Gender</th>
                                                              <th>Details</th>
                                                          </tr>
                                                      </thead>
                                                      <?php
                                                      if($result->num_rows >0){
                                                        while($row = $result->fetch_assoc()){
                                                      ?>
                                                      <tbody>
                                                          <tr>
                                                              <td><?php echo $row['tea_regid'];  ?></td>
                                                              <td><?php echo $row['tea_fname'] ;echo " "; echo $row['tea_mname'] ; echo " "; echo $row['tea_lname'] ;  ?></td>
                                                              <td><?php echo $row['grade_g_id'];  ?></td>
                                                              <td><?php echo $row['subject'];  ?></td>
                                                              <td><?php echo $row['tea_cont'];  ?></td>
                                                              <td><?php echo $row['tea_add'];  ?></td>
                                                              <td><?php echo $row['tea_gender'];  ?></td>
                                                              <td><a href="d-teacher.php?tea_regid=<?php echo $row['tea_regid']; ?>">Details</a></td>
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
    <!-- /. WRAPPER  -->
    <?php
    include 'footer.php';
    ?>
