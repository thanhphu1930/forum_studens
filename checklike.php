<?php
	//session_start();
//	include('conn.php');
////	$author = $_SESSION['username'];
//	$rid = $_GET['tid'];
//	//$topic = mysqli_query($db,"SELECT reply_id, author FROM replies where reply_id = '".$id."'");
//	
//	mysqli_query($db,"UPDATE replies SET likes = likes + 1 WHERE reply_id ='".$rid."' ");
//	//$chon= mysqli_query($db,"SELECT likes FROM replies WHERE author ='".$user."'");
//	mysqli_query($db,"INSERT INTO likereply(author,reply_id) VALUES('".$_SESSION['username']."','".$rid."')");
//	$rows = mysqli_fetch_assoc($chon);
//	$result= mysqli_query($db,"SELECT * FROM  likereply WHERE author = '".$_SESSION['username']."' AND reply_id ='".$rid."'");
//	
	
	
	//echo "Đã thích";
	//if(mysqli_num_rows($result)!=0){
//		echo"Đã thích".$rid."";
//	}//else{
	//	echo'<div class="postlinking" style="background: url(images/post_thanks.png) no-repeat transparent left;padding-left: 20px;" rel="nofollow" class="post_thanks_button">Thích</div>';
	// }
	
	session_start();
	include('conn.php');
//	$author = $_SESSION['username'];
	$rid = $_GET['rid'];
	//$topic = mysqli_query($db,"SELECT author FROM replies where reply_id = '".$rid."'");
	//$row =  mysqli_fetch_array($topic);
	//$user = $row['author'];
	mysqli_query($db,"UPDATE replies SET likes = likes + 1 WHERE reply_id = '".$rid."'");
	//$chon= mysqli_query($db,"SELECT likes FROM replies WHERE author ='".$user."'");
	mysqli_query($db,"INSERT INTO likereplies(author,reply_id) VALUES('".$_SESSION['username']."','".$rid."')");
	//$rows = mysqli_fetch_assoc($chon);
	$result= mysqli_query($db,"SELECT * FROM  likereplies WHERE author = '".$_SESSION['username']."' AND reply_id ='".$rid."'");
	if(mysqli_num_rows($result)!=0){
	//<div class='postlink' style='padding-left: 20px;' rel='nofollow'class='post_thanks_button'>
	//</div>	
	echo"Đã thích ";
	}
?>