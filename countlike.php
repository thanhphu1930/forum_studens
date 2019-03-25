<?php
	session_start();
	include('conn.php');
//	$author = $_SESSION['username'];
	$tid = $_GET['tid'];
	$topic = mysqli_query($db,"SELECT author FROM topics where topic_id = '".$tid."'");
	$row =  mysqli_fetch_array($topic);
	$user = $row['author'];
	mysqli_query($db,"UPDATE topics SET likes = likes + 1 WHERE author ='".$user."'");
	$chon= mysqli_query($db,"SELECT likes FROM topics WHERE author ='".$user."'");
	mysqli_query($db,"INSERT INTO likestopic(author,topic_id) VALUES('".$_SESSION['username']."','".$tid."')");
	$rows = mysqli_fetch_assoc($chon);
	$result= mysqli_query($db,"SELECT * FROM  likestopic WHERE author = '".$_SESSION['username']."' AND topic_id ='".$tid."'");
	if(mysqli_num_rows($result)!=0){
	//<div class='postlink' style='padding-left: 20px;' rel='nofollow'class='post_thanks_button'>
	//</div>	
	echo"Đã thích";
	}
?>