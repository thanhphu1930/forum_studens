<?PHP 
	include('header.php');
	include('menu.php');
	include('conn.php');

?>
	
	<!-- TỪ KHÓA-->
	<div id="pagetitle">
		<h1>
			
				<a href="#"><strong>Tìm kiếm:</strong></a>
			
		</h1>
		<p class="description">
			Từ khóa:<b><u><h3><?php echo''.$_GET['search'].''?></h3></u></b>	
		</p>
	</div>
	<!-- /TỪ KHÓA-->
    <div class="block searchresults">
	
		<h2 class="searchlisthead">
			<span>
				
					<a href="#"><strong>Tìm kiếm</strong></a>:
				
			</span>
			<span class="mainsearchstats">
		
			</span>
		</h2>
    <?php 
		$select = mysqli_query($db,"SELECT * FROM topics a,categories b WHERE  a.category_id= b.cat_id AND a.title LIKE N'%".$_GET['search']."%'");
		
		
		while($rows= mysqli_fetch_assoc($select)){
	
		echo'
		
		
		<div class="blockbody">
			
			
		<ol id="searchbits" start="1" class="searchbits">
					
                        <li class="imodselector threadbit hot " id="thread_5940">
                            <div class="icon0 rating0 nonsticky">
                                <div class="threadinfo thread">
                                    <!--  status icon block -->
                        
                                    <!-- title / author block -->
                                    <div class="inner">
                                        <h3 class="searchtitle">
                                        
                                                <span id="thread_prefix_5940" class="prefix understate">
                                                    <font color="#990099"><b> ['.$rows['category_title'].'] </b> </font>
                                                </span>
                                            
                                            <a class="title" href="/diendan_sv/readtopic.php?page=1&cid='.$rows['category_id'].'&scid='.$rows['subcategory_id'].'&tid='.$rows['topic_id'].'" id="thread_title_5940" >'.$rows['title'].'</a>
                                        </h3>
                                                
                        
                                        <div class="threadmeta">
                                            <div class="author">
                                                <span class="label">Bắt đầu bởi&nbsp;<a href="#" class="username understate" >'.$rows['author'].'</a>&lrm;,&nbsp;'.$rows['date_postted'].'&lrm;,&nbsp;Trả lời:'.$rows['replies'].'&lrm;,&nbsp;Xem:'.$rows['views'].'</span>
                                                
                                                
                                                    <dl class="pagination" id="pagination_threadbit_5940">
                                                        <dt class="label">2 Trang <span class="separator">•</span></dt>
                                                        <dd>
                                                                
                                                        </dd>
                                                    </dl>
                                                
                                                <!-- iconinfo -->
                                                <div class="threaddetails td">
                                                    <div class="threaddetailicons">
                                
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                        
                                    </div>		
                                </div>
                        
                     
                                
                                
                        
 
                            </div>
                        </li>

				</ol>
				
		</div>

	';
		}
		
?>
</div> 
<?php
 include('footer.php');
?>
<!--<dl class="threadlastpost td">
                                    <dt class="lastpostby hidden">Viết bài cuối bởi:</dt>
                                    <dd>Bài viết cuối: 05-21-2018 <span class="time">08:56 AM</span></dd>
                                    <dd>
                                    
                                        bởi <a href="member.php?1075-kiss0nlin3.html">kiss0nlin3</a>
                                    
                         &nbsp;<a href="showthread.php?5940-Bao-loi-mat-do-tren-nguoi-va-thung-do-ca-nhan-SV-Thien-Menh.html&amp;p=38683&amp;highlight=THUNG#post38683"><img src="images/buttons/lastpost-right.png" alt="Đến bài cuối" ></a>
                                    </dd>
                                </dl>-->