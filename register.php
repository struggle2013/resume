 <?php
 header("Content-type: text/html; charset=utf-8"); 
 include("conn.php");
 $name=$email=$password="";
 $err="";
 $nameErr="";
 $emailErr="";
 $passwordErr="";
 $AgainPasswordErr="";
 $success="";
 // $name=$_POST['name'];
 // $email=$_POST['email'];
 // $password=$_POST['password'];
 // $tel=$_POST['tel'];
 // $sex=(int)$_POST['sex'];
 // $sql="insert into user(name,email,password,sex,tel) values
 //  ('$name','$email','$password','$sex','$tel')";
 // mysql_query($sql) or die('数据库操作失败');
 if (!empty($_POST["sub"])) {
   $name=$_POST['name'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $AgainPassword=$_POST['AgainPassword'];
   $role=(int)$_POST['type'];
   if (check($name,$email,$password,$AgainPassword)) 
   {
    if ($password==$AgainPassword) {
      $sql="insert into user(email,password,name) values('$email','$password','$name')";

      if (!mysql_query($sql)) {
       $err="邮箱已注册";
     }
     else{
        $sql="insert into role(email,role) values('$email',$role)";
        mysql_query($sql);
       $success = "注册成功";
     }
   }else{$err="两次输入的密码不一样!";}

 }
 else{
  $err="你没有填写完!";
}

}
function check($name,$email,$password){
  if (empty($name)) {

    return false;
  }else{$name = test_input($name);}

  if (empty($email)) {
    return false;
  }else{$email = test_input($email);}

  if (empty($password)) {
    return false;
  }else {$password=test_input($password);}
  return true;
}
function test_input($data)
{
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0">
  <title>注册</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/register.css">
<body>
 <div class="container">
 <div class="form">
 	<span class="success"><?php echo $success ?></span>
  <form method="POST" class="form-horizontal">
  <h2>注册</h2> 
    <div class="form-group ">
      <label>真实名字</label>
      <input type="txt" class="form-control"  name="name" placeholder="name" value="夏一"/>
    </div>
  	<div class="form-group ">
      <label for="registerEmail1">邮箱</label>
      <input type="email" class="form-control" name="email" id="registerEmail1" placeholder="Email" value="111@qq.com"><?php echo $emailErr;?>
    </div>
	<div class="form-group">
      <label for="registerPwd">密码</label>
      <input type="password" class="form-control" name="password" id="registerPwd" placeholder="Password" value="1">
    </div>
     <div class="form-group">
      <label for="againRegisterPwd">再一次输入密码</label>
      <input type="password" class="form-control" name="AgainPassword" id="againRegisterPwd" placeholder="Again Password">
      <?php echo $passwordErr;?>
    </div>
	<div class="form-group">
  类别: <input type="radio" name="type" value="0" checked="checked">普通用户
        <input type="radio" name="type" value="1">管理者<br><br> 
  
  </div>
  <div class="form-group ">
		<label class="sr-only" for="registerSubmit">submit</label>
		<input type="submit" name="sub" class="btn btn-primary" id="registerSubmit" value="注册">
  </div>
  <a href="login.php">返回</a>
  <span><?php echo $err;?></span>
</form>
</div>
</div>
<script src="js/jquery-1.12.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
