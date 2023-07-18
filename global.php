<?php
// Thông tin cấu hình kết nối
$host = 'localhost';
$dbname = 'fashionhub_shop';
$username = 'root';
$password = '';

try {
    // Tạo kết nối PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Thiết lập các thuộc tính kết nối (tuỳ chọn)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Trả về đối tượng kết nối để sử dụng trong các chức năng khác
    return $db;
} catch (PDOException $e) {
    // Xử lý lỗi nếu không thể kết nối đến cơ sở dữ liệu
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    die();
}
// Đóng kết nối
$db = null;

?>
