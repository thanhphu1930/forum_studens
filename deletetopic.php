<?php
	session_start();
	
	include ('conn.php');
	$scid = $_GET['scid'];
	$insert = mysqli_query($db, "DELETE  FROM  subcategories  WHERE subcat_id = '".$scid."'");
								  
	if ($insert) {
		echo'Xóa thành công'.$scid.''; 
		//header("Location: /diendan_sv/pages/trang_quanly.php");
	}else{
		echo 'Xóa thất bại'.$scid.'';	
	}
?>