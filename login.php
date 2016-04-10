<!DOCTYPE html>
<html>
<?php $err="";?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0">
	<title>登录</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div class="container">
		<div class="login">
			<form method="POST" class="form-horizontal">
				<h3>登录</h3>
				<div class="form-group">
					<label class="sr-only" for="inputEmail">email</label>
					<div class="input-group">
						<div class="input-group-addon"><samp class="glyphicon glyphicon-user"></samp></div>
						<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label class="sr-only" for="inputEmail">password</label>
					<div class="input-group">
						<div class="input-group-addon"><samp class="glyphicon glyphicon-lock"></samp></div>
						<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
					</div>
				</div>
				<div class="form-group ">
					<label class="sr-only" for="inputSubmit">submit</label>
					<input type="submit" name="sub" class="btn btn-primary" id="inputSubmit" value="登录">
				</div>
				<div class="form-group">
					<label class="sr-only" for="register">register</label>
					<button type="button" class="btn btn-link" id="register"><a href="register.php">还没有注册？立即注册</a></button>
				</div>
				<div class="form-group">
					<span><?php echo $err;?></span>
				</div>
			</form>
		</div>
	</div>
	<script src="js/jquery-1.12.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
 
include("conn.php");

$role=0;
if (!empty($_POST["sub"])) {
 $email=$_POST['email'];
 $password=$_POST['password'];
 if ($email==""||$email==null||$password==""||$password==null) {
   $err="用户名和密码不可为空！";
 }
 else{
     $sql="SELECT PASSWORD FROM `user` WHERE email = '$email' ";

     $result =mysql_query($sql) or die('数据库操作失败');
     $row=mysql_fetch_array($result);

     $sql="SELECT role FROM `role` WHERE email = '$email' ";
     $result=mysql_query($sql);
     $roleRow=mysql_fetch_array($result);
     $role=$roleRow["role"];
     mysql_close($con);
     if ($row[0]==$password){
      if ($role==1) {
        header("Location: /manager.php?email=$email");
      }
      else{header("Location: /main.php?email=$email");}
      exit();
    }
    else{
      $err="密码或邮箱错误！";
    }
  }
}

?>
