<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>示例</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">
		function checkdata()
		{
			if ($("#account").val()!=""&&$("#password").val()!=""&&$("#password1").val()==$("#password").val()) 
			{
				add.submit();
			}
			else
			{
				alert("信息不全或者密码不一致");
			}
			
		}
	</script>
	<style type="text/css">
		.adds
		{
			width: 100%;
			margin-top: 30px;
			text-align: left;
			margin-left: 40px;
		}
		.adds input
		{
			width: 80%;
			height: 120px;
			font-size: 40px;
			padding: 20px;
			margin-top: 20px;
			border-radius: 20px;
			border:3px solid blue;
		}
		.adds span
		{
			font-size: 50px;
			margin-top: 10px;
			/*margin-bottom: 5px;*/
			font-weight: bolder;
		}
	</style>
</head>
<body>
<div class="container top">
	<div class="row clearfix">
		<div class="col-xs-12 column" style="text-align: center;">
			<img src="images/buct.png">
			<span>失物招领</span>
		</div>
	</div>
</div>
<?php
require_once("link.php");  
if (isset($_POST["user"])){
	// $link=mysqli_connect("localhost","root","","findlost");
	$link=create_connect("findlost");
	if(!$link)
		echo "<script>alert('连接失败');history.back();</script>";
	else
	{
		$user=$_POST["user"];
		$sql="SELECT * FROM `user` WHERE account='$user'";
		$result=mysqli_query($link,$sql);
		if (mysqli_num_rows($result)) {
			echo "<script>alert('该用户已经存在');history.back();</script>";
		}
		else
		{
			$password=$_POST["password"];
			$sql2="INSERT INTO user (`account`,`password`) VALUES ('$user','$password')";
			$res=mysqli_query($link,$sql2);
			if(!$res)
			{
				echo "<script>alert('注册失败');history.back();</script>";
			}
			else
			{
				setcookie("user",$user);
				echo "<script>alert('注册成功');window.location.href='index.php';</script>";
			}

		}
	}
}
else
{
echo "<div style='height: 150px;'></div>
<div style='font-size: 40px;font-weight: bolder;padding: 30px;'>用户注册</div>
<div class='adds'>
	<form name='add' action='join.php' method='post'>
		<span>账号</span><br>
		<input type='text' name='user' placeholder='输入您的学号' id='account'><br>
		<span>密码</span><br>
		<input type='password' name='password' placeholder='输入密码' id='password'><br>
		<span>重复密码</span><br>
		<input type='password' name='password1' placeholder='重复密码' id='password1'><br>
		<input type='button' value='提交' class='button' onclick='checkdata()'>
	</form>
</div>";
}
?>

</body>
</html>
