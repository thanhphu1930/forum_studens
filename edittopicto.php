<?php
	include('header.php');
	include('menu.php');
?>
		<?php 		
		include ('conn.php');
		$cid= $_GET['cid'];
		$scid= $_GET['scid'];
		$tid= $_GET['tid'];
		$select = mysqli_query($db, "SELECT cat_id, subcat_id, topic_id, conttent FROM 
									  categories, subcategories, topics WHERE ($cid = categories.cat_id) AND
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);	
		echo "<div class='content'><form action='/diendan_sv/edittopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topic_id']."' method='POST'>
			  <p>Nội dung: </p>
			  <textarea cols='60' rows='5' id='comment' name='comment'>".$row['conttent']."</textarea>
			  <input type='submit' id='button' value='Lưu' />
			  </form></div>";
		
		?>
		
	
<?php
	include('footer.php');
?>