<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
.menu-chucnang {
    display: flex;
    justify-content: space-between;
    padding: 20px;


}

.menu-left {
    display: flex;

}


.add-category {
    margin-right: 10px;

}

.add-links {
    background-color: #007bff;
    color: #fff;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 4px;

}

#xuat-excel {
    background-color: #642de9;
    transition: background-color 0.9s;

}

#xuat-excel:hover {
    background-color: #34225f;
    /* Màu nền hover mờ hơn */

}

#xuat-pdf {
    background-color: #e58782;
    transition: background-color 0.9s;
}

#xuat-pdf:hover {
    background-color: #915652;
    /* Màu nền hover mờ hơn */
}

#In {
    background-color: #128f89;
    transition: background-color 0.9s;
}

#In:hover {
    background-color: #2b514f;
    /* Màu nền hover mờ hơn */
}

.add-links:hover {
    background-color: #0056b3;


}

.fas {
    margin-right: 5px;
    /* Khoảng cách giữa biểu tượng và chữ "Thêm" */
    color: #1ee124;
}

h5 {
    font-size: 18px;
    color: #333;
}

#current-time {
    font-size: 16px;
    color: #007bff;
    font-weight: bold;
}

.table {
    padding: 20px;
}

.category-table {
    width: 100%;
    border-collapse: collapse;
    overflow-x: auto;
    background: #f7f7f7;
    /* Màu nền bảng */
    box-shadow: 0 4px 8px 5px rgba(0, 0, 24, 0.8);
    /* Đổ bóng */
}

.category-table th,
.category-table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ccc;
    font-size: 14px;
}

.category-table th {
    background-color: #f8f8f8;
    font-weight: bold;
}

.category-table td {
    background-color: #fff;
}

.category-table .action-links a {
    display: inline-block;
    margin-right: 5px;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 12px;
}



.product-image img {
    width: 100px;
    /* Đặt kích thước hình ảnh */
    height: 100px;
    /* Căn chỉnh chiều cao tự động */
    display: block;
    /* Hiển thị hình ảnh dạng khối */
    margin: 0 auto;
    /* Căn giữa hình ảnh */
}

.action-links .btn-sua {
    background-color: #007bff;

}

.action-links .btn-xoa {
    background-color: #dc3545;

}


.action-links .btn-sua:hover {
    background-color: #0056b3;
}


.action-links .btn-xoa:hover {
    background-color: #c82333;

}

@media (max-width: 768px) {
    .category-table {
        overflow-x: scroll;
    }
}
</style>



<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

$products = getAllProducts();

?>

<h2 class="title">Danh sách sản phẩm</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addProduct.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-excel"><i
                    class="fas fa-file-excel"></i>
                Xuất Excel</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-pdf"><i class="fas fa-file-pdf"></i>
                Xuất PDF</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="In"><i class="fas fa-print"></i>In dữ
                liệu</a></h4>
        <h4 class="add-category"><a href="#" onclick="confirmDelete()" class="add-links" id="In"><i
                    class="fas fa-print"></i>Xóa All
            </a></h4>


    </div>
    <div class="menu-right">
        <h5>Thời gian hiện tại: <span id="current-time"></span></h5>

    </div>
</div>
<div class="table">
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
                <td>
                    <?php echo $product['id']; ?>
                </td>
                <td>
                    <?php echo $product['name']; ?>
                </td>
                <td>
                    <?php echo $product['price']; ?>
                </td>
                <td>
                    <div class="product-image">
                        <?php
                    $images = getProductImages($product['id']);
                    foreach ($images as $image) {
                        if (strpos($image['image_url'], 'http') === 0) {
                            echo "<img src='" . $image['image_url'] . "' alt='Product Image' class='product-image'>";
                        }else {
                            echo "<img src='../uploads/" . $image['image_url'] . "' alt='Product Image' class='product-image'>";
                        }
                    }
                    ?>
                    </div>
                </td>
                <td class="action-links">
                    <a href="editProduct.php?id=<?php echo $product['id']; ?>" class="btn-sua">Sửa</a>
                    <a href="../controller/deleteProduct.php?id=<?php echo $product['id']; ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"
                        class="btn-xoa">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function confirmDelete() {
    if (confirm('Bạn có chắc muốn xóa tất cả sản phẩm?')) {
        window.location.href = '<?php echo $controller;?>/admin/deleteAllProducts.php';
    }
}
</script>



<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->