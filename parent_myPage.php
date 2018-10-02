
<?
	// 쿠키를 받아 올 부분 (ID 값)
	$userid = $_COOKIE['UserId']; 
	$cpage = $_GET['page'];
	$arrange = $_GET['arrange'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
		<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
		
		
	</head>
	
	<body  id="bg">
	
	<?
		if(empty($userid)) {
			echo("
				<script>
					window.alert('로그인 해주세요.');
					history.go(-1)
				</script>
			");
		}
		
		
		
		$con = mysql_connect("localhost", "mobile", "mobile");
		
		
		mysql_select_db("mobiledb", $con);
	
	
		
		
		
		//전체 디자인
		echo("<table border=3 width=1300 height=750 align=center class=big bgcolor=white>
				<tr height=75>
					<td>
						<table width=280 height=70 class=mini align=center>
							<tr>
								<td class=title>
									<a href='http://localhost/parent.html' class=title> parents </a>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr height=150>
					<td class=middle>
						<table border=1 width=100% height=50% align=center>
							<tr>
								<td class=adult width=20%>
									<a href='http://localhost/kidsGame.html'>Movie<br>reservation</a>
								</td>
		
								<td class=adult width=20%>
									<a href='http://localhost/kidsCartoon.html'>Restaurant<br>reservation</a>
								</td>
		
								<td class=adult width=20% >
									<a href='http://localhost/gift_to_children.php?cpage=1&arrange=1'>Gift<br>to Childern</a>
								</td>
		
								<td class=adult width=20%>
									<a href='http://localhost/check_kidsLetter.php?cpage=1&arrange=1' > Letter <br> of kids </a>
								</td>
		
								<td class=adult width=20%>
									<a href='http://localhost/parent_myPage.php?arrange=1&page=1'> MyPage </a>
								</td>
		
							</tr>
						</table>
					</td>
				</tr>
				<tr height=525>
					<td>
						<table  width=80% height=8% align=center>
							<tr>
								<td class=board>
		");
		
		if($arrange == 1) {
			echo("
									<font face='맑은 고딕'> <b>최신순으로 정렬</b> </font> /
									<a href='http://localhost/parent_myPage.php?arrange=2&page=1'> <font face='맑은 고딕' color=gray> 오래된순으로 정렬 </font> </a>
			");
		}
		else {
			echo("
									<a href='http://localhost/parent_myPage.php?arrange=1&page=1'> <font face='맑은 고딕' color=gray> 최신순으로 정렬 </font> </a>	/
									 <font face='맑은 고딕'> <b> 오래된순으로 정렬 </b> </font>
			");
			
		}
		
		echo("
									
								</td>
							</tr>
						</table>
						<table width=80% height=50% align=center class=board>
		");
		
		$arrange = $_GET['arrange'];
		
		
		
		
		if($arrange == 1) {
			$like_query = " SELECT *
								FROM likegift
								WHERE userid = '$userid'
								ORDER BY likedate DESC";
		} else {
			$like_query = " SELECT *
							FROM likegift
							WHERE userid = '$userid'
							ORDER BY likedate";
		}
		
		
		$like_result = mysql_query($like_query, $con);
		
		$like_num = mysql_num_rows($like_result);
		
		
		
		if($like_num != 0) {
			
			$start = ($cpage-1)*5;
			for($i=$start; $i<=$start+4; $i++) {
				if($i < $like_num) {
					$date = mysql_result($like_result, $i, 'likedate');
					$gift = mysql_result($like_result, $i, 'select_gift');
				
					echo("	<tr height=20%>
								<td width=20% class=board>
									<font color=red size=6> ♥ </font>
								</td>
								<td width=50% class=board>
									$gift
								</td>
								<td width=30% class=board>
									$date
								</td>
							</tr>
					");	
				}
				else {
					echo("	<tr height=20%>
								<td width=20% class=board colspan=3>
									<font color=gray> 아직 여기까지 좋아요 한 상품이 없어요! </font>
								</td>
							</tr>
					");
				}
			}
		} else {
			echo("				<tr>
								<td width=80% class=board>
									작성된 내용이 없어요~
								</td>
							</tr>
			");
		}
		
		
		
		echo("
						</table height=20>
						<table width=80% align=center>
							<tr width=100%>
								<td class=board>
		");
		for($i=1; $i<=(($like_num-1)/5)+1; $i++) {
			echo("<a href='http://localhost/parent_myPage.php?arrange=1&page=$i'> $i </a> &nbsp;&nbsp;");
		}
		echo("
								</td>
							</tr>
						</table>
					</tr>
				</td>						
			</table>
		");
		
		
				
		
		
		// mysql과의 연결을 끊어준다.
		mysql_close($con);
		
	?>
	</body>
</html>