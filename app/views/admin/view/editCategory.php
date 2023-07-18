<?php
require_once '../models/CategoryModel.php';

// Kiểm tra xem có ID được truyền từ URL không
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Lấy danh mục theo ID
    $category = getCategoryById($categoryId);

    // Kiểm tra xem danh mục có tồn tại hay không
    if (!empty($category) && isset($category['id'])) {
        // Khởi tạo biến thông báo mặc định
        $message = '';

        // Kiểm tra xem yêu cầu là POST hay không
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form sửa danh mục
            $cate_name = $_POST['cate_name'];
            $cate_slug = $_POST['cate_slug'];
            $cate_banner = $_POST['cate_banner'];
            
            $update_at = date("Y-m-d");
            
            // Thực hiện cập nhật danh mục
            $result = updateCategory($categoryId, $cate_name, $cate_slug, $cate_banner);

            if ($result) {
                // Đặt thông báo thành công
                $message = "Cập nhật danh mục thành công!";
            } else {
                // Đặt thông báo lỗi
                $message = "Có lỗi xảy ra khi cập nhật danh mục.";
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

<h2 class="title">Sửa danh mục</h2>

<!-- Mã HTML cho form nhập dữ liệu -->
<form method="POST" action="editCategory.php?id=<?php echo $categoryId; ?>">
    <?php if (!empty($category) && isset($category['id'])) { ?>
        <label for="cate_name">Tên danh mục:</label>
        <input type="text" name="cate_name" id="cate_name" value="<?php echo $category['cate_name']; ?>" required><br>

        <label for="cate_slug">Slug danh mục:</label>
        <input type="text" name="cate_slug" id="cate_slug" value="<?php echo $category['cate_slug']; ?>" required><br>

        <label for="cate_banner">Banner danh mục:</label>
        <input type="text" name="cate_banner" id="cate_banner" value="<?php echo $category['cate_banner']; ?>" required><br>

        <button type="submit">Sửa danh mục</button>
    <?php } else { ?>
        <p>Không tìm thấy danh mục!</p>
    <?php } ?>

    <?php if (!empty($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>
</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
