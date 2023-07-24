<?php 

session_start();

// Đường dẫn gốc của trang web

$baseURL = "http://localhost/Shop_FashionHub";

// Đường dẫn tới thư mục chứa tài nguyên tĩnh

$contentURL = "$baseURL/app/views/admin/public";

// Đường dẫn tới thư mục chứa hình ảnh

$imageURL = "$contentURL/images";

// Đường dẫn tới các file CSS và JS admin

$cssURL = "$contentURL/css";
$jsURL = "$contentURL/js";


// Đường dẫn tới các file trong thư mục views/admin

$viewURL = "$baseURL/app/views/admin";

// Đường dẫn tới controller admin
$controller = "$baseURL/app/controller";

// Đường dẫn tới view admin

$viewAdmin = "$baseURL/app/views/admin/view";

// Đường dẫn tới modesls/DAO
$models = "$baseURL/app/models/DAO";

// Đường dẫn tới thư mục gốc của dự án

$rootDir = $_SERVER['DOCUMENT_ROOT'] . "/Shop_FashionHub";

// Đường dẫn tới thư mục chứa hình ảnh khi upload

$imageDir = "$rootDir/app/views/admin/images";

// ...

// Các hàm và code khác

// 2 biến toàn cục để chia sẻ giữa controller và view

$ROOT_URL = "/Shop_FashionHub"; //đường dẫn gốc của website
$ASSET_URL = "$ROOT_URL/assets"; //link to assets
$ADMIN_URL = "$ROOT_URL/app/views/admin"; //link to admin
$SITE_URL = "$ROOT_URL/app/views/customer"; //link to customer
$CSS_CUSTOMER = "$ROOT_URL/app/views/css"; //link to css customer

//Kiểm tra sự tồn tại của 1 tham số trong request, trả về true nếu tồn tại
function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);
}