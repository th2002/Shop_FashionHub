<!-- Day la chi tiet san pham -->
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/app/models/DAO/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/app/models/DAO/products.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/grid.css">
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/app.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/page-user.css">
    <link rel="shortcut icon" href="<?= $ASSET_URL ?>/images/logos/Main Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <title>Shop FashionHub</title>
</head>
<style>
header {
    display: flex;
    margin-top: 30px;
    background: #fff;
    border-radius: 3px;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
    margin-right: auto;
    margin-left: auto;
    width: 1200px;
}

header>.header-left {
    flex: 1;
    height: 500px;
    margin-left: 10px;
}

header>.header-left>.header-left-img>.header-left-img-pro>.header-left-img-main>img {
    width: 400px;
    height: 400px;
}

header>.header-left>.header-left-img>.header-left-img-pro>.header-left-img-slider>img {
    width: 50px;
    height: 50px;
}

header>.header-right {
    width: 100%;
    flex: 2;
    height: 500px;
    margin-right: 10px;
    padding-left: 30px;
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;
    box-sizing: border-box;
    visibility: visible;
    justify-content: space-around
}

header>.header-right>.pro-name>span {
    display: -webkit-box;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    font-weight: 900;
    margin: 0;
    vertical-align: sub;
    max-height: 3rem;
    line-height: 1.5rem;
    overflow: hidden;
    max-width: 41.5625rem;
    font-size: 1.25rem;
    overflow-wrap: break-word;
}

header>.header-right>.pro-gia {
    font-size: 1.875rem;
    font-weight: 500;
    color: red;
    display: flex;
    flex-wrap: wrap;
    width: 625px;
    align-items: center;
    visibility: visible;
}

header>.header-right>.pro-gia>.product_price {
    font-size: 1rem;
    text-decoration: line-through;
    color: #929292;
    margin-right: 10px;
    visibility: visible;
}

