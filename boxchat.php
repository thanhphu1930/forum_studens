<?php
	session_start();
	include ('conn.php');
	$comment = nl2br(addslashes($_POST['vsacb_entermessage']));
	$author =$_SESSION['username'];
	if (isset($_SESSION['username'])) {
		
		//if($row['author'] == $_SESSION['username']){
			$insert = mysqli_query($db, "INSERT INTO boxchat (author,datetime_cmt,content)
			VALUES ('".$author."', NOW(), '".$comment."')");
								  
			if ($insert) {
			//echo "sua htanh cong";
			header("Location: /diendan_sv/index.php?topic=all&cid=''&scid''&tid=''");
			}
		//}
		
	}else{
		echo "<p>Vui lòng đăng nhập hoặc <a href='/diendan_sv/register.php'>Nhấp vào</a> để đăng ký.</p>";
	}
?>