<?php
    $s1 = "SELECT * FROM `producer`";
    $d1 = $Main ->select_list ($s1);

    $s2 = "SELECT * FROM `employee`";
    $d2 = $Main ->select_list($s2);

    $date_start = isset($_POST["date_start"]) ? $_POST["date_start"] : '';
    $date_end = isset($_POST["date_end"]) ? $_POST["date_end"] : '';
    $dp_epmloyee = isset($_POST["dp_epmloyee"]) ? $_POST["dp_epmloyee"] : '';

    if (isset($_POST["btn_display"]) && $_POST["dp_option"]== 2) {
        $sql_bill ="SELECT * FROM `bill_in` WHERE `Bi_date` >= '$date_start'  AND `Bi_date` <= '$date_end'";
        $data_bill = $Main->select_list($sql_bill);

    }
    if (isset($_POST["btn_display"]) && $_POST["dp_option"]== 1) {
        $sql_bill = "SELECT * FROM `bill_in` WHERE `Bi_date` >= '$date_start'  AND `Bi_date` <= '$date_end' AND `Ep_id` = '$dp_epmloyee'";
        $data_bill = $Main->select_list($sql_bill);

        $sl = "SELECT * FROM `employee` WHERE `Ep_id` = '$dp_epmloyee'";
        $dt_ep = $Main->select_one($sl);
    }

    function sl_detail($id){
        $Main = new Main();
        $sl = "SELECT product.Purchase_price, bill_detail_in.Bd_amount FROM `bill_detail_in`,`product` WHERE bill_detail_in.Pr_id = product.Pr_id AND `Bi_id` ='$id'";
        $data = $Main->select_list($sl);

        $total = 0;
        foreach($data as $item){
            $total += $item["Purchase_price"] * $item["Bd_amount"];
        }
        return $total;
    }
    $total_all = 0;
    $count = 0;
    
?>
<div class="title_content">
    <h4>Thống kê hóa đơn nhập hàng</h4>
    <br><br>
</div>
<form action="" method="POST" style="padding: 10px;">
    <div class="row">
        <div class="col-xl-4" style="background-color: rgb(212, 220, 165);">
            <div style="margin-bottom: 0px; " class="dropdown">
                <br>
                <label for="" style="display: block;">Nhân viên</label>
                <select name="dp_epmloyee" class="form-group">
                <?php
                foreach ($d2  as $key) {
                ?>
                    <option value='<?php echo isset($key["Ep_id"]) ? $key["Ep_id"] : '' ?>'><?php echo isset($key["Ep_name"]) ? $key["Ep_name"] : '' ?></option>
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

            <div style="margin-bottom: 0px; " class="dropdown">
                <br>
                <label for="" style="display: block;">Lựa chọn thống kê</label>
                <select name="dp_option" class="form-group">
                    <option value='1'>Theo nhân viên</option>
                    <option value='2'>Tất cả</option>
                </select>
            </div>
            <button class="btn btn-danger" name="btn_display"><i class="fas fa-print"></i> Hiển
                thị</button>

               
        </div>
        <div class="col-xl-8">
        <p style ="font-weight: bold; color: red;"><?php if ($_POST["dp_option"] == 1 && isset($dt_ep)) {
            echo "Nhân viên: ".$dt_ep["Ep_name"]; }
         ?></p>
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
                if (isset($data_bill)) {
                foreach ($data_bill as $key) {
                    $count+= 1;
                    $total = sl_detail($key["Bi_id"]);
                    $total_all += $total;
                ?>
                <div style="height:80px;" class="row ">
                    <div style="width: 50%;" class="col_table">
                        <p class="table_content"> <?php echo isset($key["Bi_id"]) ? $key["Bi_id"] : ''; ?> </p>
                    </div>
                    <div style="width: 50%;" class="col_table">
                        <p class="table_content"><?php echo number_format(isset($total) ? $total : ''); ?> VNĐ</p>

                    </div>

                </div>
                <?php
                }}
                ?>
            </div><br>
            <p style="font-weight:bold;">Tổng: <?php echo $count; ?> Hóa đơn = <?php echo number_format(isset($total_all)  ? $total_all : ''); ?> VNĐ</p>
        </div>

    </div>
</form>