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

// Đường dẫn đến assets
$assets_css = "$baseURL/assets/css";
$assets_js = "$baseURL/assets/js";


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

$ROOT_URL_2 = "Shop_FashionHub";
$ROOT_URL = "/Shop_FashionHub"; //đường dẫn gốc của website
$ASSET_URL = "$ROOT_URL/assets"; //link to assets
$CONTROLLER_URL = "$ROOT_URL/app/controller/customer"; //link to controller
$ADMIN_URL = "$ROOT_URL/app/views/admin"; //link to admin
$SITE_URL = "$ROOT_URL/app/views/customer"; //link to customer
$DAO_URL = "$ROOT_URL/app/models"; //link to DAO
$ADMIN_CSS_URL = "$ROOT_URL/app/views/admin/public/css"; //link to admin css

//Kiểm tra sự tồn tại của 1 tham số trong request, trả về true nếu tồn tại
function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);
}