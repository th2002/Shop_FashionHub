<?php
require_once '../../../../global.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= $ASSET_URL ?>/images/logos/Main Logo.png">
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/app.css">
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/page-user.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/oders.css">
    <title>Thanh toán</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="banner_top">
                <div class="banner_top__center">
                    <h3>Quà tặng hấp dẫn</h3>
                </div>
                <div class="banner_top__right">
                    <div class="banner_top__right-season">
                        <span>Welcome</span>
                        <h1>Summer</h1>
                    </div>
                    <div class="banner_top__right-year">
                        <h4>2023</h4>
                    </div>
                </div>
            </div>
    </div>

    <?php
    require_once '../layout/nav.php';
    ?>

    <div class="container_oders">
        <i style="display: flex; justify-content: center; margin-top: 50px; font-size: 50px;"
            class="fa-solid fa-money-check-dollar icon"></i>
        <h3 class="title">THANH TOÁN</h3>
        <h6 style="color: gray;">Vui lòng kiểm tra thông tin Khách Hàng, thông tin Giỏ Hàng trước khi Đặt hàng</h6>


        <form class="row g-3 needs-validation col-md-6" style="margin: 30px 0 0 40px;" novalidate>
            <h5>Thông tin khách hàng</h5>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Họ tên người nhận</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Tên đường / Số nhà</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="validationCustomUsername"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Thành phố</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>...</option>
                    <option value="1">Hồ Chí Minh</option>
                    <option value="2">Hà Nội</option>
                    <option value="3">Huế</option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Quận / Huyện</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>...</option>
                    <option value="1">Quận 12</option>
                    <option value="2">Quận 6</option>
                    <option value="3">Gò Vấp</option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Phường / Xã</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>...</option>
                    <option value="1">Phường 10</option>
                    <option value="2">Phường 11</option>
                    <option value="3">Phường 12</option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Phương thức thanh toán</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>...</option>
                    <option value="1">COD</option>
                    <option value="2">Bank</option>
                </select>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Tôi đồng ý với điều khoản của cửa hàng
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" style="width: 100%;" type="button" id="liveToastBtn">ĐẶT HÀNG</button>
            </div>
        </form>

        <!-- Thời gian thực giờ/phút -->
        <?php
            // Lấy thời gian hiện tại
            $current_time = time();
            // Định dạng giờ/phút
            $previous_time_formatted = date("H:i", $current_time);
        ?>

        <!-- Toast -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img style="width: 20px; height: 20px;" src="<?= $ASSET_URL ?>/images/logos/Main Logo.png"
                        class="rounded me-2" alt="...">
                    <strong class="me-auto">Cám ơn quý khách</strong>
                    <small><?= $previous_time_formatted ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Đặt hàng thành công
                </div>
            </div>
        </div>

    </div>



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?= $ASSET_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $ASSET_URL ?>/js/snippets.js"></script>
</body>

</html>