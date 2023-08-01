<?php 
    

// Truy vấn tất cả các hàng hóa
function hang_hoa_select_all(){
    $sql = "SELECT products.id,products.name,products.price,product_images.image_url FROM products INNER JOIN product_images ON products.id =product_images.product_id";
    return  pdo_query($sql);
}
//Truy vấn một hàng hóa theo mã
function hang_hoa_select_by_id($id){
    $sql = "SELECT * FROM products WHERE id=?";
    return pdo_query_one($sql, $id);
}

function hang_hoa_select_outstanding(){
    $sql = "SELECT products.id,products.name,products.price,product_images.image_url FROM products INNER JOIN product_images ON products.id =product_images.product_id WHERE featured = 1 AND sale_price IS null";
    return  pdo_query($sql);
}

function hang_hoa_select_sale() {
    $sql = "SELECT products.id,products.name,products.sale_price,products.price,product_images.image_url FROM products INNER JOIN product_images ON products.id =product_images.product_id where sale_price is not null";
    return pdo_query($sql);
}
function select_size_hang_hoa_by_id($id) {
    $sql ="SELECT size FROM products WHERE id =?";
    return pdo_query_value($sql,$id);
}
function select_size_by_id($id) {
    $sql ="SELECT id,name_size FROM size WHERE size_cate =?";
    return pdo_query($sql,$id);
}
function select_category_by_id($id) {
    $sql ="SELECT category_product.cate_name FROM category_product INNER JOIN products ON category_product.id =products.cate_id WHERE products.id =?";
    return pdo_query($sql,$id);
}
function select_price_sale_by_id($id) {
    $sql ="SELECT sale_price FROM products WHERE id =?";
    return pdo_query($sql,$id);
}