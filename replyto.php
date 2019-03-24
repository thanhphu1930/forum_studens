<?php 
//	session_start(); 
	//addview($_GET['cid'], $_GET['scid'], $_GET['tid']);
	//countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']);
	include('header.php');
	include('menu.php');
	
?>

       		<?php
				if (!isset($_SESSION['username'])) {
					echo "<p>Vui lòng đăng nhập hoặc <a href='/diendan_sv/register.php'>Nhấp vào</a> để đăng ký.</p>";
				}
			?>
			<?php
				if (isset($_SESSION['username'])) {
					replytopost($_GET['page'],$_GET['cid'], $_GET['scid'], $_GET['tid']);
				}
			?>
            <?php disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']); ?>
          
  <?php
  		include('footer.php');
  ?>