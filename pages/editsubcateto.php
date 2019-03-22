<?php
	
	include ('../conn.php');
	$comment1 = nl2br(addslashes($_POST['comment1']));
	$comment2 = nl2br(addslashes($_POST['comment2']));
	//$page= $_GET['page'];
	$scid = $_GET['scid'];

	$insert = mysqli_query($db, "UPDATE  subcategories SET  subcategory_title = '".$comment1."', subcategory_desc = '".$comment2."' WHERE  subcat_id = '".$scid."'");
								  
	if ($insert) {
		header("Location: /diendan_sv/pages/trang_quanly.php");
	
	}
		
		

	
?>	
		