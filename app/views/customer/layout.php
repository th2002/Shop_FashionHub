<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/grid.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/app.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/page-user.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/toast.css">
    <link rel="shortcut icon" href="<?=$ASSET_URL?>/images/logos/Main Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Shop FashionHub</title>

    <style>
    /* CSS cho nút cuộn lên đầu */
    .scroll-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        cursor: pointer;
        background-color: gray;
        z-index: 999;
        color: white;
        padding: 10px;
        border-radius: 50%;
        height: 80px;
        width: 80px;
    }

    .scroll-to-top i {
        display: flex !important;
        line-height: 60px;
        justify-content: center;
    }
    </style>
</head>

<body>
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
    </div>

    <?php
        require_once '../layout/nav.php';
    ?>


    </header>

    <div>
        <?php
        require_once '../layout/slider.php';
        ?>
    </div>

    <div>
        <?php
        require_once '../home/home-page.php';
        ?>
    </div>

    <div class="scroll-to-top" onclick="scrollToTop()">
        <i class="fa-solid fa-arrow-up fa-2xl"></i>
    </div>

    <footer>
        <div class="row">
            <div class="col l-3">
                <div class="footer_item">
                    <div class="footer_item-head">
                        <h3>THÔNG TIN</h3>
                        <ul class="footer_item-list">
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Giới Thiệu Maison</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Hệ Thống Cửa Hàng</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Tuyển Dụng</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Thông Tin Liên Hệ</a>
                            </li>
                            <li class="footer_item-des">
                                <img class="footer_item-logo" src="<?=$ASSET_URL?>/images/logos/image0.png" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="footer_item">
                    <div class="footer_item-head">
                        <h3>TRỢ GIÚP</h3>
                        <ul class="footer_item-list">
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Phương Thức Thanh Toán</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Chính Sách Giao Hàng</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Chính Sách Mua Hàng</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Chính Sách Đổi Trả</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Chính Sách Bảo Hành</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Chính Sách Bảo Mật</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="footer_item">
                    <div class="footer_item-head">
                        <h3>THANH TOÁN</h3>
                        <ul class="footer_item-list">
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Visa / Mastercard / JCB</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">HATM / Internet Banking</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Quét Mã QR</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Mua Trước Trả Sau</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Ví Điện Tử</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Thanh Toán Khi Nhận Hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="footer_item">
                    <div class="footer_item-head">
                        <h3>Giao Hàng</h3>
                        <ul class="footer_item-list">
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Giao Hàng Tiêu Chuẩn</a>
                            </li>
                            <li class="footer_item-des">
                                <a href="" class="footer_item-link">Maison NOW</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <p>© Copyright 2020 MAISON RETAIL MANAGEMENT INTERNATIONAL CORPORATION. All rights reserved</p>
    </footer>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?=$ASSET_URL?>/js/slider.js"></script>
    <script src="<?=$ASSET_URL?>/js/page.js"></script>
    <script src="<?=$ASSET_URL?>/js/cart.js"></script>
    <script src="<?=$ASSET_URL?>/js/toast.js"></script>

    <!-- Scroll trang web về đầu trang -->
    <script>
    function scrollToTop() {
        // Cuộn trang web về đầu trang với hiệu ứng mượt mà
        window.scrollTo({
            top: 0,
            behavior: "smooth" // Thêm hiệu ứng cuộn mượt
        });
    }

    // Hiển thị hoặc ẩn nút cuộn lên đầu dựa vào vị trí cuộn của trang
    window.addEventListener("scroll", function() {
        const scrollToTopButton = document.querySelector(".scroll-to-top");
        if (window.pageYOffset > 100) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    });
    </script>

    <!-- Scroll trang web đến phần danh mục khi click <a>Danh mục</a> -->
    <script>
    function scrollToDiv(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

        const divToScroll = document.getElementById("container__grid_img");
        const offsetTop = divToScroll.getBoundingClientRect().top;
        const navHeight = 0; // Thay đổi giá trị này tùy thuộc vào chiều cao của menu navigation (nếu có)

        // Cuộn đến vị trí của divToScroll với hiệu ứng mượt mà
        window.scrollTo({
            top: offsetTop + window.scrollY - navHeight,
            behavior: "smooth" // Thêm hiệu ứng cuộn mượt
        });
    }
    </script>
</body>

</html>