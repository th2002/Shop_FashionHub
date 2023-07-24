<?php
require_once '../../models/DAO/functions.php';

// Kiểm tra xem yêu cầu là POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin sản phẩm từ form
    $productId = $_POST['product_id'];

    // Kiểm tra xem đã chọn tệp tin hình ảnh hay chưa
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        // Đường dẫn tạm thời của tệp tin tải lên
        $tmpFilePath = $_FILES['image_file']['tmp_name'];

        // Tạo đường dẫn lưu trữ
        $uploadDir = '';
        $filename = $_FILES['image_file']['name'];
        $uploadPath = $uploadDir . $filename;

        // Di chuyển tệp tin tải lên vào đường dẫn lưu trữ
        if (move_uploaded_file($tmpFilePath, $uploadPath)) {
            // Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
            $luuhinh = addProductImage($productId, $uploadPath);

            if ($luuhinh) {
                // Lưu thành công, hiển thị thông báo thành công bằng cửa sổ alert và chuyển hướng trang
                echo "<script>alert('Hình ảnh đã được tải lên thành công!'); window.location.href = '../../views/admin/view/addProductImage.php';</script>";
                exit; // Ngăn mã PHP thực thi tiếp sau khi chuyển hướng
            } else {
                // Lưu thất bại, hiển thị thông báo lỗi bằng cửa sổ alert
                echo "<script>alert('Lỗi: Không thể lưu đường dẫn hình ảnh vào cơ sở dữ liệu.'); ../../views/admin/view/addProductImage.php';</script>";
            }
        } else {
            // Di chuyển tệp tin thất bại, xử lý lỗi tương ứng
            echo "<script>alert('Lỗi: Không thể di chuyển tệp tin tải lên.'); ../../views/admin/view/addProductImage.php';</script>";
        }
    } else {
        // Chưa chọn tệp tin hình ảnh, xử lý lỗi tương ứng
        echo "<script>alert('Lỗi: Vui lòng chọn một tệp tin hình ảnh để tải lên.'); window.location.href = '../../views/admin/view/addProductImage.php';</script>";
    }
}
?>
