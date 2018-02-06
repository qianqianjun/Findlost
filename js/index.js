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