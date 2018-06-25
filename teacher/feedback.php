<?php session_start(); ?>
<?php
  if(isset($_POST['submit'])){
    $database = "school";
    $con =  new mysqli("localhost:3307","root","",$database);
    if(!$con)
    {
      die("Connection Error" .$con->connect_error);
    }
  if (isset($_POST['f_id'])){
  $f_id =$_POST['f_id'];
}
if (isset($_POST['f_name'])){
  $f_name =  $_POST['f_name'];
}
if (isset($_POST['f_comment'])){
  $f_comment =  $_POST['f_comment'];
}
if (isset($_POST['f_email'])){
  $f_email =  $_POST['f_email'];
}
  $date = date('Y-m-d H:i:s');
  $sql1 = "INSERT INTO feedback (f_name, f_comment, f_time, f_email) VALUES ('$f_name' , '$f_comment','$date', '$f_email');";
  $result1=mysqli_query($con,$sql1);
  echo $sql1;
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
                          Feedback
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                           <div class="form-group">
                                            <label>Full Name</label>
                                              <input class="form-control" type="text" name="f_name" required height="20">
                </div>
                <label>Email</label>
                <input class="form-control" type="email" name="f_email" required>
                  <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control" rows="3" name="f_comment"></textarea>
              </div>
                                  <div class="form-group">


                            </div>

                    </div>

                                        <button type="submit" class="btn btn-danger col-md-12" name="submit">Send</button>
                                        </div>

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
