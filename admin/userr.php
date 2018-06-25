<?php session_start(); ?>

<?php
  include 'connect.php';
  $admin = $_SESSION['username'];
  $user_id = $_GET['user_id'];
  if(!isset($user_id)) {
    die('Error, No id!');
  }
  if($user_id < 1) {
    die('Error!');
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
                  <div class="row">
                      <div class="col-md-12">
                          <h1 class="page-head-line"  align="center">ADMIN Section</h1>
                          <h1 class="page-subhead-line" align="center">Students' Information</h1>
                          <div class="row">
                              <div class="col-md-12">

<?php
  $result = mysqli_query($con, "SELECT * FROM users WHERE user_id='$user_id'") or die('Error in parsing!');
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  if(isset($_POST['submit'])) {
    $new_username = $_POST['user_name'];
    $new_password = $_POST['user_password'];
    mysqli_query($con, "UPDATE users SET username='$new_username' , password = '$new_password' WHERE user_id='$user_id'") or die(mysqli_error($con));
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="form-group col-md-4">
    <div class="panel-body">
      <label>User To Modify: <?php echo $username; ?></label>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?user_id=' . $user_id; ?>" method="post">
      <label>Username:</label>
      <input type="text" class='form-control' name="user_name" value="<?php echo $username; ?>" required>

      <label>Password:</label>
      <input type="text" class='form-control' name="user_password" placeholder="New Password..." required>
      <br>
      <input type="submit" name="submit" class="btn btn-info" value="Modify">
    </div>
    </form>
  </div>
</div>
    <?php
    include 'footer.php';
    ?>
