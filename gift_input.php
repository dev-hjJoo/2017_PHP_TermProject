<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
		<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
		
		<?
		/*
			파일명 : gift_input.php
			작성자 : 주효진
			파일 내용 :  관리자만 접근 가능한 페이지이다. 관리자 외 차단은 gift_to_children.php에서 한다.
						여기서는 선물 상품 올릴 내용을 작성하는 공간이다.
						이 곳에서 작성된 내용은 gift_save.php에서 처리되어 데이터베이스에 저장된다.
						
		*/
		?>
		
	</head>
	
	<body id="bg">
	<?
	echo ("
	<table border=3 width=1300 height=750 align=center class=big bgcolor=white>
		<tr height=75>
			<td>
				<table width=280 height=70 class=mini align=center>
					<tr>
						<td class=title>
							<a href='http://localhost/parent.html'>
								parents
							</a>
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
		
						<td class=adult width=20% >
							<a href='http://localhost/kidsCartoon.html'>Restaurant<br>reservation</a>
						</td>
		
						<td class=adult width=20% >
							<a href='http://localhost/gift_to_children.php?cpage=1&arrange=1'>Gift<br>to Childern</a>
						</td>
		
						<td class=adult width=20% >
							<a href='http://localhost/check_kidsLetter.php?cpage=1&arrange=1'>Letter<br>of kids</a>
						</td>
		
						<td class=adult width=20% >
							<a href='http://localhost/parent_myPage.php?arrange=1&page=1'> MyPage </a>
						</td>
		
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table height=350 width=80% align=center>
				
				<form method = 'POST' action ='gift_save.php' enctype='multipart/form-data'>
					<tr height=15%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 이름 </b> </font>
						</td>
						<td class=inputboard width=80%>
							<input type='text' name='name' size='50' maxlength=10 value='이름은 수정하실 수 없습니다. 신중히 결정해주세요.'>
						</td>
					</tr>
					
					<tr height=15%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 가격 </b> </font>
						</td>
						<td class=inputboard width=80%>
							<input type='text' name='price' size='50' maxlength=10>
						</td>
					</tr>
					
					<tr height=35%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 설명 </b> </font>
						</td>
						<td class=inputboard width=80%>
							<textarea name='description' rows='15' cols='50' maxlength=300></textarea>
						</td>
					</tr>
					
					<tr height=15%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 인트로 이미지 </b> </font>
						</td>
						<td class=inputboard width=80%>
							<input type='file' name='introimage' size='45' maxlength='80'>
						</td>
					</tr>
					
					<tr height=15%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 이미지 </b> </font>
						</td>
						<td class=inputboard width=80% >
							<input type='file' name='image' size='45' maxlength='80'>
						</td>
					</tr>
					
					<tr height=20%>
						<td class=board colspan=2>
							<input type='submit' value='저장' style='width:100; height:25;'>
						</td>
					</tr>
				</form>
				</table>			
			</td>
		</tr>
	</table>
	");
	?>
	</body>
</html>