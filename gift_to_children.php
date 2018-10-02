<head>
<title>! gift to children !</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
<?
		/*
			파일명 : gift_to_children.php
			작성자 : 주효진
			파일 내용 : 아이에게 줄 선물을 쇼핑하는 공간이다.
					 : 페이징 처리가 되어 있다.
					 : 각 항목별로 정렬이 가능하다.
					 : 작성, 수정, 삭제는 관리자만 가능하다.
						
		*/
?>


<?
	// 쿠키를 받아 올 부분 (ID 값)
	$userid = $_COOKIE['UserId']; 
?>

</head>
<body id="bg">
<?

$arrange = $_GET['arrange'];
$cpage = $_GET['cpage'];

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
			<table height=525 width=60% align=center class=board>
				<tr height=10% width=100%>
					<td width=25%>
						 
					</td>
					<td width=25%>
					</td>
					<td width=25% class=board colspan=2>
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
	
	echo("
						<b>최신순</b> / 
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=2'> 
							<font color=lightgray> click 순 </font>
						</a>
						/
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=3'> 
							<font color=lightgray> 좋아요!순 </font>
						</a> /
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=4'>
							<font color=lightgray> 구매 횟수 많은 순 </font>
						</a>
					</td>
				</tr>
	");
}
else if($arrange == 2) {
	
	 // click순
	 $arrange_query = "
		SELECT *
		FROM gift
		ORDER BY clickcount DESC;
	";
	
	echo("
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=1'> 
							<font color=lightgray> 최신순 </font>
						</a>
						/ 
						<b> click 순 </b>
						</a>
						/
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=3'> 
							<font color=lightgray> 좋아요!순 </font>
						</a> /
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=4'>
							<font color=lightgray> 구매 횟수 많은 순 </font>
						</a>
					</td>
				</tr>
	");
}
else if($arrange == 3) {
	
	 // 좋아요 순
	 $arrange_query = "
		SELECT *
		FROM gift
		ORDER BY likecount DESC;
	";
	
	echo("
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=1'> 
							<font color=lightgray> 최신순 </font>
						</a>
						/ 
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=2'> 
							<font color=lightgray> click 순 </font>
						</a>
						/
						<b> 좋아요!순 </b>
						</a> /
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=4'>
							<font color=lightgray> 구매 횟수 많은 순 </font>
						</a>
					</td>
				</tr>
	");
} 
else {
	
	// 구매 횟수 순
	$arrange_query = "
		SELECT *
		FROM gift
		ORDER BY buycount DESC;
	";
	
	echo("
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=1'> 
							<font color=lightgray> 최신순 </font>
						</a>
						/ 
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=2'> 
							<font color=lightgray> click 순 </font>
						</a>
						/
						<a href='http://localhost/gift_to_children.php?cpage=1&arrange=3'> 
							<font color=lightgray> 좋아요!순 </font>
						</a> /
						<b> 구매 횟수 많은 순 </b>
						</a>
					</td>
				</tr>
	");
}

$arrange_result = mysql_query($arrange_query, $con);
$count = mysql_num_rows($arrange_result);

/*
	upline
*/

$upline_start = ($cpage - 1) * 8;
echo("<tr height=30%>");
for($i=$upline_start; $i<$upline_start+4; $i++) {
	$introimage_name = '';
	if ($i<$count){
		$introimage_name = mysql_result($arrange_result, $i, 'introimage_name');
	}
	echo("
					<td width=25% class=board style='background-image:url(gift/$introimage_name);'>
					</td>
	");
	
}
echo("			</tr>");
echo("			<tr height=10%>");
for($i=$upline_start; $i<$upline_start+4; $i++) {
	$name = '';
	if ($i<$count){
		$name = mysql_result($arrange_result, $i, 'name');
	}
	
	echo("
					<td class=board bgcolor=orange>
					<font size=3 face='맑은 고딕'> <a href='http://localhost/click_gift.php?i=$i&arrange=$arrange'> <b> $name </b> </a> </font>
					</td>
	");
	
}
echo("			</tr>");

/*
	downline
*/
$downline_start = $upline_start+4;
echo("			<tr height=30%>");
for($i=$downline_start; $i<$downline_start+4; $i++) {
	$introimage_name = '';
	
	// 
	if ($i<$count){
		$introimage_name = mysql_result($arrange_result, $i, 'introimage_name');
	}
	echo("			
					<td width=25% class=board style='background-image:url(gift/$introimage_name);'>
					</td>
	");
	
	
}
echo("			</tr>");
echo("			<tr height=10%>");
for($i=$downline_start; $i<$downline_start+4; $i++) {
	$name = '';
	
	echo("			<td width=25% class=board bgcolor=orange>");
	
	if ($i<$count){
		$name = mysql_result($arrange_result, $i, 'name');
	}
	
	echo("				<a href='http://localhost/click_gift.php?i=$i&arrange=$arrange'> <font size=3 face='맑은 고딕'> <b>  $name </b> </font> </a> ");
	
	
	echo("
					</td>
	");
}
	echo("		</tr>
				<tr height=10%>
					<td>
					</td>
					<td colspan=2 class=board>
");
/*
	페이징 처리
*/
$index = 0;
for($i=1; $i <=$count; $i++) {
	if($i % 8 == 1) {
		$index += 1;
		echo("
						<a href='http://localhost/gift_to_children.php?cpage=$index&arrange=$arrange'>
						$index
						</a> &nbsp;
		");
	}
}
echo("
					</td>
					<td class=emptyboard>
");
// 관리자만 작성, 삭제 버튼이 뜬다.
if($userid == 'admin') {
	echo("
						[ <a href='http://localhost/gift_input.php'> 작성 </a> ]
						&nbsp;&nbsp;
						[ <a href='http://localhost/m_gift_to_children.php?cpage=1&arrange=1'> 수정 </a> ]
						&nbsp;&nbsp;
						[ <a href='http://localhost/select_delete_gift.php?cpage=1&arrange=1'> 삭제 </a> ]
	");
}
echo("
					</td>
				
			</table>
			
		</td>
	</tr>
</table>
");
?>
</body>