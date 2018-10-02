<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<?
			$uname = $_POST['uname'];
			$birthdate = $_POST['birthdate'];
			
			$con = mysql_connect("localhost","mobile","mobile");
			mysql_select_db("mobiledb",$con);
			
			$query = "select * 
					  from member 
					  where uname='$uname' and birthdate='$birthdate'";
					  
			$result = mysql_query($query,$con);
			$total = mysql_num_rows($result);
			
			if(!$total){
				echo("
					<script>
						window.alert('입력하신 이름과 생년월일을 동시에 만족하는 사용자 아이디가 없습니다.')
						history.go(-1);
					</script>
				");
				exit;
			}else{
				$uid = mysql_result($result,0,"uid");
				echo("
					<script>
						window.alert('귀하의 아이디는 $uid 입니다')	
					</script>
				");
			}
			mysql_close($con);
			
			echo("<meta http-equiv='Refresh' content='0; url=./login.html'>");
		
		?>
	
	</body>
</html>