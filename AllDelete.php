<?
$UserId = $_COOKIE['UserId']; 
$UserName = $_COOKIE['UserName'];
?>

<!--만든이 : 정보통신공학과 20163031 차해리-->

<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<?	$agree = $_POST['agree'];
		
			if(!$agree){
				echo("
					<script>
						window.alert('탈퇴하기 위해 동의을 해주세요');
						history.go(-1);
					</script>
				");

			}
			else{
				$con = mysql_connect("localhost","mobile","mobile");
				mysql_select_db("mobiledb",$con);
		
				$query = "delete from member where uname='$UserName'";
			
				$result = mysql_query($query,$con);
			
				if($result){
					echo("
					<script>
						window.alert('탈퇴가 완료되었습니다')
						history.go(1);
					</script>
				");		
			}
				
			}
		

			mysql_close($con);		
			echo("<meta http-equiv='Refresh' content='0; url=./mainPage.html'>");
		
		?>
	
	</body>
</html>