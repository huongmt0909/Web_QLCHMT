<?php
    function inc(){
        include 'Class/Class_main.php';
        include 'Class/Account.php';
        include 'Class/Employee.php';
        include 'Class/Customer.php';
        include 'Class/Producer.php';
        include 'Class/Product.php';
        include 'Class/Bill_in.php';
        include 'Class/Bill_out.php';


    }inc();
    $Main = new Main();
    $account = new account();

    if (isset($_COOKIE["login_name"])) {
        $name_account = $_COOKIE["login_name"];
        $query = "SELECT `Ep_Position` FROM `employee`,`account` WHERE employee.Ep_id = account.Ep_id AND account.Ac_name = '$name_account'";
        $data_account = $Main->select_one($query);

        if ($data_account["Ep_Position"] == 0) {
            $permission = "Quản lý";
        }
        elseif ($data_account["Ep_Position"] == 1){
            $permission = "Nhân viên";

        }
    }
    if (isset($_POST["btn_sent"])) {
        $account ->logout();
    }

    session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="urf-8">
    <title>Computer store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./VENDOR/bootraps/css/bootstrap.css">
    <link rel="stylesheet" href="./VENDOR/fontawesome/css/all.css">
    <script src="./VENDOR/ckeditor/ckeditor.js"></script>

    <script src="./VENDOR/JS/jquery-3.5.1.min.js"></script>
    <script src="./VENDOR/JS/jssor.slider-28.0.0.min.js"></script>
    <script src="./VENDOR/bootraps/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./CSS/main.css">
</head>

<body>
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 menu">
                    <div class="account">
                        <p class="name"><i class="fas fa-user-alt"></i> <?php echo isset($_COOKIE["login_name"]) ? $_COOKIE["login_name"]: ''; ?></p>
                        <p> <?php echo isset($permission) ? $permission :''; ?></p><button data-toggle="modal" data-target="#myModal" class="logout" href="#"><i class="fas fa-sign-out-alt"></i></button>
                    </div>
                    <div class="menu_detail">
                        <a href="index.php?page=home"><i class="fas fa-home"></i> Trang chủ</a>
                        <ul>
                            <p>Cập nhật</p>
                            <li><a href="index.php?page=customer"><i class="far fa-list-alt"></i>Khách hàng</a></li>
                            <?php
                            if ($permission == "Quản lý") {
                                ?>
                                <li><a href="index.php?page=employee"><i class="far fa-list-alt"></i>Nhân viên </a></li>
                                <li><a href="index.php?page=account"><i class="far fa-list-alt"></i>Tài khoản</a></li>
                                <?php
                            }
                            ?>
                            
                            <li><a href="index.php?page=producer"><i class="far fa-list-alt"></i>Nhà cung cấp</a></li>
                            <li><a href="index.php?page=product"><i class="far fa-list-alt"></i>Mặt hàng</a></li>
                        </ul>
                        <ul>
                            <p>Hóa đơn</p>
                            <li><a href="index.php?page=billout"><i class="far fa-list-alt"></i>Hóa đơn bán</a></li>
                            <li><a href="index.php?page=billin"><i class="far fa-list-alt"></i>Hóa đơn nhập</a></li>
                        </ul>
                        
                        <ul>
                        <p>Thống kê</p>
                            <li><a href="index.php?page=display_billout"><i class="far fa-list-alt"></i>Hóa đơn bán</a></li>
                            <li><a href="index.php?page=display_billin"><i class="far fa-list-alt"></i>Hóa đơn nhập</a></li>
                        </ul>
                    </div>
                </div>

    <!----đăng xuất-->
    <form action="" method ="post">
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Bạn muốn đăng xuất?</h6>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btn_sent">Đăng xuất</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    