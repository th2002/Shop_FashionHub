<?php 
include 'connect.php';
function category_add($name){
    $sql ="INSERT INTO category_product (cate_name) VALUES ('$name')";
    return qr_insert($sql);
}    
function category_select_all(){
    $sql ="SELECT * FROM category_product";
    return qr_select($sql);
}  
?>