<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

?>

<!-- slidebar -->
<style>

.profile-details {
    position: relative;
    display: inline-block;
}

.drop-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    width: 100%;
    box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.6);
    z-index: 1;
    margin-top: 10px;
    right: 0;
    opacity: 0;
    transform: translateY(-10%);
    transition: opacity 2.9s ease, transform 8.9s ease;
}

.profile-details.active .drop-menu {
    display: block;
    opacity: 1;
    transform: translateY(60%);
}

.profile-details.active .drop-menu a {
    opacity: 1;
    transform: translateY(0%);
}

.drop-menu a {
    color: black;
    padding: 12px 12px;
    display: flex;
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.9s ease;
    align-items: center;
}

.drop-menu a i {
    padding: 5px;
    color: #081D45;
}
.drop-menu a i:hover{
  color: #fff;
}

.drop-menu a:hover {
    background-color: #081D45;
    color: #fff;
    border-radius: 5px;

}
</style>
<section class="home-section">
  <nav class="header">
    <div class="sidebar-button">
      <i class="bx bx-menu sidebarBtn" ></i>
      <span class="dashboard" id="dashboardText"></span>
    </div>
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="" />
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
            <img src="../images/luu_duoc_phi.webp" alt="" class="drop-btn" />
            <span class="admin_name"><?php echo $_SESSION['user_fullname']; ?></span>
            <i class="bx bx-chevron-down"></i>
            <div class="drop-menu">
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-face-grin-hearts"></i>
                    <span class="links_name">Làm 1 gậy</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-headphones"></i>
                    <span class="links_name">Làm 2 gậy</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-user-astronaut"></i>
                    <span class="links_name">Làm 3 gậy</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-spider"></i>
                    <span class="links_name">Ngất</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Cài đặt</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="links_name">Logout</span>
                </a>


            </div>
        </div>
    </nav>

    <div class="home-content">
        <!-- end slidebar -->
        <script>
        // Header
const dropdown = document.querySelector(".profile-details");
const dropbtn = document.querySelector(".drop-btn");
const dropmenu = document.querySelector(".drop-menu");

dropbtn.addEventListener("click", () => {
  dropdown.classList.toggle("active");
  if (dropdown.classList.contains("active")) {
    dropmenu.style.display = "block";
    setTimeout(() => {
      dropmenu.style.opacity = "1";
      dropmenu.style.transform = "translateY(100)";
    }, 50);
  } else {
    dropmenu.style.opacity = "0";
    dropmenu.style.transform = "translateY(60%)";
    setTimeout(() => {
      dropmenu.style.display = "none";
    }, 300);
  }
});

document.addEventListener("click", (event) => {
  const targetElement = event.target;
  if (!dropdown.contains(targetElement)) {
    dropdown.classList.remove("active");
    dropmenu.style.opacity = "0";
    dropmenu.style.transform = "translateY(60%)";
    setTimeout(() => {
      dropmenu.style.display = "none";
    }, 9000);
  }
});
const thongbaoBtn = document.querySelector(".thongbao-btn");
const dropthong = document.querySelector(".thong-bao1");

thongbaoBtn.addEventListener("click", () => {
  dropthong.classList.toggle("active");
});
document.addEventListener("click", (event) => {
  const targetElement = event.target;
  if (!dropthong.contains(targetElement)) {
    dropthong.classList.remove("active");
  }
});
// JavaScript để thêm/loại bỏ class "shake" cho icon khi trang được tải
document.addEventListener("DOMContentLoaded", function() {
var bellIcon = document.querySelector(".thongbao-btn");
bellIcon.classList.add("shake");

// Thêm class "shake" cho icon sau 3 giây
setTimeout(function() {
bellIcon.classList.remove("shake");
}, 10000);
});
// Lấy tất cả các thẻ span chứa số lượng thông báo
var badges = document.querySelectorAll(".badge");

// Lấy thẻ icon thông báo
var bellIcon = document.querySelector(".thongbao-btn");

// Thêm sự kiện click cho icon thông báo
bellIcon.addEventListener("click", function() {
  // Khi người dùng ấn vào icon, ẩn hẳn tất cả số lượng thông báo bằng cách đặt thuộc tính CSS display thành "none"
  badges.forEach(function(badge) {
      badge.style.display = "none";
  });
});

// End header
        
        </script>