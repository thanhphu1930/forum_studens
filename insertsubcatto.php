<?php 

	include('conn.php');
	$cid = $_POST['chon'];
	$subcat_title=  addslashes($_POST['subcattitle']);
	$subcat_desc=  addslashes($_POST['subcatdesc']);
	$insert = mysqli_query($db,"INSERT INTO subcategories (`parent_id`, `subcategory_title`, `subcategory_desc`) 
								 VALUES ('".$cid."', '".$subcat_title."', '".$subcat_desc."'); ");
	if($insert){
		header("Location: /diendan_sv/pages/trang_quanly.php");
	}
	
?><!--$insert = mysqli_query($db,"INSERT INTO subcategories (`parent_id`, `subcategory_title`, `subcategory_desc`) 
								 VALUES ('".$cid."', '".$subcat_title."', '".$subcat_desc."'); ");-->