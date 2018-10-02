<?
$UserName = $_COOKIE['UserName'];

?>
<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<?
		
			$zip = $_POST['zip'];
			$addr1 = $_POST['addr1'];
			$addr2 = $_POST['addr2'];
		
			$con = mysql_connect("localhost","mobile","mobile");
			mysql_select_db("mobiledb", $con);
			
			
			
			
			$update_query = "update member  
							set zipcode='$zip', addr1='$addr1', addr2='$addr2'
							where uname = '$UserName'";
		
		
	
			$result = mysql_query($update_query, $con);
			
		
			
			if($result) {
				echo("
					<script>
						window.alert('수정이 완료 되었습니다.');
						history.go(1);
					</script>
				");
				
			}else{
				echo("
					<script>
						window.alert('수정에 실패했습니다. 다시 한 번 시도해 주세요');
						history.go(-1);
					</script>
				");
				
			}
			
			mysql_close($con);
			
			echo("
			<script>
				window.close();
			</script>
			");
			
		echo("<meta http-equiv='Refresh' content ='0; url =./ChangeData.html'>");
		
		?>
	
	</body>
</html>