header>.header-right>.pro-giua>.pro-giua-giua {
    position: relative;
    margin-top: -4px;
    margin-bottom: 25px;
    margin-left: -4px;
    padding: 4px;
    color: #222;
    display: flex;
    flex-direction: column;
    visibility: visible;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-giam_gia {
    display: flex;
    align-items: center;
    width: 100%;
    visibility: visible;
    margin-top: 10px;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-loai {
    display: flex;
    visibility: visible;
    margin-top: 10px;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-loai>.name-loai {
    margin-right: 10px;
    width: 110px;
    text-transform: capitalize;
    flex-shrink: 0;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-loai>.pro-loai-main {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-loai>.pro-loai-main>.product-variation {
    overflow: visible;
    cursor: pointer;
    min-width: 5rem;
    min-height: 2.125rem;
    box-sizing: border-box;
    padding: 0.25rem 0.75rem;
    margin: 0 8px 8px 0;
    color: rgba(0, 0, 0, .8);
    text-align: left;
    border-radius: 2px;
    border: 1px solid rgba(0, 0, 0, .09);
    position: relative;
    background: #fff;
    outline: 0;
    word-break: break-word;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-giam_gia>.mini-vouchers-laurel {
    color: green;
    width: 110px;
    text-transform: capitalize;
    flex-shrink: 0;
    margin-right: 10px;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-giam_gia>.mini-vouchers {
    position: relative;
    margin-right: 0.625rem;
    cursor: default;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
    background: rgba(208, 1, 27, .08);
    padding: 3px 7px;
    border: 0;
    white-space: nowrap;
    color: #ee4d2d;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong>.pro-so_luong-main {
    display: flex;
    align-items: center;
    visibility: visible;
    color: #757575;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong>.pro-so_luong-top {
    margin-right: 40px;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong {
    display: flex;
    align-items: center;
    visibility: visible;
    margin-top: 10px;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong>.pro-so_luong-main>.pro-so_luong-main-1>.pro-so_luong-main-2>.pro-so_luong-main-3 {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    outline: none;
    cursor: pointer;
    border: 0;
    font-size: .875rem;
    font-weight: 300;
    line-height: 1;
    letter-spacing: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
    border: 1px solid rgba(0, 0, 0, .09);
    border-radius: 2px;
    background: transparent;
    color: rgba(0, 0, 0, .8);
    width: 32px;
    height: 32px;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong>.pro-so_luong-main>.pro-so_luong-main-1>.pro-so_luong-main-2>.pro-so_luong-main-4 {
    width: 50px;
    height: 32px;
    border-left: 0;
    border-right: 0;
    font-size: 16px;
    font-weight: 400;
    box-sizing: border-box;
    text-align: center;
    cursor: text;
    border-radius: 0;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
    border: 0;
    font-size: .875rem;
    font-weight: 300;
    line-height: 1;
    letter-spacing: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
    border: 1px solid rgba(0, 0, 0, .09);
    border-radius: 2px;
    background: transparent;
    color: rgba(0, 0, 0, .8);
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong>.pro-so_luong-main>.pro-so_luong-main-1>.pro-so_luong-main-2>.pro-so_luong-main-5 {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    outline: none;
    cursor: pointer;
    border: 0;
    font-size: .875rem;
    font-weight: 300;
    line-height: 1;
    letter-spacing: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
    border: 1px solid rgba(0, 0, 0, .09);
    border-radius: 2px;
    background: transparent;
    color: rgba(0, 0, 0, .8);
    width: 32px;
    height: 32px;
    -webkit-appearance: button;
}

header>.header-right>.pro-giua>.pro-giua-giua>.pro-so_luong>.pro-so_luong-main>.pro-so_luong-main-1>.pro-so_luong-main-2 {
    display: flex;
    align-items: center;
    background: #fff;
    visibility: visible;
}

header>.header-right>.pro-end {
    display: flex;
    visibility: visible;
}

header>.header-right>.pro-end>.btn-solid {
    color: #fff;
    position: relative;
    overflow: visible;
    outline: 0;
    background: #ee4d2d;
    min-width: 80px;
    max-width: 250px;
    font-size: 16px;
    height: 48px;
    padding: 0 20px;
}

header>.header-right>.pro-end>.btn-tined {
    flex-direction: row;
    position: relative;
    overflow: visible;
    outline: 0;
    background: rgba(255, 87, 34, .1);
    border: 1px solid #ee4d2d;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .03);
    min-width: 80px;
    max-width: 250px;
    font-size: 16px;
    height: 48px;
    padding: 0 20px;
}

main {
    width: 100%;
    display: flex;
    margin-top: 30px;
}

main>.main-left {
    flex: 2;
    margin-left: 50px;
    margin-right: 10px;
    border: 1px solid #ee4d2d;
    border-radius: 5px;
}

main>.main-left>.mo_ta {
    margin: 10px;
}

main>.main-right {
    flex: 0.5;
    height: 500px;
    margin-right: 50px;
}

main>.main-right>h3 {
    text-align: center;
    margin: 10px;
}

main>.main-right>.main-right-top10 {
    display: flex;
    flex-direction: column
}

main>.main-left>.them>.sp_noi_bat {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    margin: 10px;
}

main>.main-left>.them>.sp_noi_bat>.col>.product_item {
    width: 220px;
    margin: 10px;
    padding: auto;
    border: 1px solid black;
}
</style>


<body>
    <div id="wrapper">

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



    <header>

        <?php
        $id = $_GET['id'];
        // $conn = connect();
        // $sql = "SELECT * FROM products where id = $id";
        // $sql = "SELECT b.* , h.image_url FROM products b JOIN product_images h ON h.product_id=b.id WHERE b.id=$id ";
        // $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id where products.id=$id ;";
        // $rows = mysqli_query($conn,$sql);
        $rows = hang_hoa_select_by_img_id($id);
        ?>
        <?php
        foreach ($rows as $row) {
        ?>
        <div class="header-left">
            <div class="header-left-img">
                <div class="header-left-img-pro">
                    <div class="header-left-img-main">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                    </div>
                    <div class="header-left-img-slider">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                        <img src="<?php echo $row['image_url'] ?>" alt="" class="product_img-item">
                    </div>
                </div>
            </div>
        </div>
        <div class="header-right">
            <div class="pro-name">
                <span><?php echo $row['name']; ?></span>
            </div>
            <div class="pro-gia">
                <div class="product_price product_price-old">
                    <h4> <?php echo $row['sale_price']; ?> </h4>
                </div>
                <h4> <?php echo $row['price']; ?> đ </h4>
            </div>
            <div class="pro-giua">
                <div class="pro-giua-giua">
                    <div class="pro-giam_gia">
                        <div class="mini-vouchers-laurel">Mã giảm giá của shop</div>
                        <?php
                            $coupons = hang_hoa_select_coupon();
                            ?>
                        <?php
                            foreach ($coupons as $coupon) {
                            ?>
                        <div class="mini-vouchers">
                            <?php echo $coupon['code']; ?>:<?php echo $coupon['value']; ?><?php echo $coupon['type']; ?>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="pro-loai" style="margin-bottom: 8px; align-items: baseline;">
                        <label class="name-loai">Phân loại</label>
                        <div class="pro-loai-main">
                            <?php $cate_id = $row['cate_id']; ?>
                            <?php
                                // $sql = "SELECT * FROM category_product INNER JOIN products ON category_product.id = products.cate_id where category_product.id=$cate_id ;";
                                // $sql = "SELECT  h.*, s.id  FROM  size h join cate_size k join category_product s 
                                // on  k.cate_id = s.id and k.size_id = h.id where s.id=$cate_id ";
                                $sizes = hang_hoa_select_by_loai($cate_id);
                                ?>
                            <?php
                                foreach ($sizes as $size) {
                                    if ($size['has_size'] == 1 && $cate_id == 1) {
                                        // $sql = "SELECT * FROM size where size_cate = 0";
                                        $ss = hang_hoa_select_by_name_loai_1();
                                        foreach ($ss as $s) { ?>
                            <button class="product-variation"><?php echo $s['name_size']; ?></button>
                            <?php
                                        }
                                    } else if ($size['has_size'] == 1 && $cate_id == 2) {
                                        // $sql = "SELECT * FROM size where size_cate = 1";
                                        $aa = hang_hoa_select_by_name_loai_2();
                                        foreach ($aa as $a) { ?>
                            <button class="product-variation"><?php echo $a['name_size']; ?></button>
                            <?php
                                        }
                                    }
                                    ?>

                            <?php
                                    break;
                                }
                                ?>
                        </div>
                    </div>
                    <div class="pro-so_luong">
                        <div class="pro-so_luong-top">Số lượng</div>
                        <div class="pro-so_luong-main">
                            <div class="pro-so_luong-main-1" style="margin-right: 15px;">
                                <div class="product-quantity">
                                    <button class="decrease-btn">-</button>
                                    <input type="number" min="1" value="1" class="quantity-input">
                                    <button class="increase-btn">+</button>
                                </div>
                            </div>
                            <div>
                                <p><?php echo $row['quantity'] ?> sẩn phẩm có sẵn </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pro-end">
                <button type="button" class="btn-tined">Thêm Vào Giỏ Hàng</button>
                <button type="button" class="btn-solid">Mua</button>
            </div>

        </div>
        <?php } ?>
    </header>
    <main>
        <div class="main-left">

            <div class="mo_ta">
                <h3>Mô tả : </h3>
                <i> <?php echo $row['decsription'] ?> </i>
            </div>
            <?php require 'comment.php'; ?>
            <div class="them">
                <h4>Sản phẩm bán chạy</h4>
                <div class="sp_noi_bat">
                    <?php
                    $result = hang_hoa_select_outstanding();
                    ?>
                    <?php foreach ($result as $key => $value) {
                        if ($value['product_id'] != $id) {
                    ?>
                    <div class="col l-3">
                        <div class="product_item">
                            <div class="product_img">
                                <a href="../products/detail.php?id=<?= $value['product_id'] ?>"><img
                                        src="<?php echo $value['image_url'] ?>" alt="" class="product_img-item"></a>
                                <div class="product_cart">
                                    <button class="product_btn product_btn-buy">Mua Ngay </button>
                                    <button class="product_btn product_btn-add_cart">Thêm Giỏ Hàng </button>
                                </div>
                            </div>
                            <div class="product_name">
                                <h4><?php echo $value['name']; ?></h4>
                            </div>
                            <div class="product_price product_price-new">
                                <h4><?php echo number_format($value['price']) . " " . "₫"; ?></h4>
                            </div>

                        </div>
                    </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
        <div class="main-right">
            <h3> Top sản phẩm cùng loại </h3>
            <div class="main-right-top10">

                <?php $cate_id = $row['cate_id'];
                $id = $_GET['id']; ?>
                <?php
                $result = hang_hoa_select_by_cung_loai($cate_id);
                ?>
                <?php foreach ($result as $key => $value) {
                    if ($value['product_id'] != $id) {
                ?>
                <div class="col l-3">
                    <div class="product_item">
                        <div class="product_img">
                            <a href="../products/detail.php?id=<?= $value['product_id'] ?>"><img
                                    src="<?php echo $value['image_url'] ?>" alt="" class="product_img-item"></a>
                            <div class="product_cart">
                                <button class="product_btn product_btn-buy">Mua Ngay </button>
                                <button class="product_btn product_btn-add_cart">Thêm Giỏ Hàng </button>
                            </div>
                        </div>
                        <div class="product_name">
                            <h4><?php echo $value['name']; ?></h4>
                        </div>
                        <div class="product_price product_price-new">
                            <h4><?php echo number_format($value['price']) . " " . "₫"; ?></h4>
                        </div>

                    </div>
                </div>
                <?php }
                } ?>
            </div>
        </div>
    </main>

    <script>
    const decreaseBtn = document.querySelector('.decrease-btn');
    const increaseBtn = document.querySelector('.increase-btn');
    const quantityInput = document.querySelector('.quantity-input');

    decreaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
    </script>

</body>