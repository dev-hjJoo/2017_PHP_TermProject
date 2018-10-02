<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
		
		<?
		
		
		include ("./kids_style.css");		
		
		/*
			파일명 : kidsSanta.php
			작성자 : 주효진
			파일 역할 :  kids 채널의 santa에게 편지쓰는 파일.
						kids 사용자가 쓴 글을 작성자의 id를 가지고 있는 부모 사용자가 볼 수 있다.
						이 코드에서는 글을 작성하고, 그 작성된 내용을 데이터베이스에 저장하는 역할을 한다.
		*/
		
		/*
			하단 echo 내용
			-html-
			 # 창 맨 위 title 설정하기
			 # 해당 파일에만 들어가는 style 서식
			 -javascript-
			 # 글자 수를 세어주기 위한 function char_count(form)
			 
		*/
		
		$board = $_GET['board'];
		
		echo("				
		
		<title>! kids Santa Page !</title>
		
		<style type='text/css'>
			input.button {
				box-shadow:2px 2px 0px gray;
				border-radius:5px;
				margin:20px;
				width:100px;
				height:60px;
		
				background-color:#990000;
				
				font-size:25px;
				font-family:'Eras Bold ITC';
				color:white;
				
			}
			input {
				border-color:green;
		
				border-top-style:none;
				border-right-style:none;
				border-left-style:none;
				border-bottom-style:dotted;
		
				border-radius:5px;
				padding:5px;
				font-family:'arial';
			}
			textarea {
				border:5px dotted green;
				padding:20px;
				font-family:'맑은 고딕';
			}
	
		</style>
		
		<script language='javascript'>
			
			function char_count(form) {
				form.cnt.value = form.letter.value.length;
			}
		</script>
		
		");		
			
		?>
	</head>
	<body id = bg>
	
	
	
	<?
	
	$board = $_GET['board'];
	
	echo ("
	<table border=3 width=1300 height=750 align=center class=big bgcolor=white>
		<tr height=75>
			<td>
				<table width=280 height=70 class=mini align=center>
					<tr>
						<td class=title>
							<a href='http://localhost/kids.php' class=title> kids </a>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr height=100>
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
	
		<tr height=500>
			<td>
				<table align=center border=1 width=80% height=80% >
	
					<tr height=100% >
						<td  style='background-image:url(images/mailSanta.jpg);'  width=50% >
						</td>
	
						<td  width=50% >
							<form method='POST' action='./santaMail_process.php'>
							<input type = 'hidden' name = 'board' value='$board'>
								<textarea name='letter' rows='14' cols='60' onKeyUp ='char_count(this.form)'></textarea>
								<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
								<input type=text size=3 name='cnt' value=0 readyonly='readonly'>
								<font size=3 face='맑은 고딕'><b>글자</b></font>
							
		
						</td>
					</tr>
	
					<tr height=20% >
						<td colspan=2>
								<input class='button' type='submit' value='send' >
								</input>
							</a>
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