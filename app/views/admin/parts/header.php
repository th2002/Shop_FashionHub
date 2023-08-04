<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');



$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
  // nếu chưa login thì chuyển về trang login
  header('Location:' . $SITE_URL . '/tai-khoan/login.php');
  exit();
}

if($_SESSION['user_role'] != 1){
  //nếu người dùng ko là admin thì chuyển  về trangngười dùng
  header('Location:' .$baseURL . '/index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo $cssURL; ?>/style.css" />
    <link rel="stylesheet" href="<?php echo $cssURL; ?>/singin.css" />

    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tải thư viện jquery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
.sidebar {
    <?php
                $start_color = isset($_COOKIE['start_color']) ? $_COOKIE['start_color'] : '#ff0000';
                $mid_color = isset($_COOKIE['mid_color']) ? $_COOKIE['mid_color'] : '#00ff00';
                $end_color = isset($_COOKIE['end_color']) ? $_COOKIE['end_color'] : '#0000ff';
            ?>
            background-image: linear-gradient(to top, <?php echo $start_color; ?>, <?php echo $mid_color; ?>, <?php echo $end_color; ?>);
}

/* drop-menu */
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
.title-thongbao{
  padding: 10px;
  /* border-bottom: 1px solid darkcyan; */
  box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
  opacity: 0.4;
}

.menu-thong ul li a {
  display: block;
  padding: 10px;
  color: black;
}

.thong-bao .fa-bell {
  margin-right: 30px;
  font-size: 25px;
  cursor: pointer;
  color: #081D45;

}

.menu-thong em {
  color: black;
  opacity: 0.4;
  padding: 10px;
  font-size: 14px;
}
.menu-thong ul:hover{
  background-color: antiquewhite;
}

.notification {
  display: flex;
  justify-content: center;
  align-items: center;
}

.notification img {
  width: 20px;
  height: 20px;
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
    transform: translateX(4px);
  }

  30%,
  70% {
    transform: translateX(-4px);
  }

  40%,
  60% {
    transform: translateX(2px);
  }

  50% {
    transform: translateX(0);
  }
}
@keyframes shake {
  10%, 90% {
    transform: translateX(-1px) rotate(-1deg);
  }
  20%, 80% {
    transform: translateX(2px) rotate(2deg);
  }
  70%, 50%, 40% {
    transform: translateX(-4px) rotate(-4deg);
  }
  40%, 60% {
    transform: translateX(4px) rotate(4deg);
  }
}

.thongbao-btn.shake {
  animation: shake 0.5s infinite;
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
/* end drop-menu */
/* form */
form {
  width: 50%;
  margin: auto;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
}

.title {
  text-align: center;
  margin: 10px 0;
}

label {
  font-weight: bold;
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="number"],
input[type="date"],
textarea {
  width: 100%;
  padding: 10px;
  border-radius: 3px;
  border: none;
  margin-bottom: 20px;
  box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1);
  border: none;
  outline: 1px solid #fff;
}

input.vertical-bar {
  border-left: 2px solid #ccc;
  padding-left: 8px;
  /* Tạo khoảng cách giữa gạch đứng và nội dung input */
}

/* Tùy chỉnh kích thước và khoảng cách của input */


/* Hiệu ứng nhấp nháy */
.blink {
  animation: blink 1s infinite;
}

@keyframes blink {
  50% {
      border-color: transparent;
  }
}


textarea {
  height: 100px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

button[type="submit"] {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  border-radius: 4px;
  border: none;
  background-color: #4caf50;
  color: white;
  cursor: pointer;
  margin-top: 10px;
}

button[type="submit"]:hover {
  background-color: #45a049;
}



select {
  width: 100%;
  border: none;
  outline: none;
  padding: 5px;
  border-radius: 5px;
}

.category_id option {
  text-shadow: 1px 10px 10px rgba(0, 0, 0, 0.5);
  /* Đổ bóng với độ mờ */
  /* Hoặc bạn có thể thay đổi màu sắc của bóng */
  /* text-shadow: 1px 1px 1px #000; */
}

.cancel-button {
  padding: 0.5rem 1rem;
  float: right;
  background-color: red;
  border-radius: 5px;
  color: #fff;
  margin-top: 10px;
}

.cancel-button:hover {
  background-color: #ca6262;
}

@media(max-width:768px) {
  form {
      width: 90%;
      margin: auto;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
  }
}
/* end form */

/* table view admin */
.menu-chucnang {
  display: flex;
  justify-content: space-between;
  padding: 20px;


}

.menu-left {
  display: flex;

}


.add-category {
  margin-right: 10px;

}

.add-links {
  background-color: #007bff;
  color: #fff;
  font-weight: 500;
  padding: 8px 12px;
  border-radius: 4px;

}

#xuat-excel {
  background-color: #642de9;
  transition: background-color 0.9s;

}

#xuat-excel:hover {
  background-color: #34225f;
  /* Màu nền hover mờ hơn */

}

