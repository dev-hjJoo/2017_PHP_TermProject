<?
	//만든이 : 정보통신공학과 20163031 차해리
	$uid = $_POST['uid'];
	$upass = $_POST['upass'];
	
	$con = mysql_connect("localhost","mobile","mobile");
	mysql_select_db("mobiledb",$con);
	
	$result = mysql_query("select * from member where uid ='$uid'", $con);
	$total = mysql_num_rows($result);
	
			
	
	if(!$total){
		echo("
			<html>
			<head>
				<meta http-equiv='Content-Type' content = 'text/html; charset=utf-8'>
			</head>
			<body>
				<script>
					window.alert('ID가 존재하지 않습니다')
					history.go(-1);
				</script>
			</body>
			</html>
		");
		exit;
		
	} else{
		
		$userId = mysql_result($result, 0, "uid");
		$pass = mysql_result($result, 0, "upass");
		$uname = mysql_result($result, 0, "uname");
		
		$email = mysql_result($result, 0, "email");
		$mphone = mysql_result($result, 0, "mphone");
		
		$zipcode = mysql_result($result, 0, "zipcode");
		$addr1 = mysql_result($result, 0, "addr1");
		$addr2 = mysql_result($result, 0, "addr2");
		
	
		
				
		if($pass!= $upass) {
			echo("
			<html>
				<head>
					<meta http-equiv='Content-Type' content = 'text/html; charset=utf-8'>
				</head>
				<body>
					<script>
						window.alert('Password가 틀립니다')
						history.go(-1);
					</script>
				</body>
			</html>
			
			");
			exit;
		} else {
			SetCookie("UserId", "$userId", time()+3600); 
			SetCookie("UserName","$uname", time()+3600);
			SetCookie("UserPass", "$pass", time()+3600); 

			
			
			echo("<meta http-equiv='Refresh' content ='0; url =./selectChannel.php'>");
		}
		
	}
	mysql_close($con);
?>