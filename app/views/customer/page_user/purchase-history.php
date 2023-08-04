<?php require_once '../page_user/header.php' ?>
<?php require_once './change-password.php' ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="sidebar">
            <div class="logo-details">
                <a href="./index.php">
                    <i class="bx bxl-c-plus-plus"></i>
                    <span class="logo_name">
                        <a style="font-size: 18px; color:#333; font-weight: bold;"
                            href="<?=$SITE_URL?>/page_user/form-edit-profile.php">Xin
                            chào,
                            <?php echo $_SESSION['user_fullname']?></a>
                    </span>
                </a>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="./form-edit-profile.php" class="">

                        <span class="links_name"><i class="fa-solid fa-circle-info"></i>Sửa Thông Tin</span>
                    </a>
                </li>
                <li>
                    <a href="./form-change-password.php" class="">

                        <span class="links_name"><i class="fa-solid fa-unlock"></i>Đổi Mật Khẩu</span>
                    </a>
                </li>
                <li>
                    <a href="./purchase-history.php" class="">

                        <span class="links_name"><i class="fa-solid fa-receipt"></i>Lịch Sử Mua Hàng</span>
                    </a>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <nav class="header">
                <div class="sidebar-button">
                    <i class="bx bx-menu sidebarBtn"></i>
                    <span style="margin-left: 84px; letter-spacing: 5px; text-transform:uppercase"
                        class="dashboard">Lịch sử mua hàng</span>
                </div>
            </nav>
            <i style="margin: 5% 0  0 45%; font-size: 80px; color: #868D95" class="fa-solid fa-truck-fast"></i>
            <div class="title-notifi">
                <p
                    style="display: flex; justify-content: center; margin-top: 30px; font-weight:bold; font-size: 18px; color: #868D95;">
                    Không có đơn hàng nào!
                </p>
            </div>
            <div style="display: flex; justify-content:center" class="content-notifi">
                <p style="text-align: center; width: 280px; color:#868D95">
                    Hãy mua sắm ngay lúc này để tận hưởng những ưu đãi hấp dẫn
                    chỉ dành cho riêng bạn
                </p>
            </div>
            <div style="display: flex; justify-content:center;">
                <a style="width: 280px; height: 53px; margin-top: 30px;border-radius:2px; background-color: #2E2E2E; color: #fff; outline: none;
                text-transform: uppercase; padding-top: 15px; padding-bottom: 15px; font-size:14px;
                text-decoration: none;" href="<?=$SITE_URL?>/home">
                    <span style="letter-spacing: 2px; margin-left: 35px; ">
                        Dạo một vòng xem nào
                    </span>
                </a>
            </div>
        </section>
    </header>
</body>

</html>