#xuat-pdf {
  background-color: #e58782;
  transition: background-color 0.9s;
}

#xuat-pdf:hover {
  background-color: #915652;
  /* Màu nền hover mờ hơn */
}

#In {
  background-color: #128f89;
  transition: background-color 0.9s;
}

#In:hover {
  background-color: #2b514f;
  /* Màu nền hover mờ hơn */
}

.add-links:hover {
  background-color: #0056b3;


}

.fas {
  margin-right: 5px;
  /* Khoảng cách giữa biểu tượng và chữ "Thêm" */
  color: #1ee124;
}

h5 {
  font-size: 18px;
  color: #333;
}

#current-time {
  font-size: 16px;
  color: #007bff;
  font-weight: bold;
}

.table {
  padding: 20px;
}

.category-table {
  width: 100%;
  border-collapse: collapse;
  overflow-x: auto;
  background: #f7f7f7;
  /* Màu nền bảng */
  box-shadow: 0 4px 8px 5px rgba(0, 0, 24, 0.8);
  /* Đổ bóng */
}

.category-table th,
.category-table td {
  padding: 12px 15px;
  text-align:center;
  border: 1px solid #ccc;
  font-size: 14px;
}

/* CSS cho các dòng chẵn */
.category-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* CSS cho các dòng khi hover */
.category-table tbody tr:hover {
  background-color: #e6e6e6;
}

.category-table th {
  background-color: #e1e1e1;
  font-weight: bold;
}





.category-table .action-links a {
  display: inline-block;
  margin-right: 5px;
  color: #fff;
  padding: 8px 12px;
  text-decoration: none;
  border-radius: 4px;
  font-size: 12px;
}



.product-image img {
  width: 100px;
  /* Đặt kích thước hình ảnh */
  height: 100px;
  /* Căn chỉnh chiều cao tự động */
  display: block;
  /* Hiển thị hình ảnh dạng khối */
  margin: 0 auto;
  /* Căn giữa hình ảnh */
}

.action-links .btn-sua {
  background-color: #007bff;

}

.action-links .btn-xoa {
  background-color: #dc3545;

}


.action-links .btn-sua:hover {
  background-color: #0056b3;
}


.action-links .btn-xoa:hover {
  background-color: #c82333;

}

/* CSS cho trạng thái "Chưa kích hoạt" */
.status-inactive {
  color: red;
  font-weight: 600;
}

/* CSS cho trạng thái "Đã kích hoạt" */
.status-active {
  color: green;

  font-weight: 600;

}

/* CSS cho trạng thái không hợp lệ (nếu có) */
.status-invalid {
  color: orange;
}

/* CSS cho vai trò "admin" */
.role-admin {
  font-weight: 500;
}

/* CSS cho vai trò "người dùng" */
.role-user {
  font-weight: 200;

}

@media (max-width: 768px) {
  .category-table {
      overflow-x: scroll;
  }
}

/* end table view admin */
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">Admin</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../index.php" class="custom-link" id="link1">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $viewURL; ?>/view/productList.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Đơn hàng</span>
                </a>
            </li>
            <!-- <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Làm 1 gậy</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-coin-stack"></i>
                    <span class="links_name">18+</span>
                </a>
            </li> -->
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-book-alt"></i>
                    <span class="links_name">Tổng đơn hàng</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $viewURL; ?> /view/users.php">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Người dùng</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-message"></i>
                    <span class="links_name">Bình luận</span>
                </a>
            </li>
            <li>
                <a href="#" class="custom-link" id="link1">
                    <i class="bx bx-heart"></i>
                    <span class="links_name">Favrorites</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Cài đặt</span>
                </a>
            </li>
            <li class="log_out">
                <a href="<?php echo $SITE_URL; ?>/tai-khoan/logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <script>


    </script>