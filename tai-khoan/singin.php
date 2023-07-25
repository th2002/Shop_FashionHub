<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp models
require_once $modelPath;


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Đăng ký</title>
</head>
<style>

</style>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $full_name = $_POST['full_name'];
        $phone_number = $_POST['phone_number'];
      
        $errors = [];
        // Kiểm tra rỗng
        if(empty($user_name) || empty($password) || empty($confirmPassword) || empty($email) || empty($full_name) || empty($phone_number)){
            $errors[] ="Vui lòng nhập đầy đủ thông tin!";
        }
        // Kiểm tra email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không đúng định dạng!";
        } elseif (checkEmailExists($email)) {
            $errors[] = "Email đã được dùng";
        }
    
        // Kiểm tra mật khẩu
        if(strlen($password) < 6 ){
            $errors[] = "Mật khẩu phải trên 6 ký tự!";
        }elseif($password !== $confirmPassword){
            $errors[] = "Nhập lại mật khẩu sai!";
        }
      
        // Nếu không có lỗi, thực hiện đăng ký
        if (empty($errors)) {
            $register = registerUser($user_name, $email, $password, $full_name, $phone_number);
            if ($register === "false") {
                $errors[] ="Tên đăng nhập hoặc email đã tồn tại!";
            } elseif($register) {
                echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "Sủa danh mục thành công",
                      showCancelButton: false,
                      confirmButtonText: "OK",
                      timer: 1000, // 5 giây
                      timerProgressBar: true,
                      willClose: function() {
                        window.location.href = "login.php";
                      }
                    });
                    </script>';
            }else{
                echo "<script>alert('Đăng ký thất bại');</script>";
            }
        }
    }
    ?>
    <div class="snowflake"></div>
    <div class="form">
        <form action="" class="singin" method="post" enctype="multipart/form-data">

            <h1>ĐĂNG KÝ</h1>
            <?php if (!empty($errors)) { ?>
            <ul class="error">
                <?php foreach ($errors as $error) { ?>
                <li>
                    <?php echo $error; ?>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
            <span>
                <input type="text" placeholder="Tên đăng nhập" name="user_name">
            </span>
            <span>
                <input type="text" placeholder="Email" name="email">
            </span>
            <span class="password-wrapper">
                <input type="password" placeholder="Mật khẩu" name="password" id="passwordInput">
                <i class="password-toggle-icon fas fa-eye" onclick="togglePasswordVisibility()"></i>
            </span>
            <span class="password-wrapper">
                <input type="password" placeholder="Nhập lại mật khẩu" name="confirm_password"
                    id="confirmPasswordInput">
                <i class="password-toggle-icon fas fa-eye" onclick="togglePasswordConfirm()"></i>
            </span>

            <!-- Thêm các trường thông tin khách hàng -->
            <span>
                <input type="text" placeholder="Tên khách hàng" name="full_name">
            </span>

            <span>
                <input type="text" placeholder="Số điện thoại khách hàng" name="phone_number">
            </span>


            <button class="btn" name="submit">Đăng Ký</button>
            <h4>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></h4>
        </form>
    </div>
    <script src="../assets/js/script.js"></script>

</body>

</html>