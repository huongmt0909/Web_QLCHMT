<?php
    $sl = "SELECT * FROM `producer`";
    $data_sl = $Main->select_list($sl);
    $Bill_in = new Bill_in();

    $stt = 0;
    if (isset($_POST["btn_add_product"])) {
        if (isset($_SESSION["count"])) {
            $_SESSION["count"] += 1;
        }
        else{
            $_SESSION["count"] = 1;
        }

        if (isset($_SESSION["count"])) {
            $stt = $_SESSION["count"];
        }
        
        $messenger = $Bill_in->add_bill($stt);
       
    }
    if (isset($_POST["btn_addBill"])) {
        if (isset($_SESSION["count"])) {
            $number = $_SESSION["count"];
        }

        $messenger = $Bill_in->addBill_database($number);
        unset($_SESSION["count"]);
        unset($_SESSION["name"]);
        unset($_SESSION["producer"]);
        unset($_SESSION["amount"]);
        unset($_SESSION["purchase_price"]);
        $number = 0;
    }

   

    $total_all = 0;
?>
<div class="title_content">
    <h4>Nhập hàng</h4>
    <form action="" method = "post">
    <button  class="btn btn-dark add" name="btn_addBill">Hoàn tất</button>
    </form>
    
    <br><br>
</div>
<form action="" method="POST" style="padding: 10px;">
    <div class="row">
        <div class="col-xl-4" style="background-color: rgb(212, 220, 165);">
            <div style="margin-bottom: 0px; " class="dropdown">
                <br>
                <label for="" style="display: block;">Nhà cung cấp</label>
                <select name="add_Pd" class="form-group">
                    <?php
                    foreach ($data_sl as $key) {
                        ?>
                        <option value='<?php echo isset($key["Pd_id"]) ? $key["Pd_id"] : ''; ?>'><?php echo isset($key["Pd_name"]) ? $key["Pd_name"] : ''; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên mặt hàng</label>
                <input type="text" class="form-control" required value="" name="Pr_name">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                <p></p>
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" min='0' class="form-control" required value="" name="Pr_amount">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                <p></p>
            </div>
            <div class="form-group">
                <label for="">Giá nhập</label>
                <input style="text-align: right;" type="number" class="form-control" required value="" name="Pr_Purchase">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Vui lòng nhập trường này.</div>
                <p></p>
            </div>

            <button class="btn btn-danger" name="btn_add_product">Thêm</button>
        </div>
        <div class="col-xl-8">
            <table>
                <thead>
                    <tr style="border: 1px solid red;">
                        <th style="width:20%; border-left: 1px solid red;">Mã Nhà cung cấp</th>
                        <th style="width:30%; border-left: 1px solid red;">Tên mặt hàng</th>
                        <th style="width:10%; border-left: 1px solid red;">Số lượng</th>
                        <th style="width:20%; border-left: 1px solid red;">Giá nhập</th>
                        <th style="width:20%; border-left: 1px solid red;">Thành tiền</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php 
                    for ($i=1; $i <= $stt; $i++) { 
                        $amount = isset($_SESSION["amount"][$i]) ? $_SESSION["amount"][$i] : 0;
                        $price = isset($_SESSION["purchase_price"][$i]) ? $_SESSION["purchase_price"][$i] :0;
                        $total = $amount*$price;
                        $total_all += $total;
                    ?>
                    <tr style="border: 1px solid red;">
                        <td style="width:20%; border-left: 1px solid red;"><?php echo isset($_SESSION["producer"][$i]) ? $_SESSION["producer"][$i] : '' ; ?></td>
                        <td style="width:30%; border-left: 1px solid red;"><?php echo isset($_SESSION["name"][$i]) ? $_SESSION["name"][$i] : ''; ?></td>
                        <td style="width:10%; border-left: 1px solid red;"><?php echo isset($_SESSION["amount"][$i]) ?$_SESSION["amount"][$i] :'' ; ?></td>
                        <td style="width:20%; border-left: 1px solid red;"><?php echo isset($_SESSION["purchase_price"][$i]) ? $_SESSION["purchase_price"][$i] : ''; ?></td>
                        <td style="width:20%; border-left: 1px solid red;"><?php echo number_format(isset($total) ? $total : '0'); ?></td>
                    </tr>
                        <?php
                    }?>

                </tbody>
                
            </table>
           
        </div>
        <div style="float:right; margin-left: 80%; font-weight:bold;">Tổng cộng: <?php echo $total_all; ?> Vnđ</div>
    </div>
</form>