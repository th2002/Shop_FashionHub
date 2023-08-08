<?php
// Sử dụng hàm để lấy tổng số đơn hàng của tháng hiện tại
$total_orders = getTongSoDonHangThangHienTai($db);

// lấy tổng số sản phẩm theo tháng
$products_thang = getTongSoSanPhamTheoThang($db);

// Lấy tháng hiện tại
$month = date('m');

// Sử dụng hàm để lấy tổng số đơn hàng của tuần hiện tại
$total_orders = getTongSoDonHangTuanHienTai($db);

// Lấy số tuần trong năm hiện tại
$week = date('W');

// Lấy tổn số sản phẩm trong tuần

$products_tuan = getTongSoSanPhamTheoTuan($db);

// gọi hàm tính tổng danh thu
$tong_doanh_thu = tinhTongDoanhThuDaBan($db);
$formatted_number = number_format($tong_doanh_thu, 0, ',', ',') . 'đ';

// gọi hàm tính tổng thu nhập theo ngày

$tong_doanh_thu_ngay = tinhTongThuNhapTheoNgay($db, $date);
$doanh_thu_ngay = number_format($tong_doanh_thu_ngay, 0, ',', ',') . 'đ';

// Lấy ngày hiện tại và tính tuần hiện tại
$ngay_hien_tai = date("Y-m-d");
$tuần_hien_tại = date("W", strtotime($ngay_hien_tai));

// Gọi hàm tính tổng doanh thu theo tuần
$tong_doanh_thu_tuan = tinhTongDoanhThuTheoTuan($db, $tuần_hien_tại);


// Lấy ngày hiện tại và tính tháng hiện tại
$ngay_hien_tai = date("Y-m-d");
$thang_hien_tai = date("Y-m", strtotime($ngay_hien_tai));

// Gọi hàm tính tổng doanh thu theo tháng
$tong_doanh_thu_thang = tinhTongDoanhThuTheoThang($db, $thang_hien_tai);

// Gọi hàm tính tổng doanh thu trung bình mỗi ngày
$doanh_thu_trung_binh_ngay = tinhTongDoanhThuTrungBinhNgay($db);

// Lấy tổng số lượng tồn kho của tất cả sản phẩm
$tong_so_luong_ton_kho = tinhTongSoLuongTonKho($db);

