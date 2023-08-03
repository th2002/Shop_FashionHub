<!-- Day la menu -->
<nav>
    <div class="nav__left">
        <ul class="nav__page-list">
            <li class="nav__page-item">
                <a href="../home" class="nav__page-link">Trang Chủ</a>
            </li>
            <li class="nav__page-item">
                <a href="home" class="nav__page-link">Liên Hệ</a>
            </li>
            <li class="nav__page-item">
                <a href="home" class="nav__page-link">Giới Thiệu</a>
            </li>
            <li class="nav__page-item">
                <a href="#container__grid_img" onclick="scrollToDiv(event)" class="nav__page-link">Danh mục</a>
            </li>
        </ul>
    </div>
    <div class="nav__center">
        <div class="nav_logo">
<<<<<<< HEAD
            <img src="<?=$ASSET_URL?>/images/logos/FhashionHub2-removebg-preview.png" alt="" class="nav_logo-img">
=======
            <img src="<?= $ASSET_URL ?>/images/logos/FashionHub-removebg-preview.png" alt="" class="nav_logo-img">
>>>>>>> sub_main2
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
                                if(isset($_SESSION['data-cart'])){
                                    echo $_SESSION['data-cart']['totalQuantity'];
                                }else{
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
                        include 'view_cart.php'
                    ?>

                </ul>
<<<<<<< HEAD
               <a class="nav_cart-btn" style="text-decoration: none; color: #333;" href="../layout/cart.php">Xem Giỏ Hàng</a>
=======
                <a class="nav_cart-btn" style="text-decoration: none; color: #333;" href="../layout/cart.php">Xem Giỏ
                    Hàng</a>
>>>>>>> sub_main2
            </div>
        </div>
        <div class="nav__acount">
            <div class="nav_no-acount">
                <a href="">Đăng Ký</a>
                <a href="">Đăng Nhập</a>
            </div>

            <?php if (isset($_SESSION['user_fullname'])) : ?>
            <div class="nav__acounted display-item">
                <a href="<?php echo $SITE_URL; ?>/page_user/index.php" style="color: black;">
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