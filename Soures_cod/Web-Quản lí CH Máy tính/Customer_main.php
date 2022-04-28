<?php
    $Customer = new Customer();

    
    if (isset($_POST["btn_addCt"])) {
        $messenger = $Customer->add_customer();
        $error = $messenger[1];
    }    

    $sex = isset($_POST["sex"]) ? $_POST["sex"] :'';
    if (isset($_POST["btn_sex"]) && $sex <2) {
        $data_select = $Customer->statistical($sex);
    }    
    else{
        $data_select = $Customer->select();
    }
?>

<div class="title_content">
    <h4>Danh sách khách hàng</h4>
    <form action="" class="tools" method = "post">
       <br>
       <div style="margin-left: 500px;   " class="dropdown">
       <button  style ="margin-right: 500px;" class="btn btn-dark add" name="btn_sex">Lọc</button>
            <select name="sex" class="form-group">
               <option value='0'>Nam</option>
               <option value='1'>Nữ</option>
               <option value='2'>tất cả</option>
            </select>
           </div>
         
        <button type="button" data-toggle="modal" data-target="#add_customer" class="btn btn-dark add"><i class="fas fa-user-plus"></i> Thêm</button><br>
    </form>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:50px;" class="row ">
            <div style="width: 10%;" class="col_table">
                <p class="table_title">ID</p>
            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_title">Tên khách hàng</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Giới tính</p>

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
        foreach($data_select as $item){
        ?>
            <div style="height:80px;" class="row ">
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ct_id"]; ?> </p>
                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ct_name"]; ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content">
                        <?php if($item["Ct_sex"] == "0")
                            echo "Nam";
                            elseif($item["Ct_sex"] == "1")
                            echo "Nữ";
                        ?>
                    </p>

                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ct_phone"]; ?></p>

                </div>
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ct_adress"]; ?></p>

                </div>
                <div style="width: 10%; padding-top 10px;" class="col_table">
                <br>
                    <a href="index.php?page=customer&customer_update=<?php echo $item["Ct_id"]; ?>" class="btn btn-danger">Sửa</a>
                    <?php
                    if ($permission == "Quản lý") {
                        ?>
                        <a href ="index.php?page=customer&customer_remove=<?php echo $item["Ct_id"]; ?>" class="btn btn-danger">Xóa</a>
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
        
</div>
<!----Thêm khách hàng---->
<form action="" method ="post">
        <div class="modal fade" id="add_customer">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Thêm khách hàng</h6>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên khách hàng</label>
                            <input type="text" class="form-control" required value="" name="add_name">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div style="margin-bottom: 0px; " class="dropdown">
                        <br>
                            <label for="" style="display: block;">Giới tính</label>
                            <select name="add_sex" class="form-group">
                                <option value= 0;>Nam</option>
                                <option value= 1;>Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" required value="" name="add_phone">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" required value="" name="add_adress">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btn_addCt">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>