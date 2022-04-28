<?php
    $Employee = new Employee();

    $employee_update = isset($_GET["ep_update"]) ? $_GET["ep_update"] : '';
    $select = "SELECT * FROM `employee` WHERE `Ep_id` = '$employee_update'";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_update"])){
        $messenger = $Employee->update_employee();
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
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ep_id"]; ?>"
                        name="Ep_id" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="">Tên nhân viên</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ep_name"]; ?>"
                        name="Ep_name">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                <div style="margin-bottom: 0px; " class="dropdown">

                    <label for="" style="display: block;">Giới tính</label>
                    <select name="Ep_sex" class="form-group">
                        <?php
                            if ($data_select["Ep_sex"] == 0) {
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
                <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input type="text" required value="<?php echo $data_select["Ep_birthday"]; ?>" class="form-control"
                        name="Ep_birthday">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
            </div>
            <div style="padding-left: 10px; border-left: 1px solid red;"" class=" col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ep_phone"]; ?>"
                        name="Ep_phone">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <textarea name="Ep_adress" id="" cols="" rows="10"
                        class="form-control"><?php echo $data_select["Ep_adress"]; ?></textarea>
                </div>
                <div style="margin-bottom: 0px; " class="dropdown">

                    <label for="" style="display: block;">Chức vụ</label>
                    <select name="Ep_Position" class="form-group">
                        <?php
                        if ($data_select["Ep_Position"] == 0) {
                            ?>
                        <option value=0;>Quản lý</option>
                        <option value=1;>Nhân viên</option>
                        <?php
                        }
                        else
                            {
                                ?>
                        <option value=1;>Nhân viên</option>
                        <option value=0;>Quản lý</option>
                        <?php
                            }
                    ?>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <button style="float: right; margin-right: 100px; margin-top: 30px;" class="btn btn-danger" name="btn_update">Cập
        nhật</button>
        <br>
    <p style="margin-left:30px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?></p>
</form>