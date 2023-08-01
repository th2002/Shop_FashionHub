<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<?php
// require_once  ("../models/CategoryModel.php");
$categories = getAllCategories();
?>
<h2 class="title">Thêm sản phẩm</h2>

<!-- Mã HTML cho form nhập dữ liệu -->
<form method="POST" action="<?php echo $controller ?>/admin/addProduct.php">

    <label for="product_name">Tên sản phẩm:</label>
    <input type="text" name="product_name" id="product_name" class="vertical-bar blink" required><br>

    <label for="description">Mô tả:</label>
    <textarea name="description" id="description" required></textarea><br>

    <label for="quantity">Số lượng:</label>
    <input type="number" name="quantity" id="quantity" required><br>

    <label for="price">Giá:</label>
    <input type="number" name="price" id="price" required><br>

    <label for="sale_price">Giá giảm:</label>
    <input type="number" name="sale_price" id="sale_price"><br>

    <label for="featured">Nổi bật:</label>
    <input type="checkbox" name="featured" id="featured"><br>

    <label for="best_seller">Bán chạy:</label>
    <input type="checkbox" name="best_seller" id="best_seller"><br>

    <label for="category_id">Danh mục:</label>
    <select name="category_id" class="category_id" required>
        <option value="">Chọn danh mục</option>
        <?php foreach ($categories as $category) { ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['cate_name']; ?></option>
        <?php } ?>
    </select><br>

    <label for="cartitem_id">Cart Item ID:</label>
    <input type="text" name="cartitem_id" id="cartitem_id" required><br>

    <div class="button-container">
        <button type="submit">Thêm sản phẩm</button>
        <a href="productList.php" class="cancel-button">Hủy</a>
    </div>

    <?php if (!empty($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
