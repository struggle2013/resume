<!DOCTYPE html>
<html>
<?php 
include("conn.php");
$email=$_GET['email'];
$managerEmail=$_GET["managerEmail"];
$sql="SELECT name,img,information,suggestion FROM `user` WHERE email = '$email' ";
$result =mysql_query($sql) or die('数据库操作失败');
$row=mysql_fetch_array($result);

$name=$row["name"];
$img=$row["img"];


if(!empty($_POST["sub"])){
  $suggestion=$_POST["suggestion"];
  $sql="update user set suggestion='$suggestion' where email='$email'";
  mysql_query($sql);
  header("Location: edit.php?email=$email && managerEmail=$managerEmail");

}
$information=$row["information"];
$suggestion=$row["suggestion"];
mysql_close($con);
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0">
  <title>你的信息</title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
 <div class="container">
    <fieldset>
<!--
      <legend>基本信息</legend>
      <li>名称：</li>
    <li>邮箱：</li>
    <li>
      头像：<img src="" alt="头像" 
      style="width:100px;height: 100px; color:#9D9D9D">
      <form action="upload.php?email=" method="post"
      enctype="multipart/form-data">
     
      <input type="file" name="file" id="file" accept="image/*"/> 
      <br />
      <input type="submit" name="submit" value="提交" />
    </form>
    
-->
    
	<div class="panel panel-success">
  	  <div class="panel-heading"><legend>基本信息<a href="manager.php?email=<?php echo $_GET["managerEmail"]?>" class="return">返回首页</a></legend>
  	  	
  	  </div>
  	  <ul class="list-group">
		<li class="list-group-item">名字：<?php echo $name ?></li>
		<li class="list-group-item">邮箱：<?php echo $email ?></li>
	  </ul>
     
	  <div class="panel-body">
      <img src="<?php echo $img ?>" alt="头像">
      	
	  </div>
   </div>
 </fieldset>
	<fieldset>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><legend>个人信息</legend></h3>
			</div>
			<div class="panel-body">
			  <ul class="list-group">
				<li class="list-group-item"><span>个人介绍:</span>
				  <br>
					<p>
					  <?php echo $information?>
					</p>
					
				</li>
				<li class="list-group-item">
					<span>评价:</span>
					<br>
					<p>
						<?php echo $suggestion ?>
					</p>
					<button onclick="show()" class="btn btn-info">编辑</button>
					<div id="infor" style="display: none">
					 <form method="POST" accept-charset="utf-8">
						<textarea name="suggestion" placeholder="请输入评价"></textarea><br/>
						<input type="submit" name="sub" value="提交" class="btn btn-success">
						</form>
					</div>
				</li>
			</ul>
			</div>
		</div>
	</fieldset>
</div>

<script type="text/javascript">
function show(){
  var infor= document.getElementById("infor");
  if (infor.style.display=="none") {
    infor.style.display="block";
  }
  else{infor.style.display="none";};
  
}
</script>
<script src="js/jquery-1.12.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
