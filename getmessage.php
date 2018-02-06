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
 	if (isset($_POST["sql"])) {
 		$sql=$_POST["sql"];
 	}
 	else
 	{
 		$sql="SELECT * FROM findpeople";
 	}
     $result=mysqli_query($link,$sql);
     $i=0;
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
?>