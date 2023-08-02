<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/app/models/DAO/connect.php';

// Đường dẫn tới tệp PHPMailerAutoload.php, tuỳ thuộc vào cấu trúc của dự án của bạn
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Hàm thêm danh mục sản phẩm
function addCategory($cate_name, $has_size){
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO category_product (cate_name, create_at, update_at, has_size) VALUES (?, ?, ?, ?)");
    $query->execute([$cate_name, $create_at, $update_at, $has_size]);
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
function addProduct($name, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $cate_id){
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO products (name, decsription, quantity, price, sale_price, featured, best_seller, cate_id, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$name, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $cate_id, $create_at, $update_at]);

    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}
// hàm thêm thông báo
function addnotification($notification_type, $notification_content, $pinned){
    global $db;

    $created_at = date('Y-m-d');
    $query = $db->prepare("INSERT INTO notifications (notification_type, notification_content, pinned, created_at ) VALUES (?, ?, ?, ?)");
    $query->execute([$notification_type, $notification_content, $pinned, $created_at]);

    return $query->rowCount();
}

// Hàm lấy danh sách thông báo
function getAllNotifications(){
    global $db;

    $query = $db->prepare("SELECT * FROM notifications  ORDER BY pinned DESC, created_at DESC");
    $query->execute(); // Thực thi truy vấn
    return $query->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả
}
// Hàm đếm số lượng thông báo
function countNotifications() {
    global $db;

    $query = $db->prepare("SELECT COUNT(*) AS total FROM notifications");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
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

// HÀm xóa tất cả sản phẩm
function deleteAllProducts(){
    global $db;
    try {
        $query = $db->prepare("DELETE FROM products");
        return $query->execute();
    } catch (PDOException $e) {
        // xử lý lỗi
        error_log("Lỗi trong quá trình xóa!" . $e->getMessage());
        return false;
    }
}
function getSortedProducts($sortOrder)
{
    // Lấy danh sách sản phẩm từ cơ sở dữ liệu
    global $db;
    $query = $db->query("SELECT * FROM products");

    // Sắp xếp danh sách sản phẩm dựa vào giá trị của $sortOrder
    if ($sortOrder === 'desc') {
        $query = $db->query("SELECT * FROM products ORDER BY create_at DESC");
    } else {
        $query = $db->query("SELECT * FROM products ORDER BY create_at ASC");
    }

    return $query->fetchAll(PDO::FETCH_ASSOC);
}


// Các hàm khác trong functions.php vẫn giữ nguyên.

// hàm xoá all người dùng
function deleteAllUser(){
    global $db;
    try {
        $query = $db->prepare("DELETE FROM users");
        return $query->execute();
    } catch (PDOException $e) {
        error_log("có lổi khi thực hiện!");
        return false;
    }
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
function updateCategory($id, $cate_name, $has_size) {
    global $db;
     
    $update_at = date("Y-m-d");
    $query = $db->prepare("UPDATE category_product SET cate_name = ?, has_size = ?, update_at = ? WHERE id = ?");
    return $query->execute([$cate_name, $has_size, $update_at, $id]);
}




// Hàm xoá danh mục
function deleteCategory($cate_id){
    global $db;

    $query = $db->prepare("SELECT * FROM category_product where id=?");
    $query->execute([$cate_id]);
    $cate = $query->fetch(PDO::FETCH_ASSOC);

    if(!$cate){
        return false;
    }

    // CẬp nhật danh mục
    $query = $db->prepare("DELETE from category_product WHERE id=?");
    $query->execute([$cate_id]);

    return true; // XÓa thành công
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
// hàm lấy địa chỉ ip người dùng
function getUserIP(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
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
    $ip = getUserIP();
    $query = $db->prepare("INSERT INTO users (user_name, email, password, full_name, phone_number, ip_address) VALUE (?, ?, ?, ?, ?, ?)");
    $query->execute([$user_name, $email, $hashePssword, $full_name, $phone_number, $ip]);

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

// Hàm đăng nhập và kiểm tra mật khẩu
function login($username, $password)
{
    global $db;

    $stmt = $db->prepare('SELECT * FROM users WHERE user_name = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem đã tìm thấy người dùng với tên đăng nhập cụ thể hay chưa
    if ($user && password_verify($password, $user['password'])) {
        return $user; // Trả về thông tin người dùng nếu xác thực thành công
    } else {
        return false; // Trả về false nếu xác thực không thành công
    }
}

// Hàm tạo mật khẩu ngẫu nhiên
function randomPassword($length = 10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kytu = strlen($characters);
    $randomPassword = '';
    for($i = 0; $i <= $length; $i++){
        $randomPassword .= $characters[rand(0, $kytu - 1)];
    }
    return $randomPassword;
}

function sendPassword($email, $newPassword){
    // gửi email chức mật khẩu cho user
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // cấu hình SMTP để gửi email

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'duc7sao@gmail.com'; // Thay thế bằng địa chỉ email Gmail của bạn
    $mail->Password = 'gjmixhwpegpunuiy'; // Thay thế bằng mật khẩu Gmail của bạn
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

     // Cấu hình email
     $mail->setFrom('duc7sao@gmail.com', '中国话 中國話 華文/华文'); // Thay thế bằng địa chỉ email và tên của bạn
     $mail->addAddress($email); // Địa chỉ email người nhận
 
     $mail->isHTML(true);
     $mail->Subject = 'Email cấp lại mật khẩu'; // Tiêu đề email
     $mail->Body = ''; // Nội dung email

     $mail->Body = 'Vui lòng đổi mật khẩu ngay khi có thể! Mật khẩu mới của bạn là: ' . $newPassword; // Nội dung email
 
     // Gửi email
     if (!$mail->send()) {
         // Có lỗi xảy ra khi gửi email, bạn có thể xử lý lỗi ở đây
          echo 'Mailer Error: ' . $mail->ErrorInfo;
         return false;
     } else {
         return true;
     }
}
// Hàm cập nhật mật khẩu mới vào cơ sở dữ liệu
function updatePasswordInDatabase($email, $newPassword) {
    // Gọi biến kết nối PDO đã được tạo trước đó
    global $db;

    try {
        // Tạo truy vấn SQL để cập nhật mật khẩu mới
        $sql = "UPDATE users SET password = :newPassword WHERE email = :email";

        // Chuẩn bị truy vấn
        $stmt = $db->prepare($sql);

        // Gán giá trị cho các tham số của truy vấn
        $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Thực thi truy vấn
        $stmt->execute();

        // Kiểm tra xem có bất kỳ dòng nào bị ảnh hưởng bởi truy vấn hay không
        if ($stmt->rowCount() > 0) {
            // Truy vấn đã thành công, mật khẩu mới đã được cập nhật vào cơ sở dữ liệu
            return true;
        } else {
            // Truy vấn không thành công, không có dòng nào bị ảnh hưởng
            // Bạn có thể xử lý lỗi ở đây (nếu cần)
            return false;
        }
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        // Ví dụ: echo "Lỗi khi cập nhật mật khẩu: " . $e->getMessage();
        return false;
    }
}

// Hàm cập nhật thông tin người dùng
function updateUser($id, $user_name, $email, $role) {
    global $db;

    $query = $db->prepare("UPDATE users SET user_name = ?, email = ?, role = ? WHERE id = ?");
    $query->execute([$user_name, $email, $role, $id]);

    return $query->rowCount() > 0; // Trả về true nếu số dòng bị ảnh hưởng > 0, ngược lại false
}

// hàm xoá người dùng

function deleteUser($id){
    global $db;

    $query = $db->prepare("SELECT * FROM users WHERE id=?");
    $query->execute([$id]);
    $user= $query->fetch(PDO::FETCH_ASSOC);

    if(!$user){
        return false; // người dùng không tồn tại
    }

    $query = $db->prepare("DELETE FROM users where id =?");
    $query->execute([$id]);

    return true; // xó thành công
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

// Thêm mã giảm giá
function addCoupon($code, $type, $value, $status, $date_end){
    global $db;
    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");
    $query = $db->prepare("INSERT INTO coupon (code, type, value, status, date_end, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$code, $type, $value, $status, $date_end, $create_at, $update_at]);

    return $query->rowCount() > 0; // Trả về true nếu số dòng bị ảnh hưởng > 0, ngược lại false
}

// functions.php

// Include TCPDF library
// require_once('tcpdf/tcpdf.php');

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {
    // Tùy chỉnh và định nghĩa các phương thức khác nếu cần thiết...

    // Colored table
    public function ColoredTable($header, $data) {
        // Mã để tạo bảng màu
        // Ví dụ:
        // ...
    }
}
// Xóa dữ liệu đệm và đảm bảo không có dữ liệu tiêu đề hoặc nội dung HTML nào đã được gửi từ trước
ob_end_clean();
// Hàm xử lý yêu cầu xuất PDF
function exportPDF($products) {
    // Tạo mới tệp PDF với lớp con MYPDF
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Tiêu đề cần đặt cho tệp PDF
    $pdfTitle = 'Danh sách sản phẩm';

    // Đặt tiêu đề và kiểu nội dung của tệp PDF bằng hàm header() của PHP
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $pdfTitle . '.pdf"');


    // Thêm một trang
    $pdf->AddPage();

    // Tiêu đề cột
    $header = array('ID', 'Tên sản phẩm', 'Giá', 'Hình ảnh');
    $pdf->ColoredTable($header, $products);

    // Lưu tệp PDF vào thư mục tạm thời
    $pdfFilePath = dirname(__FILE__) . '/pdf_exports/san-pham.pdf';
    $pdf->Output($pdfFilePath, 'F');

    return $pdfFilePath;
}

// ... Các hàm và mã khác liên quan đến ứng dụng của bạn ...



// Hàm phân trang sản phẩm
// Hàm lấy tổng số sản phẩm
function getTotalProducts() {
    global $db;

    try {
        $query = $db->prepare("SELECT COUNT(*) as total FROM products");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (PDOException $e) {
        error_log("Lỗi trong quá trình truy vấn CSDL: " . $e->getMessage());
        return 0;
    }
}

// Hàm lấy danh sách sản phẩm phân trang
function getProductsByPage($page, $perPage) {
    global $db;

    try {
        $offset = ($page - 1) * $perPage;
        $query = $db->prepare("SELECT * FROM products LIMIT :offset, :perPage");
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi trong quá trình truy vấn CSDL: " . $e->getMessage());
        return array();
    }
}
// Hàm lấy thông tin đơn hàng
function getOrdersInfo(){
    global $db;

    $sql = "
    SELECT
        o.id AS order_id,
        o.recipient_name,
        o.phone_number,
        o.address_detail,
        o.province,
        o.district,
        o.ward,
        o.total_amount,
        o.status_payment,
        o.status_delivery,
        o.created_at AS order_created_at,
        od.product_id,
        od.quantity,
        p.name AS product_name,
        u.full_name AS customer_name,
        u.email AS customer_email
    FROM
        oders o
    INNER JOIN oder_detail od ON o.id = od.oder_id
    INNER JOIN products p ON od.product_id = p.id
    INNER JOIN users u ON o.cus_id = u.id
    ORDER BY o.created_at DESC
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Hàm lấy đơn hàng theo id
function getOrderById($order_id) {
    global $db;

    $sql = "
    SELECT
        o.id AS order_id,
        o.recipient_name,
        o.phone_number,
        o.address_detail,
        o.province,
        o.district,
        o.ward,
        o.total_amount,
        o.status_payment,
        o.status_delivery,
        o.created_at AS order_created_at,
        od.product_id,
        od.quantity,
        u.full_name AS customer_name,
        u.email AS customer_email
    FROM
        oders o
    INNER JOIN oder_detail od ON o.id = od.oder_id
    INNER JOIN users u ON o.cus_id = u.id
    WHERE o.id = :order_id
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
