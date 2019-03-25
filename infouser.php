<?php

	session_start();
	include('conn.php');
	$author = $_SESSION['username'];
	$tid = $_GET['tid'];
	$topic = mysqli_query($db,"SELECT author FROM topics where topic_id = '".$tid."'");
	$row =  mysqli_fetch_array($topic);
	$user = $row['author'];
	$update =mysqli_query($db,"UPDATE users SET likes = likes + 1 WHERE username ='".$user."'");
	$chon= mysqli_query($db,"SELECT * FROM users WHERE username ='".$user."'");
	$rows =  mysqli_fetch_array($chon);
	echo"<div class='content'>
				<div class='messageUserInfo'>
					<div class='messageUserBlock'>
								<div class='avatarHolder'>
			<span class='helper'></span>
			<a href='members/calinh.51584/' class='avatar Av51584m' data-avatarhtml='true'><img src='images\avatar_m.png' width='96' height='96' alt='calinh'>			  			</a>
			<!-- slot: message_user_info_avatar -->
			</div>
			<h2 class='userText'>
			<a href='members/calinh.51584/' class='username' itemprop='name'><span class='style2'>".$row['author']."</span></a>
			<em class='userTitle' itemprop='title'>Thành viên</em>
			
			<!-- slot: message_user_info_text -->
		</h2>
	
		
	
		<div class='extraUserInfo'>
			
			
				
					<dl class='pairsJustified'>
						<dt>Tham gia:</dt>
						<dd>".$rows['date_tg']."</dd>
					</dl>
					<dl class='pairsJustified'>
						<dt>Bài viết:</dt>
						<dd><a href='search/member?user_id=51584' class='concealed' rel='nofollow'> 0 </a></dd>
					</dl>
					<dl class='pairsJustified'>
						<dt>Đã được thích:</dt> 
						<dd>".$rows['likes']."</dd>
					</dl>
			</div>
	";
 
 ?>