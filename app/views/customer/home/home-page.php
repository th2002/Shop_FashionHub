<div class="container">
    <div id="toast">

    </div>
    <div class="container__popular">
        <h1 class="container__popular-text">SẢN PHẨM NỔI BẬT</h1>
    </div>

    <div class="container__popular-list">
        <div class="grid wide">
            <div class="row slider-popular">
                <?php
                    require_once '../layout/top10_products.php';
                ?>
            </div>
        </div>
    </div>

    <div class="container__popular">
        <h1 class="container__popular-text">SẢN PHẨM GIẢM GIÁ</h1>
    </div>

    <div class="container__popular-list">
        <div class="grid wide">
            <div class="row slider-popular">
                <?php
                    require_once '../layout/sale_products.php';
                ?>
            </div>
        </div>
    </div>

    <div class="container__handpicked">
        <b class="container__handpicked-text">Handpicked</b>
        <strong class="container__trends">Trends</strong>
    </div>


    <div class="container__banner">
        <img loading="lazy" class="container__banner-img"
            src="<?=$ASSET_URL?>/images/banner/1920x480_c677982d17ad4025943fa8abdf04b184 1.png" alt="">
    </div>

    <div class="container__product">
        <div class="container__product-text">
            <h1 class="container__popular-text">DANH SÁCH SẢN PHẨM</h1>
        </div>
        <div class="container__product-list container__popular-list">
            <div class="grid wide">
                <div class="row">
                    <?php
                        require_once '../layout/products.php';            
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

    .container__page-list li {
        padding: 0 10px;
        border: 1px salmonblue solid;
        width: 40px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
    }

    .active {
        background-color: aqua;
    }

    .container__page-link {
        text-decoration: none;
        font-size: 18px;
    }
    </style>
    <div class="container__page">
        <ul class="container__page-list">

        </ul>
    </div>
    <div class="container__grid_img" id="container__grid_img">
        <div class="container__grid_img-row-1">
            <div class="container__grid_img-1">
                <div class="container__grid_img-content-1">
                    <div class="title-content-1">
                        <h1>Trang Phục</h1>
                    </div>
                    <div class="content-content-1">
                        <p>
                            Thoải mái lựa chọn và khẳng định phong cách thời trang sành điệu,
                            cá tính với các item quần áo,
                            đầm váy đến từ các thương hiệu thời trang
                            trong và ngoài nước: Max&Co., MLB, GiGi, Puma,…
                        </p>
                    </div>
                    <div class="btn-bottom">
                        <a>Khám phá</a>
                    </div>
                </div>
            </div>
            <div class="container__grid_img-2">
                <div class="container__grid_img-content-2">
                    <div class="title-content-2">
                        <h1>Giày Dép</h1>
                    </div>
                    <div class="content-content-2">
                        <p>
                            Tôn vinh vóc dáng xinh đẹp của phái nữ
                            với các mẫu thiết kế giày dép thời trang và hiện đại:
                            giày cao gót, giày sandals, giày thể thao,...
                            đến từ các thương hiệu nổi tiếng như Charles & Keith, Pedro, Puma,…
                        </p>
                    </div>
                    <div class="btn-bottom">
                        <a>Khám phá</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container__grid_img-row-2">
            <div class="container__grid_img-3">
                <div class="container__grid_img-content-3">
                    <div class="title-content-3">
                        <h1>Túi xách</h1>
                    </div>
                    <div class="content-content-3">
                        <p>
                            Với kích thước và kiểu dáng đa dạng, đảm bảo mọi tiện ích và phù hợp nhiều đối tượng,
                            các bộ sưu tập đến từ các thương hiệu: Charles & Keith, Pedro, Marhen.J,... sẽ làm thỏa
                            mãn các nàng.
                        </p>
                    </div>
                    <div class="btn-bottom">
                        <a>Khám phá</a>
                    </div>
                </div>
            </div>
            <div class="container__grid_img-4">
                <div class="container__grid_img-content-4">
                    <div class="title-content-4">
                        <h1>Phụ kiện</h1>
                    </div>
                    <div class="content-content-4">
                        <p>
                            Với kho tàng phụ kiện phong phú như mắt kính, trang sức, mũ nón... đến từ các thương
                            hiệu như Charles & Keith, Ted Baker, The Kooples,... sẽ khiến các fashionista mê mẩn và
                            yêu thích.
                        </p>
                    </div>
                    <div class="btn-bottom">
                        <a>Khám phá</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container__title-trademark">
        <strong>
            Thương hiệu
        </strong>
    </div>

    <div class="container__logo">
        <div class="container__logo-logo1">
            <img src="https://file.hstatic.net/1000284478/file/skechers_a3dd17d7f3784683a72a5599b39be2e6.svg" alt="">
        </div>
        <div class="container__logo-logo2">
            <img src="https://file.hstatic.net/1000284478/file/puma_371c0176827c44c2b9ccd94f30ab3b09.svg">
        </div>
        <div class="container__logo-logo3">
            <img src="https://file.hstatic.net/1000284478/file/marhenj_a68996bf794e419891e7400597616f25.svg" alt="">
        </div>
        <div class="container__logo-logo4">
            <img src="https://file.hstatic.net/1000284478/file/converse_934171edd98a4b50b3d4782cc81aed99.svg">
        </div>
        <div class="container__logo-logo5">
            <img src="https://file.hstatic.net/1000284478/file/mujosh_edaa9c20533d45869a4701e02c8205b2.svg">
        </div>
        <div class="container__logo-logo6">
            <img src="https://file.hstatic.net/1000284478/file/pinko_5c1f58d6c2b9482c9d2a8cbf7a279eec.svg">
        </div>
    </div>
</div>