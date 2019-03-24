<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Diễn đàn sinh viên Hutech</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header1">
  	<h3>Đăng Nhập</h3>
  </div>
	<div class="header2"> 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Tài khoản</label>
  		<input type="text" name="username" value="<?php echo $username; ?>" >
  	</div>
  	<div class="input-group">
  		<label>Mật khẩu</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user" >Đăng nhập</button>
  	</div>
  	<p>
  		Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a>
  	</p>
  </form>
  </div>
</body>
</html>