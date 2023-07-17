<?php
session_start();

// Nếu người dùng đã đăng nhập, hủy session để đăng xuất
if(isset($_SESSION['id'])) {
    session_destroy(); // Xóa toàn bộ session
    header("Location: login.php"); // Chuyển hướng về trang đăng nhập
    exit();
} else {
    // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: login.php");
    exit();
}
?>