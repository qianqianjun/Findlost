<?php 
require_once("link.php");
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql="DELETE FROM `findpeople` WHERE id=$id";
	// $link=mysqli_connect("localhost","root","","findlost");
	$link=create_connect("findlost");
	echo $sql;
	if (!$link) {
		echo "<script>alert('连接数据库失败');history.back();</script>";
	}
	else
	{
		$result=mysqli_query($link,$sql);
		if (!$result) {
			echo "<script>alert('失败');history.back();</script>";
		}
		else
		{
			echo "<script>window.location.href='guanli.php'</script>";
		}
	}
	
}
?>