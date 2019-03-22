<?php
session_start();
include('conn.php');
$username = "";
$email    = "";
$errors = array(); 

	

// đăng ký người dùng
if (isset($_POST['reg_user'])) {
  // lấy du liệu  input người dùng
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //xác minh ngưởi dùng thực hiện đúng quá trình tạo tài khoản
  if (empty($username)) { array_push($errors, "Bạn chưa nhập tài khoản"); }
  if (empty($email)) { array_push($errors, "Vui lòng nhập Email"); }
  if (empty($password_1)) { array_push($errors, "Bạn chưa nhập mật khẩu"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Vui lòng nhập lại đúng mật khẩu trên");
  }

 // kiem  tra  tài khoản và Email đả đang ký chưa
 
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // thong bao đã tồn tại thông báo lỗi
    if ($user['username'] === $username) {
      array_push($errors, "Tài khoản này đã tồn tại");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email này đã có người sử dụng");
    }
  }

  // kết thúc, nếu không có lỗi
  if (count($errors) == 0) {
	//$password = md5($password_1);//mã hóa mật khẩu vào lưu xuống database
	//$password =	EncryptByPassPhrase(‘123’, $password_1 );
  	$query = "INSERT INTO users (username,rank,date_tg, email, password, link_image) 
  			  VALUES('$username','Thành viên',NOW() ,'$email', '$password_1','images/avatar_m.png')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Bạn có thể đăng nhập";
  	header('location: index.php');
  }
}
  if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Bạn chưa nhập tài khoản");
  }
  if (empty($password)) {
  	array_push($errors, "Bạn chưa nhập mật khẩu");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND banned = 0";
  	$results = mysqli_query($db, $query);
	//$rows = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Bạn đã đăng nhập thành công";
	  header('location: index.php');
  	}else {

		
  		array_push($errors, "Bạn đã nhập sai tài khoản hoặc mật khẩu hoặc có thể tài khoản của bạn đã bị khóa. Vui lòng liên hệ với BQT để được hỗ trợ");
  	}
  }
}
?>
