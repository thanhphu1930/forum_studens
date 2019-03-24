<?php 
	//session_start(); 
	
	include('header.php');
	include('menu.php');
	
?>

			 <div class="infouser"></div>
			 <?php
			 	addview($_GET['cid'], $_GET['scid'], $_GET['tid']);
				disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
				
				?>
			
			<?php
			include ('conn.php');
			$tid = $_GET['tid'];
			
			$topic = mysqli_query($db,"SELECT author FROM topics where topic_id = '".$tid."'");
			$row =  mysqli_fetch_array($topic);
			if(isset($_SESSION['username'])){
			if( $_SESSION['username']== $row['author']){
			echo' <a class="editpost" href="edittopicto.php?page=1&cid='.$_GET['cid'].'&scid='.$_GET['scid'].'&tid='.$_GET['tid'].'" title="Edit/Delete" name="edit">Sửa bài viết</a>
			<span class="seperator">&nbsp;</span> ';
			}}
			?>	
            <?php
			include('conn.php');
			$select = mysqli_query($db,"SELECT * FROM topics WHERE SELECT cat_id, subcat_id, topic_id, author, title, conttent, date_postted FROM 
									  categories, subcategories, topics WHERE (".$_GET['cid']." = categories.cat_id) AND
									  (".$_GET['scid']." = subcategories.subcat_id) AND (". $_GET['tid']." = topics.topic_id)");
		//	$row =  mysqli_fetch_array($select);	
		//background: url(images/post_thanks.png) no-repeat transparent left;		
			echo "				<a id='qr_4801' class='quickreply' href='/diendan_sv/replyto.php?page=1&cid=".$_GET['cid']."&scid=".$_GET['scid']."&tid=".$_GET['tid']."' rel='nofollow' title='Quick reply to this message'>Trả lời</a> 
								<span class='seperator'>&nbsp;</span>
									
								</span>";?>
			<?php 
			include('conn.php');
			if(isset( $_SESSION['username'])){
			$author = $_SESSION['username'];
$result= mysqli_query($db,"SELECT * FROM  likestopic WHERE author = '".$author."' AND topic_id ='".$tid."'");
			if(mysqli_num_rows($result)!= 0){ ?>				
					           <div class="postlink" author="<?php echo''.$author.''; ?>  countlike="<?php echo''.$_GET['tid'].''; ?> " style='padding-left: 20px;' rel='nofollow' class='post_thanks_button'>Đã thích</div>	
				 
			<?php }else{ ?>
           
								<div class="postlinking"  countlike="<?php echo''.$_GET['tid'].''; ?> " style='padding-left: 20px;' rel='nofollow' class='post_thanks_button'>Thích<span id="likes" style='padding-left: 20px;' rel='nofollow' class='post_thanks_button'></span></div>
               <?php }} ?> 
            </div>
			</div>
			</div>			
			<?php
				echo "<div class='messageInfo primaryContent'><p>Tất cả bình luận (".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")
				  </p></div>";
				//dispreplies($_GET['page'],$_GET['cid'], $_GET['scid'], $_GET['tid']);
				include ('conn.php');
		$tag = 1;
		$limit = 5;
		$current_page = $_GET['page'];
		$start = ($current_page - 1) * $limit;
		$select = mysqli_query($db, "SELECT reply_id, replies.author, comment, replies.date_postted FROM categories, subcategories, 
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
			
					<div class='textcontrols floatcontainer'> ";
			?>		
					
			<?php 
			include('conn.php');
			if(isset( $_SESSION['username'])){
			$author = $_SESSION['username'];
$result= mysqli_query($db,"SELECT * FROM  likereplies WHERE author = '".$author."' AND reply_id ='".$row['reply_id']."'");
			if(mysqli_num_rows($result)!= 0){ ?>				
					           <div class="thank_rep" author="<?php echo''.$author.''; ?>  like="<?php echo''.$row['reply_id'].''; ?> " style='padding-left: 20px;' rel='nofollow'>Đã thích</div>	
				 
			<?php }else{ ?>
           
								<div class="thank_reply"  like="<?php echo''.$row['reply_id'].''; ?> " style='padding-left: 20px;' rel='nofollow' class='post_thanks_button'>Thích<span id="likes" style='padding-left: 20px;' rel='nofollow'></span></div>
               <?php }} ?> 
							
							
			<?php	echo" <span class='nodecontrols'>#".($tag ++)."</span>
						</div>
			</div>
			</div></th></tr>";
			
			}
		}
			 	
			 ?>
             
        	 <?php
				
				replylink($_GET['page'], $_GET['cid'], $_GET['scid'], $_GET['tid']);
				
				
		      ?>
              
              <div id="pagination_bottom" class="pagination_bottom">
	
				<div class="pagination popupmenu nohovermenu" id="yui-gen41">
					<?php paging($_GET['page'],$_GET['cid'], $_GET['scid'],$_GET['tid']); ?>
	
				</div>
                <div class="clear"></div>
              </div>
         		<div id="fb-root"></div>
				<script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=177002209637107&autoLogAppEvents=1';
                  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
               	 <!-- đường dẫn nhanh -->
                 	 <div class="breadBoxTop ">
					<nav>
						<div class="breadcrumb">
							<a href="misc/quick-navigation-menu?selected=node-4" class="OverlayTrigger jumpMenuTrigger" data-cacheoverlay="true" title="Mở điều hướng nhanh"><!--Jump to...--></a>
							<div class="boardTitle"><strong>[DIENDANSINHVIEN.COM] Diễn đàn sinh viên đại học Hutech</strong></div>
							<span class="crumbs">
				                <span class="crust homeCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
									<a href="index.php" class="crumb" rel="up" itemprop="url"><span itemprop="title">Trang chủ</span></a>
									<span class="arrow"><span>&gt;</span></span>
								</span>
                               
                                <?php
									if(isset($_GET['cid'])) $cid = $_GET['cid'];
									if(isset($_GET['scid'])) $scid = $_GET['scid'];
									 duongdan1($cid, $scid); ?>
							</span>
						</div>
					</nav>
				</div> 
                 <!--  end đường dẫn nhanh -->
               <div class="fb-comments"  data-href="https://diendanhutech.com" data-width="100%" data-numposts="10"></div>
  <?php
  		include('footer.php');
  ?>