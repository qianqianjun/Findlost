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
		function logoincheckdata()
		{
			if(document.logoin.user.value.length!=0&&document.logoin.password.value.length!=0)
			{
				logoin.submit();
			}
			else
			{
				alert("请您填全登陆信息");
			}
		}
	</script>
</head>
<body>
<?php 
require_once("link.php"); 
if (isset($_POST["user"])&&$_POST["user"]!="") {
	setcookie("user",$_POST["user"]);
}
if (isset($_COOKIE["user"])&&$_COOKIE["user"]!="") 
{
	print <<<ETO
<!-- 头部 -->
<div class="container top">
	<div class="row clearfix">
		<div class="col-xs-12 column" style="text-align: center;">
			<img src="images/buct.png">
			<span>失物招领</span>
		</div>
	</div>
</div>
<!-- 中部 -->
<div class="container body">
	<div class="row clearfix">
		<div class="col-xs-6 column">
			<form name="findthing" action="logoin.php" method="post">
				<span>消息分类: </span>
				<select class="select" id='messagetype' onchange="postdata()">
			      <option>所有消息</option>
			      <option>寻物品</option>
			      <option>寻失主</option>
			    </select>
			</form>
		</div>
		<div class="col-xs-6 column">
			<form name="findthing" actio="index.php" method="post">
				<span>时间跨度: </span>
				<select class="select" id='sendtime' onchange="postdata()">
				  <option>所有时间</option>
			      <option>一天内</option>
			      <option>三天内</option>
			      <option>一周内</option>
			    </select>
			</form>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-xs-12 column">
			<form name="findthing" actio="index.php" method="post">
				<span>失拾地点: </span>
				<select class="select" id='findaddress' onchange="postdata()">
			      <option>所有地点</option>
			      <option>食堂</option>
			      <option>主教</option>
			      <option>图书馆</option>
			      <option>宿舍</option>
			      <option>体育馆</option>
			    </select>
			</form>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-xs-12 column">
			<form name="findthing" actio="index.php" method="post">
				<span>物品检索: </span>
				<input type="text" name="thing" class="textinput" placeholder="搜索物品，如校园卡……" id="attribute">
				<input type="button" value="搜索" class="button" onclick="postdata()">
			</form>
		</div>
	</div>
</div>
<div style="height:450px;"></div>
<div style="font-size: 40px;padding: 20px;font-weight: bolder;">消息列表</div>
<div class='container message'>
ETO;
     $link=create_connect("findlost");
     // $link=mysqli_connect("localhost","root","","findlost");
     if(!$link)
     {
     	echo "<script>alert('数据库连接失败');</script>";
     }
     else
     {
     	 $sql="SELECT * FROM findpeople ORDER BY sendtime DESC";
	     $result=mysqli_query($link,$sql);
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
									<a class='more' href='detail.php?id=".$rows["id"]."'>MORE</a>
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
									<a class='more' href='detail.php?id=".$rows['id']."'>MORE</a>
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


echo "
</div>
<!-- 底部 -->
<div class='container bottom'>
	<div class='row clearfix'>
		<div class='col-xs-6 column' style='text-align: center;'>
			<img src='images/message.png'><br />
			<span>招领广场</span>
		</div>
		<div class='col-xs-6 column' style='text-align: center;'>
			<a href='people.php'><img src='images/user.png'><br/>
			<span>个人中心</span></a>
		</div>
	</div>
</div>
<div style='padding-bottom: 200px;padding-top: 30px; font-size: 40px;padding-left: 20px;'>
	到底了，别扯了……
</div>
";
}
else
{

	print <<<ETO
<div class="container logoin">
	<div class="row clearfix">
		<div class="logohead">
				北京化工大学失物招领系统
			</div>
		<div class="col-xs-12 column">
			<form action="logoin.php" method="post" name="logoin">
				<span>账号</span><br>
				<input type="text" placeholder="请输入学号" name="user" class="user"><br>
				<span>密码</span><br>
				<input type="password" name="password" class="user"  placeholder="请输入密码"><br>
				<input type="button" value="提 交" class="button" style="font-weight:bold;color:white;"onclick="logoincheckdata()"><br/>
				<a href="join.php"><input type="button" value="注 册" class="button" style="margin-top:20px;font-weight:bold;color:white;"></a>
		    </form>
		</div>
	</div>
</div>
ETO;
}
?>
<script type="text/javascript">
	function postdata()
	{
		var sqls="SELECT * FROM `findpeople` WHERE ";
		var findaddress=$("#findaddress").val();
		var search=$("#attribute").val();
		var sendtime=$("#sendtime").val();
		var type=$("#messagetype").val();
		var sub;
		//时间跨度处理：
		if (sendtime=="所有时间") {
			sendtime=" AND 1 ";
		}
		else
		{
			if (sendtime=="一天内")
				sub=-1;
			if (sendtime=="三天内")
				sub=-3;
			if (sendtime=="一周内")
				sub=-12
			sendtime=" AND `sendtime` BETWEEN DATE_ADD(NOW(),INTERVAL "+sub+" DAY) AND NOW() ";
		}
		//消息类别处理：
		if (type=="所有消息") {
			type=" AND 1 ";
		}
		else
		{
			if (type=="寻物品")
				type=" AND class='1' ";
			if (type=="寻失主")
				type=" AND class='0' ";
		}
		//搜索框中信息处理
		if (search!="") {
			search=" AND (`finder` LIKE BINARY '%"+search+"%' OR `name` LIKE BINARY '%"+search+"%' OR `attribute` LIKE BINARY '%"+search+"%' OR `describes` LIKE BINARY '%"+search+"%' OR `findaddress` LIKE BINARY '%"+search+"%' OR `phone` LIKE BINARY '%"+search+"%' OR `sendtime` LIKE BINARY '%"+search+"%') ";
		}
		else
		{
			search=" AND 1 ";
		}
		//地点处理
		if (findaddress=="所有地点")
			findaddress=" 1 ";
		else
		{
			findaddress=" `findaddress`='"+findaddress+"' ";
		}
		sqls=sqls+findaddress+search+type+sendtime+" ORDER BY sendtime DESC";
		// alert(sqls);
	    $.post("getmessage.php",{'sql':sqls},function(data,status){
	        $(".message").empty();
	        $(".message").html(data);
	    });
     }
</script>
</body>
</html>