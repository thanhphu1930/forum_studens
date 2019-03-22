<?php if (isset($_SESSION['username'])) : ?>     
		<div id="menu">
        <ul>
          <li><a href="index.php" class="current">Trang chủ</a></li>
          <li><a href="index.php">Diễn đàn</a></li>
          <?php  
		  include('conn.php');
		  $select = mysqli_query($db,"SELECT rank FROM users WHERE username = '".$_SESSION['username']."'");
		  $row = mysqli_fetch_assoc($select);
		  if($row['rank'] != "Thành viên")
		  {
		  ?>
          <li><a href="pages/trang_quanly.php">&nbsp Trang quản lý</a></li>
          <?php }else{ ?>
          <li><a href="infomation.php">Thành viên</a></li>
		  <?php } ?>
          <li>Xin chào:<strong><?php echo $_SESSION['username']; ?></strong></li>
          <li><a href="thongtin.php">&nbsp Hồ sơ của tôi</a></li>

          <li><a href="index.php?logout='1'" style="color: red;">&nbsp Thoát</a></li>
        </ul>
      </div> 
<?php else :?>

      	<div id="menu">
        <ul>
          <li><a href="index.php" class="current">Trang chủ</a></li>
          <li><a href="index.php">Diễn đàn</a></li>
          <li><a href="infomation.php">Thành viên</a></li>
          <li><a href="login.php">Đăng nhập</a></li>
          <li><a href="register.php">Đăng ký</a></li>
        </ul>
      </div>
<?php endif  ?> 
 <div id="content">
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
                  
     
     
     
     		