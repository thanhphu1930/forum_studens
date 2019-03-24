<?php
	session_start();
	include('conn.php');
	
	$comment = nl2br(addslashes($_POST['comment']));
	$page=$_GET['page'];
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$tid = $_GET['tid'];
	
	$insert = mysqli_query($db, "INSERT INTO replies (`category_id`, `subcategory_id`, `topic_id`, `author`, `comment`, `date_postted`)
								  VALUES ('".$cid."', '".$scid."', '".$tid."', '".$_SESSION['username']."', '".$comment."', NOW());");
								  
	if ($insert) {
		 mysqli_query($db, "UPDATE topics SET replies = replies + 1 WHERE category_id = ".$cid." AND
									  subcategory_id = ".$scid." AND topic_id = ".$tid."");
		header("Location: /diendan_sv/readtopic.php?page=".$page."&cid=".$cid."&scid=".$scid."&tid=".$tid."");
	}
?>