<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<?
		/*
			파일명 : gift_save.php
			작성자 : 주효진
			파일 내용 :  데이터베이스에 선물 상품 작성한 것을 저장한다.
						
		*/
		?>
	</head>
	
	<body>
	<?
		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		
		$introimage = $_FILES['introimage']['tmp_name'];
		$introimage_name = $_FILES['introimage']['name'];
		$introimage_size = $_FILES['introimage']['size'];
		
		$image = $_FILES['image']['tmp_name'];
		$image_name = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];
		
		
		if(empty($name)) {
			echo("
				<script>
					window.alert('이름이 없습니다. 다시 입력해주세요.');
					history.go(-1);
				</script>
			");
			exit;
		} 
		
		$con = mysql_connect("localhost", "mobile", "mobile");
		mysql_select_db("mobiledb", $con);
		
		$wdate = date("Y-m-d H:i:s");
		
		if($introimage != '' && $image != '') {
			
			$savedir = "./gift";
			
			$temp_intro = iconv("UTF-8", "EUC-KR", $introimage_name);
			copy($introimage, "$savedir/$temp_intro");
			unlink($introimage);
			
			$temp = iconv("UTF-8", "EUC-KR", $image_name);
			copy($image, "$savedir/$temp");
			unlink($image);
			
		}
		$insert_query = "
				INSERT INTO gift (name, description, price, introimage_name, introimage_size, image_name, image_size, wdate)
				VALUES ('$name', '$description', '$price', '$introimage_name', '$introimage_size', '$image_name','$image_size', '$wdate');
		";
			
		mysql_query($insert_query, $con);
			
		mysql_close($con);
			
		echo("<meta http-equiv = 'Refresh' content ='0; url=gift_to_children.php?cpage=1&arrange=1'>");
	?>
	</body>
	
</html>