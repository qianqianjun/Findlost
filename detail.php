<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>示例</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.detail p
		{
			font-size: 40px;
			width: 80%;
			text-align: left;
		}
		.detail span
		{
			font-size: 40px;
			font-weight: bolder;
			margin-right: 20px;
		}
	</style>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
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
<div style="height: 180px;"></div>
<div style="height: 50px; font-size: 40px;font-weight: bolder;padding-left: 30px;">详细信息</div>
<?php
require_once("link.php");
if (isset($_GET["id"])) {
	// $link=mysqli_connect("localhost","root","","findlost");
	$link=create_connect("findlost");
	if(!$link)
	{
		echo "<script>alett('数据库连接失败');history.back();</script>";
	}
	else
	{
		$id=$_GET['id'];
		$sql="SELECT * FROM `findpeople` WHERE id=$id";
		$result=mysqli_query($link,$sql);
		if(!$result)
		{
			echo "没有查到相关内容";
		}
		else
		{
			while($rows=mysqli_fetch_assoc($result))
			{
			echo "<div class='container detail'>
					<div class='row clearfix'>
						<div class='col-xs-12 column'>
							<img src='images/user.png'>
							<div class='text'>
								<p class='iteam'><span>名称: </span>".$rows['name']."</p>
								<p class='iteam'><span>类别: </span>".$rows['attribute']."</p>
								<p class='iteam'><span>描述: </span>".$rows['describes']."</p>
								<p class='iteam'><span>地址: </span>".$rows['findaddress']."</p>
								<p class='iteam'><span>时间: </span>".$rows['sendtime']."</p>
								<p class='iteam'><span>电话: </span>".$rows['phone']."</p>";
								if ($rows['class']==0) {
									echo "<p class='iteam'><span>拾到人：</span>".$rows['finder']."</p>";
								}
								else
								{
									echo "<p class='iteam'><span>寻物人:</span>".$rows['finder']."</p>";
								}

							echo "
							</div>
						</div>
					</div>
				</div>";
			}
		}
	}
}
?>
<div class="container bottom">
	<div class="row clearfix">
		<div class="col-xs-6 column" style="text-align: center;">
			<a href="index.php">
			<img src="images/message.png"><br />
			<span>招领广场</span></a>
		</div>
		<div class="col-xs-6 column" style="text-align: center;">
			<a href="people.php">
			<img src="images/user.png"><br/>
			<span>个人中心</span></a>
		</div>
	</div>
</div>
</body>
</html>