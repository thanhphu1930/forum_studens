<?php

		include ('conn.php');
		$tid = $_GET['tid'];
		$select = mysqli_query($db, "SELECT COUNT( reply_id) AS total FROM replies WHERE topic_id = ".$tid."  ");
		$row = mysqli_num_rows($select);
		$total = $row['total'];
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
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
   			 echo'<span class="prev_next"><a rel="next" href="readtopic.php?page='.($current_page-1).'" ><img src="images\previous-right.png" alt="Trước"></a>|</span>';
			echo'<span class="first_last"><a href="readtopic.php?page='.$current_page.'" ><img src="images/first-right.png" alt="Đầu tiên" title="Đầu tiên">Đầu tiên</a></span>';
			 
			// echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
		}
		else{
			echo'<span> Trước</span>';	
		}
// Lặp khoảng giữa
		for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
   			if ($i == $current_page){
			echo '	 <span class="selected"><a href="javascript://" >'.$i.'</a></span>|';
       		// echo '<span>'.$i.'</span> | ';
    		 }
   		  	 else{
				 echo '<span><a href="readtopic.php?page='.$i.'" >'.$i.'</a>|</span>';
        		//echo '<a href="readtopic.php?page='.$i.'">'.$i.'</a> | ';
   			 }
		}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
		if ($current_page < $total_page && $total_page > 1){
   			 echo '<span class="prev_next"><a rel="next" href="readtopic.php?page='.($current_page+1).'"><img src="images/next-right.png" alt="Tiếp"></a> |';
			 echo'<span class="first_last"><a href="readtopic.php?page='.$total_page.'" >Cuối cùng<img src="images/last-right.png" alt="Cuối" title="Cuối cùng"></a></span>';
		}
		else{
			echo'<span> Tiếp </span>';	
		}
		
	

?>