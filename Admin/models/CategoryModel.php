<?php
require_once("../../global.php");

// Hàm thêm danh mục sản phẩm
function addCategory($cate_name, $cate_slug, $cate_banner){
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO category_product (cate_name, cate_slug, cate_banner, create_at, update_at) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$cate_name, $cate_slug, $cate_banner, $create_at, $update_at]);
    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}

// Hàm lấy danh sách danh mục
function getAllCategories(){
    global $db;
    $query = $db->query("SELECT * FROM category_product");

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm lấy thông tin danh mục bằng id
function getCategoryById($id) {
    global $db;

    $query = $db->prepare("SELECT * FROM category_product WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Hàm thêm sản phẩm
function addProduct($name, $thumbnail, $slug, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $cate_id, $cartitem_id){
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO products (name, thumbnail, slug, decsription, quantity, price, sale_price, featured, best_seller, cate_id, cartitem_id, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$name, $thumbnail, $slug, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $cate_id, $cartitem_id, $create_at, $update_at]);

    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}
// Hàm cập nhật thông tin sản phẩm
function updateProduct($productId, $productName, $thumbnail, $slug, $decsription, $quantity, $price) {
    global $db;

    $updateAt = date("Y-m-d");

    $query = $db->prepare("UPDATE products SET name = ?, thumbnail = ?, slug = ?, decsription = ?, quantity = ?, price = ?, update_at = ? WHERE id = ?");
    return $query->execute([$productName, $thumbnail, $slug, $decsription, $quantity, $price, $updateAt, $productId]);
}

// Hàm xóa sản phẩm

function deleteProduct($productId){
    global $db;

    $query = $db->prepare("DELETE FROM products where id=?");
    $query->execute([$productId]);

    return $query->rowCount();
}


// Hàm lấy danh sách sản phẩm
function getAllProducts() {
    global $db;

    $query = $db->query("SELECT * FROM products");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Lấy thông tin sản phẩm bằng ID
function getProductById($productId) {
    global $db;

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([$productId]);
    return $query->fetch(PDO::FETCH_ASSOC);
}


// Hàm cập nhật danh mục sản phẩm
function updateCategory($id, $cate_name, $cate_slug, $cate_banner) {
    global $db;
     
    $update_at = date("Y-m-d");
    $query = $db->prepare("UPDATE category_product SET cate_name = ?, cate_slug = ?, cate_banner = ?, update_at = ? WHERE id = ?");
    return $query->execute([$cate_name, $cate_slug, $cate_banner, $update_at, $id]);
}

// Hàm xoá danh mục
function deleteCategory($cate_id){
    global $db;

    $query = $db->prepare("DELETE FROM category_product WHERE id = ?");
    $query->execute([$cate_id]);

    return $query->rowCount();
}
?>
