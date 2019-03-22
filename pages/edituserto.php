<?php
	
	
	
	include ('../conn.php');
	$chonchucvu = $_POST['chonchucvu'];
	$comment1 = addslashes($_POST['commentemail']);
	$comment2 = addslashes($_POST['commentpassword']);
	$chonkhoa = $_POST['chonkhoa'];
	$uid = $_GET['uid'];
	$insert = mysqli_query($db, "UPDATE  users SET  rank = '".$chonchucvu."',email = '".$comment1."',password = '".$comment2."',banned = '".$chonkhoa."' WHERE  user_id = '".$uid."'");
								  
	if ($insert) {
			//echo "sua htanh cong";
		header("Location: /diendan_sv/pages/trang_quanly.php");
	}
		

	
?>	