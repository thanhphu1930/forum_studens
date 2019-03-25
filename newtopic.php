<?php 
//	session_start(); 
	include('header.php');
	include('menu.php');
	
?>
   
         	<?php 
				
				if (isset($_SESSION['username'])) {
					echo "<form action='/diendan_sv/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'
						  method='POST'>
						  <p>Tiêu đề: </p>
						  <input type='text' id='topic' name='topic' size='100' />
						  <p>Nội dung: </p>
						  <textarea id='conten' name='content'></textarea><br />
						  <input type='submit' id='button' value='Đăng' /></form>";
				} else {
					echo "<p>Vui lòng đăng nhập hoặc <a href='/diendan_sv/register.php'>click</a> đăng ký.</p>";
				}
			?>
  <?php
  		include('footer.php');
  ?>      