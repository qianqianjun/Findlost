<?php 
require_once("link.php"); 
if (isset($_POST["user"])&&$_POST["user"]!="") {
	$account=$_POST["user"];
	$password=$_POST["password"];
	$sql="SELECT * FROM `user` WHERE `account`='$account' AND `password`='$password' ";
	// $link=mysqli_connect("localhost","root","","findlost");
	$link=create_connect("findlost");
	if(!$link)
	{
		echo "<script>alert('数据库连接失败');history.back();</script>";
	}
	else
	{
		echo "success";
		$result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)==0)
		{
			echo "<script>alert('登陆失败');history.back();</script>";
		}
		else
		{
			setcookie("user",$_POST["user"]);
	        echo "<script>window.location.href='index.php';</script>";
		}
	}
}
else
{
	echo "哈哈";
}
?>