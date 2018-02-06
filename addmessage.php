<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>示例</title>
</head>
<body>
<?php
require_once("link.php");
if(isset($_POST["name"]))
{
	$name=$_POST["name"];
	$attribute=$_POST["attribute"];
	$describes=$_POST["describes"];
	$findaddress=$_POST["findaddress"];
	$phone=$_POST["phone"];
	$class=$_POST["class"];
	$finder=$_COOKIE["user"];
	$photo="user.png";
	$sendtime=date("Y-m-d H:i:s");
	// echo $name." ".$attribute." ".$describes." ".$findaddress." ".$phone." ".$class." ".$finder." ".$photo." ".$sendtime;
	$sql="INSERT INTO `findpeople`(`name`, `attribute`, `describes`, `findaddress`, `sendtime`, `phone`, `finder`, `photo`, `class`) VALUES ('".$name."','".$attribute."','".$describes."','".$findaddress."','".$sendtime."','".$phone."','".$finder."','".$photo."','".$class."')";
	// echo $sql;
	// $link=mysqli_connect("localhost","root","","findlost");
	$link=create_connect("findlost");
	if(!$link)
	{
		echo "<script>alert('连接失败');history.back();</script>";
	}
	else
	{
		$result=mysqli_query($link,$sql);
		if(!$result)
		{
			echo "<script>alert('失败');</script>";
		}
		else
		{
			echo "<script>window.location.href='index.php';</script>";
		}
	}
}
?>
</body>
</html>
