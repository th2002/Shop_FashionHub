<?php
require_once '../models/CategoryModel.php';

// Kiểm tra xem có ID được truyền từ URL không
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Lấy danh mục theo ID
    $category = getCategoryById($categoryId);

    // Kiểm tra xem danh mục có tồn tại hay không
    if (!empty($category) && isset($category['id'])) {
        // Kiểm tra xem yêu cầu là POST hay không
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form sửa danh mục
            $cate_name = $_POST['cate_name'];
            $cate_slug = $_POST['cate_slug'];
            $cate_banner = $_POST['cate_banner'];

            // Thực hiện cập nhật danh mục
            $result = updateCategory($categoryId, $cate_name, $cate_slug, $cate_banner);

            if ($result) {
                // Đặt thông báo thành công
                $message = "Cập nhật danh mục thành công!";
            } else {
                // Đặt thông báo lỗi
                $error_message = "Có lỗi xảy ra khi cập nhật danh mục.";
            }
        }
    } else {
        // Redirect hoặc hiển thị thông báo lỗi nếu danh mục không tồn tại
        header("Location: categoryList.php");
        exit;
    }
} else {
    // Redirect hoặc hiển thị thông báo lỗi nếu không có ID danh mục
    header("Location: categoryList.php");
    exit;
}

// Gọi tệp view cho form sửa danh mục
require_once '../view/editCategory.php';
?>
