<head>
<title>!Select the Channel!</title>

<?
	/*
		���ϸ� : selectChannel.php
		�ۼ��� : ��ȿ��
		������ : ���ظ�
		���� ���� :  ���̿� ���� �� �� �ִ� ä���� �����ϰ� �Ѵ�.
					�� �ش� ä�η� ������ �� �ְ� �Ѵ�.
					-> ����ä�� (13�� ����)
					-> �ä��, �θ� ä��(20�� �̻�)
					-> �θ� ä��(���� ���̵� ����)
					
					+ ��Ű �� ��������.
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
				window.alert('13�� �̻� �̿��ڴ� �����Ͻ� �� �����ϴ�.');				
			}
			function access_kids() {
				window.open('http://localhost/kids.php','popup','scrollbars=no, resizable=no, width=1400,height=900');
			}
			
			
			function no_access_adult(){
				window.alert('20�� ���� �̿��ڴ� �����Ͻ� �� �����ϴ�.');				
			}
			function access_adult() {
				window.open('http://localhost/adult.html','popup','scrollbars=no, resizable=no, width=1400,height=900');
			}
			
			
			function no_access_parent(){
				window.alert('������ ���̵�� ������� �ʾҽ��ϴ�.');				
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
							<font color=green face='���� ���'> <b> $name </b> �� �ݰ����ϴ� </font>
							&nbsp;
							[<a href = './logout.php'>�α׾ƿ� </a>] </font>
							&nbsp;
							[<a href = './myPage.html'>���������� </a>] </font>
							</td>
					</tr>
					
					<tr>
						<td class=big bgcolor=#CC3D3D>
							<font size=5 color=white face='���� ���'><b>�� Select the Channel ��</b></font>
						</td>
					</tr>

					<tr>
						<td class=big>
");

	
	
	
	/*
		�����ͺ��̽� ���Ӻ�
	*/
	
	
	
	// �����ͺ��̽��� �����Ѵ�. mysql�ּ�, ����ڸ�, �н����� �� �Ű������� �޴´�.
	// $con�� �����ϴ� �����ͺ��̽��� ���� ���� �ĺ��� ���� ���� �ȴ�.
	$con = mysql_connect("localhost", "mobile", "mobile");
		
	// ����� �����ͺ��̽���� �ĺ��� ���� �����Ͽ� �����ͺ��̽��� �����Ѵ�.
	mysql_select_db("mobiledb", $con);
	
	
	// �� �� �⵵�� �ҷ��´�.
	$current_date = date("Y");
	
	// ������� ��� �⵵�� ������ ���� ���� �� 4�ڸ�(����, ex_1997)�� �ڸ���.
	$birth_year_query = "	SELECT SUBSTR(birthdate,1,4)
							FROM member
							WHERE uid = '$id'" ;
	
	$birth_year = mysql_query($birth_year_query, $con);
	
	// �ڸ� ��� ���� ������ �´�.
	$birth_year_result = mysql_result($birth_year, 0, "SUBSTR(birthdate,1,4)");
	
	// ���� ���� ���������� �����Ͽ� ����. ���̸� ����Ѵ�.
	$gap = (int)$current_date -(int)$birth_year_result + 1;
	
	
	
	
	/*
		���� ����� ���ǿ� ���� ���� �޶�����~!
	*/
	
	
	
	// 13������ ���� ����� kids ä�ο� ���� �� ����.
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
	
	// 20�� ���ϴ� adult, parent ä�ο� ���� �� ����.
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
		// 20���� ������ adult �������� �� �� �ִ�. 
		echo("
							<br>
							<a href='javascript:access_adult()'>
							<input type='button' class='img_button2'>
							</a>
							<br>
		");
		
		// kidid�� �ִ� �� Ȯ���� �� ������
		$check_kidid_query = "	SELECT *
								FROM member
								WHERE uid = '$id'";
		
		$kidid = mysql_query($check_kidid_query, $con);
	
		// ������ ���̵� ���� ������ �´�.
		$kidid_result = mysql_result($kidid, 0, "kidsid");
		
		
		// ���� ���̵�� ����Ǿ� ���� ���� ����� parentä�ο� ���� �� ����.
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

