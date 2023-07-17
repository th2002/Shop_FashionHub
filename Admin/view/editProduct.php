<?php
require_once '../models/CategoryModel.php';

// Kiểm tra xem có ID được truyền từ URL không
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Lấy thông tin sản phẩm theo ID
    $product = getProductById($productId);

    // Kiểm tra xem sản phẩm có tồn tại hay không
    if (!empty($product) && isset($product['id'])) {
        // Khởi tạo biến thông báo mặc định
        $message = '';

        // Kiểm tra xem yêu cầu là POST hay không
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form sửa sản phẩm
            $productName = $_POST['product_name'];
            $thumbnail = $_POST['thumbnail'];
            $slug = $_POST['slug'];
            $decsription = $_POST['decsription'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            // Thực hiện cập nhật sản phẩm
            $result = updateProduct($productId, $productName, $thumbnail, $slug, $decsription, $quantity, $price);

            // Kiểm tra kết quả cập nhật
            if ($result) {
                $message = "Cập nhật sản phẩm thành công!";
                echo '<script>
                        window.onload = function() {
                            Swal.fire({
                                icon: "success",
                                title: "Thông báo",
                                text: "' . $message . '",
                                confirmButtonText: "OK"
                            });
                        }
                      </script>';
            } else {
                $message = "Có lỗi xảy ra khi cập nhật sản phẩm.";
                echo '<script>
                        window.onload = function() {
                            Swal.fire({
                                icon: "error",
                                title: "Thông báo",
                                text: "' . $message . '",
                                confirmButtonText: "OK"
                            });
                        }
                      </script>';
            }
        }
    }
}
?>

<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->

<h2 class="title">Sửa sản phẩm</h2>

<!-- Mã HTML cho form nhập dữ liệu -->
<form method="POST" action="editProduct.php?id=<?php echo $productId; ?>">
    <?php if (!empty($product) && isset($product['id'])) { ?>
        <label for="product_name">Tên sản phẩm:</label>
        <input type="text" name="product_name" id="product_name" value="<?php echo $product['name']; ?>" required><br>

        <label for="thumbnail">Thumbnail:</label>
        <input type="text" name="thumbnail" id="thumbnail" value="<?php echo $product['thumbnail']; ?>" required><br>

        <label for="slug">Slug:</label>
        <input type="text" name="slug" id="slug" value="<?php echo $product['slug']; ?>" required><br>

        <label for="decsription">decsription:</label>
        <textarea name="decsription" id="decsription" required><?php echo $product['decsription']; ?></textarea><br>

        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity" value="<?php echo $product['quantity']; ?>" required><br>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $product['price']; ?>" required><br>

        <button type="submit">Sửa sản phẩm</button>
    <?php } else { ?>
        <p>Không tìm thấy sản phẩm!</p>
    <?php } ?>
</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
