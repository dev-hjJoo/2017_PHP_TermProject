<?
	SetCookie("UserId","",time());
	SetCookie("UserName","",time());
	echo("
		<script>
			window.alert('Logout 이 완료되었습니다')
			history.go(1);
		</script>
	");			
	echo("<meta http-equiv='Refresh' content = '0; url=./mainPage.html'>");
?>
<!--만든이 : 정보통신공학과 20163031 차해리-->