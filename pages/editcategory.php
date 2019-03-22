<?php 

	include('../conn.php');
	$cid = $_GET['cid'];
	$select = mysqli_query($db,"SELECT * FROM categories WHERE cat_id ='".$cid."'");
	while($row = mysqli_fetch_assoc($select)){
echo '<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Sửa thông tin danh mục
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="editcateto.php?cid='.$cid.'" method="post">
                                       
                                        <div class="form-group">
                                            <label>Nhập lại nội dung cần sửa</label>
                                            <textarea class="form-control" rows="1" name="comment" >'.$row['category_title'].'</textarea>
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
<!--<div class="form-group">
                                            <label>Nhập lại nội dung cần sửa</label>
                                            <input class="form-control" value="Enter text" style="font-size:14px; ">
                                        </div>
										 <div class="form-group">
                                            <label>Nhập lại tên cần sửa</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>

                           
                                        </div>-->