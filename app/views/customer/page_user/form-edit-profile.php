<?php require_once '../page_user/header.php' ?>
<?php require_once './edit-profile.php' ?>
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
                    <span style="margin-left: 84px; letter-spacing: 4px; text-transform:uppercase; font-weight: bold;"
                        class="dashboard">Thông tin tài khoản</span>
                </div>
                <form style="width: 600px;" class="rounded border-2 p-2">
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="hoten" class="form-label">
                            Họ tên
                        </label>
                        <input value="<?=$user['full_name'] ?>" type="text" disabled class="form-control" id="hoten"
                            name="hoten">
                    </div>
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="sdt" class="form-label">Số điện thoại
                        </label>
                        <input value="<?=$user['phone_number'] ?>" type="text" disabled class="form-control" name="sdt">
                    </div>
                    <div class="mb-3">
                        <label style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                            for="email" class="form-label">
                            Email
                        </label>
                        <input value="<?= $user['email']?>" type="text" class="form-control" id="email" disabled
                            name="email">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button
                                style="margin-top: 13px; font-size:14px; letter-spacing: 5px; text-transform: uppercase;"
                                type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-dark col-md-12">Cập nhật thông
                                tin</button>
                        </div>
                    </div>
                </form>


            </nav>
        </section>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 style="margin-left: 110px; letter-spacing: 3px; text-transform: uppercase;"
                        class="modal-title fs-5" id="exampleModalLabel">
                        Cập nhật thông tin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label
                                style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                                class="col-form-label">Họ tên</label>
                            <input value="<?=$_SESSION['user_fullname']?>" type="text" class="form-control"
                                name="fullname" id="fullname">
                        </div>
                        <div class="mb-3">
                            <label
                                style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                                class="col-form-label">Số điện thoại</label>
                            <input value="<?=$_SESSION['user_phone']?>" type="text" class="form-control" name="phone"
                                id="phone">
                        </div>
                        <div class="mb-3">
                            <label
                                style="color: #868D95; text-transform: uppercase; font-size: 12px; letter-spacing: 5px;"
                                class="col-form-label">Email</label>
                            <input value="<?=$_SESSION['user_email']?>" type="text" class="form-control" name="email"
                                id="email">
                        </div>
                        <div style="margin-top: 30px;" class="row">
                            <div class="col-md-12">
                                <button type="submit" name="btnsubmitprofile"
                                    class="btn btn-dark col-md-12">LƯU</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>