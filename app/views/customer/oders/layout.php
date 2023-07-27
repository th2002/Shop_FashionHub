<?php


$provinces = thanh_pho_select_all();
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

        <div class="row">
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
                            Please choose a address.
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Thành phố</label>
                    <select id="city" class="form-select" aria-label="Default select example" name="city" id="city">
                        <option selected>...</option>
                        <!-- Lặp qua mảng $provinces để tạo các option -->
                        <?php
                        foreach ($provinces as $province) {
                            echo '<option value="' . $province["id"] . '">' . $province["_name"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <script>
                // Lắng nghe sự kiện khi người dùng thay đổi giá trị của select "Thành phố"
                document.getElementById("city").addEventListener("change", function() {
                    // Lấy giá trị đã chọn trong select "Thành phố"
                    var selectedCityId = this.value;

                    // Lưu id của thành phố vào session storage
                    sessionStorage.setItem("selectedCityId", selectedCityId);

                });
                </script>
                <?php


                // Kiểm tra xem session "selectedCityId" đã tồn tại chưa
                if (isset($_SESSION['selectedCityId'])) {
                    $selectedCityId = $_SESSION['selectedCityId'];
                } else {
                    // Nếu chưa có session, gán giá trị mặc định hoặc xử lý tùy ý
                    $selectedCityId = "1";
                }

                // Truy vấn SQL để lấy danh sách các quận/huyện dựa vào id thành phố đã chọn

                $districts = quan_select_by_id_thanh_pho($selectedCityId);
                ?>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Quận / Huyện</label>
                    <select id="district" class="form-select" aria-label="Default select example">
                        <option selected>...</option>
                        <?php
                        foreach ($districts as $district) {
                            echo '<option value="' . $district["id"] . '">' . $district["_name"] . '</option>';
                        }
                        ?>
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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="width: 100%;" type="button">ĐẶT
                        HÀNG</button>
                </div>
            </form>

            <!-- Thời gian thực giờ/phút -->
            <?php
            // Lấy thời gian hiện tại
            $current_time = time();
            // Định dạng giờ/phút
            $previous_time_formatted = date("H:i", $current_time);
            ?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xin chào !</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn xác nhận mua hàng ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" id="liveToastBtn">Đồng ý</button>
                        </div>
                    </div>
                </div>
            </div>

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

            <div style="margin: 45px 0 0 40px;" class="col-md-5 cart">
                <table style="margin-top: 55px;" class="table table-bordered table-striped table-hover">
                    <h5 class="title_cart">Giỏ hàng</h5>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th style="text-align: center;" scope="col">Sản phẩm</th>
                            <th style="text-align: center;" scope="col">Số lượng</th>
                            <th style="text-align: center;" scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 30px">
                        <tr>
                            <th scope="row">1</th>
                            <td style="text-align: center;">Áo hoodie</td>
                            <td style="text-align: center;" colspan="">1</td>
                            <td style="text-align: center;" colspan="2">3,000,000</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td style="text-align: center;">Áo hoodie</td>
                            <td style="text-align: center;" colspan="">2</td>
                            <td style="text-align: center;" colspan="2">3,000,000</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td style="text-align: center;">Áo hoodie</td>
                            <td style="text-align: center;" colspan="">3</td>
                            <td style="text-align: center;" colspan="2">3,000,000</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="3">Tổng tiền</td>
                            <td style="text-align: center;" colspan="2">9,000,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?= $ASSET_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $ASSET_URL ?>/js/snippets.js"></script>
    <script src="<?= $ASSET_URL ?>/js/modal.js"></script>
</body>

</html>