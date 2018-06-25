<?php
$database = "school";
$con =  new mysqli("localhost:3307","root","",$database);
if(!$con)
{

  die("Connection Error" .$con->connect_error);
}
?>
