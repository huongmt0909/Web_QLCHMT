<?php
    $bill_sl ="SELECT `Bi_id`, employee.Ep_name,`Bi_date` FROM `bill_in`,`employee` 
    WHERE bill_in.Ep_id = employee.Ep_id ";

    $data_sl = $Main->select_list($bill_sl);

    function select_detail($id){
        $Main = new Main();
        $query = "SELECT product.Purchase_price,`Bd_amount` FROM `bill_detail_in`,`product` WHERE bill_detail_in.Pr_id = product.Pr_id
        AND bill_detail_in.Bi_id = $id";
        $data = $Main->select_list($query);

        $total = 0;
        foreach ($data as $item) {
            $total += $item["Purchase_price"] * $item["Bd_amount"];
        }
        return $total;
    }
?>

<div class="title_content">
    <h4>Danh sách hóa đơn nhập hàng</h4>
    <form action="" class="tools">
        <input type="text">
        <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        <a class="btn btn-dark add" href="index.php?page=billin_add">Thêm</a>
    </form>
</div>
<div class="detail_content">
    <div class="table">
        <div style="height:50px;" class="row ">
            <div style="width: 15%;" class="col_table">
                <p class="table_title">ID</p>
            </div>
           
            <div style="width: 25%;" class="col_table">
                <p class="table_title">Nhân viên</p>

            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_title">Tổng tiền</p>

            </div>
            <div style="width: 25%;" class="col_table">
                <p class="table_title">Ngày nhập</p>

            </div>

            <div style="width: 15%;" class="col_table">
                <p class="table_title">Thao tác</p>

            </div>
        </div>
        <?php
        foreach($data_sl as $item){
            $total_bill= number_format(select_detail($item["Bi_id"]));
        ?>
        <div style="height:80px;" class="row ">
            <div style="width: 15%;" class="col_table">
                <p class="table_content"><?php echo isset($item["Bi_id"]) ? $item["Bi_id"] : ''; ?></p>
            </div>
            
            <div style="width: 25%;" class="col_table">
                <p class="table_content">
                <?php echo isset($item["Ep_name"]) ? $item["Ep_name"] : ''; ?>
                </p>

            </div>
            <div style="width: 20%;" class="col_table">
                <p class="table_content"><?php echo isset($total_bill) ? $total_bill :'';  ?></p>

            </div>
            <div style="width: 25%;" class="col_table">
                <p class="table_content"><?php echo isset($item["Bi_date"]) ? $item["Bi_date"] : ''; ?></p>

            </div>

            <div style="width: 15%; padding-top: 10px;" class="col_table">
                <br>
                <a style="margin-left: 50px;" href="index.php?page=billin&bill_detail=<?php echo isset($item["Bi_id"]) ? $item["Bi_id"] : ''; ?>" class="btn btn-danger">Chi tiết</a>

            </div>
        </div>
        <?php
        }?>
    </div>
    <p></p>
    <ul class="pagination pagination-sm">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</div>

