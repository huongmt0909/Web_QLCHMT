<?php
    
    $Bill_out = new Bill_out();

    function select_detail($id){
        $Main = new Main();
        $query = "SELECT product.Price, `number`,`discount` FROM `bill_detail`,`product` WHERE bill_detail.pr_id = product.Pr_id AND bill_detail.bill_id = $id";
        $data = $Main->select_list($query);

        $totalold = 0;
        $totalnew = 0;
        foreach ($data as $item) {
            $totalold += $item["Price"] * $item["number"];
            $totalnew = $totalold - (($totalold/100)*$item["discount"]);
        }
        return $totalnew;
    }
    
    if (isset($_POST["search_bill_out"])) {
        $value_search = isset($_POST["value_search"]) ? $_POST["value_search"] :'';

        $data_sl = $Bill_out ->search($value_search);
    }
    else{
        $bill_sl ="SELECT bill.bill_id, customer.Ct_name, `Date` FROM `bill`,`customer` WHERE bill.Ct_id = customer.Ct_id";
        $data_sl = $Main->select_list($bill_sl);
    }
?>

<div class="title_content">
    <h4>Danh sách hóa đơn bán hàng</h4>
    <form action="" class="tools" method ="post">
        <br>
        <input type="text" name="value_search">
        <button class="btn btn-dark" name="search_bill_out"><i class="fas fa-search"></i></button>
        <a class="btn btn-dark add" href="index.php?page=billout_add">Thêm</a>
        <br>
    </form>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:50px;" class="row ">
            <div style="width: 15%;" class="col_table">
                <p class="table_title">ID</p>
            </div>
           
            <div style="width: 25%;" class="col_table">
                <p class="table_title">Khách hàng</p>

            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_title">Tổng tiền</p>

            </div>
            <div style="width: 25%;" class="col_table">
                <p class="table_title">Ngày bán</p>

            </div>

            <div style="width: 15%;" class="col_table">
                <p class="table_title">Thao tác</p>

            </div>
        </div>
        <?php
        foreach($data_sl as $item){
            $total_bill= number_format(select_detail($item["bill_id"]));
        ?>
        <div style="height:80px;" class="row ">
            <div style="width: 15%;" class="col_table">
                <p class="table_content"><?php echo isset($item["bill_id"]) ? $item["bill_id"] : ''; ?></p>
            </div>
            
            <div style="width: 25%;" class="col_table">
                <p class="table_content">
                <?php echo isset($item["Ct_name"]) ? $item["Ct_name"] : ''; ?>
                </p>

            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_content"><?php echo isset($total_bill) ? $total_bill :'';  ?></p>

            </div>
            <div style="width: 25%;" class="col_table">
                <p class="table_content"><?php echo isset($item["Date"]) ? $item["Date"] : ''; ?></p>

            </div>

            <div style="width: 15%; padding-top: 10px;" class="col_table">
                <br>
                <a style="margin-left:50px;" href="index.php?page=billout&bill_detail_out=<?php echo isset($item["bill_id"]) ? $item["bill_id"] : ''; ?>" class="btn btn-danger">Chi tiết</a>

            </div>
        </div>
        <?php
        }?>
    </div>
    <p></p>
   
</div>

