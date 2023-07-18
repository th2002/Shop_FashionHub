<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
    .menu-chucnang{
        display: flex;
        
    }
    .add-category{
        padding: 10px;

    }
    .add-links{
        background-color: #007bff;
        color: #fff;
        font-weight: 500;

        padding:8px 12px;
        border-radius: 4px;
       
    }
    .add-links:hover{
        background-color: #0056b3;

      
    }
    
    .category-table {
        width: 100%;
        border-collapse: collapse;
        overflow-x: auto;
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
        background-color: #007bff;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
    }

    .category-table .action-links a:hover {
        background-color: #0056b3;
    }

    .category-table .action-links a.delete {
        background-color: #dc3545;
    }

    .category-table .action-links a.delete:hover {
        background-color: #c82333;
    }
    
    .product-image img {
        width: 100px; /* Đặt kích thước hình ảnh */
        height: 100px; /* Căn chỉnh chiều cao tự động */
        display: block; /* Hiển thị hình ảnh dạng khối */
        margin: 0 auto; /* Căn giữa hình ảnh */
    }


    @media (max-width: 768px) {
        .category-table {
            overflow-x: scroll;
        }
    }
</style>



<?php
require_once '../models/CategoryModel.php';

$products = getAllProducts();

?>

<h2 class="title">Danh sách sản phẩm</h2>
<div class="menu-chucnang">
<h4 class="add-category"><a href="addProduct.php" class="add-links">Thêm</a></h4>
<h4 class="add-category"><a href="export.php" class="add-links">Xuất Excel</a></h4>
</div>
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
                <td>
                    <a href="editProduct.php?id=<?php echo $product['id']; ?>">Sửa</a>
                    <a href="../controller/deleteProduct.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->