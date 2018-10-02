<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
	<?
		$uid = $_POST['uid'];
		$uname = $_POST['uname'];
		$birthdate = $_POST['birthdate'];
		
		$con = mysql_connect("localhost","mobile","mobile");
		mysql_select_db("mobiledb", $con);
		
		$query = "select * 
				  from member 
				  where uname='$uname' AND uid='$uid' AND birthdate='$birthdate'";
				  
		$result = mysql_query($query, $con);
		$total = mysql_num_rows($result);
		
		if(!$total){
			echo("
				<script>
					window.alert('입력하신 아이디와 이름과 생년월일이 동시에 만족하지 않습니다')
					history.go(-1)
				</script>
			");
			exit;
		}else{
			$upass = mysql_result($result, 0, "upass");
			echo("
			<script>
				window.alert('비밀번호는 $upass 입니다');
			</script>
			");
		}
		
		mysql_close($con);
		echo("<meta http-equiv='Refresh' content='0; url=./login.html'>");
	?>
	
	
	</body>
</html>