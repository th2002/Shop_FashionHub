<?php 

// 2 biến toàn cục để chia sẻ giữa controller và view
$VIEW_NAME = "index.php";
$VIEW_PRODUCT = "";
$VIEW_PRODUCT_SALE = "";
$VIEW_PRODUCT_FEATURED = "";
$MESSAGE = "";

//Kiểm tra sự tồn tại của 1 tham số trong request, trả về true nếu tồn tại
function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);
}