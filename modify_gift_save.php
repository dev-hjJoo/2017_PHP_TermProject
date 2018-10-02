<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<?
		/*
			파일명 : modify_gift_save.php
			작성자 : 주효진
			파일 내용 :  데이터 베이스에 상품의 값을 수정한다.
						
		*/
		?>
	</head>
	
	<body>
	<?
		// 이름은 get으로 받아온다.
		$name = $_GET['name'];
		
		// 나머지 내용은 POST로 받아온다.
		$description = $_POST['description'];
		$price = $_POST['price'];
		
		$introimage = $_FILES['introimage']['tmp_name'];
		$introimage_name = $_FILES['introimage']['name'];
		$introimage_size = $_FILES['introimage']['size'];
		
		$image = $_FILES['image']['tmp_name'];
		$image_name = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];
		
		
	
		
		$con = mysql_connect("localhost", "mobile", "mobile");
		mysql_select_db("mobiledb", $con);
		
		
		
		if($introimage != '' && $image != '') {
			
			
			$savedir = "./gift";
			
			$temp_intro = iconv("UTF-8", "EUC-KR", $introimage_name);
			copy($introimage, "$savedir/$temp_intro");
			unlink($introimage);
			
			$temp = iconv("UTF-8", "EUC-KR", $image_name);
			copy($image, "$savedir/$temp");
			unlink($image);
			
			
			$update_query = "
				UPDATE gift
				SET description='$description',
					price='$price',
					introimage_name = '$introimage_name',
					introimage_size = '$introimage_size',
					image_name = '$image_name',
					image_size = '$image_size'
				WHERE name = '$name';
			";
			
			echo($update_query);
			
			mysql_query($update_query, $con);
			
			mysql_close($con);
			
			echo("<meta http-equiv = 'Refresh' content ='0; url=http://localhost/m_gift_to_children.php?cpage=1&arrange=1'>");
		}
	?>
	</body>
	
</html>