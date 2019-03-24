<?php 
		include('conn.php');
		$select =mysqli_query($db,"SELECT * FROM categories");
		echo '<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Thêm danh mục phụ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="../insertsubcatto.php" method="post">
                                       
									   	<div class="form-group">
                                            <label>Danh mục</label>
											 <select class="form-control" name="chon">';
										while($row = mysqli_fetch_assoc($select)){	
                                       echo'    
                                                <option value="'.$row['cat_id'].'" >'.$row['category_title'].'</option>
                                            ';}
                                     echo' </select>   
									 	</div>
                                        <div class="form-group">
                                            <label>Nhập tên danh mục phụ</label>
                                            <input class="form-control" name="subcattitle" placeholder="Nhập vào đây....">
                                        </div>
										<div class="form-group">
                                            <label>Nhập tên con danh mục phụ</label>
                                            <input class="form-control" name="subcatdesc" placeholder="Nhập vào đây....">
                                        </div>
										
                                        <button type="submit" class="btn btn-default" name="edit">Thêm</button>
                                       
                                    </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>';
	


?>