<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/app/models/DAO/connect.php';


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
function addProduct($name, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $cate_id, $cartitem_id){
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO products (name, decsription, quantity, price, sale_price, featured, best_seller, cate_id, cartitem_id, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$name, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $cate_id, $cartitem_id, $create_at, $update_at]);

    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}
// Hàm cập nhật thông tin sản phẩm
function updateProduct($productId, $productName, $decsription, $quantity, $price) {
    global $db;

    $updateAt = date("Y-m-d");

    $query = $db->prepare("UPDATE products SET name = ?, decsription = ?, quantity = ?, price = ?, update_at = ? WHERE id = ?");
    return $query->execute([$productName, $decsription, $quantity, $price, $updateAt, $productId]);
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



// Hàm thêm hình ảnh sản phẩm
function addProductImage($productId, $imagePath)
{
    global $db;

    $query = $db->prepare("INSERT INTO product_images (product_id, image_url) VALUES (?, ?)");
    $query->execute([$productId, $imagePath]);

    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}

// Hàm lấy danh sách hình ảnh của một sản phẩm
function getProductImages($productId) {
    global $db;

    $query = $db->prepare("SELECT * FROM product_images WHERE product_id = ?");
    $query->execute([$productId]);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// hàm đăng ký tài khoản
function registerUser($user_name, $email, $password, $full_name, $phone_number){
    global $db;

    $query = $db->prepare("SELECT * FROM users where user_name = ? or email = ?");
    $query->execute([$user_name, $email]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

   if($user){
        return "false"; // tên đăng nhập or email đã tồn tại
    }
    // Thêm dữ liệu vào database users

    $hashePssword = password_hash($password, PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO users (user_name, email, password, full_name, phone_number) VALUE (?, ?, ?, ?, ?)");
    $query->execute([$user_name, $email, $hashePssword, $full_name, $phone_number]);

    return $query->rowCount();
}


  // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
function checkEmailExists($email){
    // Thực hiện truy vấn kiểm tra
    // Đây chỉ là một ví dụ, bạn cần thay thế nó với truy vấn thực tế
    global $db;
    $query = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $query->execute([$email]);
    $count = $query->fetchColumn();

    // Kiểm tra số lượng kết quả trả về
    return ($count > 0);
}

// hàm lấy danh sách người dùng
function getAllUsers(){
    global $db;

    $query = $db->prepare("SELECT * FROM users");
    $query->execute();

    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// Lấy thông tin người dùng theo ID
function getUserById($id) {
    global $db;

    $query = $db->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$id]);

    return $query->fetch(PDO::FETCH_ASSOC);
}

// Hàm cập nhật thông tin người dùng
function updateUser($id, $user_name, $email, $role) {
    global $db;

    $query = $db->prepare("UPDATE users SET user_name = ?, email = ?, role = ? WHERE id = ?");
    $query->execute([$user_name, $email, $role, $id]);

    return $query->rowCount() > 0; // Trả về true nếu số dòng bị ảnh hưởng > 0, ngược lại false
}
// Hàm kiểm tra đăng nhập

function authenUser($user_name, $password){
    global $db;

    // kiểm tra  tên login có tồn tại hay không
    $query = $db->prepare("SELECT * FROM users where user_name = ?");
    $query->execute([$user_name]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        return true;

    }
    return false;
}
// Hàm phân trang danh mục
function getCategoriesWithPagination($limit, $offset) {
    global $db;

    $query = $db->prepare("SELECT * FROM categories LIMIT ? OFFSET ?");
    $query->bindValue(1, $limit, PDO::PARAM_INT);
    $query->bindValue(2, $offset, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}



?>
