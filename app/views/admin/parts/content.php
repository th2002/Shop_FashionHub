<?php
// Sử dụng hàm để lấy tổng số đơn hàng của tháng hiện tại
$total_orders = getTongSoDonHangThangHienTai($db);

// Lấy tháng hiện tại
$month = date('m');

// Sử dụng hàm để lấy tổng số đơn hàng của tuần hiện tại
$total_orders = getTongSoDonHangTuanHienTai($db);

// Lấy số tuần trong năm hiện tại
$week = date('W');

?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <div class="right-side">
        <div class="box-topic animate__animated animate__heartBeat animate__repeat-3">Tổng đơn hàng</div>
        <div class="number count-up" data-end-value="<?php echo getTotalOders(); ?>"><?php echo getTotalOders(); ?></div>

        <div class="indicator">
          <i class="bx bx-up-arrow-alt animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
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
        <td>Ngày: <?= $date;?></td>
        <td class="count-up" data-end-value="<?= $totalOrders;?>"></td>
    </tr>
    <tr>
    <h1>Tổng số đơn hàng tuần <?php echo $week; ?></h1>
    <p><?php echo $total_orders; ?></p>
        <td>Tuần</td>
        <td></td>
    </tr>
    <tr>
    <h1>Tổng số đơn hàng tháng <?php echo $month; ?>:</h1>
    <p><?php echo  $total_orders; ?></p>
        <td>Tháng</td>
        <td></td>
    </tr>
</table>
      </div>
    </div>

    <div class="box box-product">
      <div class="right-side">
        <div class="box-topic">Tổng sản phẩm</div>
        <div class="number count-up" data-end-value=" <?php echo getTotalProducts(); ?>"> <?php echo getTotalProducts(); ?></div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
          <span class="text">Tăng</span>
        </div>
      </div>
      <i class="bx bxs-cart-add cart two animate__animated animate__headShake animate__repeat-3	3"></i>
      <div class="product-table table-chitiet">
        <table>
          <tr>
            <th>Thời gian</th>
            <th>Tổng sản phẩm</th>
          </tr>
          <tr>
            <td>Ngày</td>
            <td><?php echo getTotalAllProduct($date); ?></td>
          </tr>
          <tr>
            <td>Tuần</td>
            <td>10 sản phẩm</td>
          </tr>
          <tr>
            <td>Tháng</td>
            <td>100 Sản phẩm</td>
          </tr>
        </table>
        
      </div>
    </div>

    <div class="box">
      <div class="right-side">
        <div class="box-topic">Lợi nhuận</div>
        <div class="number" id="countUpNumber">0đ</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
          <span class="text">Tăng</span>
        </div>
      </div>
      <i class="fa-solid fa-money-check-dollar cart three animate__animated animate__swing animate__repeat-3"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Sản phẩm ế </div>
        <div class="number count-up" data-end-value="11086">11,086</div>
        <div class="indicator">
          <i class="bx bx-down-arrow-alt down animate__animated animate__zoomIn animate__delay-1s animate__duration-2s animate__repeat-3"></i>
          <span class="text">Giảm</span>
        </div>
      </div>
      <i class="bx bxs-cart-download cart four animate__animated animate__heartBeat animate__repeat-3"></i>
    </div>
  </div>

  <div class="sales-boxes">
    <div class="recent-sales box">
      <div class="title">Đơn hàng gần đây</div>
      <div class="sales-details">
        <ul class="details">
          <li class="topic">Ngày</li>
          <li><a href="#">15 10 2023</a></li>
          <li><a href="#">15 10 2023</a></li>
          <li><a href="#">15 10 2023</a></li>
          <li><a href="#">15 10 2023</a></li>
          <li><a href="#">15 10 2023</a></li>
          <li><a href="#">15 10 2023</a></li>
          <li><a href="#">15 10 2023</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Khách hàng</li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
          <li><a href="#">Lan Hương</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Trạng thái</li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
          <li><a href="#">Đã thanh toán</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Tổng tiền</li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
          <li><a href="#">99.000đ</a></li>
        </ul>
      </div>
      <div class="button">
        <a href="#">Tất cả</a>
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
                <img class="animate__animated animate__swing animate__repeat-3" src="./uploads/<?php echo $product['image_url']; ?>" alt="" />
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