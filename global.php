<?php 

// 2 biến toàn cục để chia sẻ giữa controller và view

$ROOT_URL = "/Shop_FashionHub"; //đường dẫn gốc của website
$ASSET_URL = "$ROOT_URL/assets"; //link to assets
$ADMIN_URL = "$ROOT_URL/app/views/admin"; //link to admin
$SITE_URL = "$ROOT_URL/app/views/customer"; //link to customer

//Kiểm tra sự tồn tại của 1 tham số trong request, trả về true nếu tồn tại
function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);
}