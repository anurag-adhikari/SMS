<?php
include 'connect.php';
$db = mysqli_select_db($con,$database);
$sql="SELECT * FROM notice";
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
                      <?php echo $row['notice_id'];?>
                      <br>
                        <?php echo $row['notice_date'] ?>
                  </div>
                  <div class="panel-heading">
                    <p class="lead"><?php echo $row['subject'] ?></p>
                  </div>
                  <div class="panel-body">
                      <p>
                        <?php echo $row['description']; ?>
                      </p>
                      <br>
                      <p class="text-left"><?php echo $row['n_post_by'];?></p>
                  </div>
              </div>
          </div>
          <a href="delete-n.php?notice_id=<?php echo $row['notice_id']; ?>">Delete</a>
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
