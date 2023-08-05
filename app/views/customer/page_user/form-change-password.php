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
                    <span style="margin-left: 84px; letter-spacing: 5px; text-transform:uppercase" class="dashboard">Đổi
                        Mật Khẩu</span>
                </div>
                <form method="post" style="width: 600px;" class="rounded border-2 p-2">
                    <?php if ($loi != "") { ?>
                    <div class="alert alert-secondary"><?php echo $loi ?></div>
                    <?php } ?>
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="tendangnhap" class="form-label">Tên
                            đăng nhập</label>
                        <input value="<?php echo $username ?>" type="text" disabled class="form-control"
                            id="tendangnhap" name="tendangnhap">
                    </div>
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="matkhaucu" class="form-label">Mật khẩu
                            cũ</label>
                        <input type="password" class="form-control" id="matkhaucu" name="matkhaucu">
                    </div>
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="matkhaumoi_1" class="form-label">Mật
                            khẩu mới</label>
                        <input type="password" class="form-control" id="matkhaumoi_1" name="matkhaumoi_1">
                    </div>
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="matkhaumoi_2" class="form-label">Nhập
                            lại mật khẩu mới</label>
                        <input type="password" class="form-control" id="matkhaumoi_2" name="matkhaumoi_2">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button style="margin-top: 13px;" type="submit" name="btnsubmit"
                                class="btn btn-dark col-md-12">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </nav>
        </section>
    </header>
</body>

</html>