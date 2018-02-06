<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>示例</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">
		function checkdata()
		{
			if (document.add.name.value.length!=0&&document.add.attribute.value.length!=0&&document.add.describes.value.length!=0&&document.add.findaddress.value.length!=0&&document.add.phone.value.length!=0&&document.add.photo.value.length!=0) 
			{
				add.submit();
			}
			else
			{
				alert("填全信息");
			}
			
		}
	</script>
	<style type="text/css">
		.adds
		{
			width: 100%;
			margin-top: 30px;
			text-align: center;
		}
		.adds input
		{
			width: 80%;
			height: 100px;
			font-size: 40px;
			padding: 20px;
			margin-top: 20px;
			border-radius: 20px;
			border:3px solid blue;
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
<div style="height: 150px;"></div>
<div style="font-size: 40px;font-weight: bolder;padding: 30px;">发布消息</div>
<div class="adds">
	<form name="add" action="addmessage.php" method="post">
		<input type="text" name="name" placeholder="输入所失物品名称"><br>
		<input type="text" name="attribute" placeholder="输入所失物品类别"><br>
		<input type="text" name="describes" placeholder="输入所失物品描述"><br>
		<input type="text" name="findaddress" placeholder="输入丢失地点"><br>
		<input type="text" name="phone" placeholder="输入联系方式"><br>
		<input type="text" name="photo" placeholder="输入照片"><br>
		<input type="hidden" name="class" value="1">
		<input type="button" value="提交" class="button" onclick="checkdata()">
	</form>
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