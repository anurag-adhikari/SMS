<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
$sql="SELECT * FROM feedback";
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

<div class="col-md-12">
  <div class="table-responsive">
          <?php
          if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
          ?>
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <?php echo $row['f_id'];?>
                      <br>
                        <?php echo $row['f_time'] ?>
                  </div>
                  <div class="panel-heading">
                    <p class="lead"><?php echo $row['f_name'] ?></p>
                  </div>
                  <div class="panel-body">
                      <p>
                        <?php echo $row['f_comment']; ?>
                      </p>
                      <br>
                      <p class="text-left"><?php echo $row['f_email'];?></p>
                  </div>
              </div>
          </div>
          <a href="delete-f.php?f_id=<?php echo $row['f_id']; ?>">Delete</a>

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






        <!-- /. PAGE WRAPPER  -->
         </div>
    <!-- /. WRAPPER  -->
     </div>
     <?php
     include 'footer.php';
     ?>
