<?php
    $Employee = new Employee();

    //Thêm nhân viên
    if (isset($_POST["btn_addEp"])) {
        $messenger = $Employee->add_employee();
        $error = $messenger[1];
    }

    $value_ep = isset($_POST["value_ep"]) ? $_POST["value_ep"] : '';
    if (isset($_POST["value_ep"]) && $value_ep != '') {
        $q ="SELECT * FROM `employee` WHERE `Ep_id` like '%$value_ep%' OR `Ep_name` like '%$value_ep%' OR`Ep_phone` like'%$value_ep%' or `Ep_adress` like '%$value_ep%'";
        $data_ep = $Main->select_list($q);
    }
    else{
        $query = "SELECT * FROM `employee`";
        $data_ep = $Main->select_list($query);
    }
?>

<div class="title_content">
    <h4>Danh sách nhân viên</h4>
    <form action="" class="tools" method="post">
        <input style="text-align: right;" type="text" name="value_ep">
        <button class="btn btn-dark" name="search_ep"><i class="fas fa-search"></i></button>
        <button type="button" data-toggle="modal" data-target="#add_employee" class="btn btn-dark add"><i class="fas fa-user-plus"></i> Thêm</button><br>
    </form>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:50px;" class="row ">
            <div style="width: 5%;" class="col_table">
                <p class="table_title">ID</p>
            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_title">Tên nhân viên</p>

            </div>
            <div style="width: 5%;" class="col_table">
                <p class="table_title">GT</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Ngày sinh</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Số điện thoại</p>

            </div>
            <div style="width: 30%;" class="col_table">
                <p class="table_title">Địa chỉ</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Chức vụ</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Thao tác</p>

            </div>
        </div>
        <?php
        foreach ($data_ep as $item) {
           
        ?>
            <div style="height:80px;" class="row ">
                <div style="width: 5%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ep_id"]; ?> </p>
                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ep_name"]; ?></p>

                </div>
                <div style="width: 5%;" class="col_table">
                    <p class="table_content">
                        <?php if($item["Ep_sex"] == "0")
                            echo "Nam";
                            elseif($item["Ep_sex"] == "1")
                            echo "Nữ";
                        ?>
                    </p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ep_birthday"]; ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ep_phone"]; ?></p>

                </div>
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ep_adress"]; ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php
                        if ($item["Ep_Position"] == 0) {
                            echo "Quản lý";
                        }
                        else
                            echo "Nhân viên";
                        ?>
                    </p>

                </div>
                <div style="width: 10%; padding-top 10px;" class="col_table">
                <br>
                    <a href="index.php?page=employee&ep_update=<?php echo $item["Ep_id"]; ?>" class="btn btn-danger">Sửa</a>
                    <a href ="index.php?page=employee&ep_remove=<?php echo $item["Ep_id"]; ?>" class="btn btn-danger">Xóa</a>
                    
                </div>
            </div>
       <?php
        }
       ?>
    </div>
    <br>
    <p style="margin-left:20px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?> </p>
</div>

<!----Thêm nhân viên---->
<form action="" method ="post">
        <div class="modal fade" id="add_employee">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Thêm nhân viên</h6>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên nhân viên</label>
                            <input type="text" class="form-control" required value="" name="add_name">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input type="text" class="form-control" required value="" name ="add_date">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
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
                        <div style="margin-bottom: 0px; " class="dropdown">
                        <br>
                            <label for="" style="display: block;">Giới tính</label>
                            <select name="add_sex" class="form-group">
                                <option value= 0;>Nam</option>
                                <option value= 1;>Nữ</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 0px; " class="dropdown">
                        <br>
                            <label for="" style="display: block;">Chức vụ</label>
                            <select name="add_position" class="form-group">
                                <option value= 0;>Quản lý</option>
                                <option value= 1;>Nhân viên</option>
                            </select>
                        </div>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btn_addEp">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>