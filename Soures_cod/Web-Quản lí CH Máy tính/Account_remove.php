<?php
    $account = new account();

    $account_remove = isset($_GET["ac_remove"]) ? $_GET["ac_remove"] : '';
    $select = "SELECT * FROM `account` WHERE `Ac_id` ='$account_remove'";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_remove"])){
        $messenger = $account->remove_account();
        $error = $messenger[1];
    }
?>
<div class="title_content">
    <h4>Xóa tài khoản</h4><br>
</div>
<form action="" method="post">
    <div class="table">
        <div style="margin-right: 100px; padding-left: 10px; border-bottom: 1px solid red; background-color: rgb(236 232 174);"
            class="row">

            <div class="col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ac_id"]; ?>" name="Ac_id" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="">Tên tài khoản</label>
                    <input type="text" class="form-control" required value="<?php echo $data_select["Ac_name"]; ?>" name="Ac_name" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                
            </div>
            <div style="padding-left: 10px; border-left: 1px solid red;"" class=" col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">Nhập mật khẩu (Mật khẩu tài khoản đang đăng nhập!)</label>
                    <input type="text" class="form-control" required value="" name="Ac_pwd" >
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
               
            </div>
        </div>
        <br>
    <p style="margin-left: 20px;"><?php echo isset($error['message']) ? $error['message'] : ''; ?> </p>
    </div>
    <button style="float: right; margin-right: 100px; margin-top: 30px;" class="btn btn-danger" name ="btn_remove">Xóa</button>
</form>
