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
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/singin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Đăng ký</title>
</head>
<style>
.snowflake {
    position: absolute;
    top: -10px;
    width: 10px;
    height: 10px;
    background-color: #fff;
    border-radius: 50%;
    clip-path: polygon(50% 0%, 61.8% 38.2%, 100% 45.1%, 73.2% 76.8%, 82.6% 100%, 50% 87.4%, 17.4% 100%, 26.8% 76.8%, 0% 45.1%, 38.2% 38.2%);
    /* Điều chỉnh clip-path cho hình tuyết */

    opacity: 0.7;
    pointer-events: none;
    animation: snowfall linear infinite;
}

@keyframes snowfall {
    70% {
        transform: translateY(0) rotate(0deg);
    }

    10% {
        transform: translateY(100vh) rotate(360deg);
    }

    0% {
        transform: translateY(0) rotate(0deg);
    }

    90% {
        transform: translateY(90vh) rotate(360deg);
    }
}

#error-message {
    color: red;
}

.error {
    border-radius: 4px;
    padding: 5px;
    color: red;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.3)
}

.error li {}

@media(max-width:354px) {
    .error {
        width: 80%;

    }
}
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
                // Đăng ký thành công lưu vào session
                $_SESSION['user_name'] = $user_name;
                echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "Đăng ký thành công",
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
            <span>
                <input type="password" placeholder="Mật khẩu" name="password">
            </span>
            <span>
                <input type="password" placeholder="Nhập lại Mật khẩu" name="confirm_password">
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
    <script>
    function createSnowflakes() {
        const numFlakes = 100;
        const body = document.querySelector('body');

        for (let i = 0; i < numFlakes; i++) {
            const flake = document.createElement('div');
            flake.className = 'snowflake';
            flake.style.left = `${Math.random() * 98}%`;
            flake.style.animationDuration = `${Math.random() * 0 + 8}s`;
            flake.style.animationDelay = `${Math.random()}s`;
            body.appendChild(flake);
        }
    }

    createSnowflakes();
    </script>
</body>

</html>