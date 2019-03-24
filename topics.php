<?php 
//	session_start(); 
	include('header.php');
	include('menu.php');
	
?>
				<div class="tabletopic">
                </div>
                <div style="padding:20px; background:" >
               <?php  
			   	include('conn.php');
				 $select = mysqli_query($db,"select subcategory_title from subcategories where subcat_id = '".$_GET['scid']."'");
				 $row=mysqli_fetch_assoc($select);
			   		echo'<h1 style="color:000;">>>> '.$row['subcategory_title'].' <<<</h1>';
			   ?>
                
            	</div>
              	<?php 
				if (isset($_SESSION['username'])) {
				echo "<div id='newtopic'><p><a href='/diendan_sv/newtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'>
					  Tạo chủ đề</a></p></div>";
				
				}
            ?>

			<?php 
				disptopics($_GET['cid'],$_GET['scid']);
				
            ?>	
         
       
     
     
   <?php
  		include('footer.php');
  ?>