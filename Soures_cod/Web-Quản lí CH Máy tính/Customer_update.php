<?php
    $customer = new Customer();

    $customer_update = isset($_GET["customer_update"]) ? $_GET["customer_update"] : '';
    $select = "SELECT * FROM `customer` WHERE `Ct_id` = '$customer_update'";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_update"])){
        $messenger = $customer->update_customer();
        $error = $messenger[1];
    }
?>
<div class="title_content">
    <h4>Chỉnh sửa</h4><br>
</div>

<form action="" method="post">
    <div class="table">
        <div style="margin-right: 100px; padding-left: 10px; border-bottom: 1px solid red; background-color: rgb(236 232 174);"
            class="row">

            <div class="col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ct_id"]; ?>" name="Ct_id" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="">Tên khách hàng</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ct_name"]; ?>" name="Ct_name">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                <div style="margin-bottom: 0px; " class="dropdown">

                    <label for="" style="display: block;">Giới tính</label>
                    <select name="Ct_sex" class="form-group">
                        <?php
                            if ($data_select["Ct_sex"] == 0) {
                                ?>
                                <option value=0;>Nam</option>
                                <option value=1;>Nữ</option>
                                <?php
                            }
                            else
                                {
                                    ?>
                                    <option value=1;>Nữ</option>
                                    <option value=0;>Nam</option>
                                    <?php
                                }
                        ?>
                        
                    </select>
                </div>
            </div>
            <div style="padding-left: 10px; border-left: 1px solid red;"" class=" col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ct_phone"]; ?>" name="Ct_phone">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <textarea name="Ct_adress" id="" cols="" rows="10" class="form-control"><?php echo $data_select["Ct_adress"]; ?></textarea>
                </div>
            </div>
        </div>

    </div>
    <button style="float: right; margin-right: 100px; margin-top: 30px;" class="btn btn-danger" name ="btn_update">Cập nhật</button>
    <p style="margin-left:20px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?></p>
</form>
