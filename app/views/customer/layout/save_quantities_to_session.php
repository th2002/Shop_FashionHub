<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Đảm bảo rằng dữ liệu được gửi đến dưới dạng JSON
    $data = json_decode(file_get_contents("php://input"), true);

    // Kiểm tra và lưu số lượng của các sản phẩm vào session server-side
    foreach ($data as $productKey => $quantity) {
        $_SESSION[$productKey] = $quantity;
    }

    // Phản hồi cho JavaScript rằng số lượng đã được lưu thành công
    echo "success";
}