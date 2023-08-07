<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php'); ?>
<!doctype html>
<html lang="vi">
  <head>
    <!-- <script src="../assets/js/color-modes.js"></script> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Chi tiết sản phẩm </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Bellota:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      html{
        font-family: 'Bellota';
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
      .container > .row  > .col-md-6 > .row  {
        height:450px;
        
      }
      .container > .row  > .col-md-6 > .row > .col {
        justify-content: space-evenly;
      }
      .product_img{
        width: 400px;
        height:300px;
      }
      .product_img-item {
        width: 400px;
        height: 300px;
      }
      .pro-end > .btn-solid {
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
      .pro-end > .btn-tined {
        flex-direction: row;
        position: relative;
        overflow: visible;
        outline: 0;
        background: rgba(255,87,34,.1);
        background: ;
        color: #11;
        border: 1px solid #ee4d2d;
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.03);
        min-width: 80px ;
        max-width: 250px;
        font-size: 16px;
        height: 48px;
        padding: 0 20px;
      }
      .pro-so_luong > .pro-so_luong-main {
        display: flex;
        align-items: center;
        visibility: visible;
        color: #757575;
    }
    .pro-so_luong > .pro-so_luong-top {
        margin-right: 40px ;
    }
    .pro-so_luong {
        display: flex;
        align-items: center;
        visibility: visible;
    }
    .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 > .pro-so_luong-main-3 {
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
        transition: background-color .1s cubic-bezier(.4,0,.6,1);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0,0,0,.8);
        width: 32px;
        height: 32px;
    }
    .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 > .pro-so_luong-main-4{
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
        transition: background-color .1s cubic-bezier(.4,0,.6,1);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0,0,0,.8);
    }
    .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 > .pro-so_luong-main-5 {
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
        transition: background-color .1s cubic-bezier(.4,0,.6,1);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0,0,0,.8);
        width: 32px;
        height: 32px;
        -webkit-appearance: button;
    }
    .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 {
        display: flex;
        align-items: center;
        background: #fff;
        visibility: visible;
    }
    .pro-loai {
        display:flex;
        visibility: visible;
    }
    .pro-loai > .name-loai{
        margin-right: 10px;
        width: 110px;
        text-transform: capitalize;
        flex-shrink: 0;
    }
    .pro-loai > .pro-loai-main {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
    .pro-loai > .pro-loai-main > .product-variation{
        overflow: visible;
        cursor: pointer;
        min-width: 5rem;
        min-height: 2.125rem;
        box-sizing: border-box;
        padding: 0.25rem 0.75rem;
        margin: 0 8px 8px 0;
        color: rgba(0,0,0,.8);
        text-align: left;
        border-radius: 2px;
        border: 1px solid rgba(0,0,0,.09);
        position: relative;
        background: #fff;
        outline: 0;
        word-break: break-word;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .pro-giam_gia{
        display: flex;
        align-items: center;
        width: 100%;
        visibility: visible;
        margin-top: 10px ;
    }
    .pro-giam_gia  > .mini-vouchers-laurel{
        color: green;
        width: 110px;
        text-transform: capitalize;
        flex-shrink: 0;
        margin-right: 10px;
    }
    .pro-giam_gia  > .mini-vouchers{
        position: relative;
        margin-right: 0.625rem;
        cursor: default;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        background: rgba(208,1,27,.08);
        padding: 3px 7px;
        border: 0;
        white-space: nowrap;
        color: #ee4d2d;
    }
    .row > .col-md-8 > .blog-pagination {
      flex-wrap: wrap;
      flex-direction: row;
    }
    .product_price-new {
      display: flex;
    } 
    .product_price-new > h4 {
      margin-left:5px;
    }
    .product_price {
      margin : 0;
    }
    main > .main-right > .main-right-top10{
        display: flex; 
        flex-direction: column
    }
    
    /* .sp_noi_bat{
        display:flex;
        flex-direction: row;
        flex-wrap: wrap;
        margin : 10px ;
    } */
    .sp_noi_bat{
      display: grid;
      grid-template-columns: auto auto;
    }
    
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <?php 
      require_once "../../../../models/DAO/products.php"; 
      require_once "../../../../models/DAO/connect.php";
      require_once '../../../../../global.php';
    ?>
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
<main class="container">
  <?php 
    $id=$_GET['id'];
    $rows= hang_hoa_select_by_img_id($id);
    ?>
  <?php
        foreach ($rows as $row) {
    ?>  
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" >
        <img src="<?php echo $row['image_url']?>" alt="" with="500px" height="500px">
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" >
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success-emphasis"><?php echo $row['name']; ?></strong>
            <div class="product_price product_price-new">
                <h4>Giá : </h4>
                <h4><?php echo number_format($row['price']) . " " . "₫"; ?></h4>
                <div class="product_price product_price-old">
                        <h4> <?php echo $row['sale_price']; ?>  </h4> 
                </div>
            </div>
              
                <div class="pro-giam_gia">
                            <div class="mini-vouchers-laurel">Mã giảm giá của shop</div>
                            <?php
                                $coupons = hang_hoa_select_coupon();
                            ?>
                            <?php
                                foreach($coupons as $coupon){
                            ?>
                            <div class="mini-vouchers"><?php echo $coupon['code']; ?>:<?php echo $coupon['value']; ?><?php echo $coupon['type']; ?></div>
                            <?php
                                }
                            ?>
                    </div>
          <div class="mb-1 text-body-secondary">
          <div class="pro-loai" style="margin-bottom: 8px; align-items: baseline;">
                        <label class="name-loai">Phân loại</label>
                        <div class="pro-loai-main" >
                            <?php $cate_id = $row['cate_id']; ?>
                            <?php 
                                $sizes = hang_hoa_select_by_loai($cate_id);
                            ?>
                            <?php
                                foreach ($sizes as $size) {
                                    if ($size['has_size']==1 && $cate_id==1){
                                        // $sql = "SELECT * FROM size where size_cate = 0";
                                        $ss = hang_hoa_select_by_name_loai_1();
                                            foreach ($ss as $s) {?>
                                                <button class="product-variation" ><?php echo $s['name_size'];?></button>
                                        <?php
                                        }
                                    }else if ($size['has_size']==1 && $cate_id==2){
                                        // $sql = "SELECT * FROM size where size_cate = 1";
                                        $aa = hang_hoa_select_by_name_loai_2();
                                            foreach ($aa as $a) {?>
                                                <button class="product-variation" ><?php echo $a['name_size'];?></button>
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
          </div>
                <div class="pro-so_luong">
                        <div class="pro-so_luong-top" >Số lượng</div>
                        <div class="pro-so_luong-main" >
                            <div class="pro-so_luong-main-1" style="margin-right: 15px;">
                                <div class="product-quantity">
                                    <button class="decrease-btn">-</button>
                                    <input type="number" min="1" value="1" class="quantity-input">
                                    <button class="increase-btn">+</button>
                                </div>
                            </div>
                            <div>
                              <p class="mb-auto"><?php echo $row['quantity']?> sẩn phẩm có sẵn </p>
                            </div>
                        </div>
                </div>
                <div class="pro-end">
                <button type="button" class="btn-tined">Thêm Vào Giỏ Hàng</button>
                <button type="button" class="btn-solid">Mua</button>
            </div>   
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Chi tiết
      </h3>

      <article class="blog-post">
        
      </article>

      <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">Mô tả :</h2>
        <blockquote>
          <p><?php echo $row['decsription']?></p>
        </blockquote>
      </article>

      <article class="blog-post">
          <h2 class="display-5 link-body-emphasis mb-1">Bình luận</h2>
            <?php
                require '../comment.php';
            ?>
      </article>
      
      <div class="container__popular">
        <h1 class="container__popular-text">SẢN PHẨM NỔi BẬT</h1>
      </div>
      <div class="container__popular-list">
        <div class="grid wide">
            <div class="sp_noi_bat">
        <?php 
            $result = hang_hoa_select_outstanding();
        ?>
        <?php foreach($result as $key => $value){
                if ($value['product_id']!=$id){
        ?>
        <div class="col l-3" style="max-width: 96%;">
            <div class="product_item">
                <div class="product_img">
                <a href="index.php?id=<?=$value['product_id']?>"><img src="<?php echo $value['image_url']?>" alt="" class="product_img-item"></a>
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
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-body-tertiary rounded">
          <h4 class="fst-italic">Giới thiệu</h4>
          <p class="mb-0">Chào mừng bạn đến với FASHIONHUB.Với những sản phẩm tuyệt vời và phù hợp với mọi lứa tuổi</p>
        </div>

        <div>
          <h4 class="fst-italic">Top sản phẩm cùng loại</h4>
          <ul class="list-unstyled">
            
            <?php $cate_id = $row['cate_id'];$id=$_GET['id']; ?>
                <?php 
                    $result = hang_hoa_select_by_cung_loai($cate_id);
                ?>
               <?php foreach($result as $key => $value){
                    if ($value['product_id']!=$id){
                    ?>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
              </a>
                <div class="product_img">
                        <a href="index.php?id=<?=$value['product_id']?>"><img src="<?php echo $value['image_url']?>" alt="" class="product_img-item" ></a>
                        <div class="product_cart">
                        <button class="product_btn product_btn-buy">Mua Ngay </button>
                        <button class="product_btn product_btn-add_cart">Thêm Giỏ Hàng </button>
                    </div>
                </div>
                <div class="col-lg-8">
                  <h6 class="mb-0"><?php echo $value['name']; ?></h6>
                  <small class="text-body-secondary"><?php echo number_format($value['price']) . " " . "₫"; ?></small>
                </div>
            </li>
            <?php }
                }?>
          </ul>
        </div>

        

       
      </div>
    </div>
  </div>

</main>

<footer class="">
    <?php
        require '../../layout/footer.php';
    ?>
</footer>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?=$ASSET_URL?>/js/slider.js"></script>
    <script src="<?=$ASSET_URL?>/js/page.js"></script>
</html>
