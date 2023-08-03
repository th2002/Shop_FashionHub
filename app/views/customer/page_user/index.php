<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/grid.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/app.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/page-user.css">
    <link rel="shortcut icon" href="<?=$ASSET_URL?>/images/logos/Main Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <title>Shop FashionHub</title>
</head>

<body>
    <?php require_once '../page_user/header.php' ?>
    <div class="sidebar" style="height: 552px;">
        <div class="logo-details">
            <a href="./index.php">
                <i class="bx bxl-c-plus-plus"></i>
                <span class="logo_name"><i class="fa-solid fa-id-card"></i>Tài khoản <br>
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
</body>

</html>