<?php 

	include('../conn.php');
	$scid = $_GET['scid'];
	$select = mysqli_query($db,"SELECT * FROM subcategories WHERE subcat_id ='".$scid."'");
	while($row = mysqli_fetch_assoc($select)){
echo '<div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Sửa thông tin danh mục phụ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="editsubcateto.php?scid='.$scid.'" method="post" >
                                       
                                        <div class="form-group">
                                            <label>Nhập lại tên danh mục phụ</label>
                                            <textarea class="form-control" rows="1"  name="comment1">'.$row['subcategory_title'].'</textarea>
                                        </div>
										<div class="form-group">
                                            <label>Nhập lại thêm dah mục con</label>
                                            <textarea class="form-control" rows="1"  name="comment2">'.$row['subcategory_desc'].'</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Sửa</button>
                                        <button type="reset" class="btn btn-default">Hủy</button>
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