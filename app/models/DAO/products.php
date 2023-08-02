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
    $sql = "SELECT products.id,products.name,products.price,product_images.image_url FROM products INNER JOIN product_images ON products.id =product_images.product_id WHERE featured = 1 AND sale_price IS null limit 11";
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
function select_price_by_id($id) {
    $sql ="SELECT price FROM products WHERE id =?";
    return pdo_query($sql,$id);
}
function hang_hoa_select_by_name_loai_1(){
    $sql = "SELECT * FROM size where size_cate = 0";
    return  pdo_query($sql);
}
function hang_hoa_select_by_name_loai_2(){
    $sql = "SELECT * FROM size where size_cate = 1";
    return  pdo_query($sql);
}
function hang_hoa_select_by_img_id($id){
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id where products.id=? ;";
    return pdo_query($sql,$id);
}
function hang_hoa_select_coupon(){
    $sql = "SELECT * FROM coupon WHERE 1";
    return  pdo_query($sql);
}
function hang_hoa_select_by_loai($cate_id){
    $sql = "SELECT * FROM category_product INNER JOIN products ON category_product.id = products.cate_id where category_product.id=? ;";
    return pdo_query($sql,$cate_id);
}
function hang_hoa_select_by_cung_loai($cate_id){
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id where products.cate_id=? ;";
    return pdo_query($sql, $cate_id);
}