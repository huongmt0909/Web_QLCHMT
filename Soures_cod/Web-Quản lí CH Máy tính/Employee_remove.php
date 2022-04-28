<?php
    $Employee = new Employee();

    $employee_remove = isset($_GET["ep_remove"]) ? $_GET["ep_remove"] : '';
    $select = "SELECT * FROM `employee` WHERE `Ep_id` = '$employee_remove'";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_remove"])){
        $messenger = $Employee->remove_employee();
        $error = $messenger[1];
    }
?>
<div class="title_content">
    <h4>Xóa nhân viên</h4><br>
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
                        name="Ep_name" readonly>
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
                        name="Ep_birthday" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
            </div>
            <div style="padding-left: 10px; border-left: 1px solid red;"" class=" col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ep_phone"]; ?>"
                        name="Ep_phone" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <textarea name="Ep_adress" id="" cols="" rows="10"
                        class="form-control" readonly><?php echo $data_select["Ep_adress"]; ?></textarea>
                </div>
                <div style="margin-bottom: 0px; " class="dropdown">

                    <label for="" style="display: block;">Giới tính</label>
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
    <button style="float: right; margin-right: 100px; margin-top: 30px;" class="btn btn-danger" name="btn_remove">Xóa</button>
        <br>
    <p style="margin-left:20px "><?php echo isset($error['message']) ? $error['message'] : ''; ?></p>
</form>