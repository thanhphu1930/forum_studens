<?php
include('../content_function.php');
include('../conn.php');
$connect = mysqli_connect("localhost", "root", "", "diendan_sv");


$query = "SELECT COUNT(date_postted) as total,date_postted FROM topics GROUP BY date_postted";
$result = mysqli_query($db, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
$chart_data .= "{ year:'".$row["date_postted"]."', purchase:".$row["total"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);


?>
<!--$query = "SELECT * FROM account";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
$chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);-->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="../styles/js/jquery-3.3.1.min.js"></script>
    <script>
		Morris.Bar({
			element: 'morris-chart',
			data:[<?php echo $char_date; ?>],
			xkey:'Tháng',
			ykeys:['User','Topics','Replies'],
			labels:['User','Topics','Replies'],	
			hideHover:'auto',
		});
    </script>
		


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
             <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Thống kê</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Danh sách thành viên</a>
                                </li>
                                <li>
                                    <a href="#">Danh sách thành viên bị khóa</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>Danh mục</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Danh mục phụ</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Chủ đề thảo luận</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Trả lời chủ đề</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê</h1>
                </div>
                <!-- /.col-lg-12 -->
                <!-- .col-lg-12 -->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tổng thống kê
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <!-- .col-lg-12-->
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         Danh mục phụ
                         <form  style="float:right; padding:5px;" class="themsubcate"><button type="button" class="btn btn-warning" >Thêm danh mục phụ</button></form>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên danh mục phụ</th>
                                            <th>Các danh mục con</th>
                                            <th>Chức năng</th>
                                        </tr>
                                   	<?php  		include('../conn.php');
									$tag = 1;	
									$select = mysqli_query($db,"SELECT * FROM subcategories");
									
									while($row= mysqli_fetch_assoc($select)){
									
									echo' 
									</thead>
									 <tbody>
                                        <tr>
                                            <td>'.$tag ++.'</td>
                                            <td>'.$row['subcategory_title'].'</td>
                                            <td>'.$row['subcategory_desc'].'</td>
                                             <td>
                                                 <div class="suasubcat"><button type="button" class="btn btn-success" suasub="'.$row['subcat_id'].'">Sửa</button></div>
                                                 <div class="xoasubcat"><button type="button" class="btn btn-danger" xoasub="'.$row['subcat_id'].'">Xóa</button></div>
                                            </td>
                                        </tr>
									';
									}
				 ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col.lg-12-->
                <!-- .col-lg-12-->
					  <div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									Các danh mục diễn đàn
                                     <form style="float:right; padding:5px;" class="themcate"><button type="button" class="btn btn-warning">Thêm danh mục</button></form>
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mục thảo luận</th>
													<th>Chức năng</th>
												</tr>
											</thead>
              		<?php  		include('../conn.php');
									$tag = 1;	
									$select = mysqli_query($db,"SELECT * FROM categories");
									while($row= mysqli_fetch_assoc($select)){
									echo'

																<tbody>
																	<tr>
																		<td>'.$tag ++.'</td>
																		<td>'.$row['category_title'].'</td>
																	<td>';	?>
																				
 										<div class="suacat"><button type="button" class="btn btn-success" suacat="<?php echo"'".$row['cat_id']."'"?>">Sửa</button></div>
                                        <div class="xoacat"><button type="button" class="btn btn-danger" xoacat="<?php echo"".$row['cat_id'].""?>">Xóa</button></div>		<?php                echo'                                
																		</td>
																		
																	</tr>
																
																</tbody>
																';
									}
				 ?>
                 </table>
														</div>
														<!-- /.table-responsive -->
													</div>
													<!-- /.panel-body -->
												</div>
												<!-- /.panel -->
											</div>
                <!-- /.col.lg-12-->
                <!-- .col-lg-12-->
                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách  người dùng  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tài khoản</th>
                                            <th>Mật khẩu</th>
                                            <th>Email đăng ký</th>
                                            <th>Ngày đăng ký</th>
                                            <th>Quyền hạn</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                    	<?php  		include('../conn.php');
									$tag = 1;	
									$select = mysqli_query($db,"SELECT * FROM users");
									
									while($row= mysqli_fetch_assoc($select)){
									$password =($row['password']);
									echo'   
                                    <tbody>
                                        <tr>
                                            <td>'.$tag ++.'</td>
                                            <td>'.$row['username'].'</td>
                                            <td>'.$password.'</td>
                                            <td>'.$row['email'].'</td>
											 <td>'.$row['date_tg'].'</td>
                                            <td>'.$row['rank'].'</td>
                                           
                                            <td>
  									<div class="suauser"><button type="button" class="btn btn-success" suauser="'.$row['user_id'].'">Sửa</button></div>
                                    <div class="xoaeser"><button type="button" class="btn btn-danger" xoauser="'.$row['user_id'].'">Xóa</button></div>																															</td>
                                            </td>
                                        </tr>
                                    </tbody>';
									}
						 ?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col.lg-12-->
                
                
            </div>
            <!-- /.row -->
            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
   

