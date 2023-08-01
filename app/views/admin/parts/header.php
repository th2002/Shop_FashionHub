<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');



$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // nếu chưa login thì chuyển về trang login
    header('Location:' . $baseURL . '/tai-khoan/login.php');
    exit();
}

if ($_SESSION['user_role'] != 1) {
    //nếu người dùng ko là admin thì chuyển  về trangngười dùng
    header('Location:' . $baseURL . '/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo $cssURL; ?>/style.css" />
    <link rel="stylesheet" href="<?php echo $cssURL; ?>/singin.css" />

    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Tải thư viện jquery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
    .sidebar {
        <?php $start_color = isset($_COOKIE['start_color']) ? $_COOKIE['start_color'] : '#ff0000';
        $mid_color = isset($_COOKIE['mid_color']) ? $_COOKIE['mid_color'] : '#00ff00';
        $end_color = isset($_COOKIE['end_color']) ? $_COOKIE['end_color'] : '#0000ff';
        ?>background-image: linear-gradient(to top, <?php echo $start_color; ?>, <?php echo $mid_color; ?>, <?php echo $end_color; ?>);
    }
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">Admin</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../index.php" class="custom-link" id="link1">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $viewURL; ?>/view/productList.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="<?= $viewURL; ?>/view/categoryList.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Danh mục</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Làm 1 gậy</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-coin-stack"></i>
                    <span class="links_name">18+</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-book-alt"></i>
                    <span class="links_name">Đơn hàng</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $viewURL; ?> /view/users.php">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Người dùng</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-message"></i>
                    <span class="links_name">Bình luận</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-heart"></i>
                    <span class="links_name">Favrorites</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Cài đặt</span>
                </a>
            </li>
            <li class="log_out">
                <a href="<?php echo $baseURL; ?>/tai-khoan/logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <script>


    </script>