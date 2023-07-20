<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp models
require_once $modelPath;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $errors = [];

    // Kiểm tra đăng nhập
    if (!empty($user_name) && !empty($password)) {
        $user = getUserByusername($user_name);
        if ($user && password_verify($password, $user['password'])) {
            // Lưu thông tin đăng nhập vào session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['position'] = $user['position'];

            // Chuyển hướng dựa trên quyền (role) và vị trí (position) của người dùng
            if ($user['role'] === '1' && $user['position'] === '1') {
                // Chuyển đến trang admin
                header("Location: $baseURL/app/views/admin/index.php");
            }
            exit();
        } else {
            $errors[] = "Đăng nhập không thành công, vui lòng kiểm tra lại";
        }
    } else {
        $errors[] = "Vui lòng nhập thông tin đăng nhập.";
    }
}
?>

<!-- Tiếp tục các phần HTML và mã PHP của trang login.php như trước -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/singin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Mã giảm giá Shopee nhanh nhất|</title>
</head>
<style>
    #error-message {
        color: red;
    }
    .error {
        color: red;
    }
</style>

<body>


    <div class="form">
        <form action="" class="singin" method="post">
            <h1>ĐĂNG NHẬP</h1>
            <?php if (!empty($errors)) { ?>
                <ul class="error">
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <!-- <div id="error-message" style="display: none;">
                <p class="error">Thông báo lỗi</p>
            </div> -->
            <span>
                <input type="text" placeholder="Tên tài khoản" name="user_name" value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''; ?>">
            </span>
            <span>
                <input type="password" placeholder="Mật khẩu" name="password">
            </span>
            

            <button class="btn" name="submit">Đăng nhập</button>
            <h4>Bạn chứa có tài khoản? <a href="singin.php">Đăng ký</a></h4>
        </form>
    </div>
</body>

</html>