
<?
	// 쿠키를 받아 올 부분 (ID 값)
	$userid = $_COOKIE['UserId']; 
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
		<?
		/*
			파일명 : santaMail_process.php
			작성자 : 주효진
			파일 역할 :  kidsSanta.php에서 작성된 글을 데이터베이스에 저장.
						글이 4개 이상 보내질 경우 자동으로 오래된 글 부터 삭제하고 최신 글이 저장된다.
		*/
				
		?>
	</head>
	
	<body>
	<?
	
		/*
			작성한 내용을 post로 받아 온다.
			letter : 작성 내용
			board : kidsSanta에서 작성한 내용을 저장한 데이터베이스
		*/		
		$letter = $_POST['letter'];
		$board = $_POST['board'];
		
		
		
		if(empty($userid)) {
			echo("
				<script>
					window.alert('로그인 해주세요.');
					history.go(-1)
				</script>
			");
		}
		
		if(empty($letter)) {
			echo("
				<script>
					window.alert('내용이 없습니다. 다시 입력해주세요!');
					history.go(-1)
				</script>
			");
		}
		
		
		$con = mysql_connect("localhost", "mobile", "mobile");
		
		
		mysql_select_db("mobiledb", $con);
	
		
		
		$wdate = date("Y-m-d H:i:s");
		
		
		
		$letter_query = " 	SELECT *
							FROM santaboard
							WHERE userid = '$userid' ";
				
				
		$letter_result = mysql_query($letter_query, $con);
		
		$letter_count = mysql_num_rows($letter_result);
		
		
		}
		
		
		/*
			데이터 추가되는 부분
		*/
		
		$insert_query = "INSERT INTO $board
						 VALUES('$userid', '$letter', '$wdate', 0)";
		
		mysql_query($insert_query, $con);
			
		
		mysql_close($con);
		
		
		echo("<meta http-equiv = 'Refresh' content = '0; url=./thanks.html'>");
		

		
	?>
	</body>
</html>