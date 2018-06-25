<?php
if(isset($_POST['submit'])){
  $database = "school";
  $con =  new mysqli("localhost:3307","root","",$database);
  if(!$con)
  {
    die("Connection Error" .$con->connect_error);
  }
  if (isset($_POST['username'])){
    $username =$_POST['username'];
  }
  if (isset($_POST['password'])){
    $password =  $_POST['password'];
  }
  if (isset($_POST['password1'])){
    $password1 =  $_POST['password1'];
  }
  if (isset($_POST['type'])){
    $type =  $_POST['type'];
  }
  $sql1 = "INSERT INTO users (username, password, type) VALUES ('$username', '$password' , '$type');";
  //echo $sql1;
  //echo $sql1;
  $hi = mysqli_error($con);
  //echo $hi;
  $result1=mysqli_query($con,$sql1);
  $hi = mysqli_error($con);
  //echo $hi;
  if(!$result1){
    echo ('failed');
  }
  else {
    echo ('Done!');
  }
  }
?>
<?php
include 'header.php';
?>                                           <!-- /. NAV TOP  -->
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
User's Information            </div>
            <div class="panel-body">
              <form role="form" method="post">
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" type="text" name="username" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="password">
                </div
                  <div class="form-group">
                    <label>Type of User</label>
                    <select class="form-control" name="type" required>
                      <option value="admin" >Admin</option>
                      <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                  </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger col-md-12" name="submit">Register </button>
                  </div>
                </form>
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
