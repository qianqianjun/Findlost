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
		function clearcookie()
		{
			clearCookie("user","",-1);
		}
	</script>
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
<div class="info">
	账号：<?php echo $_COOKIE["user"]; ?> <a href="esc.php">注销</a>
</div>
<div class="people" style="margin-top: 100px;"><a href="findthing.php">我丢失了物品  <img src="images/more.png"></a></div>
<div class="people"><a href="findpeople.php">我拾到了物品  <img src="images/more.png"></a></div>
<div class="people"><a href="guanli.php">管理我的发布信息  <img src="images/more.png"></a></div>
<div class="container bottom">
	<div class="row clearfix">
		<div class="col-xs-6 column" style="text-align: center;">
			<a href="index.php">
			<img src="images/message.png"><br />
			<span>招领广场</span></a>
		</div>
		<div class="col-xs-6 column" style="text-align: center;">
			<img src="images/user.png"><br/>
			<span>个人中心</span>
		</div>
	</div>
</div>
</body>
</html>