</body>

</html>
<script>
 Morris.Line({
 element : 'morris-chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit', 'purchase', 'sale'],
 labels:['Users', 'Topics', 'Replies'],
 hideHover:'auto',
 stacked:true
});
</script>
<!--  chức năng xóa succagories-->
<script>
	$(document) .ready(function() {
      $(".xoasubcat") .click(function(){
		// var id =$(this).attr("xoasub");
		 //var id =$(this) .attr("xoasub");
		 var id = 11;
		 var result = confirm ('Bạn có chắc muốn xóa chủ đề này không?');
			if(result == true){
				$.get("../deletetopic.php",{scid:id},function(data){
			  	alert(data);
				});  
			}else if(result == false){
				alert ('Lần sau nhớ suy nghĩ kỹ!!!');
			}
		
	   });  
    });
</script>
<!--chức năng sửa/**/ succagories-->
<script>
	$(document) .ready(function() {
      $(".suasubcat") .click(function(){
		//  $.post("edittopicto.php", function(data){});
		 
		 // var id =$(this).attr("suacat");
		  var id = 3;
		  //$(".primaryContent").html(data)
		//  $("div.post_thanks_button").remove();
		  $.get("editsubcate.php",{scid:id},function(data){
			  $(".col-lg-10") .html(data)
			});  
	   });  
    });
</script>

<!--chức năng xóa categories-->
<script>
	$(document) .ready(function() {
      $(".xoacat") .click(function(){
		// var id =$(this).attr("xoasub");
		 //var id =$(this) .attr("xoasub");
		 var id = 2;
		 var result = confirm ('Bạn có chắc muốn xóa danh mục này không?');
			if(result == true){
				$.get("../deletetopic.php",{scid:id},function(data){
			  	alert(data);
				});  
			}else if(result == false){
				alert ('Lần sau nhớ suy nghĩ kỹ!!!');
			}
		
	   });  
    });
</script>
<!--chức năng sửa categories-->
<script>
	$(document) .ready(function() {
      $(".suacat") .click(function(){
		//  $.post("edittopicto.php", function(data){});
		 
		  var id =$(this).attr("suacat");
		//  var id = 3;
		  alert(id);
		  //$(".primaryContent").html(data)
		//  $("div.post_thanks_button").remove();
		 // $.get("editcategory.php",{cid:id},function(data){
		//	  $(".col-lg-6") .html(data)
		//	});  
	   });  
    });
</script>
<!--chức năng thêm categories -->
<script>
	$(document) .ready(function() {
      $(".themcate") .click(function(){
			var  insert = prompt("Thêm danh mục","Nhập nội dung...");
		  //$.get("editcategory.php",{cid:insert},function(data){
//			  $(".col-lg-6") .html(data)
//			}); 
	alert(insert); 
	   });  
    });
</script>
<!--chức năng thêm subcategories -->
<script>
	$(document) .ready(function() {
      $(".themsubcate") .click(function(){
			
		  $.get("../insertsubcat.php",function(data){
			  $(".col-lg-10") .html(data)
			}); 
	
	   });  
    });
</script>
<!-- sửa thông tin user-->
<script>
	$(document) .ready(function() {
      $(".suauser") .click(function(){
		//  $.post("edittopicto.php", function(data){});
		 
		 // var id =$(this).attr("suauser");
		  var id = 6;
		  //$(".primaryContent").html(data)
		//  $("div.post_thanks_button").remove();
		  $.get("edituser.php",{uid:id},function(data){
			  $(".col-lg-11") .html(data)
			});  
	   });  
    });
</script>