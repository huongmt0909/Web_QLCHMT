<?php
    $Employee = new Employee();

    $query = "SELECT * FROM `product`";
    $data_ep = $Main->select_list($query);

?>

<div class="title_content">
    <h4>Danh sách mặt hàng</h4>
    <br><br>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:50px;" class="row ">
            <div style="width: 5%;" class="col_table">
                <p class="table_title">ID</p>
            </div>
            <div style="width: 15%;" class="col_table">
                <p class="table_title">Hình ảnh</p>

            </div>
            <div style="width: 30%;" class="col_table">
                <p class="table_title">Tên sản phẩm</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p  class="table_title">Số lượng</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Giá nhập</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Giá bán</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Ngày nhập</p>

            </div>
            <div style="width: 10%;" class="col_table">
                <p class="table_title">Thao tác</p>

            </div>
        </div>
        <?php
        foreach ($data_ep as $item) {
           
        ?>
            <div style="height:100px;" class="row ">
                <div style="width: 5%;" class="col_table">
                    <p class="table_content"><?php echo $item["Pr_id"]; ?> </p>
                </div>
                <div style="width: 15%;" class="col_table">
                    <img width="175" height ="98" src="<?php echo $item["image"]; ?>" alt="photos">
                </div>
                <div style="width: 30%;" class="col_table">
                    <p class="table_content"><?php echo $item["Pr_name"]; ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo $item["Pr_amount"]; ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo number_format($item["Purchase_price"]); ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo  number_format($item["Price"]); ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_content"><?php echo $item["Create_date"]; ?></p>
                </div>
                <div style="width: 10%; padding-top 10px;" class="col_table">
                <br>
                    <a href="index.php?page=product&product_update=<?php echo $item["Pr_id"]; ?>" class="btn btn-danger">Sửa</a>
                    <?php
                    if ($permission == "Quản lý") {
                        ?>
                        <a href ="index.php?page=product&product_remove=<?php echo $item["Pr_id"]; ?>" class="btn btn-danger">Xóa</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
       <?php
        }
       ?>
    </div>
    <br>
    <p style="margin-left:20px;"><?php echo isset($error["message"]) ? $error["message"] : ''; ?> </p>
</div>

