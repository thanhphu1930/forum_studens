<?php 
	$type = array("png","PNG","gif","GIF","JPG","jpg","jpeg");
	$target_file = "avartar_user/";
	$name = basename($_FILES["img_avt"]["name"]);
	
	$target_file .= $name;
	$uploadOk = 0;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// check fake
	$check = getimagesize($_FILES["img_avt"]["tmp_name"]);
	if($check) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["img_avt"]["size"] > 5*1024*1024) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	} 
	
	// Allow certain file formats
	if( !in_array($imageFileType, $type) ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($_FILES["img_avt"]["tmp_name"], $target_file)) {
			 include('conn.php');
			mysqli_query($db,"UPDATE users SET link_image = '".$target_file."' WHERE username =  '".$_GET['username']."'");
			// echo "".$target_file."";
			 header("Location: /diendan_sv/thongtin.php");
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
?>