<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

$products = getAllProducts();
?>

<?php

$perPage = 3; // Số lượng sản phẩm hiển thị trên mỗi trang
$totalProducts = getTotalProducts();
$totalPages = ceil($totalProducts / $perPage);

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$page = min($page, $totalPages);

$products = getProductsByPage($page, $perPage);
?>

<!-- Hiển thị bảng sản phẩm -->
<table class="category-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td>
                <div class="product-image">
                    <?php
                    $images = getProductImages($product['id']);
                    foreach ($images as $image) {
                        echo "<img src='../uploads/" . $image['image_url'] . "' alt='Product Image' class='product-image'>";
                    }
                    ?>
                </div>
            </td>
            <td class="action-links">
                <a href="editProduct.php?id=<?php echo $product['id']; ?>" class="btn-sua">Sửa</a>
                <a href="../controller/deleteProduct.php?id=<?php echo $product['id']; ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" class="btn-xoa">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Hiển thị nút phân trang -->
<div class="pagination">
    <?php
    function generatePaginationLinks($currentPage, $totalPages, $adjacentLinks) {
        if ($totalPages <= 1) {
            return;
        }

        $startPage = max(1, $currentPage - $adjacentLinks);
        $endPage = min($totalPages, $currentPage + $adjacentLinks);

        if ($startPage > 1) {
            echo '<a href="?page=1">1</a>';
            if ($startPage > 2) {
                echo '<span>...</span>';
            }
        }

        for ($i = $startPage; $i <= $endPage; $i++) {
            if ($i == $currentPage) {
                echo '<span class="current">' . $i . '</span>';
            } else {
                echo '<a href="javascript:void(0);" onclick="loadProductList(' . $i . ')">' . $i . '</a>';
            }
        }

        if ($endPage < $totalPages) {
            if ($endPage < $totalPages - 1) {
                echo '<span>...</span>';
            }
            echo '<a href="?page=' . $totalPages . '">' . $totalPages . '</a>';
        }
    }

    $adjacentLinks = 2;
    echo generatePaginationLinks($page, $totalPages, $adjacentLinks);
    ?>
</div>