<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/grid.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/app.css">
    <link rel="stylesheet" href="<?=$ASSET_URL?>/css/toast.css">
    <link rel="shortcut icon" href="<?=$ASSET_URL?>/images/logos/Main Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Shop FashionHub</title>
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

    <?php
        require_once '../layout/slider.php';
    ?>
    </header>

    <?php
        require_once '../home/home-page.php';
    ?>
    <?php
        require_once '../layout/footer.php';
    ?>
 
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?=$ASSET_URL?>/js/slider.js"></script>
    <script src="<?=$ASSET_URL?>/js/page.js"></script>
    <script src="<?=$ASSET_URL?>/js/cart.js"></script>
    <script type="module" src="<?=$ASSET_URL?>/js/toast.js"></script>
    <script type="module" src="<?=$ASSET_URL?>/js/chat.js"></script>
</body>

</html>