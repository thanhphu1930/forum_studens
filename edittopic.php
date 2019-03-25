<?php
	session_start();
	
	
	include ('conn.php');
	$comment = nl2br(addslashes($_POST['comment']));
	//$page= $_GET['page'];
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$tid = $_GET['tid'];
	
	$topic = mysqli_query($db,"SELECT author FROM topics where topic_id = '".$tid."'");
	$row =  mysqli_fetch_array($topic);
	if (isset($_SESSION['username'])) {
		
		if($row['author'] == $_SESSION['username']){
			$insert = mysqli_query($db, "UPDATE  topics SET  conttent = '".$comment."' WHERE  topic_id = '".$tid."'");
								  
			if ($insert) {
			//echo "sua htanh cong";
			header("Location: /diendan_sv/readtopic.php?page=1&cid=".$cid."&scid=".$scid."&tid=".$tid."");
			}
		}
		
	}else{
		echo "<p>Vui lòng đăng nhập hoặc <a href='/diendan_sv/register.php'>Nhấp vào</a> để đăng ký.</p>";
	}
	
?>	
			

