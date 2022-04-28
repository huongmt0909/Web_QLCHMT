<?php
    function inc(){
        include 'Class/Class_main.php';
        include 'Class/Account.php';
    }inc();

    $account = new account();

    if (isset($_POST["btn_login"])) {
        $messenger = $account->login();
        $error = $messenger[0];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="urf-8">
    <title>Computer store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./VENDOR/bootraps/css/bootstrap.css">
    <link rel="stylesheet" href="./VENDOR/fontawesome/css/all.css">

    <script src="./VENDOR/JS/jquery-3.5.1.min.js"></script>
    <script src="./VENDOR/JS/jssor.slider-28.0.0.min.js"></script>
    <script src="./VENDOR/bootraps/js/bootstrap.js"></script>

    <link rel="stylesheet" href="./CSS/Style_login.css">

</head>

<body>
    <form action="" method="post" class="was-validated">
        <h2>Đăng nhập</h2>
        <div class="form-group">
            <label for="">Tên tài khoản</label>
            <input type="text" class="form-control" name="login_name" required value="<?php echo isset($_POST["login_name"]) ? $_POST["login_name"] :''; ?>">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
            <p></p>
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password"  class="form-control" name ="login_pass"required value="<?php echo isset($_POST["login_pass"]) ? $_POST["login_pass"] : ''; ?>">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Vui lòng nhập trường này.</div>
            <p></p>
        </div>
        <div style="color:#fb731f;"><?php echo isset($error['message']) ? $error['message'] : ''; ?></div>
        <button class="btn btn-danger" name="btn_login"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
    </form>
</body>

</html>