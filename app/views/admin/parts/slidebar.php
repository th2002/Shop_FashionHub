<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');



$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;




?>

<!-- slidebar -->
<style>
  
  
  
</style>
<section class="home-section">
  <nav class="header">
    <div class="sidebar-button">
      <i class="bx bx-menu sidebarBtn" ></i>
      <span class="dashboard">Dashboard</span>
    </div>
    <div class="search-box">
      <input type="text" placeholder="Tìm kiếm..." />
      <i class="bx bx-search" title="Tìm kiếm"></i>
    </div>
    <div class="thong-bao">
    <div class="thong-bao1">
    <i class="fa-regular fa-bell thongbao-btn icon " title="Thông báo"></i>
    <span class="badge" id="badge"><?php echo countNotifications(); ?></span>
    <div class="menu-thong">
      <h4 class="title-thongbao">Thông báo mới nhất</h4>
        <ul>
        <?php
    $notifications = getAllNotifications(); // Gọi hàm để lấy danh sách thông báo
    if (empty($notifications)) {
        echo "<p>Không có thông báo</p>";
    } else {
        foreach ($notifications as $notification) {
    ?>
    
            <li class="notification">
            <img src="../images/gif-new.gif" alt="">

                <a href="#">
                    <p><?php echo $notification['notification_content']; ?></p>
                </a>
            </li>
            <em>Ngày cập nhật: <?php echo $notification['created_at']; ?></em>
    <?php
        }
    }
    ?>

        </ul>
        <a href="#" class="all-thongbao">Xem tất</a>
    </div>
</div>



      <div class="profile-details">
        <img src="../images/trieu-le-dinh-1.jpg" alt="" class="drop-btn" />
        <span class="admin_name"><?php echo $_SESSION['user_fullname']; ?></span>
        <i class="bx bx-chevron-down"></i>
        <div class="drop-menu">
          <a href="#">Làm 1 gậy</a>
          <a href="#">Làm 2 gậy</a>
          <a href="#">Làm 3 gậy</a>
          <a href="#">Ngất</a>

        </div>
      </div>
    </div>
  </nav>

  <div class="home-content">
  
</div>

    <!-- end slidebar -->
    <script>
    </script>