<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../../../assets/css/grid.css">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <title>Document</title>
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
        require 'layout/nav.php';
    ?>

    <?php
        require 'layout/slider.php';
    ?>
    </header>

    <div class="container">
        <div class="container__popular">
            <h1 class="container__popular-text">SẢN PHẨM NỔI BẬT</h1>
        </div>

        <div class="container__popular-list">
            <div class="grid wide">
                <div class="row slider-popular">
                    <?php
                    require 'layout/top10_products.php';
                ?>
                </div>
            </div>
        </div>

        <div class="container__handpicked">
            <h1 class="container__handpicked-text">Handpicked</h1>
        </div>

        <div class="container__banner">
            <img class="container__banner-img"
                src="../../.././assets/images/banner/1920x480_c677982d17ad4025943fa8abdf04b184 1.png" alt="">
        </div>

        <div class="container__product">
            <div class="container__product-text">
                <h1 class="container__popular-text">DANH SÁCH SẢN PHẨM</h1>
            </div>
            <div class="container__product-list container__popular-list">
                <div class="grid wide">
                    <div class="row">
                        <?php
                                require 'layout/products.php';
                            ?>
                    </div>
                </div>
            </div>
        </div>



        <style>
        .container__page {
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container__page-list {
            max-width: 30%;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            background-color: aliceblue;
        }

        .container__page-item {
            padding: 0 10px;
            border: 1px salmonblue solid;
            width: 40px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
        }

        .container__page-item.active {
            background-color: aqua;
        }

        .container__page-link {
            text-decoration: none;
            font-size: 18px;
        }
        </style>
        <div class="container__page">
            <ul class="container__page-list">
                <li class="container__page-item">
                    <a class="container__page-link" href="">
                        <i class="container__page-icon fa-solid fa-chevron-left"></i>
                    </a>
                </li>
                <li class="container__page-item active">
                    <a class="container__page-link" href="">1</a>
                </li>
                <li class="container__page-item">
                    <a class="container__page-link" href="">2</a>
                </li>
                <li class="container__page-item">
                    <a class="container__page-link" href="">3</a>
                </li>
                <li class="container__page-item">
                    <a class="container__page-link" href="">4</a>
                </li>
                <li class="container__page-item">
                    <a class="container__page-link" href="">5</a>
                </li>
                <li class="container__page-item">
                    <a class="container__page-link" href="">
                        <i class="container__page-icon fa-solid fa-chevron-right"></i>
                    </a>
                </li>

            </ul>
        </div>

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
                                <img class="footer_item-logo" src="../../content/images/logos/image0.png" alt="">
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

    </footer>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../../../assets/js/slider.js"></script>
</body>

</html>