<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";



// Gọi tệp models
require_once $modelPath;


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
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    #error-message {
        color: red;
    }
    .error {
        color: red;
    }
    .swal2-popup {
        font-family: Arial, Helvetica, sans-serif;
            }
            .swal2-title {
            font-size: 16px;

            }
</style>

<body>


    <div class="form">
        <?php
        // Xử lý yêu cầu từ người dùng
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hàm đăng nhập trong functions.php
    $user = login($username, $password);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_fullname'] = $user['full_name'];
        $_SESSION['user_role'] = $user['role'];

        // Sử dụng mã JavaScript để hiển thị thông báo SweetAlert2 "
        echo '<script>';
        echo 'Swal.fire({ title: "Đăng nhập thành công!", icon: "success" }).then(function() {';
        echo '   window.location.href = "' . ($user['role'] == 1 ? '../admin/index.php' : '../index.php') . '";'; // Chuyển hướng trang
        echo '});';
        echo '</script>';

        // Dừng mã tiếp theo khỏi thực thi
        exit();
    } else {
        $errors = ['Tên đăng nhập hoặc mật khẩu không đúng.'];
    }
}
        ?>
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
                <input type="text" placeholder="Tên tài khoản" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
            </span>
            <span>
                <input type="password" placeholder="Mật khẩu" name="password">
            </span>
            

            <button class="btn" name="login">Đăng nhập</button>
            <h4>Bạn chứa có tài khoản? <a href="singin.php">Đăng ký</a></h4>
        </form>
    </div>
</body>

</html>