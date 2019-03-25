<?php
session_start();
$author = $_SESSION['username'];
include('conn.php');
$select = mysqli_query($db,"SELECT username,link_image FROM users WHERE username = '".$author."'");
$row= mysqli_fetch_assoc($select);

echo' <div class="col-md-9">       
 <h3>Hồ sơ cá nhân</h3>
        <div class="panel panel-default"> 
            <div class="panel-heading">Upload ảnh đại diện</div>
            <div class="panel-body">
                <form action="testxuly.php?username='.$row['username'].'" method="POST"  id="formUpAvt" enctype="multipart/form-data">
                    <div class="form-group box-current-img">
                        <p><strong>Ảnh hiện tại</strong></p>
                        <img src="'.$row['link_image'].'" alt="Ảnh đại diện của '.$row['username'].'" width="80" height="80">
                    </div>
                    <div class="alert alert-info">Vui lòng chọn file ảnh có đuôi .jpg, .png, .gif và có dung lượng dưới 5MB.</div>
                    <div class="form-group">
                        <label>Chọn hình ảnh</label>
                        <input type="file" class="form-control" id="img_avt" name="img_avt" >
                    </div>
                    <div class="form-group box-pre-img hidden">
                        <p><strong>Ảnh xem trước</strong></p>
                    </div>            
                    <div class="form-group hidden box-progress-bar">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary pull-left" type="submit">Upload</button>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="alert alert-danger hidden"></div>
                </form>
            </div>
        </div>
	</div>';
?>