<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
require_once('../../models/DAO/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Gọi hàm xóa người dùng
    $xoa = deleteUser($user_id);

    if ($xoa) {
        // Nếu xóa thành công, chuyển hướng người dùng đến trang danh sách người dùng hoặc trang thành công khác
        header('Location:' . $viewAdmin . '/users.php'); // Điều hướng đến trang listUsers.php sau khi xóa thành công
        exit();
    } else {
        $error_message = "Xóa người dùng không thành công!";
    }
}
?>