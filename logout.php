<?
	SetCookie("UserId","",time());
	SetCookie("UserName","",time());
	echo("
		<script>
			window.alert('Logout �� �Ϸ�Ǿ����ϴ�')
			history.go(1);
		</script>
	");			
	echo("<meta http-equiv='Refresh' content = '0; url=./mainPage.html'>");
?>
<!--������ : ������Ű��а� 20163031 ���ظ�-->