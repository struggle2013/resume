<?php
header("Content-type: text/html; charset=utf-8");
include("conn.php");
$imgAddress="";
$email=$_GET["email"];



if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    // if (file_exists("upload/" . $_FILES["file"]["name"]))
    //   {
    //   echo $_FILES["file"]["name"] . " 文件已存在 ";
    //   }
    // else
    //   {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      $imgAddress="upload/" . $_FILES["file"]["name"];
      $sql="update user set img='$imgAddress' where email='$email'";
      //echo $imgAddress;
      
      mysql_query($sql);
	  header("Location: main.php?email=$email");
      echo "头像上传成功！";
	  
      // }
    }
else
  {
	header("Location: main.php?email=$email");
  	echo "无效的文件";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>上传</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <a href="main.php?email=<?php echo $email?>">返回</a>
</body>
</html>
