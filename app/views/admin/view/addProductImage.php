<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<?php
require_once  ("../models/CategoryModel.php");
$productList = getAllProducts();
?>
<!-- Mã HTML cho form thêm hình ảnh sản phẩm -->
<h2 class="title">Thêm hình ảnh cho sản phẩm</h2>

<!-- Mã HTML cho form nhập dữ liệu -->
<form method="POST" action="../controller/addProductImage.php" enctype="multipart/form-data">
    <label for="product_id">Chọn sản phẩm:</label>
    <select name="product_id" id="product_id" required>
        <?php foreach ($productList as $product) { ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
        <?php } ?>
    </select><br>
    <label for="image_file">Chọn hình ảnh:</label>
    <input type="file" name="image_file" id="image_file" required><br>
    <button type="submit">Tải lên</button>
</form>


<!-- Hiển thị thông báo -->
<?php if (!empty($message)) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>


<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
