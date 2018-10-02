
<?
	// 쿠키를 받아 올 부분 (ID 값)
	$userid = $_COOKIE['UserId']; 
	$cpage = $_GET['cpage'];
	$arrange = $_GET['arrange'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
		<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
		
		<?
		/*
			파일명 : check_kidsLetter.php?cpage=1
			작성자 : 주효진
			파일 내용 :  만약 로그인이 해제되었을 경우, 다시 로그인하게 하기.
						쿠키로 사용자 아이디 받아오기.
						아이가 쓴 글 가지고 오기
						이미 읽은 글이라면 색깔 변화(->회색) 주기
						
		*/
		?>
	</head>
	
	<body  id="bg">
	
	<?
		/*
			자녀가 작성한 내용을 부모가 볼 수 있는 페이지.
		*/
		

		// id값은 not null.
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
	
	
	
		
		$kidsid_query = "	SELECT * 
							FROM member
							WHERE uid='$userid'";
		
		$kidsid = mysql_query($kidsid_query, $con);
		
		
		$kidsid_result = mysql_result($kidsid, 0, "kidsid");
		
		
		
		if($kidsid_result == '') {
			echo("<font color=white> ******** </font>");
			echo("
				<script>
					window.alert('아이 아이디를 등록해주세요.');
					history.go(-1);
				</script>
			");
		}
		
		
		
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
									<a href='http://localhost/check_kidsLetter.php?cpage=1&arrange=2'> <font face='맑은 고딕' color=gray> 오래된순으로 정렬 </font> </a>
			");
		}
		else {
			echo("
									<a href='http://localhost/check_kidsLetter.php?cpage=1&arrange=1'> <font face='맑은 고딕' color=gray> 최신순으로 정렬 </font> </a>	/
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
			$kidstext_query = " SELECT *
								FROM santaboard
								WHERE userid = '$kidsid_result'
								ORDER BY wdate DESC";
		} else {
			$kidstext_query = " SELECT *
								FROM santaboard
								WHERE userid = '$kidsid_result'
								ORDER BY wdate";
		}
		
			
		$kidstext = mysql_query($kidstext_query, $con);
		
		
		$kidstext_num = mysql_num_rows($kidstext);
		
		$page_size = 5;
		
		
		if($kidstext_num > 0) {
			
			$current_start = 1+(($cpage-1)*4);
			for($i=$current_start; $i<=$current_start+3; $i++) {
				
				$index = $i - 1;
				if($index < $kidstext_num) {
					
					$kidstext_wdate_result = mysql_result($kidstext, $i-1, 'wdate');
			
					echo("
							<tr height=20%>
								<td class=board bgcolor=red width = 10%>
									<font color=white> $i </font>
								</td>
								<td class=board bgcolor=orange width=70%>
					");
			
			
					
					$isread_result = mysql_result($kidstext, $i-1, 'isread');
			
					
					if($isread_result == 0) {
					
			
						echo("
									<a href='http://localhost/read_kidsLetter.php?kidid=$kidsid_result&index=$index&arrange=$arrange'>
										<font face='맑은 고딕'> <font color=green>★</font> 우리 아이의 <font color=white><b>소원</b></font>이 담긴 글이 도착했어요! <font color=red>★</font> </font>
									</a>
						");
				
				
				
					}
					
					else {
						echo("
								<a href='http://localhost/read_kidsLetter.php?kidid=$kidsid_result&index=$index&arrange=$arrange'>
								<font face='맑은 고딕' color=lightgray>★ 우리 아이의 <b>소원</b>이 담긴 글이 도착했어요!★ </font>	
								</a>
						");
					}
			
			
					echo("
								</td>
								<td class=board bgcolor=green width=20%>
									<font color=white face='arial'>$kidstext_wdate_result</font>
								</td>
							</tr>
					");
			
				}
				else {
		
					//공백
		
			
					echo("			
							<tr height = $empty_board_percent%>
								<td class=board colspan=3>
									<font color=lightgray face='맑은 고딕'> 아직 도착한 글이 없어요~ </font>
								</td>
					");
				}
		
			}
			
								
		} else {
			echo("
							<tr height=100%>
								<td class=emptyboard>
									작성된 글이 없어요!
								</td>
			");
		}
		
		
		// 페이징 처리
		echo("
						<tr height = 20%>
							<td class = board colspan=3>
								<font color = lightgray>
		");
		for($i = 1; $i <= (($kidstext_num-1)/4)+1; $i++) {
			if($i == $cpage) {
				echo ("				<font color = red> $i </font>&nbsp;	");
			}
			else {
				echo("
									<a href = http://localhost/check_kidsLetter.php?cpage=$i&arrange=$arrange> $i </a>
				");
			}
		}
		echo("
								</font>
							</td>
						</tr>
					</table>
		");
		
		
		
		/*
			상품 추천
		*/
		
		echo("			<table height=42% width=80% align=center>
							<tr height=80%>
								<td class=board width=20% rowspan=2>
									우리 아이에게<br><b><font color=green>이</font>런 상<font color=red>품</font></b>은<br>어떠신가요?<br>
									<font color=gray> (사용자들이 가장 많이 클릭한 상품!) </font>
								</td>
		");
		
		// click순 이미지 정렬
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY clickcount DESC;
		";
		$arrange = mysql_query($arrange_query, $con);
			
		
		for($i=0; $i<4; $i++) {
			
			$introimage_name = mysql_result($arrange,$i,'introimage_name');
			
			echo("
								<td class=board width=20% style='background-image:url(gift/$introimage_name);'>
								</td>
			");
		}
		echo("					
							</tr>
							<tr>
		");
		
		for($i=0; $i<4; $i++) {
			
			$name = mysql_result($arrange,$i,'name');
			
			echo("
								<td class=board width=20%>
									 <a href='http://localhost/click_gift.php?i=$i&arrange=2'> $name </a>
								</td>
			");
		}
		
		echo("
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