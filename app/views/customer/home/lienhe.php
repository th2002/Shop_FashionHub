<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php'); ?>
<!DOCTYPE html>
<html>
    <style>
        .container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
}

input, textarea {
  padding: 5px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}
    </style>
<body>
    <?php
  require_once "../../../models/DAO/products.php";
  require_once "../../../models/DAO/connect.php";
  ?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.115.4">
  <title>Liên hệ </title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/grid.css">
  <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/app.css">
  <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/page-user.css">
  <link rel="stylesheet" href="../../../../../assets/css/toast.css">
  <link rel="shortcut icon" href="<?= $ASSET_URL ?>/images/logos/Main Logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
    </header>
    <nav>
      <div class="nav__left">
        <ul class="nav__page-list">
          <li class="nav__page-item">
            <a href="<?= $SITE_URL ?>/home" class="nav__page-link">Trang Chủ</a>
          </li>
          <li class="nav__page-item">
                <a href="<?= $SITE_URL ?>/home/lienhe.php" class="nav__page-link">Liên Hệ</a>
            </li>
            <li class="nav__page-item">
                <a href="<?= $SITE_URL ?>/home/gioithieu/gioithieu.php" class="nav__page-link">Giới Thiệu</a>
            </li>
          <li class="nav__page-item">
            <a href="home?category" class="nav__page-link">Danh mục</a>
            <ul class="submenu">
              <?php
              $result = danh_muc_select_all();
              ?>
              <?php foreach ($result as $key => $value) : ?>
                <li><a href="<?php echo $SITE_URL ?>/cate_products/index.php?id=<?php echo $value['id'] ?>"><?php echo $value['cate_name'] ?></a>
                </li>
              <?php endforeach ?>
            </ul>
          </li>
        </ul>
      </div>
      <div class="nav__center">
        <div class="nav_logo">
          <img src="<?= $ASSET_URL ?>/images/logos/FashionHub-removebg-preview.png" alt="" class="nav_logo-img">
        </div>
      </div>
      <div class="nav__right">
        <div class="nav__seach">
          <i class="navbar_seach-icon fa-solid fa-magnifying-glass"></i>
          <input class="navbar_seach-input" type="text" placeholder="Tìm Kiếm">

        </div>
        <div class="nav__cart">
          <a class="nav__cart-link" href=""><i class="nav__cart-icon fa-solid fa-cart-shopping fa-bounce">
              <div class="nav__cart-quantity">
                <span>
                  <?php
                  if (isset($_SESSION['data-cart'])) {
                    echo $_SESSION['data-cart']['totalQuantity'];
                  } else {
                    echo 0;
                  }
                  ?>

                </span>
              </div>
            </i></a>
          <div class="nav_cart-box">
            <h4 class="nav_cart-heading">Sản Phẩm Đã Thêm</h4>
            <ul class="nav_cart-list">
              <?php
              include '../../layout/view_cart.php';
              ?>

            </ul>
            <a class="nav_cart-btn" style="text-decoration: none; color: #333;" href="../../layout/cart.php">Xem Giỏ
              Hàng</a>
          </div>
        </div>
        <div class="nav__acount">

          <?php if (isset($_SESSION['user_fullname'])) : ?>
            <div class="nav__acounted display-item">
              <a href="<?= $SITE_URL ?>/page_user/form-edit-profile.php" style="color: black;">
                <i class="nav_acounted-icon fa-regular fa-user fa-beat"></i>
              </a>
              <h4 class="nav_acounted-name">Hi, <?php echo $_SESSION['user_fullname']; ?></h4>
              <a href="<?php echo $SITE_URL; ?>/tai-khoan/logout.php">Đăng xuất</a>
            </div>
          <?php else : ?>
            <a class="btn_login" href="<?php echo $SITE_URL; ?>/tai-khoan/login.php">Đăng nhập</a>
          <?php endif; ?>

        </div>
      </div>
    </nav>

  <div class="container">
    
        <?php
                if(!isset($_SESSION['user_id'])){
                    echo '<b class="text-danger">Đăng nhập để liên hệ đến admin </b>';
                    }else{
        ?>
                    <h1>Liên hệ</h1>
                    <form  method="POST">
                    <label for="name">Họ và tên:</label>
                    <input type="text" id="name" name="name" required value="<?php echo $_SESSION['user_fullname']; ?>"> 
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required value="<?php echo $_SESSION['user_email'] ?>" >
                    
                    <label for="message">Nội dung:</label>
                    <textarea id="message" name="message" required></textarea>
                    
                    <input type="submit" value="Gửi">
                    </form>
        <?php 
                    } 
        ?>
        <?php
                if(exist_param("message")){
                    $content=$_POST['message'];  
                    $uer_name=$_SESSION['user_fullname'] ;
                    $email=$_SESSION['user_email'];
                    $customer_id = $_SESSION['user_id'];
                    $create_at = date_format(date_create(), 'Y-m-d');
                    lien_he($uer_name,$email,$content,$create_at);
                }
    ?>
  </div>
</body>
</html>