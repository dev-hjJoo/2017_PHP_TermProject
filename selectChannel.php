<head>
<title>!Select the Channel!</title>

<?
	/*
		파일명 : selectChannel.php
		작성자 : 주효진
		수정자 : 차해리
		파일 역할 :  나이에 따라 들어갈 수 있는 채널을 구분하게 한다.
					각 해당 채널로 입장할 수 있게 한다.
					-> 아이채널 (13세 이하)
					-> 어른채널, 부모 채널(20세 이상)
					-> 부모 채널(아이 아이디 존재)
					
					+ 쿠키 값 가져오기.
	*/
?>

<?
$id = $_COOKIE['UserId']; 
$name = $_COOKIE['UserName'];
?>

<style type="text/css">

	#bg {
		background-image:url(images/main_bg.jpg)
		
	}	
	td.big{
		text-align:center;
		padding:25px;
		border-top-style:none;
		border-bottom-style:solid;
		border-right-style:none;
		border-left-style:none;
		border-radius:20px;
	}
	td.small{
		padding:5px;
		border-top-style:none;
		border-bottom-style:none;
		border-right-style:none;
		border-left-style:none;
	}
	table.big{
		margin-top:200px;
		box-shadow:20px 20px 0px green;
		padding:20px;
	}
	table{
		margin:20px;
	}
	input {
		border-color:green;
		border-style:dotted;
		border-radius:5px;
		padding:10px;
		font-family:"arial";
	}
	input.img_button1 {
        background: url(images/kidsButton.gif) no-repeat;
        border: solid black;
		box-shadow:5px 5px 0px green;
        width: 250px;
        height: 80px;
        cursor: pointer;
		margin:10px;
    }
	input.img_button2 {
        background: url(images/adultButton.gif) no-repeat;
		border: solid black;
		box-shadow:5px 5px 0px green;
        width: 250px;
        height: 80px;
        cursor: pointer;
		margin:10px;
    }
	input.img_button3 {
        background: url(images/parentButton.gif) no-repeat;
        border: solid black;
		box-shadow:5px 5px 0px green;
        width: 250px;
        height: 80px;
        cursor: pointer;
		margin:10px;
    }
</style>

<script language = 'Javascript'>

			function no_access_kids(){
				window.alert('13세 이상 이용자는 입장하실 수 없습니다.');				
			}
			function access_kids() {
				window.open('http://localhost/kids.php','popup','scrollbars=no, resizable=no, width=1400,height=900');
			}
			
			
			function no_access_adult(){
				window.alert('20세 이하 이용자는 입장하실 수 없습니다.');				
			}
			function access_adult() {
				window.open('http://localhost/adult.html','popup','scrollbars=no, resizable=no, width=1400,height=900');
			}
			
			
			function no_access_parent(){
				window.alert('아이의 아이디와 연결되지 않았습니다.');				
			}
			function access_parent() {
				window.open('http://localhost/parent.html','popup','scrollbars=no, resizable=no, width=1400,height=900');
			}
			
</script>

</head>
<body id=bg>
<?
echo("
	<bgsound src='music/selectMenu.mp3' loop=-1>
	<table border=3 width=900 align=center class=big bgcolor=white>
		<tr>
			<td class=small>
				<table width=600 align=center bgcolor=white >
					<tr>
						<td align = 'right'>
							<font color=green face='맑은 고딕'> <b> $name </b> 님 반갑습니다 </font>
							&nbsp;
							[<a href = './logout.php'>로그아웃 </a>] </font>
							&nbsp;
							[<a href = './myPage.html'>마이페이지 </a>] </font>
							</td>
					</tr>
					
					<tr>
						<td class=big bgcolor=#CC3D3D>
							<font size=5 color=white face='맑은 고딕'><b>★ Select the Channel ★</b></font>
						</td>
					</tr>

					<tr>
						<td class=big>
");

	
	
	
	/*
		데이터베이스 접속부
	*/
	
	
	
	// 데이터베이스에 연결한다. mysql주소, 사용자명, 패스워드 를 매개변수로 받는다.
	// $con은 접속하는 데이터베이스에 대해 고유 식별자 값을 갖게 된다.
	$con = mysql_connect("localhost", "mobile", "mobile");
		
	// 사용할 데이터베이스명과 식별자 값을 대입하여 데이터베이스에 접속한다.
	mysql_select_db("mobiledb", $con);
	
	
	// 올 해 년도를 불러온다.
	$current_date = date("Y");
	
	// 사용자의 출생 년도를 가지고 오기 위해 앞 4자리(연도, ex_1997)를 자른다.
	$birth_year_query = "	SELECT SUBSTR(birthdate,1,4)
							FROM member
							WHERE uid = '$id'" ;
	
	$birth_year = mysql_query($birth_year_query, $con);
	
	// 자른 결과 값을 가지고 온다.
	$birth_year_result = mysql_result($birth_year, 0, "SUBSTR(birthdate,1,4)");
	
	// 문자 값을 정수형으로 변경하여 연산. 나이를 계산한다.
	$gap = (int)$current_date -(int)$birth_year_result + 1;
	
	
	
	
	/*
		나온 결과로 조건에 따라 반응 달라지기~!
	*/
	
	
	
	// 13세보다 많은 사람은 kids 채널에 들어올 수 없다.
	if( $gap > 13 ) {
			echo("
							<a href = 'javascript:no_access_kids()'>
								<input type='button' class='img_button1' >
							</a>
			");
	}
	else {
		echo("
							<a href='javascript:access_kids()'>
								<input type='button' class='img_button1' onClick='javascript:'>
							</a>
		");
	}
	
	// 20세 이하는 adult, parent 채널에 들어올 수 없다.
	if($gap < 20) {
		echo("
							<br>
							<a href='javascript:no_access_adult()'>
							<input type='button' class='img_button2'>
							</a>
							<br>
							<a href='javascript:no_access_adult()'>
							<input type='button' class='img_button3'>
							</a>
		");
	}
	else {
		// 20세가 넘으면 adult 페이지에 들어갈 수 있다. 
		echo("
							<br>
							<a href='javascript:access_adult()'>
							<input type='button' class='img_button2'>
							</a>
							<br>
		");
		
		// kidid가 있는 지 확인해 볼 쿼리문
		$check_kidid_query = "	SELECT *
								FROM member
								WHERE uid = '$id'";
		
		$kidid = mysql_query($check_kidid_query, $con);
	
		// 아이의 아이디 값을 가지고 온다.
		$kidid_result = mysql_result($kidid, 0, "kidsid");
		
		
		// 아이 아이디와 연결되어 있지 않은 사람은 parent채널에 들어올 수 없다.
		if($kidid_result == ''){
			echo("
							<a href='javascript:no_access_parent()'>
							<input type='button' class='img_button3'>
							</a>
			");
			
		} else {
			echo("
							<a href='javascript:access_parent()'>
							<input type='button' class='img_button3'>
							</a>
			");
		}
		
	}

	echo("
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	");
?>
</body>

