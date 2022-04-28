<?php
    $query_account = "SELECT * FROM `account`";
    $account_select = $Main->select_list($query_account);

    function sl_name($id){
        $Main = new Main;
        $query_sl = "SELECT `Ep_name` FROM `employee` WHERE `Ep_id` ='$id'";
        $data_sl = $Main ->select_one($query_sl);
        return $data_sl["Ep_name"];
    }

    $select_Ep = "SELECT `Ep_id`,`Ep_name` FROM `employee`";
    $data_Ep = $Main->select_list($select_Ep);
    
    if (isset($_POST["btn_addAc"])) {
        $messenger = $account->add_account();
        $error= $messenger[1];
        
    }
?>

<div class="title_content">
    <h4>Danh sách tài khoản</h4>
    <form action="" class="tools">
        
        <button type="button" data-toggle="modal" data-target="#add_account" class="btn btn-dark add"><i class="fas fa-user-plus"></i> Thêm</button><br><br>

    </form>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:40px;" class="row ">
            <div style="width: 30%;" class="col_table">
                <p class="table_title">ID tài khoản</p>
            </div>
            <div style="width: 30%;" class="col_table">
                <p class="table_title">Nhân viên</p>

            </div>
            <div style="width: 30%;" class="col_table">
                <p class="table_title">Tên tài khoản</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Thao tác</p>

            </div>
        </div>
        <?php
        foreach($account_select as $item){
        ?>
            <div style="height:70px;" class="row ">
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ac_id"]; ?> </p>
                </div>
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php
                        $name = sl_name($item["Ep_id"]);
                        echo $name ; ?>
                    </p>

                </div>
                
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Ac_name"]; ?></p>

                </div>
                
                <div style="width: 10%; padding-top 10px;" class="col_table">
                <br>
                    <a href ="index.php?page=account&ac_remove=<?php echo $item["Ac_id"]; ?>" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <br>
    <p><?php echo isset($error['message']) ? $error['message'] :''; ?></p>
    
    <!--Thêm tài khoản-->
    <form action="" method ="post">
        <div class="modal fade" id="add_account">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Thêm tài khoản</h6>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div style="margin-bottom: 0px; " class="dropdown">
                        <br>
                            <label for="" style="display: block;">Nhân viên</label>
                            <select name="add_Ep" class="form-group">
                                <?php
                                foreach ($data_Ep as $item) {
                                ?>
                                    <option value= '<?php echo isset($item["Ep_id"]) ? $item["Ep_id"] :''; ?>';> <?php echo isset($item["Ep_name"]) ? $item["Ep_name"] :''; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên tài khoản</label>
                            <input type="text" class="form-control" required value="" name ="add_name_account">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" required value="" name ="add_pwd_account">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for=""> Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" required value="" name ="cf_pwd_account">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                            <p></p>
                        </div>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btn_addAc">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
                    </div>
                                
                </div>
            </div>
        </div>
    </form>
</div>