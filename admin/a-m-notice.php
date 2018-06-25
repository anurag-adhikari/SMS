<?php session_start(); ?>
<?php
  if(isset($_POST['submit'])){
    $database = "school";
    $con =  new mysqli("localhost:3306","root","",$database);
    if(!$con)
    {
      die("Connection Error" .$con->connect_error);
    }
  if (isset($_POST['notice_id'])){
  $notice_id =$_POST['notice_id'];
}
if (isset($_POST['subject'])){
  $subject =  $_POST['subject'];
}
if (isset($_POST['description'])){
  $description =  $_POST['description'];
}
if (isset($_POST['n_post_by'])){
  $n_post_by =  $_POST['n_post_by'];
}

  $date = date('Y-m-d H:i:s');
  $sql1 = "INSERT INTO notice (notice_id, subject, description, notice_date, n_post_by) VALUES ('NULL', '$subject' , '$description','$date', '$n_post_by');";
  $result1=mysqli_query($con,$sql1);
}
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
                <div>
                    <div class="col-md-12 col-sm-6 col-xs-12" style="float: left;">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                          Notice Information
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                           <div class="form-group">
                                            <label>Subject</label>
                                              <input class="form-control" type="text" name="subject" required height="20">
                </div>
                  <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="description"></textarea>
              </div>
                                  <div class="form-group">
                                            <label>Posted By</label>
                                            <input class="form-control" type="text" name="n_post_by" required>
                </div>

                            </div>

                    </div>

                                        <button type="submit" class="btn btn-danger col-md-12" name="submit">Post</button>
                                        <div class="col-md-12 col-sm-6 col-xs-12">
<?php
if(isset($_POST['submit'])){
  $database = "school";
  $con =  new mysqli("localhost:3307","root","",$database);
  if(!$con)
  {
    die("Connection Error" .$con->connect_error);
  }
                                        if(!$result1){
                                          echo ('failed');
                                        }
                                        else {
                                          echo ('Done!');
                                        }
}
                                       ?>
                                    </form>
                                  </div>
                                </div>

                        </div>
                            </div>

                </div>

        </div>

        <?php
        include 'footer.php';
        ?>
