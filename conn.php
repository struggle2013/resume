<?php
$servername="localhost:3306";
$username="root";
$password="";
$con=@mysql_connect($servername,$username,$password)or die("连接mysql数据库失败");

 @mysql_selectdb("resume",$con) or die("resume数据库打开失败");
 mysql_set_charset("utf8");
?>    