<?php
// require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
require_once('../../models/DAO/functions.php');

// Kiểm tra xem có yêu cầu Ajax và order_id được gửi lên không
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Thực hiện truy vấn để lấy thông tin đơn hàng theo order_id
    $sql = "SELECT * FROM oders WHERE id = :order_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();

    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem đơn hàng có tồn tại không
    if ($order) {
        // Trả về dữ liệu dạng JSON
        header('Content-Type: application/json');
        echo json_encode($order);
    } else {
        echo "Đơn hàng không tồn tại.";
    }
} else {
    echo "Không có yêu cầu hợp lệ.";
}
?>