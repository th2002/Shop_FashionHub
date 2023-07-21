<?php
session_start();

// Xóa các thông tin đăng nhập lưu trong session
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['role']);

// Xóa toàn bộ session
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: login.php");
exit();
?>
