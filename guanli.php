<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>示例</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
<div style="height: 150px;"></div>
<div class='container message'>
<?php
require_once("link.php");
 // $link=mysqli_connect("localhost","root","","findlost");
$link=create_connect("findlost");
 if(!$link)
 {
 	echo "<script>alert('数据库连接失败');</script>";
 }
 else
 {
 	$user=$_COOKIE['user'];
 	 $sql="SELECT * FROM findpeople WHERE finder = $user ORDER BY sendtime DESC";
     $result=mysqli_query($link,$sql);
     $i=0;
     if (mysqli_num_rows($result)==0) {
     	echo "空空如也";
     }
     while ($rows=mysqli_fetch_assoc($result))
     {
     	if($rows["class"]==0)
     	{
     	echo "
				<div class='row clearfix'>
					<div class='col-xs-12 column'>
						<div class='thingmessage'>
							<div class='left'>
								<img src='images/user.png'>
							</div>
							<div class='right'>
								<a class='more' href='delete.php?id=".$rows["id"]."'>删除</a>
								<p><span>名称: </span>".$rows['name']."</p>
								<p><span>地点: </span>".$rows['findaddress']."</p>
								<p><span>时间: </span>".$rows['sendtime']."</p>
								<p><span>电话: </span>".$rows['phone']."</p>
							</div>
						</div>
					</div>
				</div>";
		}
		else
		{
			echo "
				<div class='row clearfix'>
					<div class='col-xs-12 column'>
						<div class='peoplemessage'>
							<div class='left'>
								<img src='images/user.png'>
							</div>
							<div class='right'>
								<a class='more' href='delete.php?id=".$rows['id']."'>删除</a>
								<p><span>名称: </span>".$rows['name']."</p>
								<p><span>地点: </span>".$rows['findaddress']."</p>
								<p><span>时间: </span>".$rows['sendtime']."</p>
								<p><span>电话: </span>".$rows['phone']."</p>
							</div>
						</div>
					</div>
				</div>"; 
		}
     }
 }
?>
</div>
<div style='padding-bottom: 200px;padding-top: 30px; font-size: 40px;padding-left: 20px;'>
	到底了，别扯了……
</div>
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