// Lấy danh sách 10 đơn hàng gần đây
$danhsach_donhang_ganday = lay10DonHangGanDay($db);

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
                <div class="box-topic animate__animated animate__heartBeat animate__repeat-3">Tổng đơn hàng</div>
                <div class="number count-up" data-end-value="<?php echo getTotalOrderCount($db); ?>">
                    <?php echo getTotalOrderCount($db); ?></div>

                <div class="indicator">
                    <i
                        class="bx bx-up-arrow-alt animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
                    <span class="text">Tăng</span>
                </div>
            </div>
            <i class="bx bx-cart-alt cart animate__animated animate__heartBeat animate__repeat-3"></i>

            <!-- Bảng đơn hàng -->
            <div class="order-table table-chitiet">
                <!-- Nội dung bảng đơn hàng -->
                <table>
                    <tr>
                        <th>Thời gian</th>
                        <th>Tổng đơn hàng</th>
                    </tr>
                    <tr>
                        <td>Ngày hôm nay</td>
                        <td class="count-up" data-end-value="<?= $totalOrders; ?>"></td>
                    </tr>
                    <tr>
                        <h1></h1>
                        <p></p>
                        <td>Tuần <?php echo $week; ?></td>
                        <td><?php echo $total_orders; ?> Đơn hàng</td>
                    </tr>
                    <tr>
                        <h1></h1>
                        <p></p>
                        <td>Tháng <?php echo $month; ?> </td>
                        <td><?php echo  $total_orders; ?> Đơn hàng</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="box box-product">
            <div class="right-side">
                <div class="box-topic">Tổng sản phẩm</div>
                <div class="number count-up" data-end-value=" <?php echo getTotalProducts(); ?>">
                    <?php echo getTotalProducts(); ?></div>
                <div class="indicator">
                    <i
                        class="bx bx-up-arrow-alt animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
                    <span class="text">Tăng</span>
                </div>
            </div>
            <i class="bx bx-shopping-bag cart two animate__animated animate__headShake animate__repeat-3	3"></i>
            <div class="product-table table-chitiet">
                <table>
                    <tr>
                        <th>Thời gian</th>
                        <th>Tổng sản phẩm</th>
                    </tr>
                    <tr>
                        <td>Ngày</td>
                        <td><?php echo $totalProducts; ?> Sản phẩm</td>
                    </tr>
                    <tr>
                        <td>Tuần</td>
                        <td><?= $products_tuan; ?> Sản phẩm</td>
                    </tr>
                    <tr>
                        <td>Tháng</td>
                        <td><?php echo $products_thang; ?> Sản phẩm</td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="box">
            <div class="right-side">
                <div class="box-topic">Thu nhập</div>
                <div class="number" id="countUpNumber"><?= $formatted_number; ?></div>
                <div class="indicator">
                    <i
                        class="bx bx-up-arrow-alt animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
                    <span class="text">Tăng</span>
                </div>
            </div>
            <i class="fa-solid fa-money-check-dollar cart three animate__animated animate__swing animate__repeat-3"></i>
            <div class="product-table table-chitiet">
                <table>
                    <tr>
                        <th>Thời gian</th>
                        <th>Tổng doanh thu</th>
                    </tr>
                    <tr>
                        <td>Ngày</td>
                        <td><?php echo $doanh_thu_ngay; ?> </td>
                    </tr>
                    <tr>
                        <td>Tuần</td>
                        <td><?php echo $tong_doanh_thu_tuan; ?></td>
                    </tr>
                    <tr>
                        <td>Tháng</td>
                        <td><?php echo $tong_doanh_thu_thang; ?></td>

                    </tr>
                    <td>Trung bình ngày</td>
                    <td><?= $doanh_thu_trung_binh_ngay; ?></td>
                </table>

            </div>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Tồn kho </div>
                <div class="number count-up" data-end-value="<?= $tong_so_luong_ton_kho; ?>">
                    <?= $tong_so_luong_ton_kho; ?></div>
                <div class="indicator">
                    <i
                        class="bx bx-down-arrow-alt down animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
                    <span class="text">Giảm</span>
                </div>
            </div>
            <i class="fa-solid fa-face-tired cart four animate__animated animate__heartBeat animate__repeat-3"></i>
        </div>
    </div>

    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Đơn hàng gần đây</div>
            <div class="sales-details">
                <table>
                    <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Khách hàng</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


            // Hiển thị thông tin cho mỗi đơn hàng trong danh sách
            foreach ($danhsach_donhang_ganday as $donhang) {
            ?>
                        <tr>
                            <td><a href="#"><?php echo $donhang['created_at']; ?></a></td>
                            <td><a href="#"><?php echo $donhang['recipient_name']; ?></a></td>
                            <td><a
                                    href="#"><?php echo $donhang['status_payment'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'; ?></a>
                            </td>
                            <td><a
                                    href="#"><?php echo number_format($donhang['total_amount'], 0, ',', '.') . 'đ'; ?></a>
                            </td>
                        </tr>
                        <?php
            }
            ?>
                    </tbody>
                </table>
            </div>
            <div class="button">
                <a href="<?php echo $viewURL; ?>/view/odersList.php">Tất cả</a>
            </div>
        </div>

        <div class="top-sales box">
            <div class="title">Sản phẩm bán chạy</div>
            <ul class="top-sales-details">
                <?php
        $topSalesProducts = getTopSalesProducts();
        if (!empty($topSalesProducts)) {
          foreach ($topSalesProducts as $product) {
        ?>
                <li>
                    <a href="#">
                        <img class="animate__animated animate__swing animate__repeat-3" <?php if (strpos($product['image_url'], 'https') === 0) {
                                                                                  // Nếu $product['image_url'] bắt đầu bằng 'https'
                                                                                  echo 'src=" ' . $product['image_url'] . '"';
                                                                                } else {
                                                                                  // Nếu $product['image_url'] không bắt đầu bằng 'https'
                                                                                  echo 'src="./uploads/' . $product['image_url'] . '"';
                                                                                } ?> alt="" />
                        <span class="product"><?php echo $product['name']; ?></span>
                    </a>
                    <span class="price"><?php echo number_format($product['price'], 0, '.', '.'); ?>đ</span>
                </li>
                <?php
          }
        } else {
          echo "<p>Không có sản phẩm bán chạy nào.</p>";
        }
        ?>
            </ul>
        </div>

    </div>
</div>