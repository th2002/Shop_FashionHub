<?php
session_start();

// Đường dẫn gốc của trang web

$baseURL = "http://localhost/Shop_FashionHub";

// Đường dẫn tới thư mục chứa tài nguyên tĩnh

$contentURL = "$baseURL/app/views/admin/public";

// Đường dẫn tới thư mục chứa hình ảnh

$imageURL = "$contentURL/images";

// Đường dẫn tới các file CSS và JS

$cssURL = "$contentURL/css";
$jsURL = "$contentURL/js";

// Đường dẫn tới các file trong thư mục views/admin

$viewURL = "$baseURL/app/views/admin";

// Đường dẫn tới thư mục gốc của dự án

$rootDir = $_SERVER['DOCUMENT_ROOT'] . "/Shop_FashionHub";

// Đường dẫn tới thư mục chứa hình ảnh khi upload

$imageDir = "$rootDir/app/views/admin/images";

// ...

// Các hàm và code khác

?>
