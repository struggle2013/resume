<?php
include("conn.php");
if (!empty($_GET["email"])) {
  $email=$_GET['email'];
  $managerEmail=$_GET["managerEmail"];
  $sql="delete from user where email='$email'";
  mysql_query($sql);
  $sql="delete from role where email='$email'";
  mysql_query($sql);
  header("Location: manager.php?email='$managerEmail'");
}
mysql_close($con);

?>