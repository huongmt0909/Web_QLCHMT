<?php
    $Product = new Product();
    $product_remove = isset($_GET["product_remove"]) ? $_GET["product_remove"] : '';

    $select = "SELECT * FROM `product` WHERE `Pr_id` = '$product_remove'";
    $data_select = $Main->select_one($select);

    if (isset($_POST["btn_removePr"])) {
        $messenger = $Product->remove_product();
    }

?>
<form action="" method="post">
<div class="title_content">
    <h4>Xóa mặt hàng</h4>
    <br>
    <button style="margin-top: -25px;"data-toggle="modal" data-target="#add_employee" class="btn btn-dark add" name="btn_removePr">Xóa</button>
</div>

    <div class="table">
        <div class="container-fluid">
        <div style="margin-right: 100px; padding-left: 10px; border-bottom: 1px solid red; background-color: rgb(236 232 174);"
            class="row">

            <div class="col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" required value="<?php echo isset($data_select["Pr_id"]) ? $data_select["Pr_id"] : ''; ?>"
                        name="Pr_id" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                    <p></p>
                </div>
                
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" required value="<?php echo isset($data_select["Pr_name"]) ? $data_select["Pr_name"] : ''; ?>"
                        name="Pr_name" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" min='0' class="form-control" required value="<?php echo isset($data_select["Pr_amount"]) ? $data_select["Pr_amount"] : ''; ?>"
                        name="Pr_amount" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Ngày nhập</label>
                    <input type="text" class="form-control" required value="<?php echo isset($data_select["Create_date"]) ? $data_select["Create_date"] : ''; ?>"
                        name="Create_date" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
            </div>
            <div style="padding-left: 10px; border-left: 1px solid red;"" class=" col-xl-6">
                <br>
                <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input style="text-align:right;" type="text" class="form-control" required value="<?php echo isset($data_select["Purchase_price"]) ? $data_select["Purchase_price"] : ''; ?>"
                        name="Purchase_price" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Giá bán</label>
                    <input style="text-align:right;" type="text" class="form-control" required value="<?php echo isset($data_select["Price"]) ? $data_select["Price"] : ''; ?>"
                        name="Price" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Đường dẫn ảnh</label>
                    <input type="text" class="form-control" required value="<?php echo isset($data_select["image"]) ? $data_select["image"] : ''; ?>"
                        name="image" readonly>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <div class="form-group">
                    <label for="">Nội dung mô tả</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" readonly><?php echo isset($data_select["content"]) ? $data_select["content"] : ''; ?></textarea>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Vui lòng nhập trường này.</div>

                </div>
                <script>
                CKEDITOR.replace('content');
                </script>
            </div>
        </div>
        </div>
        
    </div>
    <p style="margin-left:30px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?></p>
</form>