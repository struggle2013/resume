<?php
$servername="SAE_MYSQL_HOST_M:SAE_MYSQL_PORT ";
$username="SAE_MYSQL_USER";
$password="SAE_MYSQL_PASS";
$con=@mysql_connect($servername,$username,$password)or die("连接mysql数据库失败");

 @mysql_selectdb("resume",$con) or die("resume数据库打开失败");
 mysql_set_charset("utf8");
?>    