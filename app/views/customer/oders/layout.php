<?php

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

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recipient_name = $_POST['cus_name'];
        $phone_number = $_POST['cus_phone'];
        $address_detail = $_POST['cus_detail_address'];
        $province_id = $_POST['province_name'];
        $district_id = $_POST['district_name'];
        $ward_id = $_POST['ward_name'];
        $coupon_code_id = $_POST['coupon'];
        $payment_method = ($_POST['method_payment'] === '1') ? 0 : 1;
        $created_at = $_POST['toDay'];

        $errors = [];
        // Kiểm tra rỗng
        // if(empty($recipient_name) || empty($phone_number) || empty($address_detail) || empty($province_id) || empty($district_id) || empty($ward_id) || empty($payment_method)){
        //     $errors[] ="Vui lòng nhập đầy đủ thông tin!";
        // }


        // Nếu không có lỗi, thực hiện đặt hàng
        if (empty($errors)) {
            $oder = insert_info_users($recipient_name, $phone_number, $address_detail, $province_id, $district_id, $ward_id, $coupon_code_id, $payment_method, $created_at);
            echo '<script>
                    Swal.fire({
                      icon: "success",
                      title: "Đặt hàng thành công",
                      showCancelButton: false,
                      confirmButtonText: "OK",
                      timer: 1000, // 5 giây
                      timerProgressBar: true,
                      willClose: function() {
                        window.location.href = "login.php";
                      }
                    });
                    </script>';
        } else {
            echo "<script>alert('Đặt hàng thất bại');</script>";
        }
    }
    ?>
    <div class="container_oders">
        <i style="display: flex; justify-content: center; margin-top: 50px; font-size: 50px;"
            class="fa-solid fa-money-check-dollar icon"></i>
        <h3 class="title">THANH TOÁN</h3>
        <h6 style="color: gray;">Vui lòng kiểm tra thông tin Khách Hàng, thông tin Giỏ Hàng trước khi Đặt Hàng</h6>
        <?php if (!empty($errors)) { ?>
        <ul class="error">
            <?php foreach ($errors as $error) { ?>
            <li>
                <?php echo $error; ?>
            </li>
            <?php } ?>
        </ul>
        <?php } ?>
        <div class="row">
            <form method="post" class="row g-3 needs-validation col-md-6" style="margin: 30px 0 0 40px;" novalidate>
                <h5>Thông tin khách hàng</h5>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Khách hàng</label>
                    <input name="cus_name" value="<?= $_SESSION['user_fullname'] ?>" type="text" class="form-control"
                        id="validationCustom01" readonly>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Số điện thoại</label>
                    <input name="cus_phone" type="text" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Tên đường / Số nhà</label>
                    <div class="input-group has-validation">
                        <input name="cus_detail_address" type="text" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a address.
                        </div>
                    </div>
                </div>
                <input type="hidden" name="province_name" id="province_name">
                <input type="hidden" name="district_name" id="district_name">
                <input type="hidden" name="ward_name" id="ward_name">

                <!-- code select -->
                <div class="col-md-12">
                    <select name="city" style="margin-bottom: 20px;" class="form-select"
                        aria-label="Default select example" id="city">
                        <option value="" selected>Chọn tỉnh thành</option>
                    </select>

                    <select name="district" style="margin-bottom: 20px;" class="form-select"
                        aria-label="Default select example" id="district">
                        <option value="" selected>Chọn quận huyện</option>
                    </select>

                    <select name="ward" class="form-select" aria-label="Default select example" id="ward">
                        <option value="" selected>Chọn phường xã</option>
                    </select>
                </div>

                <!-- select coupon -->
                <?php
                    $coupons = select_all_coupons();
                ?>
                <div class="col-md-12">
                    <select name="coupon" class="form-select" aria-label="Default select example" id="coupon">
                        <option value="" selected>Chọn mã giảm giá</option>
                        <?php foreach($coupons as $coupon): ?>
                        <option value="">
                            <?php
                            if ($coupon['type'] == 0) {
                                echo $coupon['code'] . ' ( ' . ' giảm ' . number_format($coupon['value']) . 'đ' . ' )';
                            } else {
                                echo $coupon['code'] . ' ( ' . ' giảm ' . $coupon['value'] . '%' . ' )';
                            }                           
                            ?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>

                <!-- code js -->
                <!-- code js -->
                <script>
                // Đảm bảo toàn bộ DOM đã được load
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById("city").addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex];
                        document.getElementById("province_name").value = selectedOption.text;
                    });

                    document.getElementById("district").addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex];
                        document.getElementById("district_name").value = selectedOption.text;
                    });

                    document.getElementById("ward").addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex];
                        document.getElementById("ward_name").value = selectedOption.text;
                    });
                });
                </script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                <script>
                var citis = document.getElementById("city");
                var districts = document.getElementById("district");
                var wards = document.getElementById("ward");
                var Parameter = {
                    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", // data source
                    method: "GET",
                    responseType: "application/json",
                };
                var promise = axios(Parameter);
                promise.then(function(result) {
                    renderCity(result.data);
                });

                function renderCity(data) {
                    for (const x of data) {
                        var opt = document.createElement('option');
                        opt.value = x.Name;
                        opt.text = x.Name;
                        opt.setAttribute('data-id', x.Id);
                        citis.options.add(opt);
                    }
                    citis.onchange = function() {
                        district.length = 1;
                        ward.length = 1;
                        if (this.options[this.selectedIndex].dataset.id != "") {
                            const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                            for (const k of result[0].Districts) {
                                var opt = document.createElement('option');
                                opt.value = k.Name;
                                opt.text = k.Name;
                                opt.setAttribute('data-id', k.Id);
                                district.options.add(opt);
                            }
                        }
                    };
                    district.onchange = function() {
                        ward.length = 1;
                        const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                        if (this.options[this.selectedIndex].dataset.id != "") {
                            const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this
                                .selectedIndex].dataset.id)[0].Wards;

                            for (const w of dataWards) {
                                var opt = document.createElement('option');
                                opt.value = w.Name;
                                opt.text = w.Name;
                                opt.setAttribute('data-id', w.Id);
                                wards.options.add(opt);
                            }
                        }
                    };
                }
                </script>
                <div class="col-md-12">
                    <select name="method_payment" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Phương thức thanh toán</option>
                        <option value="1">COD</option>
                        <option value="2">Bank</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Ngày đặt hàng</label>
                    <input type="date" name="toDay" id="todayDate" value="<?php echo date('Y-m-d'); ?>" readonly
                        class="form-control" id="validationCustom02" readonly>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
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
                    <button name="btn_buy" class="btn btn-primary" data-bs-target="#exampleModal" style="width: 100%;"
                        type="submit">ĐẶT
                        HÀNG</button>
                </div>
            </form>

            <!-- real time -->
            <?php
            // take time now
            $current_time = time();
            // format 
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
                <table style="margin-top: 55px;" class="table table-striped table-hover">
                    <h5 class="title_cart">Giỏ hàng</h5>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th style="text-align: center;" scope="col">Sản phẩm</th>
                            <th scope="col">size</th>
                            <th style="text-align: center;" scope="col">Số lượng</th>
                            <th style="text-align: center;" scope="col">Giá</th>
                        </tr>
                    </thead>

                    <tbody style="margin-top: 30px">
                        <?php
                        $count = 0;
                        $totalPrice = 0; // total money
                        $itemPrice = 0; // price product now
                        ?>
                        <?php
                        if (isset($_SESSION['data-cart'])) {
                            $data = $_SESSION['data-cart'];
                        }
                        foreach ($data as $key => $item) {
                            if ($key === 'totalQuantity') {
                                continue;
                            } else {
                                if (isset($data[$key]['order'])) {
                                    
                                    $count++; ?>
                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td>
                                <span><?= $item['name'] ?></span>
                            </td>
                            <td class="quantity-input">
                                <?php
                                            echo $item['size'];
                                            ?>
                            </td>
                            <td style="text-align: center;" class="quantity-input">
                                <?php
                                            echo $item['quantity'];
                                            ?>
                            </td>
                            <td style="text-align: center;" colspan="2">
                                <?php
                                            $amount_vnd = $item['price']; // "12,000,000"
                                            $amount_vnd = str_replace(",", "", $amount_vnd); // "12 000 000 đ"
                                            $amount_vnd = str_replace("₫", "", $amount_vnd); // "12 000 000"
                                            $amount_integer = (int)$amount_vnd; // 12 000 000
                                            $total = (int)$item['quantity'] * $amount_integer; // chưa lấy được số lượng
                                            $totalPrice += $total;
                                            $amount_vnd = number_format($total, 0, ',', ',') . " ₫"; // 12,000,000 đ
                                            echo $amount_vnd;
                                            ?>
                            </td>
                        </tr>

                        <?php
                                } else {
                                    continue;
                                }
                            }
                            ?>

                        <?php
                        }
                        ?>
                        <tr>
                            <td style="text-align: center;" colspan="3">Tổng tiền</td>
                            <td style="text-align: center;" colspan="3">
                                <?php
                                echo number_format($totalPrice, 0, ',', ',') . ' đ'; // print total money
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>




    <!-- <script>
        function priceToInt(price) {
            var amount_vnd = price;
            amount_vnd = amount_vnd.replace(/,/g, '');
            amount_vnd = amount_vnd.replace('₫', '');
            return parseInt(amount_vnd);
        }

        function intToPrice(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " đ";
        }
        const body = document.querySelector('.body-product_order');
        let count = 0;
        let htmls = '';
        let totalMoney = 0;
        fetch('../../../models/DAO/getdataOder.php')
            .then(response => response.json())
            .then(obj => {
                console.log(obj);
                for (const key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        const value = obj[key];
                        console.log(`Key: ${key}, Value:`, value);
                        if (key == 'totalQuantity') {
                            continue;
                        } else {
                            count++;
                            totalMoney += priceToInt(value.price);
                            htmls += `<tr>
                                        <th scope="row">${count}</th>
                                        <td style="text-align: center;">
                                            <span>${value.name}</span>
                                        </td>
                                        <td class="quantity-input" style="text-align: center;" colspan="">
                                            ${value.size}
                                        </td>
                                        <td class="quantity-input" style="text-align: center;" colspan="">
                                           ${value.quantity}
                                        </td>
                                        <td style="text-align: center;" colspan="2">
                                          ${value.price}
                                        </td>
                                    </tr>`
                        }
                    }
                }
                
                htmls += `<tr>
                            <td style="text-align: center;" colspan="3">Tổng tiền</td>
                            <td style="text-align: center;" colspan="2">
                                ${intToPrice(totalMoney)}
                            </td>
                        </tr>`
                body.innerHTML = htmls;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script> -->

</body>

</html>