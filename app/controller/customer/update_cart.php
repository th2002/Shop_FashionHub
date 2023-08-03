<?php
session_start();

if (isset($_POST['id_price']) && isset($_POST['quantity'])) {
    $id_price = $_POST['id_price'];
    $quantity = (int)$_POST['quantity'];

    // Lưu giá trị số lượng vào session
    if (isset($_SESSION['data-cart'][$id_price])) {
        $_SESSION['data-cart'][$id_price]['quantity'] = $quantity;
    }

    // Phản hồi về số lượng đã cập nhật thành công (nếu cần)
    $response = array('status' => 'success', 'quantity' => $quantity);
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>