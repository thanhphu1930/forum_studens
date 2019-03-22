<?php
// kết nối database
	$db = mysqli_connect("localhost","root","","diendan_sv");
	if(!$db){
		die( mysqli_connect_error());	
	}else{
		mysqli_set_charset($db,'utf8');	
	}
?>