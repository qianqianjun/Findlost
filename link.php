<?php  
function create_connect($database)
{
	$link=mysqli_connect("localhost","root","这里写你自己数据库的密码",$database);
	return $link;
}
?>