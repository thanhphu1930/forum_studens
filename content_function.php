<?php
	function dispcategories() {
		include ('conn.php');
		
		$select = mysqli_query($db,"SELECT * FROM categories");
		
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<table class='category-table'>";
			echo "<tr><td class='main-category' colspan='2'>".$row['category_title']."</td></tr>";
			dispsubcategories($row['cat_id']);
			echo "</table>";
		}
	}
	

	
	function dispsubcategories($parent_id) {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM categories, subcategories 
									  WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id)");
		echo "<tr><th width='65%'>Chủ đề</th><th width='auto'>Bài viết</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td class='category_title'><a href='/diendan_sv/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>
				  ".$row['subcategory_title']."<br />";
				echo $row['subcategory_desc']."</a></td>
		";
			echo "<td class='num-topics'>";
			
			
			
			$select1 = mysqli_query($db, "SELECT topic_id,author,title,date_postted, category_id, subcategory_id FROM topics WHERE ".$parent_id." = category_id AND ".$row['subcat_id']." = subcategory_id ORDER BY topic_id DESC LIMIT 0,1");
		while($rows = mysqli_fetch_assoc($select1)){
		$title1 = $rows['title'];
		$title = substr("'".$title1."'",0,27) . "....";					  
		echo"<div class='nodeLastPost secondaryContent'>
			
				<span class='lastThreadTitle'><span>Mới nhất:</span> <a href='/diendan_sv/readtopic.php?page=1&cid=".$rows['category_id']."&scid=".$rows['subcategory_id']."&tid=".$rows['topic_id']."' title='".$title1."'>".$title."</a></span>
				<span class='lastThreadMeta'>
					<span class='lastThreadUser'><a href='#' class='username'>".$rows['author']."</a>,</span>
					<span class='DateTime muted lastThreadDate' data-latest='Mới nhất: ' >".$rows['date_postted']."</span>
				</span>
			</div>";}	
			echo"</td></tr>";
		}
	}
	
	function getnumtopics($cat_id, $subcat_id) {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id 
									  AND ".$subcat_id." = subcategory_id");
		return mysqli_num_rows($select);
	}
	
	function getnumtopic($cat_id, $subcat_id) {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT topic_id,author,title,date_postted, category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id AND ".$subcat_id." = subcategory_id ORDER BY topic_id LIMIT 0,1");
		while($row = mysqli_fetch_assoc($select)){
		$title1 = $row['title'];
		$title = substr("'".$title1."'",0,27) . "....";					  
		echo"<div class='nodeLastPost secondaryContent'>
			
				<span class='lastThreadTitle'><span>Mới nhất:</span> <a href='/diendan_sv/readtopic.php?page=1&cid=".$row['category_id']."&scid=".$row['subcategory_id']."&tid=".$row['topic_id']."' title='".$title1."'>".$title."</a></span>
				<span class='lastThreadMeta'>
					<span class='lastThreadUser'><a href='#' class='username'>".$row['author']."</a>,</span>
					<span class='DateTime muted lastThreadDate' data-latest='Mới nhất: ' >".$row['date_postted']."</span>
				</span>
			
		</div>";}
	}
	
	function disptopics($cid, $scid) {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT topic_id, author, title, date_postted, views, replies FROM categories, subcategories, topics 
									  WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id)
									  AND ($scid = subcategories.subcat_id) ORDER BY topic_id DESC");
		if (mysqli_num_rows($select) != 0) {
			echo "<table class='topic-table'>";
			echo "<tr><th>Chủ đề</th><th>Đăng bởi</th><th>Ngày đăng</th><th>Số lượt xem</th><th>Trả lời</th></tr>";
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<tr><td><a href='/diendan_sv/readtopic.php?page=1&cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."'>
					 ".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['date_postted']."</td><td>".$row['views']."</td>
					 <td>".$row['replies']."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p>Chủ đề chưa có bài viết!  <a href='/diendan_sv/newtopic.php?cid=".$cid."&scid=".$scid."'>
				 	Tạo bài viết!</a></p>";
		}
	}
	
	function disptopic($cid, $scid, $tid) {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT cat_id, subcat_id, topic_id, author, title, conttent, date_postted FROM 
									  categories, subcategories, topics WHERE ($cid = categories.cat_id) AND
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);
		$count =mysqli_query($db,"SELECT COUNT( TOPIC_ID) AS total FROM topics WHERE author ='".$row['author']."'");
		$row1 = mysqli_fetch_assoc($count);
		$total = $row1['total'];
		$chon= mysqli_query($db,"SELECT * FROM users WHERE username ='".$row['author']."'");
		$rows =  mysqli_fetch_assoc($chon);
		
		echo nl2br("");
		echo "<div class='content'>
				<div class='messageUserInfo'>
					<div class='messageUserBlock'>
								<div class='avatarHolder'>
			<span class='helper'></span>
			<a href='?author=".$row['author']."' class='avatar Av51584m' data-avatarhtml='true'><img src='".$rows['link_image']."' width='96' height='96' alt='?author=".$row['author']."'>			  			</a>
			<!-- slot: message_user_info_avatar -->
			</div>
			<h2 class='userText'>
			<a href='thongtin.php?author=".$row['author']."' class='username' itemprop='name'>";
			
			if($rows['banned'] == 0){
			echo"<span class='style2'>".$row['author']." </span>"; 
			}else{
			echo"<span class='style2' style='text-decoration: line-through;'>".$row['author']." </span>
				<h2 style='color:#000;'>BANKER</h2>
			";
			}
			
			
			echo"</a>
			<em class='userTitle' itemprop='title'>".$rows['rank']."</em>
			
			<!-- slot: message_user_info_text -->
			</h2>
	
			
	
		<div class='extraUserInfo'>
			
			
				
					<dl class='pairsJustified'>
						<dt>Tham gia:</dt>
						<dd>".$rows['date_tg']."</dd>
					</dl>
					<dl class='pairsJustified'>
						<dt>Bài viết:</dt>
						<dd><a href='search/member?user_id=51584' class='concealed' rel='nofollow'> ".$total." </a></dd>
					</dl>
					<dl class='pairsJustified'>
						<dt>Đã được thích:</dt> 
						<dd>auto</dd>
					</dl>
			</div>
	
		


	<span class='arrow'><span></span></span>
					</div>
				</div>
				<h1 class='title'>".$row['title']."</h1>
				<div class='messageInfo primaryContent'>
					
					<div class='messageContent'>
						<article>
							<blockquote class='messageText'>
								".$row['conttent']."
							</blockquote>
						</article>
					</div>
				</div>		
				<div class=' messageMeta '>
					<div class='privateControls'>
						
						<span>".$row['author']."</span><span></span>
						<span>".$row['date_postted']."</span>
						
					</div>
				</div>
				<div class='postfoot'>
			
					<div class='textcontrols floatcontainer'>
							<span class='postcontrols'>
								<img style='display:none' id='progress_4801' src='images/progress.gif' alt=''>
								
									";
	}

		function topicuser() {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT COUNT( TOPIC_ID) FROM topics WHERE author =".$_SESSION['username']."");
		return mysqli_num_rows($select);
	}
	
	
	function load_cate(){
		include('conn.php');	
		$select = mysqli_query($db,"SELECT * FROM categories");
		while($row= mysqli_fetch_assoc($select)){
		echo'<a href="/diendan_sv/index.php?topic='.$row['category_title'].'&cid='.$row['cat_id'].'" class="vtlai_topx_1" ">'.$row['category_title'].'</a>';	
		}
	}
	
		function load_cate_admin(){

	}
	
		function alltopics()
	{
		//SELECT * FROM  topics a,  replies b  WHERE   a.topic_id=b.topic_id  ORDER BY b.topic_id DESC LIMIT 0,10
		include('conn.php')	;
		$select = mysqli_query($db,"SELECT * FROM  topics ORDER BY topic_id DESC LIMIT 0,10");
		
			while ($row = mysqli_fetch_assoc($select)){
				$chon = mysqli_query($db,"SELECT author FROM replies WHERE topic_id = ".$row['topic_id']." ORDER  BY reply_id DESC LIMIT 1");
				$rows = mysqli_fetch_assoc($chon);
				
				// lien ket readtopic: /registration/readtopic.php?cid='2'&scid='2'&tid=".$row['topic_id']."
				echo"<tr style='border-bottom: 1px dotted #333333;'>
				<td width='90%'> <a href='/diendan_sv/readtopic.php?page=1&cid=".$row['category_id']."&scid=".$row['subcategory_id']."&tid=".$row['topic_id']."' >".$row['title']."</a></td><td width='10%'>".$rows['author']."</td></tr>";
			}	
		
	}
		function loadtopics($cid)
	{
		include('conn.php')	;
		$select = mysqli_query($db,"SELECT * FROM topics  WHERE category_id =".$cid." ORDER BY topic_id  DESC  LIMIT 0,10");
			while ($row = mysqli_fetch_assoc($select)){
				$chon = mysqli_query($db,"SELECT author FROM replies WHERE topic_id = ".$row['topic_id']." ORDER  BY reply_id DESC LIMIT 1");
				$rows = mysqli_fetch_assoc($chon);
				// lien ket readtopic: /registration/readtopic.php?cid='2'&scid='2'&tid=".$row['topic_id']."
				echo"<tr style='border-bottom: 1px dotted #333333;'>
				<td width='90%'> <a href='/diendan_sv/readtopic.php?page=1&cid=".$row['category_id']."&scid=".$row['subcategory_id']."&tid=".$row['topic_id']."' >".$row['title']."</a></td><td width='10%'>".$rows['author']."</td></tr>";
			}	
		
	}
	
	function addview($cid, $scid, $tid) {
		include ('conn.php');
		$update = mysqli_query($db, "UPDATE topics SET views = views + 1 WHERE category_id = ".$cid." AND
									  subcategory_id = ".$scid." AND topic_id = ".$tid."");
	}
	
	function replylink($page,$cid, $scid, $tid) {
		echo "<div class=''><p><a href='/diendan_sv/replyto.php?page=".$page."&cid=".$cid."&scid=".$scid."&tid=".$tid."'></a></p></div>";
	}
	
	function replytopost($page,$cid, $scid, $tid) {
		echo "<div class='content'><form action='/diendan_sv/addreply.php?page=".$page."&cid=".$cid."&scid=".$scid."&tid=".$tid."' method='POST'>
			  <p>Bình luận: </p>
			  <textarea cols='60' rows='5' id='comment' name='comment'></textarea>	
			  <input type='submit' id='button' value='Đăng' />
			  </form></div>";
	}
	
	function dispreplies($page,$cid, $scid, $tid) {
		include ('conn.php');
		$tag = 1;
		$limit = 5;
		$current_page = $page;
		$start = ($current_page - 1) * $limit;
		$select = mysqli_query($db, "SELECT replies.author, comment, replies.date_postted FROM categories, subcategories, 
									  topics, replies WHERE ($cid = replies.category_id) AND ($scid = replies.subcategory_id)
									  AND ($tid = replies.topic_id) AND ($cid = categories.cat_id) AND 
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id) ORDER BY reply_id ASC
									  LIMIT $start,$limit");
		if (mysqli_num_rows($select) != 0) {
			while ($row = mysqli_fetch_assoc($select)) {
			$count =mysqli_query($db,"SELECT COUNT( TOPIC_ID) AS total FROM topics WHERE author ='".$row['author']."'");
			$row1 = mysqli_fetch_assoc($count);
			$total = $row1['total'];
			$chon= mysqli_query($db,"SELECT * FROM users WHERE username ='".$row['author']."'");
			$rows =  mysqli_fetch_assoc($chon);
			//	echo nl2br("<tr><th width='15%'>".$row['author']."</th><td>".$row['date_postted']."\n".$row['comment']."\n\n</td></tr>");
				echo "<tr><th><div class='content'>
				<div class='messageUserInfo'>
					<div class='messageUserBlock'>
								<div class='avatarHolder'>
			<span class='helper'></span>
			<a href='members/calinh.51584/' class='avatar Av51584m' data-avatarhtml='true'><img src='".$rows['link_image']."' width='96' height='96' alt='calinh'>			  			</a>
			<!-- slot: message_user_info_avatar -->
			</div>
			<h2 class='userText'>
			<a href='thongtin.php?author=".$row['author']."' class='username' itemprop='name'><span class='style2'>".$row['author']."</span></a>
			<em class='userTitle' itemprop='title'>".$rows['rank']."</em>
			
			<!-- slot: message_user_info_text -->
		</h2>
	
		
	
		<div class='extraUserInfo'>
			
			
				
					<dl class='pairsJustified'>
						<dt>Tham gia:</dt>
						<dd>".$rows['date_tg']."</dd>
					</dl>
					<dl class='pairsJustified'>
						<dt>Bài viết:</dt>
						<dd><a href='search/member?user_id=51584' class='concealed' rel='nofollow'>".$total."</a></dd>
					</dl>
					<dl class='pairsJustified'>
						<dt>Đã được thích:</dt> 
						<dd>auto</dd>
					</dl>
			</div>
	
		


	<span class='arrow'><span></span></span>
					</div>
				</div>
				<div class='messageInfo primaryContent'>
					
					
					
					<div class='messageContent'>
						<article>
							<blockquote class='messageText'>
								".$row['comment']."
							</blockquote>
						</article>
					</div>
				</div>		
				<div class=' messageMeta '>
					<div class='privateControls'>
						
						<span>".$row['author']."</span><span></span>
						<span>".$row['date_postted']."</span>
						
					</div>
				
			</div>
				<div class='postfoot'>
			
					<div class='textcontrols floatcontainer'>
							<span class='postlinking'>
								<a href='post_thanks.php?do=post_thanks_add'  onclick='return post_thanks_give(4801, false);' style='background: url(images/post_thanks.png) no-repeat transparent left;
    padding-left: 20px;' rel='nofollow' class='post_thanks_button'>Thích</a>
							</span>
							<span class='nodecontrols'>#".($tag ++)."</span>
						</div>
			</div>
			</div></th></tr>";
			
			}
		}
	}
	
	function countReplies($cid, $scid, $tid) {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT category_id, subcategory_id, topic_id FROM replies WHERE ".$cid." = category_id AND 
									  ".$scid." = subcategory_id AND ".$tid." = topic_id");
		return mysqli_num_rows($select);
	}
	function deteletopic($cid,$scid,$tid)
	{
		include('conn.php')	;
		$select = mysqli_query($db,"DELETE FROM ");
	}
	
	
	function totaltopic() {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT COUNT( TOPIC_ID) AS total FROM topics");
		$row = mysqli_fetch_assoc($select);
		$total = $row['total'];
		echo''.$total.'';
		//return mysqli_num_rows($select);
		//return $total ;
	}
		function totalusers() {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT COUNT( user_id) AS total FROM users");
		$row =mysqli_fetch_assoc($select);
		$total = $row['total'];
		echo''.$total.'';
		//return $total ;
	}
		function totalreply() {
		include ('conn.php');
		$select = mysqli_query($db, "SELECT COUNT( reply_id) AS total FROM replies");
		$row =mysqli_fetch_assoc($select);
		$total = $row['total'];
		echo''.$total.'';
		//return $total ;
	}
	
	function duongdan1($cid, $scid){
		include('conn.php');
		
		// SELECT * FROM categories a , subcategories b WHERE  b.parent_id = a.cat_id AND  a.cat_id  = 1 AND b.parent_id =1
		$select = mysqli_query($db,"SELECT a.category_title, b.subcategory_title FROM categories a inner JOIN subcategories b on a.cat_id=b.parent_id 
where b.parent_id = {$cid} and b.subcat_id={$scid}");
		//if (mysqli_num_rows($select) != 0){
			//?cid='.$cid.'&scid='.$scid.'
			$row = mysqli_fetch_assoc($select);
			$in_category =$row['category_title'];
			$in_subcategory =$row['subcategory_title'];

			echo'<span class="crust selectedTabCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
				<a href="topics.php?cid='.$cid.'&scid='.$scid.'" class="crumb" rel="up" itemprop="url"><span itemprop="title">'.$in_category.'</span></a>
				<span class="arrow"><span>&gt;</span></span>
				</span>
				<span class="crust selectedTabCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="topics.php?cid='.$cid.'&scid='.$scid.'" class="crumb" rel="up" itemprop="url"><span itemprop="title">'.$in_subcategory.'</span></a>
				<span class="arrow"><span>&gt;</span></span>
				</span>';
			
		//}
	}
		function edittopic($cid, $scid, $tid) {
 	
	
	}
	
	function paging($page,$cid, $scid, $tid)
	{
		
		include ('conn.php');
		$select = mysqli_query($db, "SELECT COUNT( reply_id) AS total FROM replies WHERE topic_id = ".$tid."  ");
		$row = mysqli_fetch_assoc($select);
		$total = $row['total'];
		$current_page = $page;//isset($page) ? $_page : 1;
		$limit = 5;
				
		$total_page = ceil($total/$limit);
		
		if ($current_page > $total_page){
   		 $current_page = $total_page;
		}
		else if ($current_page < 1){
    	$current_page = 1;
		}
		$start = ($current_page - 1) * $limit;
		$result = mysqli_query($db, "SELECT * FROM replies WHERE topic_id = ".$tid." LIMIT $start, $limit");
		
		echo'<span><a href="javascript://" class="popupctrl" id="yui-gen43">Trang '.$current_page.' của '.$total_page.'</a></span>';
		if ($current_page > 1 && $total_page > 1){
   			 echo'<span class="first_last"><a href="readtopic.php?page='.($current_page-$total_page+1).'&cid='.$cid.'&scid='.$scid.'&tid='.$tid.'" ><img src="images/first-right.png" alt="Đầu tiên" title="Đầu tiên">Đầu tiên</a></span>';
			 echo'<span class="prev_next"><a rel="next" href="readtopic.php?page='.($current_page-1).'&cid='.$cid.'&scid='.$scid.'&tid='.$tid.'" ><img src="images\previous-right.png" alt="Trước"></a></span>';
			
			
			
			
			// echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
		}
		else{
			
		}
// Lặp khoảng giữa
		for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
   			if ($i == $current_page){
			echo '	 <span class="selected"><a href="javascript://" >'.$i.'</a></span>';
       		// echo '<span>'.$i.'</span> | ';
    		 }
   		  	 else{
				 echo '<span><a href="readtopic.php?page='.$i.'&cid='.$cid.'&scid='.$scid.'&tid='.$tid.'" >'.$i.'</a></span>';
        		//echo '<a href="readtopic.php?page='.$i.'">'.$i.'</a> | ';
   			 }
		}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
		if ($current_page < $total_page && $total_page > 1){

			 echo '<span class="prev_next"><a rel="next" href="readtopic.php?page='.($current_page+1).'&cid='.$cid.'&scid='.$scid.'&tid='.$tid.'"><img src="images/next-right.png" alt="Tiếp"></a></span>';
   			 echo'<span class="first_last"><a href="readtopic.php?page='.$total_page.'&cid='.$cid.'&scid='.$scid.'&tid='.$tid.'" >Cuối cùng<img src="images/last-right.png" alt="Cuối" title="Cuối cùng"></a></span>';			 
			
		}
		else{
				
		}
	}
	
	function boxchat(){
		include('conn.php');
		$select= mysqli_query($db,"SELECT * FROM boxchat ORDER BY bchat_id DESC ");
		while($rows = mysqli_fetch_assoc($select)){
		echo'
		<tr valign="top">
			<td width="1%">
				<span style="margin:0px;white-space:nowrap;font-size:">
				<span class="shade" style="margin:0px"><a href="#" style="text-decoration:none;" title="Locate this message in Archive"></a> ['.$rows['datetime_cmt'].']</span>&nbsp;<a href="#"><font color="003f7f">'.$rows['author'].'</font></a></span><span class="shade" style="margin-right:7px">:</span>
			
		
			</td>
			<td style="font-size:">
				<font color="Black">'.$rows['content'].'</font>
			</td></tr>';
		}
	}
	function inforuser($author){
		include('conn.php');
		$select=  mysqli_query($db,"SELECT username,rank,date_tg,link_image FROM  users WHERE username = '".$author."'");
		$row= mysqli_fetch_assoc($select);
		$chon = mysqli_query($db,"SELECT * FROM topics WHERE  author = '".$author."'");
		$count =mysqli_query($db,"SELECT COUNT( TOPIC_ID) AS total FROM topics WHERE author ='".$author."'");
		$select1=  mysqli_query($db,"SELECT * FROM hoatdong");
		$row1 = mysqli_fetch_assoc($count);
		$total = $row1['total'];
		

		echo'

		<div class="section infoBlock">
			<div class="secondaryContent pairsJustified">
				<dl><dt>Tham gia:</dt>
					<dd>'.$row['date_tg'].'</dd></dl>

				<dl><dt>Bài viết:</dt>
					<dd>'.$total.'</dd></dl>

				<dl><dt>Đã được thích:</dt>
					<dd>149</dd></dl>
			
			</div>
		</div>
	</div>

	<div class="mainProfileColumn">

		<div class="section primaryUserBlock">
			<div class="mainText secondaryContent">
				<div class="followBlock">
					<ul>
					</ul>
					
				</div>

				<h1 itemprop="name" class="username"><span class="style3">'.$row['username'].'</span></h1>

				<p class="userBlurb">
					<span class="userTitle" itemprop="title">'.$row['rank'].'</span>
					
				</p>
			</div>
			
			<ul class="tabs mainTabs Tabs" data-panes="#ProfilePanes > li" data-history="on">';
			while($row= mysqli_fetch_assoc($select1)){
		echo'<li class=""><a href="#" class="">'.$row['hd_content'].'</a></li>';
		}
		echo'</ul>
		</div>

		<ul id="ProfilePanes">';
		while($rows = mysqli_fetch_assoc($chon)){	
		echo'	<li id="postings" class="profileContent" data-loadurl="members/may.51123/recent-content" style="display: list-item;"><div class="" style="">


	<ol style="border-bottom: 1px dotted #333333;">
	
		<li id="thread-876761" class="searchResult thread primaryContent" data-author="'.$rows['author'].'">

	<div class="listBlock posterAvatar"><a href="members/may.51123/" class="avatar Av51123s" data-avatarhtml="true"><img src="'.$row['link_image '].'" width="48" height="48" alt="'.$rows['author'].'"></a></div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">Chủ đề</span>
			<h3 class="title"><a href="#">'.$rows['title'].'</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="#">'.$rows['conttent'].'</a>
		</blockquote>

		<div class="meta">
			Chủ đề bởi: <a href="#" class="username">'.$rows['author'].'</a>,
			<span class="DateTime" title="'.$rows['date_postted'].'">'.$rows['date_postted'].'</span>,
			'.$rows['replies'].' lần trả lời
		</div>
	</div>

</li>
	
	</ol>
	<div class="sectionFooter">
		<ul class="listInline bulletImplode">

			
		</ul>
	</div>


</div></li>';}
echo'
		</ul>
	</div>

</div> ';
				

	}
	function loadhoatdong(){
		include('conn.php');
		$select1=  mysqli_query($db,"SELECT * FROM hoatdong");
		while($row= mysqli_fetch_assoc($select1)){
		echo'<li class=""><a href="#" class="active">'.$row['hd_content'].'</a></li>';
		}
	}
	
	
?>
				<!--	<div class='nodeLastPost secondaryContent'>
			
				<span class='lastThreadTitle'><span>Mới nhất:</span> <a href='posts/1691311/' title='VIETSOURCING KHAI GIẢNG KHÓA HỌC TIẾNG ANH CHUYÊN NGÀNH'>q</a></span>
				<span class='lastThreadMeta'>
					<span class='lastThreadUser'><a href='members/vietsourcing123.62909/' class='username'>vietsourcing123</a>,</span>
					<span class='DateTime muted lastThreadDate' data-latest='Mới nhất: ' >15/7/17</span>
				</span>
			
		</div>-->