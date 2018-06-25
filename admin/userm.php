<?php session_start(); ?>
<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
$sql="SELECT * FROM users";
//$sql3="SELECT * FROM student";
//$sql4="SELECT * FROM guardian";
//$result3= $con->query($sql3);
//$result4= $con->query($sql4);
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
                        <h1 class="page-head-line"  align="center">ADMIN Section</h1>
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
                                                            <th>Username</th>
                                                            <th>Type</th>
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
                                                            <td><?php echo $row['user_id']; ?></td>
                                                            <td><?php echo $row['username'];  ?></td>
                                                            <td><?php echo $row['type'];  ?></td>
                                                            <td>
                                                              <a href="userr.php?user_id=<?php echo $row['user_id']; ?>">Modify</a>
                                                            </td>
                                                            <td><a href="delete-u.php?user_id=<?php echo $row['user_id']; ?>">Delete</a></td>

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
