<?php
    $producer_select = "SELECT * FROM `producer`";
    $producer_select = $Main->select_list($producer_select);
    $Producer = new Producer();

    if (isset($_POST["btn_addPd"])) {
        $messenger = $Producer->add_producer();
        $error = $messenger[1];
    }
?>

<div class="title_content">
    <h4>Danh sách nhà cung cấp</h4><br>
    <button type="button" data-toggle="modal" data-target="#add_producer" class="btn btn-dark add"><i class="fas fa-user-plus"></i> Thêm</button><br>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:50px;" class="row ">
            <div style="width: 10%;" class="col_table">
                <p class="table_title">ID</p>
            </div>
            <div style="width: 30%;" class="col_table">
                <p class="table_title">Tên nhà cung cấp</p>

            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_title">Số điện thoại</p>

            </div>
            <div style="width: 30%;" class="col_table">
                <p class="table_title">Địa chỉ</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Thao tác</p>

            </div>
        </div>
        <?php
        foreach($producer_select as $item){
        ?>
            <div style="height:80px;" class="row ">
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo $item["Pd_id"]; ?> </p>
                </div>
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Pd_name"]; ?></p>

                </div>
                
                <div style="width: 20%;" class="col_table">
                    <p class="table_content"><?php echo $item["number_phone"]; ?></p>

                </div>
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Adress"]; ?></p>

                </div>
                <div style="width: 10%; padding-top 10px;" class="col_table">
                <br>
                    <a href="index.php?page=producer&producer_update=<?php echo $item["Pd_id"]; ?>" class="btn btn-danger">Sửa</a>
                    <?php
                    if ($permission == "Quản lý") {
                        ?>
                        <a href ="index.php?page=producer&producer_remove=<?php echo $item["Pd_id"]; ?>" class="btn btn-danger">Xóa</a>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <p><?php echo isset($error["message"]) ? $error["message"] : ''; ?></p>
    
    <!--Thêm nhà cung cấp-->
    <form action="" method ="post">
        <div class="modal fade" id="add_producer">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Thêm tài khoản</h6>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" required value="" name ="add_name_producer">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" required value="" name ="add_number_producer">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <textarea name="add_adress" id="" cols="100%" rows="10" class="form-control" required value=""></textarea>
                        </div>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btn_addPd">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
                    </div>
                                
                </div>
            </div>
        </div>
    </form>
</div>