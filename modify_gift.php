<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
		
		
	</head>
	
	
	<body id='bg'>
	<?
	
	$i = $_GET['i'];
	$arrange = $_GET['arrange'];
	
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
		
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY wdate DESC;
		";
	}
	else if($arrange == 2) {
		
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY clickcount DESC;
		";
	}
	else if($arrange == 3) {
		
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY likecount DESC;
		";
	} 
	else {
		
		$arrange_query = "
			SELECT *
			FROM gift
			ORDER BY buycount DESC;
		";
	}

	$arrange_result = mysql_query($arrange_query, $con);
	
	
	$image_name = mysql_result($arrange_result, $i, 'image_name');
	
	$name = mysql_result($arrange_result, $i, 'name');
	
	$price = mysql_result($arrange_result, $i, 'price');
	
	$description = mysql_result($arrange_result, $i, 'description');


	

	echo("
		<tr>
			<td>
				<table height=350 width=80% align=center>
				
				<form method = 'POST' action ='modify_gift_save.php?name=$name' enctype='multipart/form-data'>
					<tr height=15%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 이름 </b> </font>
						</td>
						<td class=inputboard width=80%>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=3 face='맑은 고딕'> <b>$name</b> </font> <font color=gray size=2> &nbsp;&nbsp;( 이름은 변경하실 수 없습니다. ) </font>
						</td>
					</tr>
					
					<tr height=15%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 가격 </b> </font>
						</td>
						<td class=inputboard width=80%>
							<input type='text' name='price' size='30' maxlength=10 value='$price'>
						</td>
					</tr>
					
					<tr height=35%>
						<td class=board width=20%>
							<font size='3' face='맑은 고딕'> <b> 설명 </b> </font>
						</td>
						<td class=inputboard width=80%>
							<textarea name='description' rows='15' cols='50' maxlength=300> $description </textarea>
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