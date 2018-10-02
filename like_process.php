<?


$userid = $_COOKIE['UserId'];
$name = $_GET['name'];

echo($userid);
echo("<br>");
echo($name);
echo("<br>");


$mode = $_GET['mode'];

$i = $_GET['i'];
$arrange=$_GET['arrange'];

echo($mode);
echo("<br>");
echo($i);
echo("<br>");
echo($arrange);
echo("<br>");



$con = mysql_connect("localhost", "mobile", "mobile");
		

mysql_select_db("mobiledb", $con);

if($mode==1) {
		
		
		
		$wdate = date("Y-m-d H:i:s");
		
		$like_query = "
				INSERT INTO likegift
				VALUES ('$userid', '$name', '$wdate');
		";
		$like_result = mysql_query($like_query, $con);
		
	
		
		$clickcount_update_query = "UPDATE gift
							SET likecount = likecount + 1
							WHERE name = '$name' ";
		mysql_query($clickcount_update_query, $con);
			
		
	}	
else {
		
		
		$unlike_query = "
				DELETE
				FROM likegift
				WHERE select_gift = '$name' AND userid='$userid';
			";
		$unlike_result = mysql_query($unlike_query, $con);
		
		
		$clickcount_update_query = "UPDATE gift
							SET likecount = likecount - 1
							WHERE name = '$name' ";
		
		mysql_query($clickcount_update_query, $con);
}
	
echo("<meta http-equiv = 'Refresh' content ='0; url=http://localhost/click_gift.php?i=$i&arrange=$arrange'>");
?>