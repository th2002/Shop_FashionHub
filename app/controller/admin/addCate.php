<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

// Khởi tạo biến thông báo mặc định
$message = '';
// Kiểm tra xem yêu cầu là POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cate_name = $_POST['cate_name'];
    $has_size = $_POST['has_size'];

    // Gọi kết nối cơ sở dữ liệu


    // Thực hiện thêm danh mục sản phẩm
    $them = addCategory($cate_name, $has_size);

    if ($them > 0) {
        // Hiển thị thông báo "Thêm danh mục sản phẩm thành công!"
        $message = "Thêm danh mục sản phẩm thành công!";
        header("Location:" . $viewAdmin . '/categoryList.php');

    } else {
        $message = "Có lỗi xảy ra khi thêm danh mục sản phẩm.";
    }
}

// Gọi tệp view cho form nhập dữ liệu
require_once '../../views/admin/view/addCategory.php';
?>
