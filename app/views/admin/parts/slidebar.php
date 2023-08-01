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
    background-color: beige;
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
    display: block;
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.9s ease;
  }

  .drop-menu a:hover {
    background-color: #081D45;
    color: #fff;
    border-radius: 5px;

  }

  .thong-bao {
    display: flex;
    align-items: center;
    justify-content: flex-end;
  }

  .thong-bao1 {
    display: inline-block;
    position: relative;
  }

  .menu-thong {
    display: none;
    background-color: #e9e9e9;
    min-width: 290px;
    right: 0;
    top: 0;
    position: absolute;
    z-index: 2;
    margin-top: 50px;
    box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.2);


  }

  .thong-bao1.active .menu-thong {
    display: block;
    opacity: 1;
  }

  .menu-thong ul li a {
    display: block;
    padding: 10px;
    color: black;
  }

  .thong-bao .fa-bell {
    margin-right: 30px;
    font-size: 20px;
    cursor: pointer;
    color: #081D45;

  }

  .menu-thong em {
    color: black;
    font-weight: 200;
    padding: 10px;
    font-size: 14px;
  }

  .notification {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .notification img {
    width: 30px;
    height: 30px;
  }

  @keyframes shake {
    0% {
      transform: translateX(0);
    }

    10%,
    90% {
      transform: translateX(-2px);
    }

    20%,
    80% {
      transform: translateX(2px);
    }

    30%,
    70% {
      transform: translateX(-2px);
    }

    40%,
    60% {
      transform: translateX(2px);
    }

    50% {
      transform: translateX(0);
    }
  }

  .thong-bao .fa-bell {
    transition: all 0.3s;
  }

  .thong-bao:hover .fa-bell {
    animation: shake 0.6s;
  }

  .thong-bao .badge {
    position: absolute;
    top: -10px;
    left: 10px;
    padding: 1px 4px;
    background-color: red;
    color: white;
    border-radius: 80%;
    font-size: 10px;
  }

  .all-thongbao {
    float: right;
    padding: 10px;
    color: #081D45;
  }
</style>
<section class="home-section">
  <nav class="header">
    <div class="sidebar-button">
      <i class="bx bx-menu sidebarBtn"></i>
      <span class="dashboard">Dashboard</span>
    </div>
    <div class="search-box">
      <input type="text" placeholder="Tìm kiếm..." />
      <i class="bx bx-search"></i>
    </div>
    <div class="thong-bao">
    <div class="thong-bao1">
    <i class="fa-regular fa-bell thongbao-btn"></i>
    <span class="badge" id="badge"><?php echo countNotifications(); ?></span>
    <div class="menu-thong">
        <ul>
            <?php
            $notifications = getAllNotifications(); // Gọi hàm để lấy danh sách thông báo
            foreach ($notifications as $notification) {
            ?>
                <li class="notification">
                    <!-- <img src="./images/gif-new.gif" alt=""> -->
                    <a href="#">
                        <p><?php echo $notification['notification_content']; ?></p>
                    </a>
                </li>
                <em>Ngày cập nhật: <?php echo $notification['created_at']; ?></em>
            <?php
            }
            ?>

        </ul>
        <a href="#" class="all-thongbao">Xem tất</a>
    </div>
</div>



      <div class="profile-details">
        <img src="../images/luu_duoc_phi.webp" alt="" class="drop-btn" />
        <!-- <span class="admin_name"><?php echo $_SESSION['user_fullname']; ?></span> -->
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
    <!-- end slidebar -->
    <script>
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
    // Lấy thẻ span chứa số lượng thông báo
    var badge = document.querySelector(".badge");

    // Lấy thẻ icon thông báo
    var bellIcon = document.querySelector(".thongbao-btn");

    // Thêm sự kiện click cho icon thông báo
    bellIcon.addEventListener("click", function() {
        // Ẩn hẳn số lượng thông báo bằng cách đặt thuộc tính CSS display thành "none"
        badge.style.display = "none";
    });

    // Ẩn hẳn số lượng thông báo khi trang đã được tải hoàn tất
    window.addEventListener("load", function() {
        badge.style.display = "none";
    });

    </script>