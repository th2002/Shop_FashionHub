<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="stylesheet" href="./public/css/singin.css" />

    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Admin</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="./view/productList.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Sản phẩm</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Đơn hàng</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Tổng đơn hàng</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-user"></i>
            <span class="links_name">Người dùng</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-message"></i>
            <span class="links_name">Bình luận</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart"></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Cài đặt</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav class="header">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <img src="images/profile.jpg" alt="" />
          <span class="admin_name">Admin</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Tổng đơn hàng</div>
              <div class="number">40,876</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Tăng</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Tổng doanh thu</div>
              <div class="number">38,876</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Tăng</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Lợi nhuận</div>
              <div class="number">0đ</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Tăng</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Tồn kho</div>
              <div class="number">11,086</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Giảm</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
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
            <div class="title">Snả phẩm bán chạy</div>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <img src="images/sunglasses.jpg" alt="" />
                  <span class="product">Áo dài ngắn tay</span>
                </a>
                <span class="price">20.000đ</span>
              </li>
              <li>
                <a href="#">
                  <img src="images/jeans.jpg" alt="" />
                  <span class="product">Quần Jeans cá tính</span>
                </a>
                <span class="price">20.000đ</span>
              </li>
              <li>
                <a href="#">
                  <img src="images/nike-min.jpg" alt="" />
                  <span class="product">Giầy Nike mùa hè</span>
                </a>
                <span class="price">99.000đ</span>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
