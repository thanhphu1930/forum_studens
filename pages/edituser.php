<?php 

	include('../conn.php');
	$uid = $_GET['uid'];
	$select = mysqli_query($db,"SELECT * FROM users WHERE user_id ='".$uid."'");
	while($row = mysqli_fetch_assoc($select)){
echo '<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Sửa thông tin thành viên
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="edituserto.php?uid='.$uid.'" method="post">
                                       
									   <div class="form-group">
                                            <label>Chức vụ</label>
											 <select class="form-control" name="chonchucvu">
												 <option value="Thành viên" >Thành viên</option>
												 <option value="Administrator" >Administrator</option>
												 <option value="Moderator" >Moderator</option>
                                             </select>   
									 	</div>
										<div class="form-group">
                                            <label>Nhập lại Email cần đổi</label>
                                            <textarea class="form-control" rows="1" name="commentemail" >'.$row['email'].'</textarea>
                                        </div>
										<div class="form-group">
                                            <label>Nhập lại mật khẩu cần đổi</label>
                                            <textarea class="form-control" rows="1" name="commentpassword" >'.$row['password'].'</textarea>
                                        </div>
										<div class="form-group">
                                            <label>Khóa tài khoản</label>
											 <select class="form-control" name="chonkhoa">
												 <option value="0" >Mở khóa</option>
												 <option value="1" >Khóa</option>
												 
                                             </select>   
									 	</div>
                                        <button type="submit" class="btn btn-default" name="edit">Sửa</button>
                                       
                                    </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>';
	}


?>