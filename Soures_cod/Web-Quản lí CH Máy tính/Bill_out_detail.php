<?php
    $bill_detail_out = isset($_GET["bill_detail_out"]) ? $_GET["bill_detail_out"] : '';

    $select = "SELECT product.image, product.Pr_name, bill_detail.number, product.Price, bill_detail.discount FROM `bill_detail`,`product` 
    WHERE bill_detail.pr_id = product.Pr_id AND bill_id ='$bill_detail_out'";

    $data_sl = $Main->select_list($select);
    $total_all = 0;

    if (isset($_POST["delete"])) {
        $dl_detail = "DELETE FROM `bill_detail` WHERE `bill_id` ='$bill_detail_out'";
        $dl_bill ="DELETE FROM `bill` WHERE `bill_id` = '$bill_detail_out'";
        $Main->exec_update($dl_detail);
        $Main->exec_update($dl_bill);

        header("location: index.php?page=billout");  

    }
?>

<div class="title_content">
    <h4>Chi tiết hóa đơn bán</h4><form action="" method="POST">
        <button class="btn btn-danger" style="float:right;" name="delete">Xóa</button>
    </form>
    <br><br>
</div>
<form action="" method="post">
    <div class="detail_content">
        <div class="table">
            <div style="height:50px;" class="row ">
                <div style="width: 15%;" class="col_table">
                    <p class="table_title">Hình ảnh</p>
                </div>

                <div style="width: 25%;" class="col_table">
                    <p class="table_title">Tên mặt hàng</p>

                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_title">Số lượng</p>

                </div>
                <div style="width: 15%;" class="col_table">
                    <p class="table_title">Đơn giá</p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p class="table_title">Chiết khấu</p>

                </div>

                <div style="width: 15%;" class="col_table">
                    <p class="table_title">Thành tiền</p>

                </div>
            </div>

            <?php
            foreach ($data_sl as $key ) {
                $number = $key["number"] ;
                $price = $key["Price"] ;
                $discount = $key["discount"] ;

                $total = $price * $number;
                $total_new = $total - (($total/100)*$discount);
                $total_all +=  $total_new;
            ?>
            <div style="height:100px;" class="row ">
                <div style="width: 15%;" class="col_table">
                    <img width="175" height ="98" src="<?php echo isset($key["image"]) ? $key["image"] : ''; ?>" alt="photos">
                </div>

                <div style="width: 25%;" class="col_table">
                    <p class="table_content">
                    <?php echo isset($key["Pr_name"]) ? $key["Pr_name"] : ''; ?>
                    </p>

                </div>
                <div style="width: 20%;" class="col_table">
                    <p class="table_content"><?php echo isset($key["number"]) ? $key["number"] : ''; ?></p>

                </div>
                <div style="width: 15%;" class="col_table">
                    <p style="float:centrel;" class="table_content"><?php echo number_format(isset($key["Price"]) ? $key["Price"] : ''); ?></p>

                </div>
                <div style="width: 10%;" class="col_table">
                    <p style="float:centrel;" class="table_content"><?php echo number_format(isset($key["discount"]) ? $key["discount"] : ''); ?></p>

                </div>
                <div style="width: 15%; " class="col_table">
                    <p style="float:centrel;" class="table_content"><?php echo number_format(isset($total_new)  ? $total_new : ''); ?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <br><br>
        <p style="margin-left:20px; font-weight:bold;">Tổng tiền: <?php echo number_format($total_all); ?>đ</p>
        <a style="float:right; margin-right: 30px;" href="index.php?page=billout" class="btn btn-danger">Thoát</a>

    </div>
</form>