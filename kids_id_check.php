<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<script language = 'Javascript'>
			function a(){
					var id = document.idcheck.newid.value;
					if(id ==''){
						window.alert('아이디를 입력해 주세요!')
					}
					if(id.length < 5 || id.length > 11) { 
						window.alert('ID는 6글자 이상, 10글자 이하로 입력해주세요');
					}
					else if(id.match(/[^0-9a-zA-Z_]/) != null){
						window.alert('아이디는 공백없이 입력해주세요 \n\n(영문, 숫자, _사용가능)');
					}
					
					else{
						document.idcheck.submit();
					}
				
			}
			
			function b(){
				opener.mobile.kidsid.value = document.idcheck.id.value;
				this.close();
			}
			
			

		</script>
		<form method = 'post' action = './kids_id_check.php' name = 'idcheck'>
		<table border = '1' align = 'center' width='400'>
			<tr>
				<td height = '130' align = 'center'>
					<?
						$id = $_GET['id'];
						$newid = $_POST['newid'];
						
						if(isset($newid)){ 
							$id = $newid;
						}
						$con = mysql_connect("localhost","mobile","mobile");
						mysql_select_db("mobiledb", $con);
						
						$query = "select * 
								  from member 
								  where uid = '$id'";
						
						$result = mysql_query($query,$con);
						
						$total = mysql_num_rows($result);
						
						if($total == 0){
							echo"
								<font size = '2' color = 'red'><b>$id</b></font>
								<font size = '2'> 라는 아이디는 존재하지 않습니다.
								</font>
								<br> 다른 아이디를 입력해 주세요 .<br><br><br>
								* <b>kids Id</b> &nbsp; <input type = 'text' name = 'newid' size = '20'>
								&nbsp; &nbsp; <a href= 'javascript:a()'>kids Id 확인</a>
								<br> <br>

							";
							
							
						}else{
							echo("
								<font size = '2' color = 'red'><b>$id</b></font>
								<font size = '2' >은(는) 존재하는 아이디입니다
								<br>사용하시겠습니까?<br><br>
								[<a href = 'javascript:b()'><input type = 'hidden' name= 'id' value='$id'>YES</a>]
								<br><br>
								* <b>kids Id</b> <input type = 'text' name = 'newid' size = '20'>
								&nbsp;&nbsp; <a href = 'javascript:a()'>kids Id 확인</a>
							");
							
						}
						mysql_close($con);
						
					?>
				
				</td>
			</tr>
		
		</table>
		
		</form>
		
	</body>
</html>	