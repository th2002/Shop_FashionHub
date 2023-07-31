<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a,
    .pagination .current {
        padding: 8px 12px;
        background-color: #f0f0f0;
        margin: 0 5px;
        text-decoration: none;
        color: #333;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination .current {
        background-color: #007bff;
        color: #fff;
    }

    .menu-chucnang {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;

    }

    .menu-left {
        display: flex;
        gap: 20px;
    }

    .menu-right {
        text-align: end;
    }

    .add-category {
        margin: 0;
    }





    /* Responsive styles */
    @media (max-width: 1050px) {
        .menu-left {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 1050px) {
        .menu-left {
            margin-bottom: 10px;
        }

        h5 {
            font-size: 14px;
        }
    }

    .action-links {
        width: 200px;
        /* Đặt chiều rộng cố định, bạn có thể thay đổi giá trị tùy ý */
        margin: 0 auto;
    }

    .action-links a {
        display: block;
        /* Hiển thị hình ảnh dạng khối */
        margin: 0 auto;
        /* Căn giữa hình ảnh */
    }

    .sap-xep {
        display: block;
        width: 200px;
        padding: 20px;
        float: right;
    }

    .sap-xep select {
        font-size: 14px;
        font-weight: 500;
    }
</style>



<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

$products = getAllProducts();

$perPage = 1; // Số lượng sản phẩm hiển thị trên mỗi trang
$totalProducts = getTotalProducts();
$totalPages = ceil($totalProducts / $perPage);

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$page = min($page, $totalPages);

$products = getProductsByPage($page, $perPage);

$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

$products = getSortedProducts($sortOrder);
?>

<h2 class="title">Danh sách sản phẩm</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addProduct.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-excel"><i class="fas fa-file-excel"></i>
                Xuất Excel</a></h4>
        <h4 class="add-category"><a href="export.php?export_pdf" class="add-links" id="xuat-pdf"><i class="fas fa-file-pdf"></i>
                Xuất PDF</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="In"><i class="fas fa-print"></i>In dữ
                liệu</a></h4>
        <h4 class="add-category"><a href="#" onclick="deleteAllProducts()" class="add-links" id="In"><i class="fas fa-print"></i>Xóa All</a></h4>



    </div>
    <div class="menu-right">
        <h5>Thời gian hiện tại: <span id="current-time"></span></h5>


    </div>

</div>
<div class="sap-xep">
    <select name="sort" id="sort" onchange="sortProducts()">
        <option value="desc" <?php if ($sortOrder === 'desc') echo 'selected'; ?>>Mới nhất</option>
        <option value="asc" <?php if ($sortOrder === 'asc') echo 'selected'; ?>>Cũ nhất</option>
    </select>
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
                                echo "<img src='../uploads/" . $image['image_url'] . "' alt='Product Image' class='product-image'>";
                            }
                            ?>
                        </div>
                    </td>
                    <td class="action-links">
                        <a href="editProduct.php?id=<?php echo $product['id']; ?>" class="btn-sua">Sửa</a>
                        <a href="../controller/deleteProduct.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" class="btn-xoa">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị nút phân trang -->
<div class="pagination">
    <?php
    // Hàm tạo các liên kết phân trang
    function generatePaginationLinks($currentPage, $totalPages, $adjacentLinks)
    {
        // Kiểm tra nếu tổng số trang nhỏ hơn hoặc bằng 1 thì không cần hiển thị nút phân trang
        if ($totalPages <= 1) {
            return;
        }

        $startPage = max(1, $currentPage - $adjacentLinks);
        $endPage = min($totalPages, $currentPage + $adjacentLinks);

        // Hiển thị "..." nếu không phải là trang đầu tiên
        if ($startPage > 1) {
            echo '<a href="?page=1">1</a>';
            if ($startPage > 1) {
                echo '<span>...</span>';
            }
        }

        // Hiển thị các trang nằm giữa "..." và "..."
        for ($i = $startPage; $i <= $endPage; $i++) {
            if ($i == $currentPage) {
                echo '<span class="current">' . $i . '</span>';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }

        // Hiển thị "..." nếu không phải là trang cuối cùng
        if ($endPage < $totalPages) {
            if ($endPage < $totalPages - 1) {
                echo '<span>...</span>';
            }
            echo '<a href="?page=' . $totalPages . '">' . $totalPages . '</a>';
        }
    }

    $adjacentLinks = 2; // Số trang hiển thị trước và sau trang hiện tại
    echo generatePaginationLinks($page, $totalPages, $adjacentLinks);
    ?>
</div>

<script>
    function deleteAllProducts() {
        if (confirm('Bạn có chắc muốn xóa tất cả sản phẩm?')) {
            $.ajax({
                type: 'POST',
                url: '<?php echo $controller; ?>/admin/deleteAllProducts.php',
                success: function(response) {
                    if (response === 'success') {
                        alert('Xóa tất cả sản phẩm thành công!');
                        // Chuyển hướng trang sau khi xóa thành công (nếu cần)
                        window.location.href = '<?php echo $controller; ?>/admin/productList.php';
                    } else {
                        alert('Xóa tất cả sản phẩm không thành công. Vui lòng thử lại!');
                    }
                }
            });
        }
    }

    function sortProducts() {
        var sortOrder = document.getElementById("sort").value;
        window.location.href = 'productList.php?sort=' + sortOrder;
    }
</script>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->