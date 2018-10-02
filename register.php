<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<?
			$uid = $_POST['uid'];
			
			$upass1 = $_POST['upass1'];
			$upass2 = $_POST['upass2'];
			
			$uname = $_POST['uname'];
			
			$p1 = $_POST['p1'];
			$p2 = $_POST['p2'];
			$p3 = $_POST['p3'];
				
			$email = $_POST['email'];
			
			$birthdate = $_POST['birthdate'];
			
			$kidsid = $_POST['kidsid'];
			
			$zip = $_POST['zip'];
			$addr1 = $_POST['addr1'];
			$addr2 = $_POST['addr2'];
			
			
			function check($message) {	
			echo ("
				<script>
					window.alert(\"$message\");
					history.go(-1);
				</script>
			");
			exit;
			}
		
			if(!$uid){
				check('사용자 ID를 입력하세요');
			}
			
			if(!$upass1){
				check('Password를 입력해 주세요');
			}
			
			if($upass1 != $upass2){
				check('Password가 일치하지 않습니다');
			}
			
			if(!$uname){
				check('이름을 입력해 주세요');
			}
			
			if(!$birthdate){
				check('생년월일을 입력해 주세요');
			}
			
			if(!$email){
				check('이메일을 입력해 주세요');
			}
				
			if(!p2 || !p3){
				check('폰번호를 입력해 주세요');
			}
			
			$con = mysql_connect("localhost","mobile","mobile");
			mysql_select_db("mobiledb" , $con);
			
			$upass = $upass1;
			$mphone = "$p1$p2$p3";
			
			$insert_query = "insert into member (uid, upass, uname, mphone, email, birthdate,kidsid, zipcode, addr1, addr2, approved)
							values('$uid','$upass','$uname','$mphone','$email','$birthdate','$kidsid','$zip', '$addr1','$addr2',1)";
							
			$result = mysql_query($insert_query , $con);
			
			if($result) {
				echo("
					<script>
						window.alert('회원가입이 완료되었습니다.');
						history.go(1);
					</script>
				");
				
			}else{
				echo("
					<script>
						window.alert('회원가입에 실패했습니다. 다시 한 번 시도해 주세요');
						history.go(-1);
					</script>
				");
				
			}
			
			mysql_close($con);
			echo("<meta http-equiv='Refresh' content ='0; url=./login.html'>");
			
		?>
	
	</body>
	
</html>