<?php
    $Product = new Product();
    $product_update = isset($_GET["product_update"]) ? $_GET["product_update"] : '';

    $select = "SELECT * FROM `product` WHERE `Pr_id` = '$product_update' ";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_updatePr"])) {
        $messenger = $Product->update_product();
        $error = $messenger[1];
    }

?>

<form action="" method="POST" style="padding:10px; background-color: rgb(236 232 174);" >
<div class="title_content">
    <h4>Chỉnh sửa</h4><br>
    <button name="btn_updatePr" class="btn btn-dark add"><i class="fas fa-user-plus"></i>Cập nhật</button>
    <br>
</div>
    <div class="row">
        <div class="col-xl-6">
            <br>
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" class="form-control" required
                    value="<?php echo isset($data_select["Pr_id"]) ? $data_select["Pr_id"] : ''; ?>" name="Pr_id"
                    readonly>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                <p></p>
            </div>

            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" required
                    value="<?php echo isset($data_select["Pr_name"]) ? $data_select["Pr_name"] : ''; ?>" name="Pr_name">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" min='0' class="form-control" required
                    value="<?php echo isset($data_select["Pr_amount"]) ? $data_select["Pr_amount"] : ''; ?>"
                    name="Pr_amount">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>
            <div class="form-group">
                <label for="">Ngày nhập</label>
                <input type="text" class="form-control" required
                    value="<?php echo isset($data_select["Create_date"]) ? $data_select["Create_date"] : ''; ?>"
                    name="Create_date">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>

        </div>
        <div class="col-xl-6">
        <br>
            <div class="form-group">
                <label for="">Giá nhập</label>
                <input style="text-align:right;" type="text" class="form-control" required
                    value="<?php echo isset($data_select["Purchase_price"]) ? $data_select["Purchase_price"] : ''; ?>"
                    name="Purchase_price">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input style="text-align:right;" type="text" class="form-control" required
                    value="<?php echo isset($data_select["Price"]) ? $data_select["Price"] : ''; ?>" name="Price">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>
            <div class="form-group">
                <label for="">Đường dẫn ảnh</label>
                <input type="text" class="form-control" required
                    value="<?php echo isset($data_select["image"]) ? $data_select["image"] : ''; ?>" name="image">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>
            <div class="form-group">
                <label for="">Nội dung mô tả</label>
                <textarea name="content" id="" cols="30" rows="10"
                    class="form-control"><?php echo isset($data_select["content"]) ? $data_select["content"] : ''; ?></textarea>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>

            </div>
            <script>
            CKEDITOR.replace('content');
            </script>
        </div>

        <p style="margin-left:30px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?></p>
        </div>
    </div>
</form>