<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		
	</head>
	
	<body>
	<?
		
		$name = $_GET['name'];
				
		$con = mysql_connect("localhost", "mobile", "mobile");
		mysql_select_db("mobiledb", $con);
		
	
			$delete_query = "
				DELETE
				FROM gift
				WHERE name = '$name';
			";
			
			$result = mysql_query($delete_query, $con);
			
			if($result == 1) {
				echo("
					<script>
						window.alert('정상적으로 삭제되었습니다.');
					</script>
				");
			} else {
				echo("
					<script>
						window.alert('삭제되지 않았습니다.');
					</script>
					
				");
			}
			
			mysql_close($con);
			
			echo("<meta http-equiv = 'Refresh' content ='0; url=http://localhost/select_delete_gift.php?cpage=1&arrange=1'>");
		
	?>
	</body>
	
</html>