<?php 
    
// Truy vấn tất cả các hàng hóa
function hang_hoa_select_all(){
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id";
    return  pdo_query($sql);
}
//Truy vấn một hàng hóa theo mã
function hang_hoa_select_by_id($id){
    $sql = "SELECT * FROM products WHERE id=?";
    return pdo_query_one($sql, $id);
}

function hang_hoa_select_outstanding(){
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id
    where featured = 1 and sale_price is null";
    return  pdo_query($sql);
}

function hang_hoa_select_sale() {
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id
    where sale_price is not null";
    return  pdo_query($sql);
}