<?php
    $sl = "SELECT * FROM `customer`";
    $data_sl = $Main->select_list($sl);
    $Bill_out = new Bill_out();

    $sl_pr ="SELECT * FROM `product`";
    $data_sl_pr = $Main->select_list($sl_pr);

    $stt = 0;
    if (isset($_POST["btn_add"])) {
        
        if (isset($_SESSION["temp"])) {
            $_SESSION["temp"] += 1;
        }
        else{
            $_SESSION["temp"] = 1;
        }

        if (isset($_SESSION["temp"])) {
            $stt = $_SESSION["temp"];
        }
       
        $messenger = $Bill_out->add_bill($stt);

    }

    
    if (isset($_POST["btn_addBillout"])) {
        if (isset($_SESSION["temp"])) {
            $stt = $_SESSION["temp"];
        }
        $customer =  isset($_POST["Ct_name_out"]) ? $_POST["Ct_name_out"] : '';
        
        $messenger = $Bill_out->addBill_database($stt,$customer);
        echo "ID khách:" .$customer." Số mặt hàng" .$messenger[1]." ID bill".$messenger[2];
       
        $stt = 0;
    }

    function price($id){
        $Main = new Main();
        $q = "SELECT `Price` FROM `product` WHERE `Pr_id` = '$id'";
        $data = $Main->select_one($q);
        return $data["Price"];
    }

    $total_all = 0;
?>
<div class="title_content">
    <h4>Hóa đơn mới</h4>
    <form action="" method = "post">
    <div style="margin-left: 500px;   " class="dropdown">
               
                <label for="" style="color:black;">Khách hàng</label>
                <select name="Ct_name_out" class="form-group">
                    <?php
                    foreach ($data_sl as $key) {
                        ?>
                        <option value='<?php echo isset($key["Ct_id"]) ? $key["Ct_id"] : ''; ?>'><?php echo isset($key["Ct_name"]) ? $key["Ct_name"] : ''; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
            </div>
    <button  class="btn btn-dark add" name="btn_addBillout">Hoàn tất</button>
    </form>
    
    <br><br>
</div>
<form action="" method="POST" style="padding: 10px;">
    <div class="row">
        <div class="col-xl-4" style="background-color: rgb(212, 220, 165);">
            
            <div style="margin-bottom: 0px; " class="dropdown">
                <br>
                <label for="" style="display: block;">Sản phẩm</label>
                <select name="Pr_id_out" class="form-group">
                    <?php
                    foreach ($data_sl_pr as $key) {
                        ?>
                        <option value='<?php echo isset($key["Pr_id"]) ? $key["Pr_id"] : ''; ?>'><?php echo isset($key["Pr_id"]) ? $key["Pr_id"] : ''; ?> -<?php echo isset($key["Pr_name"]) ? $key["Pr_name"] : ''; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Số lượng</label><br>
                <input type="number" min='0' style="width:100px; text-align: right;" required value="1" name="amount_out">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                <p></p>
            </div>
            <div class="form-group">
                <label for="">Chiết khấu</label><br>
                <input type="number" min='0' max = "100" style="width:100px; text-align: right;" required value="0" name="discount">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                <p></p>
            </div>

            <button class="btn btn-danger" name="btn_add">Thêm</button>
        </div>
        <div class="col-xl-8">
            <table>
                <thead>
                    <tr style="border: 1px solid red;">
                        <th style="width:30%; border-left: 1px solid red;">Sản phẩm</th>
                        <th style="width:20%; border-left: 1px solid red;">Số lượng</th>
                        <th style="width:20%; border-left: 1px solid red;">Đơn giá</th>
                        <th style="width:10%; border-left: 1px solid red;">Chiết khấu</th>
                        <th style="width:20%; border-left: 1px solid red;">Thành tiền</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php 
                    for ($i=1; $i <= $stt; $i++) { 
                        $price = price($_SESSION["Pr_id_out"][$i]);
                        $discount = isset($_SESSION["discount"][$i]) ? $_SESSION["discount"][$i] : 0;
                        $amount = isset($_SESSION["amount_out"][$i]) ? $_SESSION["amount_out"][$i] : 0;
                        $total = $amount*$price;
                        $total_dis = $total - (($total/100)*$discount);
                        $total_all += $total_dis;
                    ?>
                    <tr style="border: 1px solid red;">
                        <td style="width:30%; border-left: 1px solid red;"><?php echo isset($_SESSION["Pr_id_out"][$i]) ? $_SESSION["Pr_id_out"][$i] : '' ; ?></td>
                        <td style="width:20%; border-left: 1px solid red;"><?php echo isset($_SESSION["amount_out"][$i]) ? $_SESSION["amount_out"][$i] : ''; ?></td>
                        <td style="width:20%; border-left: 1px solid red;"><?php echo number_format(isset($price) ? $price :''); ?></td>
                        <td style="width:10%; border-left: 1px solid red;"><?php echo isset($discount) ? $discount : '0'; ?></td>
                        <td style="width:20%; border-left: 1px solid red;"><?php echo number_format(isset($total_dis) ? $total_dis :''); ?></td>
                        
                    </tr>
                        <?php
                    }?>

                </tbody>
                
            </table>
           
        </div>
        <div style="float:right; margin-left: 80%; font-weight:bold;">Tổng cộng: <?php echo number_format($total_all); ?> Vnđ</div>
    </div>
</form>