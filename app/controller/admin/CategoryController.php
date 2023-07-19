<?php
require_once '../models/CategoryModel.php';
require_once("../../global.php");

// Khởi tạo biến thông báo mặc định
$message = '';
// Kiểm tra xem yêu cầu là POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cate_name = $_POST['cate_name'];
    $cate_slug = $_POST['cate_slug'];
    $cate_banner = $_POST['cate_banner'];

    // Gọi kết nối cơ sở dữ liệu


    // Thực hiện thêm danh mục sản phẩm
    $result = addCategory($cate_name, $cate_slug, $cate_banner);

    if ($result > 0) {
        // Hiển thị thông báo "Thêm danh mục sản phẩm thành công!"
        $message = "Thêm danh mục sản phẩm thành công!";
    } else {
        $message = "Có lỗi xảy ra khi thêm danh mục sản phẩm.";
    }
}

// Gọi tệp view cho form nhập dữ liệu
require_once '../view/addCategory.php';
?>
