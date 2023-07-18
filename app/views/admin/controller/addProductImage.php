<?php
require_once '../models/CategoryModel.php';

// Kiểm tra xem yêu cầu là POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin sản phẩm từ form
    $productId = $_POST['product_id'];

    // Kiểm tra xem đã chọn tệp tin hình ảnh hay chưa
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        // Đường dẫn tạm thời của tệp tin tải lên
        $tmpFilePath = $_FILES['image_file']['tmp_name'];

        // Tạo đường dẫn lưu trữ
        $uploadDir = '../images/';
        $filename = $_FILES['image_file']['name'];
        $uploadPath = $uploadDir . $filename;

        // Di chuyển tệp tin tải lên vào đường dẫn lưu trữ
        if (move_uploaded_file($tmpFilePath, $uploadPath)) {
            // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
            $luuhinh = addProductImage($productId, $uploadPath);

            if ($luuhinh) {
                // Lưu thành công, hiển thị thông báo hoặc chuyển hướng
                // ...
            } else {
                // Lưu thất bại, hiển thị thông báo lỗi
                // ...
            }
        } else {
            // Di chuyển tệp tin thất bại, xử lý lỗi tương ứng
            // ...
        }
    } else {
        // Chưa chọn tệp tin hình ảnh, xử lý lỗi tương ứng
        // ...
    }
}
?>
