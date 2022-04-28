<?php
    $Producer = new Producer();

    $producer_remove = isset($_GET["producer_remove"]) ? $_GET["producer_remove"] : '';

    $select = "SELECT * FROM `producer` WHERE `Pd_id` = '$producer_remove' ";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_remove_PD"])){
        $messenger = $Producer->remove_producer();
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
                    <input type="text" class="form-control" required value="<?php echo $data_select["Pd_id"]; ?>"
                        name="Pd_id" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Pd_name"]; ?>"
                        name="Pd_name" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
               
            </div>
            <div style="padding-left: 10px; border-left: 1px solid red;"" class=" col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["number_phone"]; ?>"
                        name="number_phone" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <textarea name="Adress" id="" cols="" rows="10"
                        class="form-control" readonly><?php echo $data_select["Adress"]; ?></textarea>
                </div>
               
            </div>
        </div>
    </div>
    <button style="float: right; margin-right: 100px; margin-top: 30px;" class="btn btn-danger" name="btn_remove_PD">Xóa</button>
        <br>
    <p style="margin-left:30px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?></p>
</form>