<?php 
 
  	session_start(); 
	include ('content_function.php');

  	if (isset($_GET['logout'])) {
 	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Diễn đàn sinh viên Hutech</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="styles/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="styles/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" href="styles/css/bootstrap.min.css" />
<!--[if lt IE 7]><style type="text/css">div { behavior: url(iepngfix.htc); }</style><![endif]-->
<!--// nut thích reply-->
<script>
	$(document) .ready(function() {
      $(".thank_reply") .click(function(){
		  var id =$(this).attr("like");
		 // var author=$(this) .attr("author")---,author:author
		  $.get("checklike.php",{rid:id},function(data){
			//alert(data);
			$(".thank_reply") .html(data)
			});  
	   });  
    });
</script>
<!--// nut thich  topic-->
<script>
	$(document) .ready(function() {
      $(".postlinking") .click(function(){
		//  $.post("edittopicto.php", function(data){});
		  var id =$(this).attr("countlike");
		  //$(".primaryContent").html(data)
		//  $("div.post_thanks_button").remove();
		  $.get("countlike.php",{tid:id},function(data){
			  $(".postlinking") .html(data)
			});  
	   });  
    });
</script>
<!--// thay doi avatar-->
<script>
	$(document) .ready(function() {
      $(".chance_avatar") .click(function(){
		  var avatar =$(this).attr("avatar");
		  $.get("chance_avartar.php",{author:avatar},function(data){
			 $(".mainProfileColumn") .html(data)
	
			});  
	   });  
    });
</script>


<script>
	$(document) .ready(function() {
      $(".xoasubcat") .click(function(){
		// var id =$(this).attr("xoasub");
		 var id = 11;
		// var id = $(this) .attr("xoasub");
		 var result = confirm ('Bạn có chắc muốn xóa chủ đề này không?');
			if(result == true){
				$.get("deletetopic.php",{scid:id},function(data){
			  	alert(data);
				});  
			}else if(result == false){
				alert ('Lần sau nhớ suy nghĩ kỹ!!!');
			}
		
	   });  
    });
</script>

<script type="text/javascript"> 
function like() { 
    $.get("likeone.php"); 
    return false; 
} 
</script>
</head>
<body>
<div id="container_wrapper1">
  <div id="container_wrapper2">
    <div id="container">
      <div id="header">
        <div id="logo">
        </div>
      </div>