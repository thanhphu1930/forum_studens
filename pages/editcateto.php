<?php
	
	
	
	include ('../conn.php');
	$comment = nl2br(addslashes($_POST['comment']));
	$cid = $_GET['cid'];
	$insert = mysqli_query($db, "UPDATE  categories SET  category_title = '".$comment."' WHERE  cat_id = '".$cid."'");
								  
	if ($insert) {
			//echo "sua htanh cong";
		header("Location: /diendan_sv/pages/trang_quanly.php");
	}
		

	
?>	
		