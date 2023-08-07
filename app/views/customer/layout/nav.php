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
                <a href="home?category" class="nav__page-link">Danh mục</a>
                <ul class="submenu">
                    <?php
                        $result = danh_muc_select_all();
                    ?>
                    <?php foreach($result as $key => $value): ?>
                    <li><a
                            href="<?php echo $SITE_URL?>/cate_products/index.php?id=<?php echo $value['id'] ?>"><?php echo $value['cate_name'] ?></a>
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
                <a class="nav_cart-btn" style="text-decoration: none; color: #333;" href="../layout/cart.php">Xem Giỏ
                    Hàng</a>
            </div>
        </div>
        <div class="nav__acount">

            <?php if (isset($_SESSION['user_fullname'])) : ?>
            <div class="nav__acounted display-item">
                <a href="<?=$SITE_URL?>/page_user/form-edit-profile.php" style="color: black;">
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