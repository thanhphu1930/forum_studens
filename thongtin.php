<?php
	include('header.php');
	include('menu.php');
?>
	<div class="profilePage" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">

	<div class="mast">
	<!--<div class="avatarScaler">-->
    <div class="avatarHolder"  style="padding:35px;">
<?php
	include('conn.php');
	if(isset($_GET['author'])){
	$select = mysqli_query($db,"SELECT link_image FROM users WHERE username = '".$_GET['author']."'");
	}else{
	$select = mysqli_query($db,"SELECT link_image FROM users WHERE username = '".$_SESSION['username']."'");	
	}
	$row= mysqli_fetch_assoc($select);
 ?>			
				<span class="helper"></span>
			<a href="#" class="avatar Av51584m" data-avatarhtml="true"><img src="<?php echo''.$row['link_image'].'';  ?>"  width="128" height="128"></a>
			
	</div>
      
      
      
			
			<!-- slot: message_user_info_avatar -->
		
        
<?php 
	if(isset($_GET['author'])){
		inforuser($_GET['author']); 
	}else{?>
    
	<div style="padding-left: 35px; " class="chance_avatar" avatar="<?php echo''.$_SESSION['username'].''; ?>"> + Chỉnh sửa ảnh</div>';
	<?php	inforuser($_SESSION['username']);	
	}
?>
			
<?php
	include('footer.php');
?>
 
