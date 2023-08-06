<?php
require_once '../../../controller/customer/oder.php';
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
        <h6 style="color: gray;">Vui lòng kiểm tra thông tin Khách Hàng, thông tin Giỏ Hàng trước khi Đặt Hàng</h6>


        <!-- Form users info -->
        <div class="row col-md-12">
            <form method="post" class="row g-3 needs-validation col-md-12" style="margin: 30px 0 0 30px;" novalidate>
                <div class="row col-md-12">
                    <div style="margin-right: 20px;" class="col-md-5">
                        <!-- info user -->
                        <h5>Thông tin khách hàng</h5>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Khách hàng</label>
                            <input name="cus_name" value="<?= $_SESSION['user_fullname'] ?>" type="text"
                                class="form-control" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Số điện thoại</label>
                            <input name="cus_phone" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomUsername" class="form-label">Tên đường / Số nhà</label>
                            <div class="input-group has-validation">
                                <input name="cus_address_detail" type="text" class="form-control" required>
                            </div>
                        </div>

                        <!-- input save value option in select -->
                        <input type="hidden" name="province_name" id="province_name">
                        <input type="hidden" name="district_name" id="district_name">
                        <input type="hidden" name="ward_name" id="ward_name">

                        <!-- select  address-->
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
                                <?php foreach ($coupons as $coupon) : ?>
                                <option value="<?php echo $coupon['id'] ?>">
                                    <?php
                                        if ($coupon['type'] == 0) {
                                            echo $coupon['code'] . ' ( ' . ' giảm ' . number_format($coupon['value']) . 'đ' . ' )';
                                        } else {
                                            echo $coupon['code'] . ' ( ' . ' giảm ' . $coupon['value'] . '%' . ' )';
                                        }
                                        ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- code js take option text by value -->
                        <script>
                        // Make sure the entire DOM is loaded
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
                        <!-- code js load option in select address -->
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
                                    const result = data.filter(n => n.Id === this.options[this.selectedIndex]
                                        .dataset
                                        .id);

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
                                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex]
                                    .dataset
                                    .id);
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
                            <input type="date" name="toDay" id="toDay" value="<?php echo date('Y-m-d'); ?>" readonly
                                class="form-control" readonly>
                        </div>
                        <div class="col-12">
                            <button name="btn_buy" class="btn btn-primary" data-bs-target="#exampleModal"
                                style="width: 100%;" type="submit">ĐẶT
                                HÀNG</button>
                        </div>
                        <!-- end info user -->
                    </div>

                    <!-- star table -->
                    <!-- real time -->
                    <?php
                    // take time now
                    $current_time = time();
                    // format 
                    $previous_time_formatted = date("H:i", $current_time);
                    ?>
                    <!-- Table Products -->
                    <div style="margin-left: 60px;" class="col-md-6 cart">
                        <table style="margin-top: 55px;" class="table table-striped table-hover">
                            <h5 class="title_cart">Giỏ hàng</h5>
                            <thead>
                                <tr>
                                    <th style="text-align: center;" scope="col">Mã SP</th>
                                    <th style="text-align: center;" scope="col">Sản phẩm</th>
                                    <th style="text-align: center;" scope="col">size</th>
                                    <th style="text-align: center;" scope="col">Số lượng</th>
                                    <th style="text-align: center;" scope="col">Giá</th>
                                </tr>
                            </thead>

                            <tbody style="margin-top: 30px">
                                <?php
        $totalPrice = 0; // total money
        $itemPrice = 0; // price product now
        $productDetails = array();

        if (isset($_SESSION['data-cart'])) {
            $data = $_SESSION['data-cart'];
        }

        foreach ($data as $key => $item) {
            if ($key === 'totalQuantity') {
                continue;
            } else {
                if (isset($data[$key]['order'])) {
                    $productDetails[] = array(
                        'product_id' => intval($item['id']),
                        'size' => $item['size'],
                        'quantity' => $item['quantity']
                    );
                    ?>
                                <tr>
                                    <td style="text-align: center;" scope="row">
                                        <?php echo $item['id'] ?>
                                        <input value="<?php echo intval($item['id'])?>" name="product_id[]"
                                            type="hidden">
                                    </td>
                                    <td class="fs-6">
                                        <span class="fs-6"><?= $item['name'] ?></span>
                                    </td>
                                    <td class="quantity-input">
                                        <?php echo $item['size']; // => lấy size insert vào oder_detail ?>
                                        <input value="<?php echo $item['size'] ?>" name="size[]" type="hidden">
                                    </td>
                                    <td style="text-align: center;" class="quantity-input fs-6">
                                        <?php echo $item['quantity']; // => lấy số lượng insert vào oder_detail ?>
                                        <input value="<?php echo $item['quantity'] ?>" name="quantity[]" type="hidden">
                                    </td>
                                    <td style="text-align: center;" colspan="2">
                                        <?php
                            $amount_vnd = $item['price'];
                            $amount_vnd = str_replace(",", "", $amount_vnd);
                            $amount_vnd = str_replace("₫", "", $amount_vnd);
                            $amount_integer = (int)$amount_vnd;
                            $total = (int)$item['quantity'] * $amount_integer;
                            $totalPrice += $total;
                            $amount_vnd = number_format($total, 0, ',', ',') . " ₫";
                            echo $amount_vnd;
                            ?>
                                    </td>
                                </tr>
                                <?php
                } else {
                    continue;
                }
            }
        }
        ?>
                                <tr>
                                    <td style="text-align: center;" colspan="3">Tổng tiền</td>
                                    <td style="text-align: center;" colspan="3">
                                        <?php
                echo number_format($totalPrice, 0, ',', ',') . ' đ';
                // print total money
                ?>
                                        <input style="border: none;" name="total_money" id="input_total" type="hidden"
                                            value="<?php echo $totalPrice; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <!-- end table -->
                </div>
            </form>


        </div>

    </div>

</body>

</html>