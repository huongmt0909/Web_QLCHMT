<?php
    $select_customer = "SELECT * FROM `customer`";
    $data_customer = $Main->select_list($select_customer);

    $date_start = isset($_POST["date_start"]) ? $_POST["date_start"] : '';
    $date_end = isset($_POST["date_end"]) ? $_POST["date_end"] : '';
    $dp_customer = isset($_POST["dp_customer"]) ? $_POST["dp_customer"] : '';

    if (isset($_POST["btn_display"]) && isset($_POST["option"])) {
        $select ="SELECT * FROM `bill` WHERE `Date` >= '$date_start' AND Date <= '$date_end' AND `Ct_id` = '$dp_customer'";
        $data_select = $Main->select_list($select);

        $sl_ct = "SELECT`Ct_name` FROM `customer` WHERE `Ct_id` = '$dp_customer'";
        $data = $Main->select_one($sl_ct);
    }
    elseif (isset($_POST["btn_display"]) && isset($_POST["option"])==false) {
        $select ="SELECT * FROM `bill` WHERE `Date` >= '$date_start' AND Date <= '$date_end'";
        $data_select = $Main->select_list($select);
    }

    
    function sl_detail($id){
        $Main = new Main();
        $sl = "SELECT product.Price, `number` FROM `bill_detail`, `product` WHERE bill_detail.pr_id = product.Pr_id and `bill_id` ='$id'";
        $data = $Main->select_list($sl);

        $total = 0;
        foreach($data as $item){
            $total += $item["Price"] * $item["number"];
        }
        return $total;
    }
    $total_all = 0;
    $count = 0;
    
?>
<div class="title_content">
    <h4>Thống kê hóa đơn bán</h4>
    <br><br>
</div>
<form action="" method="POST" style="padding: 10px;">
    <div class="row">
        <div class="col-xl-4" style="background-color: rgb(212, 220, 165);">
            <div style="margin-bottom: 0px; " class="dropdown">
                <br>
                <label for="" style="display: block;">Khách hàng</label>
                <select name="dp_customer" class="form-group">
                    <?php
                    foreach($data_customer as $item){
                    ?>
                        <option value='<?php echo isset($item["Ct_id"]) ? $item["Ct_id"] : ''; ?>'><?php echo isset($item["Ct_name"]) ? $item["Ct_name"] : ''; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Từ ngày</label><br>
                <input type="date" min='0' style="width:200px; text-align: right;" required value="0" name="date_start">
            </div>
            <div class="form-group">
                <label for="">Đến</label><br>
                <input type="date" min='0' max="100" style="width:200px; text-align: right;" required value="0"
                    name="date_end">

            </div>

            <div class="form-check">
                <label class="form-check-label" for="check1">
                    <input type="checkbox" class="form-check-input" id="check1" name="option" value="something"
                        checked>Theo khách hàng
                </label>
            </div><br>
            <button class="btn btn-danger" name="btn_display"><i class="fas fa-print"></i> Hiển
                thị</button>

               
        </div>
        <div class="col-xl-8">
        <p style ="font-weight: bold; color: red;"><?php if (isset($data["Ct_name"])) {
        echo "Khách hàng: ". $data["Ct_name"]; } ?></p>
        <p class="table_title">  Từ ngày: <?php echo $date_start; ?> Đến: <?php echo $date_end;?></p>
            <div class="table">
                <div style="height:50px; background: #e7e3ea;" class="row ">
                    <div style="width: 50%;" class="col_table">
                        <p class="table_title">Mã hóa đơn</p>
                    </div>
                    <div style="width: 50%;" class="col_table">
                        <p class="table_title">Doanh thu</p>

                    </div>

                </div>
                <?php
                if (isset($data_select)) {
                 
                foreach ($data_select as $key) {
                    $count+= 1;
                    $total = sl_detail($key["bill_id"]);
                    $total_all += $total;
                ?>
                <div style="height:80px;" class="row ">
                    <div style="width: 50%;" class="col_table">
                        <p class="table_content"> <?php echo isset($key["bill_id"]) ? $key["bill_id"] : ''; ?></p>
                    </div>
                    <div style="width: 50%;" class="col_table">
                        <p class="table_content"><?php echo number_format(isset($total) ? $total : ''); ?> VNĐ</p>

                    </div>

                </div>
                <?php
                }
            }
                ?>
            </div><br>
            <p style="font-weight:bold;">Tổng: <?php echo $count; ?> Hóa đơn = <?php echo number_format(isset($total_all)  ? $total_all : ''); ?> VNĐ</p>
        </div>

    </div>
</form>