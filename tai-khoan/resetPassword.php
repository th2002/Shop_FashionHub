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

<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Gọi hàm tạo mật khẩu ngẫu nhiên
    $newPassword = randomPassword();

    // Gọi hàm gửi email chứa mật khẩu mới
    $isSent = sendPassword($email, $newPassword);

    if ($isSent) {
        // Mật khẩu đã được gửi thành công

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        // Gọi hàm cập nhật mật khẩu mới trong file kết nối PDO đã gọi trước đó
        updatePasswordInDatabase($email, $newPassword);

        // Thực hiện các bước khác nếu cần thiết

        // Chuyển hướng người dùng tới trang thông báo thành công
        // header('Location: reset_password_success.php');
        exit();
    } else {
        // Có lỗi xảy ra khi gửi email, bạn có thể xử lý lỗi ở đây
        echo 'Lỗi khi gửi email.';
    }
}
?>

    <div class="form">
        <form action="" class="singin" method="post">
            <h1>Lấy lại mật khẩu</h1>
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
                <input type="text" placeholder="Email" name="email">
            </span>
            
            



            <button class="btn" name="login">Gửi</button>
            <h4>Bạn chứa có tài khoản? <a href="singin.php">Đăng ký</a></h4>
        </form>
    </div>
</body>

</html>