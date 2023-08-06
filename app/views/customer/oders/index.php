<?php 

require_once '../../../../global.php';
require_once '../../../models/DAO/oders.php';
require_once '../../../models/DAO/products.php';
require_once  '../../../models/DAO/connect.php';
if(!isset($_SESSION['data-cart'])){
            echo 'Vui lòng không truy cập bằng đường dẫn trực tiếp';
            exit();
        }
$_SESSION['data-cart']
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= $ASSET_URL ?>/images/logos/Main Logo.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php
        require_once './layout.php';
    ?>
</body>

</html>