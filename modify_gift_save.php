<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<?
		/*
			���ϸ� : modify_gift_save.php
			�ۼ��� : ��ȿ��
			���� ���� :  ������ ���̽��� ��ǰ�� ���� �����Ѵ�.
						
		*/
		?>
	</head>
	
	<body>
	<?
		// �̸��� get���� �޾ƿ´�.
		$name = $_GET['name'];
		
		// ������ ������ POST�� �޾ƿ´�.
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