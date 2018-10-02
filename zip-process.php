<!--만든이 : 정보통신공학과 20163031 차해리-->
<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
		<script language = 'JavaScript'>
			function okzip(zip, address){
				opener.document.mobile.zip.value = zip;
				opener.document.mobile.addr1.value = address;
				opener.mobile.addr2.value = '';
				opener.mobile.addr2.focus();
				self.close();	
			}
		</script>
		
		<?
			$key = $_POST['key'];
			
			$con = mysql_connect("localhost","mobile","mobile");
			mysql_select_db("mobiledb",$con);
			
			$query = "select DISTINCT zipcode, sido, sigungu, dong_name from zipcode where dong_name like '%$key%'";
			
			mysql_query("set names 'utf8'");
			$result = mysql_query($query, $con);
			$total = mysql_num_rows($result);
			
			$i =0;
			
			echo("
				<center>
					<font size = '2'>[<b>$key</b>] 으로 검색한 결과입니다. 우편번호를 선택하세요. </font>
					<table border = '1' align = 'center' width = '420' height = '130' cellpadding ='3' cellspacing ='0'>
				
			");
			while($i < $total):
				$zip = mysql_result($result, $i, "ZIPCODE");
				$sido = mysql_result($result, $i, "SIDO");
				$sigungu = mysql_result($result, $i, "SIGUNGU");
				$dong_name = mysql_result($result, $i, "DONG_NAME");
				
				$address = $sido . " " . $sigungu . " " . $dong_name;
			
			echo("
				<tr>
					<td><font size = '2'> &nbsp; <a href = \"JavaScript:okzip('$zip','$address')\"> $zip </a>
					&nbsp;&nbsp;&nbsp;&nbsp; $sido $sigungu $dong_name 
					</td>
				</tr>
			");
			
			$i++;
			
			endwhile;
			
			echo("</table>");
			
			mysql_close($con);
				
		?>
	</body>
</html>