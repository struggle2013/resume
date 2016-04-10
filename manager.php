<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0">
  <title>管理者</title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/manager.css">
</head>

<body>
	<div class="panel bj">
   <h3>首页 <a href="login.php" class="return">退出登录</a></h3>
 </div>
 <div class="container">
  <?php 
  include("conn.php");
  $managerEmail=$_GET['email'];
  $sql="SELECT email,name,img,information,suggestion FROM `user` ";
  $result = mysql_query($sql);
  if (!empty($_POST["sub"])) {
    $suggestion=$_POST["suggestion"];
    $email=$_POST["email"];
    $sql="update user set suggestion='$suggestion' where email='$email'";
    mysql_query($sql);
    
  }

  while ($row=mysql_fetch_array($result)) {
    $email=$row["email"];
    $name=$row["name"];
    $img=$row["img"];
    $information=$row["information"];
    $suggestion=$row["suggestion"];

    ?>
	<div class="panel panel-info">
		<div class="panel-heading">
		  <ul>
		  	<li><span><?php echo $name ?></span></li>
		  	<li class="del">
		  	  <a href="del.php?managerEmail=<?php echo $managerEmail?>&&email=<?php echo $email;?>" onclick="delCfm()">删除</a>
		  	</li>
			  <li class="edit"><a href="edit.php?managerEmail=<?php echo $managerEmail?>&&email=<?php echo $email;?>">编辑</a></li>
		  </ul>
		</div>
		<ul class="list-group">
			<li class="list-group-item">邮箱:<span><?php echo $email ?></span></li>
	  	</ul>
		<div class="panel-body row">
			<div class="col-md-2">
    			<img src="<?php echo $img ?>">
    		</div>
    		<div class="col-md-10">
    		个人介绍:
    		<span><?php echo $information ?></span>
    		</div>
<!--
    		<li>个人介绍:<br><br><span><?php echo $information ?></span><br><br>
      		<button  onclick="suggestion('<?php echo $email ?>')">评论</button>
      		<div style="display: none" id="<?php echo $email ?>">
        	<form method="POST" >
          	<input type="hidden" name="email" value="<?php echo $email ?>">
          	<textarea name="suggestion" placeholder="请输入评论" cols="50" rows="6" 
          	><?php echo $suggestion ?></textarea><br/>
          
          <input type="submit" name="sub" value="提交" ><br>
        </form>
-->
      </div>
	</div>  
    <?php } ?>
    </div>
<script src="js/jquery-1.12.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/manager.js">
</script>
  </body>
  </html>