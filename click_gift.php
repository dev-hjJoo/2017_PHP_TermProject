<?
	$userid = $_COOKIE['UserId'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
		
		<?
		/*
			파일명 : click_gift.php
			작성자 : 주효진
			파일 내용 :  해당 상품을 자세히 볼 수 있게 해준다. 이 곳에서 이름, 가격, 세부 설명까지 크게 표시된다.
			
						상품을 좋아요 및 좋아요 해제를 할 수 있다.
						좋아요 버튼을 누르면 내 위시리스트에서 볼 수 있다.
						이는 likegift라는 데이터베이스를 이용하며, 이 데이터 베이스에는 사용자 아이디, '좋아요'한 상품 이름, 날짜가 들어간다.
						
		*/
		?>
	</head>
	
	
	<body id='bg'>
	<?
	
	$i = $_GET['i'];
	$arrange = $_GET['arrange'];
	
	// 디자인
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

				<tr height=150 >
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
									<a href='http://localhost/check_kidsLetter.php?cpage=1&arrange=1'> Letter <br> of kids </a>
								</td>
		
								<td class=adult width=20%>
									<a href='http://localhost/parent_myPage.php?arrange=1&page=1'> MyPage </a>
								</td>
		
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table class=board height=100% width=80% align=center>
	");
	
	
	$con = mysql_connect("localhost", "mobile", "mobile");
	mysql_select_db("mobiledb", $con);


	if($arrange == 1){
		// 최신순
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY wdate DESC;
		";
	}
	else if($arrange == 2) {
		// click순
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY clickcount DESC;
		";
	}
	else if($arrange == 3) {
		// 좋아요 순
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY likecount DESC;
		";
	} 
	else {
		// 구매 횟수 순
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY buycount DESC;
		";
	}

	$arrange_result = mysql_query($arrange_query, $con);
	
	// 출력할 이미지 이름
	$image_name = mysql_result($arrange_result, $i, 'image_name');
	// 상품 이름
	$name = mysql_result($arrange_result, $i, 'name');
	// 가격
	$price = mysql_result($arrange_result, $i, 'price');
	// 설명
	$description = mysql_result($arrange_result, $i, 'description');


	

	echo("
							<tr height=90%>
								<td  width=65% style='background-image:url(gift/$image_name);'  width=50% >
								</td>
	
								<td width=35% class=emptyboard>
									<table width=100% height=90%>
										<tr height=10%>
											<td class='board' colspan=2>
												<font color=red> ★ </font>
												<font size=5 face='맑은 고딕'> <b> $name </b> </font>
												<font color=green> ★ </font>
											</td>
										</tr>
										<tr height=10%>
											<td width=30% class=board>
												<font face='맑은 고딕'> 가격 </font>
											</td>
											<td width=70% class=board>
												<b>
													<font size=4>
													<font color=orange> ￦ </font>
													$price
													</font>
												</b>
											</td>
										</tr>
										<tr height=30%>
											<td class=board colspan=2>
												<font face='맑은 고딕'>
												$description
												</font>
											</td>
										</tr>
										<tr height=10% class=board>
											<td class=emptyboard>
	");
	
	/*
		사용자가 이 상품을 좋아요 했는 지 확인하는 쿼리
		- userid와 상품이름이 일치하는 쿼리가 있으면 참
	*/
	
	$check_like_query = "
		SELECT *
		FROM likegift
		WHERE select_gift = '$name' AND userid = '$userid';
	";	
	
			
	$like_result = mysql_query($check_like_query, $con);

	
	$like_num = mysql_num_rows($like_result);
	
	
	
	$total_like_query = "
		SELECT *
		FROM likegift
		WHERE select_gift = '$name';
	";
	
	$total_like_result = mysql_query($total_like_query);
	
	$total_like_num = mysql_num_rows($total_like_result);

	if($like_num == 0) {
		
		echo("
												<a href= 'http://localhost/like_process.php?name=$name&mode=1&i=$i&arrange=$arrange'> <font size=6> ♡ </font> </a>
											</td>
											<td class=board>
												이 상품이 좋다면?
											</td>
										</tr>					
		");
			
		
	}	
	else {
		
		echo("
												<a href= 'http://localhost/like_process.php?name=$name&mode=2&i=$i&arrange=$arrange'> <font size=6> ♥ </font> </a>
											</td>
											<td class=board>
												이 상품이 좋아요!
												<br>
												<font size=2 color=gray> 현재 $total_like_num 명이 좋아합니다! </font>
											</td>
										</tr>
					
		");	
		
		
	}
	
	
	$clickcount_update_query = "UPDATE gift
							SET clickcount = clickcount + 1
							WHERE 	image_name = '$image_name' ";
	mysql_query($clickcount_update_query, $con);
	
	echo("
										<tr height=10%>
											<td class=board>
												준비중
											</td>
											<td class=board>
												장바구니
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		
	");
	?>
	</body>
</html>