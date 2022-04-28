<?php
    $bill_detail = isset($_GET["bill_detail"]) ? $_GET["bill_detail"] : '';

    $select = "SELECT product.image, product.Pr_name, Bd_amount,product.Purchase_price FROM `bill_detail_in`,`product` 
    WHERE bill_detail_in.Pr_id = product.Pr_id AND bill_detail_in.Bi_id = '$bill_detail'";

    $data_sl = $Main->select_list($select);
    $total_all = 0;
?>

<div class="title_content">
    <h4>Chi tiết hóa đơn nhập hàng</h4><br>
</div>
<form action="" method="post">
    <div class="detail_content">
        <div class="table">
            <div style="height:50px;" class="row ">
                <div style="width: 15%;" class="col_table">
                    <p class="table_title">Hình ảnh</p>
                </div>

                <div style="width: 35%;" class="col_table">
                    <p class="table_title">Tên mặt hàng</p>

                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_title">Số lượng</p>

                </div>
                <div style="width: 15%;" class="col_table">
                    <p class="table_title">Đơn giá</p>

                </div>

                <div style="width: 15%;" class="col_table">
                    <p class="table_title">Thành tiền</p>

                </div>
            </div>

            <?php
            foreach ($data_sl as $key ) {
                $total = $key["Bd_amount"] * $key["Purchase_price"];
                $total_all += $total;
            ?>
            <div style="height:100px;" class="row ">
                <div style="width: 15%;" class="col_table">
                    <img width="175" height ="98" src="<?php echo isset($key["image"]) ? $key["image"] : ''; ?>" alt="photos">
                </div>

                <div style="width: 35%;" class="col_table">
                    <p class="table_content">
                    <?php echo isset($key["Pr_name"]) ? $key["Pr_name"] : ''; ?>
                    </p>

                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_content"><?php echo isset($key["Bd_amount"]) ? $key["Bd_amount"] : ''; ?></p>

                </div>
                <div style="width: 15%;" class="col_table">
                    <p style="float:centrel;" class="table_content"><?php echo number_format(isset($key["Purchase_price"]) ? $key["Purchase_price"] : ''); ?></p>

                </div>
                <div style="width: 15%; " class="col_table">
                    <p style="float:centrel;" class="table_content"><?php echo number_format(isset($total)  ? $total : ''); ?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <br><br>
        <p style="margin-left:20px; font-weight:bold;">Tổng tiền: <?php echo number_format($total_all); ?>đ</p>
        <a style="float:right; margin-right: 30px;" href="index.php?page=billin" class="btn btn-danger">Thoát</a>

    </div>
</form>