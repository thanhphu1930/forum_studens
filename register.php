<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header1">
  	<h3>Đăng ký</h3>
  </div>
	<div class="header2">
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Tài khoản</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Mật khẩu</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Nhập lại mật khẩu</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Đăng ký</button>
  	</div>
  	<p>
  		Bạn đã là thành viên? <a href="login.php">Đăng nhập</a>
  	</p>
  </form>
  </div>
</body>
</html>