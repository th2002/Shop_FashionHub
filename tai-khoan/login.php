<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/singin.css">
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
</style>

<body>
    <div class="form">
        <form action="" class="singin" method="post">
            <h1>ĐĂNG NHẬP</h1>
            <div id="error-message" style="display: none;">
                <p class="error">Thông báo lỗi</p>
            </div>
            <span>
                <input type="text" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            </span>
            <span>
                <input type="password" placeholder="Mật khẩu" name="password">
            </span>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            session_start();
            include("./config/config.php");

            // Xử lý form đăng nhập khi người dùng nhấn nút Submit
            if (isset($_POST['submit'])) {
                // Lấy dữ liệu từ form
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Kiểm tra các trường dữ liệu có hợp lệ hay không
                $errors = array();

                if (empty($email)) {
                    $errors[] = "Email không được để trống";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email không hợp lệ";
                }

                if (empty($password)) {
                    $errors[] = "Mật khẩu không được để trống";
                }

                // Nếu không có lỗi, kiểm tra thông tin đăng nhập
                if (count($errors) == 0) {
                    $sql = "SELECT * FROM users WHERE (email = '$email' OR username = '$email')";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        if (($email == $row['email'] || $email == $row['username']) && $password == $row['password']) { // so sánh trực tiếp mật khẩu
                            // Lưu thông tin người dùng vào session
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['user_role'] = $row['user_role'];
                            $_SESSION['turn_wheel'] = $row['turn_wheel'];
                        
                            // Hiển thị thông báo đăng nhập thành công
    echo "<script>
    Swal.fire({
      title: 'Thành công!',
      text: 'Đăng nhập thành công',
      icon: 'success',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        // Chuyển hướng đến trang chính hoặc trang admin tùy vào vai trò của người dùng
        " . ($_SESSION['user_role'] === 'admin' ? "window.location.href = './admin/index.php';" : "window.location.href = 'index.php';") . "
      }
    });
  </script>";

                        } else {
                            $errors[] = "Thông tin đăng nhập không chính xác";
                        }
                    } else {
                        $errors[] = "Email không tồn tại";
                    }
                }

                // Hiển thị các lỗi nếu có
                if (!empty($errors)) {
                    echo "<script>
                            document.getElementById('error-message').innerHTML = '<p class=\"error\">" . implode("<br>", $errors) . "</p>';
                            document.getElementById('error-message').style.display = 'block';
                        </script>";
                }
            }

            // Đóng kết nối
            mysqli_close($conn);
            ?>

            <button class="btn" name="submit">Đăng nhập</button>
            <h4>Bạn chứa có tài khoản? <a href="singin.php">Đăng ký</a></h4>
        </form>
    </div>
</body>

</html>