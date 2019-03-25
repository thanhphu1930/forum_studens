<?php
		include('conn.php')	;
		$cid = $_GET['cid'];
		$cattitle = $_GET['topic'];
		$select = mysqli_query($db,"SELECT * FROM topics  WHERE category_id = ".$cid." AND category_title = ".$cattitle." ORDER BY topic_id  DESC");
			while ($row = mysqli_fetch_assoc($select)){
				// lien ket readtopic: /registration/readtopic.php?cid='2'&scid='2'&tid=".$row['topic_id']."
				echo"<tr style='border-bottom: 1px dotted #333333;'>
				<td width='90%'> <a href='/diendan_sv/readtopic.php?page=1&cid=".$row['category_id']."&scid=".$row['subcategory_id']."&tid=".$row['topic_id']."' >".$row['title']."</a></td><td width='10%'>".$row['replies']."</td></tr>";
			}	
		
?>