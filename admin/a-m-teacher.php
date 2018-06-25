<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
$sql="SELECT * FROM teacher";
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
                        <h1 class="page-head-line"  align="center">Admin Section</h1>
                        <h1 class="page-subhead-line" align="center">Students' Information</h1>
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
                                                            <th>Subject</th>
                                                            <th>Contact No.</th>
                                                            <th>Modify</th>
                                                            <th>Delete</th>
                                                          </tr>
                                                    </thead>
                                                    <?php
                                                    if($result->num_rows >0){
                                                      while($row = $result->fetch_assoc()){
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row['tea_regid'];echo $row['grade_g_id'];   ?></td>
                                                            <td><?php echo $row['tea_fname'] ;echo " "; echo $row['tea_mname'] ; echo " "; echo $row['tea_lname'] ;  ?></td>
                                                            <td><?php echo $row['grade_g_id'];  ?></td>
                                                            <td><?php echo $row['subject'];  ?></td>
                                                            <td><?php echo $row['tea_cont'];  ?></td>
                                                            <td><a href="a-r-m-teacher.php?tea_regid=<?php echo $row['tea_regid']; ?>">Modify</a></td>
                                                            <td><a href="delete-t.php?tea_regid=<?php echo $row['tea_regid']; ?>">Delete</a></td>
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
