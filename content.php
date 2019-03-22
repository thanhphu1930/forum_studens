     
    
 		<div class="tabletopic">
        	<div class="vtlaitopx">
           		<div class="topx" id="vtlai_topx" style="width: auto;float:none;">
                    <div class="forumhead">
                    	<h2 class="title">
                        <span class="toptitle">Bài viết mới<span></span></span>
                        <div class="VietXfAdvStats_Controls">
						<form name="form1"  action="" method="post">
							<select class="VietXfAdvStats_ItemLimit Tooltip" name="top"  onClick="top()" onchange="form1.submit()">
					
								<option value="10" selected="selected">10</option>
					
								<option value="25">25</option>
							
								<option value="35">35</option>
					
								<option value="50">50</option>
					
							</select>
							<input type="hidden" value="60" class="VietXfAdvStats_updateInterval">
						</form>
					</div>
                        </h2>
                    </div>
                     <div class="tab" style="width: 100%;">
						<a class="active vtlai_topx_tabitem" href="/diendan_sv/index.php">Tất cả</a>
			
						<?php load_cate(); ?>
	
						<a title="Cập nhật lại thống kê" id="vtlai_topx_status" class="vtlai_stopload"></a>
			<br class="clear">
				</div>
                  <table class="content3" style="width: 100%;">
                  		 <tbody id="vtlai_topx_list" style="background-color: rgb(250, 250, 250);"  catid="<?php echo ''.$_GET['cid'].''; ?>" cattitle="<?php echo ''.$_GET['topic'].''; ?>">
                         	<tr style='border-bottom: 1px dotted #333333;'>
						 	<?php 
							if(!isset($_GET['cid'] )){
							alltopics(); 
							}else{
							loadtopics($_GET['cid']);
							}
							
							?>
                     		</tr>
                         </tbody>
                  </table>
                </div>
               </div>             
		</div>	     
	        
		<div class="boxchat">
        <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center"><tbody><tr><td><br>
		<div class="blockhead" style="height:16px;padding-right:4px;font-weight:bold;background: dimgrey;color:#FFF;">
			<div class="popupmenu" style="float:left" id="yui-gen0">
				<a href="javascript://" class="popupctrl" id="yui-gen2">ChatBox&nbsp;</a>

			</div>
		</div>

		<div id="vsacb_boxswitch" class="blockrow" style="padding:0;background:white;">
			<div class="blockrow" id="vsacb_messagearea" style="overflow: auto; height: 150px; width: auto; font-size: 14px;"><table cellpadding="0" cellspacing="0" border="0" width="99%" align="left">
			<tbody>
				<?php boxchat(); ?>
			</tbody></table></div>
			
				<form name="vsacb_post_form" action="boxchat.php" method="post" onsubmit="return VSacb_postMessage(this);">
				<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
					<tbody><tr>
						<td class="blocksubhead" style="margin:0px;">
						<input type="text" class="primary textbox" name="vsacb_entermessage" id="vsacb_entermessage" style="width:100%;font-size:14px;color:Black;background:ivory" onkeydown="if (event.keyCode == 13) {return VSacb_postMessage(vsacb_post_form);}" onkeyup="VSacb_LimitChars('vsacb_entermessage', 'vsacb_counter','255');" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;vsacb_submitbutton.disabled=false;" value="Tin nhắn...">
						
            			</td>
           			</tr>
			</tbody></table>
			</form>		
				
			<div id="vsacb_search"></div>
			</div>
	<br></td></tr></tbody></table>
    	</div>
    	<p style="padding-top:20px;">
     	<h1>[DIENDANSINHVIEN.COM] Diễn đàn sinh viên đại học Hutech</h1>	
        </p>	
      	<div id="left_column">
       		<div class="postbody">
       		    <ol id="forums" class="floatcontainer">
                   <li class="forumbit_nopost L1" id="cat212">
					<?php dispcategories(); ?>
                   </li>
            	</ol>
        	</div>
        </div>
        <div id="right_column">
          <div class="section">
            <form  action="seach.php"class="form">
              <input name="search" type="text" value="Tìm kiếm..."  id="keyword" />
              <input type="submit" value="Tìm" class="button" />
            </form>
          </div>
          <div class="section">
            <div class="section1_top"><h2>Thành viên trực tuyến</h2></div>
            <div class="section1_middle">
            	<div class="footnote">
					Tổng:0(Thành viên: 0, Khách: 0)
				</div>
            </div>
            <div class="section1_bottom"></div>
          </div>
          <div class="section">
            <div class="section2_top"><h2>Thống kê diễn đàn</h2></div>
            <div class="section2_middle">
            		  <div class="pairsJustified">
					<dl class="discussionCount"><dt>Đề tài thảo luận:</dt>
						<dd><?php  totaltopic(); ?></dd></dl>
					<dl class="messageCount"><dt>Số bình luận:</dt>
						<dd><?php  totalreply(); ?></dd></dl>
					<p><dl class="memberCount"><dt>Thành viên:</dt>
						<dd><?php  totalusers(); ?></dd></dl></p>
					<!-- slot: forum_stats_extra -->
				</div>
            </div>	
            <div class="section2_bottom"></div>
          </div>
          <div class="section">
            <div class="section3_top"> <h2>Chia sẻ trang này</h2></div>
            <div class="section3_middle">
             
             		<div class="tweet shareControl">
						<iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.d383dc1d510865aceaa5e552afcf5663.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fsvktqd.com%2Fforums%2F&amp;size=m&amp;text=%5BSVKTQD.COM%5D%20Di%E1%BB%85n%20%C4%91%C3%A0n%20sinh%20vi%C3%AAn%20%C4%91%E1%BA%A1i%20h%E1%BB%8Dc%20Kinh%20T%E1%BA%BF%20Qu%E1%BB%91c%20D%C3%A2n&amp;time=1525951667176&amp;type=share&amp;url=http%3A%2F%2Fsvktqd.com%2Fforums%2F" style="position: static; visibility: visible; width: 60px; height: 20px;" data-url="http://diendansv.com/"></iframe>
					</div>
                    <div class="facebookLike shareControl">
						
						<fb:like href="http://diendan.com/" layout="button_count" action="recommend" font="trebuchet ms" colorscheme="light" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=recommend&amp;app_id=&amp;color_scheme=light&amp;container_width=0&amp;font=trebuchet%20ms&amp;href=http%3A%2F%2Fsvktqd.com%2Fforums%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey"><span style="vertical-align: bottom; width: 118px; height: 20px;"><iframe name="f2662e4c5f43a8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/plugins/like.php?action=recommend&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FRQ7NiRXMcYA.js%3Fversion%3D42%23cb%3Df313960addb7248%26domain%3Dsvktqd.com%26origin%3Dhttp%253A%252F%252Fsvktqd.com%252Ff2fc796ccfa417c%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=0&amp;font=trebuchet%20ms&amp;href=http%3A%2F%2Fsvktqd.com%2Fforums%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey" style="border: none; visibility: visible; width: 118px; height: 20px;" class=""></iframe></span></fb:like>
					</div>
                    <div class="plusone shareControl">
						<div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px; background: transparent;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1525951666597" name="I0_1525951666597" src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;count=true&amp;hl=vi-VN&amp;origin=http%3A%2F%2Fsvktqd.com&amp;url=http%3A%2F%2Fsvktqd.com%2Fforums%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.L718caA3rLA.O%2Fm%3D__features__%2Fam%3DAQE%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCM77so5l4YibwjqUW984Yjo-G_dsQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1525951666597&amp;_gfid=I0_1525951666597&amp;parent=http%3A%2F%2Fsvktqd.com&amp;pfname=&amp;rpctoken=30969948" data-gapiattached="true" title="G+"></iframe></div>
					</div>
            </div>
            <div class="section3_bottom"></div>
          </div>
   
        </div>
     