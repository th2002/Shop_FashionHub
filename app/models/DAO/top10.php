<?php
include_once 'connect.php';
function select_product_top10(){
    $sql ="SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id where featured = 1;";
    return qr_select($sql);
}    
?>