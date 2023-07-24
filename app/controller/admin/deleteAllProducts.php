<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Thực hiện xóa tất cả sản phẩm
    $xoaall = deleteAllProducts();

    // Kiểm tra kết quả xóa và thực hiện chuyển hướng hoặc hiển thị thông báo lỗi
    if ($xoaall) {
        // Xóa thành công, chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        header("Location: ../admin/productList.php?success=deleteall");
        exit();
    } else {
        // Xóa không thành công, chuyển hướng về trang danh sách sản phẩm với thông báo lỗi
        header("Location: ../admin/productList.php?error=deleteall");
        exit();
    }
}
?>