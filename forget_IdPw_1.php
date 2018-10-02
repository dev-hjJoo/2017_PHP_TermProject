<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<?
			$uname = $_POST['uname'];
			//$mphone = $_POST['mphone'];
			$p1 = $_POST['p1'];
			$p2 = $_POST['p2'];
			$p3 = $_POST['p3'];
			
			$mphone="$p1$p2$p3";
			
			$con = mysql_connect("localhost","mobile","mobile");
			mysql_select_db("mobiledb",$con);
			
			$query = "select * 
					  from member 
					  where uname='$uname' and mphone='$mphone'";
					  
			$result = mysql_query($query,$con);
			
			$total = mysql_num_rows($result);
			
			if(!$total){
				echo("
					<script>
						window.alert('입력하신 이름과 폰번호를 동시에 만족하는 사용자 아이디가 없습니다.')
						history.go(-1);
					</script>
				");
				exit;
			}else{
				$uid = mysql_result($result, 0, "uid");
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