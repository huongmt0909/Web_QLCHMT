
<?php
    $page = isset($_GET["page"]) ? $_GET["page"] : 'customer';
    $customer_update = isset($_GET["customer_update"]) ? $_GET["customer_update"] : '';
    $customer_remove = isset($_GET["customer_remove"]) ? $_GET["customer_remove"] : '';
    $employee_update = isset($_GET["ep_update"]) ? $_GET["ep_update"] : '';
    $employee_remove = isset($_GET["ep_remove"]) ? $_GET["ep_remove"] : '';
    $account_remove = isset($_GET["ac_remove"]) ? $_GET["ac_remove"] : '';
    $bill_detail = isset($_GET["bill_detail"]) ? $_GET["bill_detail"] : '';
    $producer_update = isset($_GET["producer_update"]) ? $_GET["producer_update"] : '';
    $producer_remove = isset($_GET["producer_remove"]) ? $_GET["producer_remove"] : '';
    $product_update = isset($_GET["product_update"]) ? $_GET["product_update"] : '';
    $product_remove = isset($_GET["product_remove"]) ? $_GET["product_remove"] : '';
    $bill_detail_out = isset($_GET["bill_detail_out"]) ? $_GET["bill_detail_out"] : '';
    $bill_detail_out = isset($_GET["bill_detail_out"]) ? $_GET["bill_detail_out"] : '';


?>

<div class="col-xl-10 content_main">
    <div class="title">
        <h5>Trang quản trị Laptop store</h5>
    </div>
    <div class="content">
        <?php
            if ($customer_update == '' && $customer_remove == '' && $employee_update == '' 
            && $employee_remove == '' && $account_remove=='' && $bill_detail == '' && $producer_update =='' && $producer_remove == '' 
            && $product_update =='' && $product_remove =='' && $bill_detail_out =='' ) {
                switch ($page){
                    case 'home':
                        include 'home_page.php';
                        break;
                    case 'customer':
                        include 'Customer_main.php';
                        break;
                    case 'employee':
                        include 'Employee_main.php';
                        break;
                    case 'account':
                        include 'Account_main.php';
                        break;
                    case 'producer':
                        include 'Producer_main.php';
                        break;
                    case 'billin':
                        include 'Bill_in_main.php';
                        break;
                    case 'product':
                        include 'Product_main.php';
                        break;
                    case 'billin_add':
                        include 'Bill_in_add.php';
                        break;
                    case 'billout':
                        include 'Bill_out_main.php';
                        break;
                    case 'billout_add':
                        include 'Bill_out_add.php';
                        break;
                    case 'display_billout':
                        include 'Display_billout.php';
                        break;
                    case 'display_billin':
                        include 'Display_billin.php';
                        break;
                }
            }
            elseif($customer_update != ''){
                include 'Customer_update.php';
            }
            elseif($customer_remove != ''){
                include 'Customer_remove.php';

            }
            elseif ($employee_update !='' ) {
                include 'Employee_update.php';
            }
            elseif ($employee_remove !='' ) {
                include 'Employee_remove.php';
            }
            elseif($account_remove != ''){
                include 'Account_remove.php';
            }
            elseif($bill_detail != ''){
                include 'Bill_in_detail.php';
            }
            elseif ($producer_update != '') {
                include 'Producer_update.php';
            }
            elseif ($producer_remove != '') {
                include 'Producer_remove.php';
            }
            elseif ($product_update != '') {
                include 'Product_update.php';
            }
            elseif ($product_remove != '') {
                include 'Product_remove.php';
            }
            elseif ($bill_detail_out != '') {
                include 'Bill_out_detail.php';
            }
           
        ?>
    </div>
</div>
</div>

</div>

</div>
</body>

</html>