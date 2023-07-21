<?php 
 require_once '../../../../global.php';
 require_once '../../../models/DAO/connect.php';
 require_once '../../../models/DAO/products.php';

 if(exist_param("contact")){
    $VIEW_PRODUCT = "";
    $VIEW_PRODUCT_SALE = "";
    $VIEW_PRODUCT_FEATURED = "";
    $VIEW_NAME = "home/contact.php";
}
else if(exist_param("about")){
    $VIEW_PRODUCT = "";
    $VIEW_PRODUCT_SALE = "";
    $VIEW_PRODUCT_FEATURED = "";
    $VIEW_NAME = "home/about.php";
}
else if(exist_param("category")){
    $VIEW_PRODUCT = "";
    $VIEW_PRODUCT_SALE = "";
    $VIEW_PRODUCT_FEATURED = "";
    $VIEW_NAME = "home/category.php";
}
else{
    $VIEW_PRODUCT = "../layout/products.php";
    $VIEW_PRODUCT_SALE = "../layout/sale_products.php";
    $VIEW_PRODUCT_FEATURED = "../layout/top10_products.php";
}

 require_once '../layout.php';
?>