<!-- Day la menu -->
<nav>
    <div class="nav__left">
        <ul class="nav__page-list">
            <li class="nav__page-item">
                <a href="../home?index" class="nav__page-link">Trang Chủ</a>
            </li>
            <li class="nav__page-item">
                <a href="home?contact" class="nav__page-link">Liên Hệ</a>
            </li>
            <li class="nav__page-item">
                <a href="home?about" class="nav__page-link">Giới Thiệu</a>
            </li>
            <li class="nav__page-item">
                <a href="home?category" class="nav__page-link">Danh mục</a>
            </li>
        </ul>
    </div>
    <div class="nav__center">
        <div class="nav_logo">
            <img src="<?=$ASSET_URL?>/images/logos/FhashionHub2-removebg-preview.png" alt="" class="nav_logo-img">
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
                                                session_start();
                                              // session_destroy();
                                                 if(isset($_SESSION['data-cart'])){
                                                    $arr = $_SESSION['data-cart'];
                                                    $lastElement = end($arr);
                                                    echo $lastElement['quantity_cart'];
                                                }else{
                                                    echo "0";
                                                }
                                            ?>
                        </span>
                    </div>
                </i></a>
            <div class="nav_cart-box">
                <h4 class="nav_cart-heading">Sản Phẩm Đã Thêm
                    <a href=""></a>
                </h4>
                <ul class="nav_cart-list">
                    <?php 
                                    require_once '../../../models/DAO/view_cart.php';
                                ?>
                </ul>
                <button class="nav_cart-btn">Xem Giỏ Hàng</button>
            </div>
        </div>
        <div class="nav__acount">
            <div class="nav_no-acount">
                <a href="">Đăng Ký</a>
                <a href="">Đăng Nhập</a>
            </div>

            <div class="nav__acounted display-item">
                <i class="nav_acounted-icon fa-regular fa-user fa-beat"></i>
                <h4 class="nav_acounted-name">Hi,hoa luu</h4>
                <a href="">Đăng xuất</a>
            </div>
        </div>
    </div>
</nav>