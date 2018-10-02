<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
		
		
	</head>
	
	
	<body id='bg'>
	<?
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
	
	
	
	
	
	$kidid = $_GET['kidid'];
	
	$index = $_GET['index'];
	
	$arrange = $_GET['arrange'];
	
	
	$con = mysql_connect("localhost", "mobile", "mobile");
		
	
	mysql_select_db("mobiledb", $con);
	
	
	
	if($arrange == 1) {
			$kidstext_query = " SELECT *
								FROM santaboard
								WHERE userid = '$kidid'
								ORDER BY wdate DESC";
	} else {
			$kidstext_query = " SELECT *
								FROM santaboard
								WHERE userid = '$kidid'
								ORDER BY wdate";
	}
	
	$kidstext = mysql_query($kidstext_query, $con);
		
	$kidstext_result = mysql_result($kidstext, $index, "letter");
	
	
	
	$wdate_result = mysql_result($kidstext, $index, "wdate");

	echo("
							<tr height=90%>
								<td  style='background-image:url(images/mailSanta.jpg);'  width=50% >
								</td>
	
								<td width=50% class=board>
									$kidstext_result

								</td>
							</tr>
					
							<tr>
								<td class=board colspan=2> <font face='arial'> $wdate_result </td>
							</tr>
	");
	
	
	
	$isread_result = mysql_result($kidstext,$index,"isread");
	
	
	if($isread_result == 0) {
		
		$isread_update_query = "UPDATE santaboard
							SET isread = 1
							WHERE 	userid = '$kidid' 
							AND 	wdate = '$wdate_result'";
							
							
		mysql_query($isread_update_query, $con);
	}
	
	echo("
						</table>
					</td>
				</tr>
			</table>
		
	");
	?>
	</body>
</html>