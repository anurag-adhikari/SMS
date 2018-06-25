<?php
    include 'connect.php';

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($con,$_POST['username1']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password1']);
      $database = mysqli_select_db($con,$database);
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result=mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      $type=$row['type'];
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1){
        $_SESSION['username'] = $row['username'];
         if($type == 'admin'){
        header("location: admin/admin.php");
        }
        elseif($type == 'teacher'){
        header("location: teacher/notice.php");
        }
        elseif($type == 'student'){
        header("location: student/notice.php");}
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bond School Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                            <div class="panel-body">
                                <form role="form"  method="post">
                                    <hr />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Username" name="username1" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Password" name="password1" />
                                        </div>
                                    <div class="form-group">
                                        </div>

                                    <input type="submit" name="login"  class="btn btn-primary col-md-12  " value="Login">
                                    <hr />
                                    </form>
                            </div>

                        </div>


        </div>
    </div>

</body>
</html>
