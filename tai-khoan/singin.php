<?php
require_once '../admin/models/CategoryModel.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // kiểm tra điều kiện

    $errors = [];

    // kiểm tra emaill
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors [] = "Email không đúng định dạng!";
    }elseif(checkEmailExists($email)){
        $errors [] = "Email đã được dùng";
    }

    // kiểm tra mật khẩu
    if(strlen($password) < 6){
        $errors[] = "Mật khẩu phải trên 6 ký tự!";
    }elseif($password !== $confirmPassword){
        $errors[] = "Nhập lại mật khẩu sai!!!!!!";
    }

    // nếu không có lỗi thực hiện đăng ký
    if(empty($errors)){
        // thực hiện đăng ký,và lưu thông tin đăng ký
        registerUser($username, $password, $email, $confirmPassword);
         // Hiển thị thông báo thành công
    echo "<script>alert('Đăng ký thành công');</script>";

    // Chờ 1 giây và chuyển hướng đến trang đăng nhập hoặc trang chính
    // echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 7000);</script>";
    // exit();
    }
}

?>
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
    <title>Singin</title>
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

            <h1>ĐĂNG KÝ</h1>
            <!-- <div id="error-message" style="display: none;">
                <p class="error">Thông báo lỗi</p>
            </div> -->
            <?php if (!empty($errors)) { ?>
        <ul class="error">
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
            <span>
                <input type="text" placeholder="Tên" name="username">
            </span>
            <span>
                <input type="text" placeholder="Email" name="email">
            </span>
            <span>
                <input type="password" placeholder="Mật khẩu" name="password">
            </span>
            <span>
                <input type="password" placeholder="Nhập lại Mật khẩu" name="confirm_password">
            </span>

            <button class="btn" name="submit">Đăng Ký</button>
            <h4>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></h4>


        </form>

    </div>
</body>

</html>