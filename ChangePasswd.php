<?
$UserId = $_COOKIE['UserId']; 
$UserName = $_COOKIE['UserName'];
$UserPass = $_COOKIE['UserPass'];
?>
<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<?
			$initPass = $_POST['initPass'];
			$newPass1 = $_POST['newPass1'];
			$newPass2 = $_POST['newPass2'];


			if($initPass!=$UserPass){
				echo("
					<script>
						window.alert('기존 Password 틀립니다. 다시 입력해주세요');
						history.go(-1);
					</script>
				");
				exit;
			}					
			
			if(empty($newPass1)){
				echo("
					<script>
						window.alert('새로운 Password를 입력해 주세요');
						history.go(-1);
					</script>
				");
				exit;
			}
			
			if($newPass1 != $newPass2){
				echo("
					<script>
						window.alert('새로운 Password가 일치하지 않습니다');
						history.go(-1);
					</script>
				");
				exit;	
			}
				
			
			$con = mysql_connect("localhost","mobile","mobile");
			mysql_select_db("mobiledb", $con);
			
			$update_query = "update member  
							set upass = '$newPass1'
							where uname = '$UserName'";
			
							
			$result = mysql_query($update_query, $con);
			
			if($result) {
				echo("
					<script>
						window.alert('Password수정이 완료 되었습니다. 다시 로그인 해 주세요');
						history.go(1);
					</script>
				");
				
			}else{
				echo("
					<script>
						window.alert('Password 수정에 실패했습니다. 다시 한 번 시도해 주세요');
						history.go(-1);
					</script>
				");
				
			}
			
			mysql_close($con);
			
			echo("<meta http-equiv='Refresh' content ='0; url=./login.html'>");
		
		
		?>
	
	</body>
</html>