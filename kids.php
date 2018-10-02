<head>
<title>! kids Page !</title>

<link href="style.css" rel="stylesheet" type="text/css" charset="utf-8">
<link rel="stylesheet" href="simpleBanner.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="simpleBanner.js"></script>

<?
		/*
			파일명 : kids.php
			작성자 : 주효진
			파일 역할 : kids채널 최초 화면
		*/
		
?>


<?
$id = $_COOKIE['UserId']; 
$name = $_COOKIE['UserName'];
?>
</head>
<body id="bg">

	<?
	
	
	echo("
	<table border=3 width=1300 height=750 align=center class=big bgcolor=white>

		<tr height=75>
			<td>
				<table width=280 height=70 class=mini align=center>
					<tr>
						<td class=title>
								kids
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr height=150 >
			<td class=middle>
				<table border=1 width=100% height=50% align=center>
					<tr>
						<td>
							<a href='http://localhost/kidsGame.html'>Game</a>
						</td>
		
						<td>
							<a href='http://localhost/kidsCartoon.html'>Cartoon</a>
						</td>
		
						<td>
							<a href='kidsSanta.php?board=santaboard'>toSanta</a>
						</td>
		
						<td>
							<a href='http://localhost/kidsMusic.html'>Music</a>
						</td>
		
					</tr>
				</table>
			</td>
		</tr>
		<tr height=30 align=left>
			<td align = 'right' class=emptyboard>
				<font color=green face='맑은 고딕'> <b> $name </b> 님 반갑습니다 </font>
				&nbsp;
				[<a href = './logout.php'>로그아웃 </a>]
				&nbsp;
				[<a href = './myPage.html'>마이페이지 </a>]
			</td>
		</tr>
		<tr height=430 width=1200 align=center>
			<td align=center>
				<div class='simple_banner_wrap' style='height:100%;width:100%;'>
					<ul>
						<li style='background-image:url(images/logo.jpg);'></li>
						<li style='background-image:url(images/minions.jpg);'></li>
						<li style='background-image:url(images/snowman.jpg);'></li>
					</ul>
				</div>
			</td>
		</tr>
	</table>
	");
	?>
</body>