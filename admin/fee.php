<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
$sql="SELECT * FROM fee INNER JOIN grade ON fee.grade_g_id = grade.g_id";
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
                        <h1 class="page-head-line"  align="center">Admin Section</h1>
                        <h1 class="page-subhead-line" align="center">Students' Information</h1>
                        <div class="row">
                            <div class="col-md-12">

                                      <div class="panel panel-default">
                                          <div class="panel-heading">
                                            Fees
                                          </div>
                                          <div class="panel-body">
                                              <div class="table-responsive">
                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>Grade</th>
                                                              <th>Fee</th>
                                                          </tr>
                                                      </thead>
                                                      <?php
                                                      if($result->num_rows){
                                                        while($row= $result->fetch_assoc()){
                                                      ?>
                                                      <tbody>
                                                          <tr>
                                                              <td><?php echo $row['grade'];  ?></td>
                                                              <td><?php echo $row['fee'];  ?></td>
                                                              <td><a href="fee-a.php?grade_g_id=<?php echo $row['grade_g_id']; ?>">Modify</a></td>
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
