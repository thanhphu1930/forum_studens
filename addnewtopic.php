<?php
	session_start();
	
	include ('conn.php');
	
	$topic = addslashes($_POST['topic']);
	$content = nl2br(addslashes($_POST['content']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	
	$insert = mysqli_query($db, "INSERT INTO topics (`category_id`, `subcategory_id`, `author`, `title`, `conttent`, `date_postted`) 
								  VALUES ('".$cid."', '".$scid."', '".$_SESSION['username']."', '".$topic."', '".$content."', NOW());");
								  
	if ($insert) {
		header("Location: /diendan_sv/topics.php?cid=".$cid."&scid=".$scid."");
	}else
	{
		echo ('loi');	
	}
	
?>
<?php
	session_start();
	
	include ('conn.php');
	
	$comment = nl2br(addslashes($_POST['comment']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$tid = $_GET['tid'];
	
	$insert = mysqli_query($db, "INSERT INTO replies (`category_id`, `subcategory_id`, `topic_id`, `author`, `comment`, `date_postted`)
								  VALUES ('".$cid."', '".$scid."', '".$tid."', '".$_SESSION['username']."', '".$comment."', NOW());");
								  
	if ($insert) {
		header("Location: /diendan_sv/readtopic.php?page=1&cid=".$cid."&scid=".$scid."&tid=".$tid."");
	}
?>