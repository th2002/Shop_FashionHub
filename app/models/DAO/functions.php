<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/app/models/DAO/connect.php';

// Đường dẫn tới tệp PHPMailerAutoload.php, tuỳ thuộc vào cấu trúc của dự án của bạn
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Hàm thêm danh mục sản phẩm
function addCategory($cate_name, $has_size)
{
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO category_product (cate_name, create_at, update_at, has_size) VALUES (?, ?, ?, ?)");
    $query->execute([$cate_name, $create_at, $update_at, $has_size]);
    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}

// Hàm lấy danh sách danh mục
function getAllCategories()
{
    global $db;
    $query = $db->query("SELECT * FROM category_product");

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm lấy thông tin danh mục bằng id
function getCategoryById($id)
{
    global $db;

    $query = $db->prepare("SELECT * FROM category_product WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Hàm thêm sản phẩm
function addProduct($name, $decsription, $quantity, $price, $sale_price, $featured, $best_seller)
{
    global $db;

    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO products (name, decsription, quantity, price, sale_price, featured, best_seller, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$name, $decsription, $quantity, $price, $sale_price, $featured, $best_seller, $create_at, $update_at]);

    return $query->rowCount(); // Số dòng bị ảnh hưởng bởi câu lệnh INSERT
}
// hàm thêm thông báo
function addnotification($notification_type, $notification_content, $pinned)
{
    global $db;

    $created_at = date('Y-m-d');
    $query = $db->prepare("INSERT INTO notifications (notification_type, notification_content, pinned, created_at ) VALUES (?, ?, ?, ?)");
    $query->execute([$notification_type, $notification_content, $pinned, $created_at]);

    return $query->rowCount();
}

// Hàm lấy danh sách thông báo
function getAllNotifications()
{
    global $db;

    $query = $db->prepare("SELECT * FROM notifications  ORDER BY pinned DESC, created_at DESC");
    $query->execute(); // Thực thi truy vấn
    return $query->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả
}
// Hàm đếm số lượng thông báo
function countNotifications()
{
    global $db;

    $query = $db->prepare("SELECT COUNT(*) AS total FROM notifications");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

// Hàm cập nhật thông tin sản phẩm
function updateProduct($productId, $productName, $decsription, $quantity, $price)
{
    global $db;

    $updateAt = date("Y-m-d");

    $query = $db->prepare("UPDATE products SET name = ?, decsription = ?, quantity = ?, price = ?, update_at = ? WHERE id = ?");
    return $query->execute([$productName, $decsription, $quantity, $price, $updateAt, $productId]);
}

// Hàm lấy top 10 sản phẩm bán chạy
function getTopSalesProducts()
{
    global $db;

    // Chuẩn bị câu truy vấn SQL kết hợp hai bảng products và product_images
    $query = $db->prepare("SELECT p.id, p.name, p.price, pi.image_url
    FROM products p
    JOIN product_images pi ON p.id = pi.product_id
    WHERE p.best_seller = 1
    ORDER BY p.id DESC
    LIMIT 10");

    // Thực thi câu truy vấn
    $query->execute();

    // Lấy kết quả trả về thành một mảng danh sách sản phẩm
    $topSalesProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $topSalesProducts;
}



// Hàm cập nhật đơn hàng
function updateOrder($order_id, $status_payment, $status_delivery)
{
    global $db;

    // Lấy thời gian hiện tại
    $created_at = date('Y-m-d');

    // Câu truy vấn SQL cập nhật đơn hàng
    $sql = "UPDATE oders SET status_payment = ?, status_delivery = ?, created_at = ? WHERE id = ?";

    // Chuẩn bị câu truy vấn
    $stmt = $db->prepare($sql);

    // Thực hiện cập nhật đơn hàng
    return $stmt->execute([$status_payment, $status_delivery, $created_at, $order_id]);
}

// Hàm chuyển đổi trạng thái đơn hàng thành chuỗi:
function getOrderStatus($status)
{
    switch ($status) {
        case 0:
            return 'Chưa giao';
            break;
        case 1:
            return 'Đang giao';
            break;
        case 2:
            return 'Đã giao';
            break;
        case 3:
            return 'Hủy';
            break;

        default:
            return 'Không xác định';
            break;
    }
}
// Hàm xóa sản phẩm

function deleteProduct($productId)
{
    global $db;

    $query = $db->prepare("DELETE FROM products where id=?");
    $query->execute([$productId]);

    return $query->rowCount();
}

// HÀm xóa tất cả sản phẩm
function deleteAllProducts()
{
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



// hàm xoá all người dùng
function deleteAllUser()
{
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
// function getAllProducts() {
//     global $db;

//     $query = $db->query("SELECT * FROM products");
//     return $query->fetchAll(PDO::FETCH_ASSOC);
// }

// Hàm lấy danh sách sản phẩm
// Hàm lấy tổng số sản phẩm với sắp xếp theo cột created_at
function getTotalProductsSortedByCreatedAt($orderBy)
{
    global $db;

    $query = "SELECT COUNT(*) FROM products";
    if ($orderBy === 'oldest') {
        $query .= " ORDER BY create_at ASC";
    } else {
        $query .= " ORDER BY create_at DESC";
    }

    $result = $db->query($query);

    return $result->fetchColumn();
}






// Lấy thông tin sản phẩm bằng ID
function getProductById($productId)
{
    global $db;

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([$productId]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Hàm lấy tổng số sản phẩm theo ngày
function getTotalAllProduct($date)
{
    global $db;
    try {
        $query = $db->prepare("SELECT COUNT(*) as total from products where DATE(created_at) = ?");
        $query->execute([$date]);
        $total = $query->fetch(PDO::FETCH_ASSOC);
        return $total['total'];
    } catch (PDOException $e) {
        error_log("Có lỗi khi truy vấn:" . $e->getMessage());
        return 0;
    }
}


// Hàm cập nhật danh mục sản phẩm
function updateCategory($id, $cate_name, $has_size)
{
    global $db;

    $update_at = date("Y-m-d");
    $query = $db->prepare("UPDATE category_product SET cate_name = ?, has_size = ?, update_at = ? WHERE id = ?");
    return $query->execute([$cate_name, $has_size, $update_at, $id]);
}




// Hàm xoá danh mục
function deleteCategory($cate_id)
{
    global $db;

    $query = $db->prepare("SELECT * FROM category_product where id=?");
    $query->execute([$cate_id]);
    $cate = $query->fetch(PDO::FETCH_ASSOC);

    if (!$cate) {
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
function getProductImages($productId)
{
    global $db;

    $query = $db->prepare("SELECT * FROM product_images WHERE product_id = ?");
    $query->execute([$productId]);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
// hàm lấy địa chỉ ip người dùng
function getUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// hàm đăng ký tài khoản
function registerUser($user_name, $email, $password, $full_name, $phone_number)
{
    global $db;

    $query = $db->prepare("SELECT * FROM users where user_name = ? or email = ?");
    $query->execute([$user_name, $email]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
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
function checkEmailExists($email)
{
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
function getAllUsers()
{
    global $db;

    $query = $db->prepare("SELECT * FROM users");
    $query->execute();

    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// Lấy thông tin người dùng theo ID
function getUserById($id)
{
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
function randomPassword($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kytu = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i <= $length; $i++) {
        $randomPassword .= $characters[rand(0, $kytu - 1)];
    }
    return $randomPassword;
}

function sendPassword($email, $newPassword)
{
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
function updatePasswordInDatabase($email, $newPassword)
{
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
function updateUser($id, $user_name, $email, $role)
{
    global $db;

    $query = $db->prepare("UPDATE users SET user_name = ?, email = ?, role = ? WHERE id = ?");
    $query->execute([$user_name, $email, $role, $id]);

    return $query->rowCount() > 0; // Trả về true nếu số dòng bị ảnh hưởng > 0, ngược lại false
}

// hàm xoá người dùng

function deleteUser($id)
{
    global $db;

    $query = $db->prepare("SELECT * FROM users WHERE id=?");
    $query->execute([$id]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false; // người dùng không tồn tại
    }

    $query = $db->prepare("DELETE FROM users where id =?");
    $query->execute([$id]);

    return true; // xó thành công
}
// Hàm kiểm tra đăng nhập

function authenUser($user_name, $password)
{
    global $db;

    // kiểm tra  tên login có tồn tại hay không
    $query = $db->prepare("SELECT * FROM users where user_name = ?");
    $query->execute([$user_name]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}
// Hàm phân trang danh mục
function getCategoriesWithPagination($limit, $offset)
{
    global $db;

    $query = $db->prepare("SELECT * FROM categories LIMIT ? OFFSET ?");
    $query->bindValue(1, $limit, PDO::PARAM_INT);
    $query->bindValue(2, $offset, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Thêm mã giảm giá
function addCoupon($code, $type, $value, $status, $date_end)
{
    global $db;
    $create_at = date("Y-m-d");
    $update_at = date("Y-m-d");
    $query = $db->prepare("INSERT INTO coupon (code, type, value, status, date_end, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$code, $type, $value, $status, $date_end, $create_at, $update_at]);

    return $query->rowCount() > 0; // Trả về true nếu số dòng bị ảnh hưởng > 0, ngược lại false
}

// Hàm lấy danh sách mã giảm giá
function getAllCoupon()
{
    global $db;

    $sql = $db->prepare("SELECT * FROM coupon");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm lấy mã giảm giá theo id

function getCouponId($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM coupon where id =?");
    $sql->execute([$id]);
    return $sql->fetch(PDO::FETCH_ASSOC);
}

// Hàm cập nhật mã giảm giá
function updateCoupon($id, $code, $type, $value, $status, $date_end)
{
    global $db;
    $update_at = date('Y-m-d');
    $query = $db->prepare("UPDATE coupon SET code = ?, type = ?, value = ?, status = ?, date_end = ?, update_at = ? WHERE id = ?");
    $query->execute([$code, $type, $value, $status, $date_end, $update_at, $id]);
    return $query->rowCount();
}

// Hàm xóa mã giảm giá
function deleteCoupon($id)
{
    global $db;
    $query = $db->prepare("DELETE from coupon where id = ?");
    $query->execute([$id]);
    return $query->rowCount();
}

// functions.php

// Include TCPDF library
// require_once('tcpdf/tcpdf.php');

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF
{
    // Tùy chỉnh và định nghĩa các phương thức khác nếu cần thiết...

    // Colored table
    public function ColoredTable($header, $data)
    {
        // Mã để tạo bảng màu
        // Ví dụ:
        // ...
    }
}
// Xóa dữ liệu đệm và đảm bảo không có dữ liệu tiêu đề hoặc nội dung HTML nào đã được gửi từ trước
ob_end_clean();
// Hàm xử lý yêu cầu xuất PDF
function exportPDF($products)
{
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
function getTotalProducts()
{
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

// Hàm lấy tổng số đơn hàng
function getTotalOrderCount($db)
{
    try {
        $sql = "SELECT SUM(quantity) AS total_orders FROM oder_detail";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_orders'];
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn: " . $e->getMessage();
        return 0;
    }
}



function getOrdersInfo($paymentStatus, $orderBy)
{
    global $db;

    $query = "SELECT
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
        u.full_name AS customer_name,
        p.name AS product_name
    FROM oders o
    INNER JOIN users u ON o.cus_id = u.id
    INNER JOIN oder_detail od ON o.id = od.oder_id
    INNER JOIN products p ON od.product_id = p.id";

    if ($paymentStatus === 'desc') {
        $query .= " WHERE o.status_payment = 0";
    } elseif ($paymentStatus === 'asc') {
        $query .= " WHERE o.status_payment = 1";
    }

    if ($orderBy === 'newest') {
        $query .= " ORDER BY o.created_at DESC";
    } elseif ($orderBy === 'oldest') {
        $query .= " ORDER BY o.created_at ASC";
    }

    $stmt = $db->prepare($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}





// Hàm lấy tổng số đơn hàng theo ngày
function getTotalOrderCountByDate($db, $date)
{
    try {
        $sql = "SELECT SUM(quantity) AS total_orders FROM oder_detail od
                INNER JOIN oders o ON od.oder_id = o.id
                WHERE DATE(o.created_at) = :date";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_orders'];
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn: " . $e->getMessage();
        return 0;
    }
}



// Hàm lấy tổng số sản phẩm theo ngày
function getTongSoSanPhamTheoNgay($date)
{
    global $db;
    try {
        $sql = "SELECT COUNT(*) AS total_products from products where date(create_at) = :date";
        $query = $db->prepare($sql);
        $query->bindParam(':date', $date);
        $query->execute();
        $total = $query->fetch(PDO::FETCH_ASSOC);

        return $total['total_products'];
    } catch (PDOException $e) {
        echo "Lỗi khi truy vấn database" . $e->getMessage();
        return 0;
    }
}




// Hàm lấy tổng số sản phẩm của tháng
function getTongSoSanPhamTheoThang($db)
{
    try {
        $thang_hien_tai = date('m');
        $sql = "SELECT COUNT(*) AS total_products from products where MONTH(create_at) = :thang_hien_tai";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':thang_hien_tai', $thang_hien_tai, PDO::PARAM_INT);
        $stmt->execute();
        $query = $stmt->fetch(PDO::FETCH_ASSOC);

        $total_products = $query['total_products'];
        return $total_products;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn datbase: " . $e->getMessage();
        return 0;
    }
}

// Hàm tính tổng doanh thu oders đã bán
function tinhTongDoanhThuDaBan($db)
{
    try {
        $sql = "SELECT SUM(total_amount) as total_revenue FROM oders WHERE status_payment = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_revenue'];
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn:" . $e->getMessage();
        return 0;
    }
}

// Hàm tính tổng thu nhập theo ngày
function tinhTongThuNhapTheoNgay($db, $ngay_tao)
{
    try {
        $sql = "SELECT SUM(total_amount) as total_revenue
                FROM oders
                WHERE status_payment = 1 AND DATE(created_at) = :ngay_tao";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':ngay_tao', $ngay_tao);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_revenue'];
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn:" . $e->getMessage();
        return 0;
    }
}

// Hàm tính tổng doanh thu theo tuần
function tinhTongDoanhThuTheoTuan($db, $tuan)
{
    try {
        // Định dạng ngày đầu và ngày cuối của tuần
        $startOfWeek = date("Y-m-d", strtotime($tuan . ' this week'));
        $endOfWeek = date("Y-m-d", strtotime($tuan . ' this week +6 days'));

        $sql = "SELECT SUM(total_amount) as total_revenue
                FROM oders
                WHERE status_payment = 1 AND DATE(created_at) BETWEEN :start_date AND :end_date";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':start_date', $startOfWeek);
        $stmt->bindParam(':end_date', $endOfWeek);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_revenue'];
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn:" . $e->getMessage();
        return 0;
    }
}

// Hàm tính tổng doanh thu theo tháng
function tinhTongDoanhThuTheoThang($db, $thang)
{
    try {
        // Định dạng ngày đầu và ngày cuối của tháng
        $startOfMonth = date("Y-m-01", strtotime($thang));
        $endOfMonth = date("Y-m-t", strtotime($thang));

        $sql = "SELECT SUM(total_amount) as total_revenue
                FROM oders
                WHERE status_payment = 1 AND DATE(created_at) BETWEEN :start_date AND :end_date";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':start_date', $startOfMonth);
        $stmt->bindParam(':end_date', $endOfMonth);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_revenue'];
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn:" . $e->getMessage();
        return 0;
    }
}

// Hàm tính tổng doanh thu trung bình mỗi ngày
function tinhTongDoanhThuTrungBinhNgay($db)
{
    try {
        $sql = "SELECT SUM(total_amount) as total_revenue, COUNT(DISTINCT DATE(created_at)) as num_days
                FROM oders
                WHERE status_payment = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $total_revenue = $result['total_revenue'];
        $num_days = $result['num_days'];

        if ($num_days > 0) {
            $average_revenue_per_day = $total_revenue / $num_days;
        } else {
            $average_revenue_per_day = 0;
        }

        return $average_revenue_per_day;
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn:" . $e->getMessage();
        return 0;
    }
}

// Hàm cập nhật tổng số lượng sản phẩm tồn kho sau khi thanh toán đơn hàng
function capNhatSoLuongSauKhiThanhToan($db, $order_id)
{
    try {
        // Lấy thông tin sản phẩm và số lượng mua trong đơn hàng
        $sql = "SELECT product_id, quantity FROM oder_detail WHERE oder_id = :order_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        $order_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Cập nhật số lượng tồn kho cho từng sản phẩm trong đơn hàng
        foreach ($order_details as $order_detail) {
            $product_id = $order_detail['product_id'];
            $quantity_sold = $order_detail['quantity'];

            // Lấy thông tin sản phẩm hiện tại trong CSDL
            $sql_get_product = "SELECT quantity FROM products WHERE id = :product_id";
            $stmt_get_product = $db->prepare($sql_get_product);
            $stmt_get_product->bindParam(':product_id', $product_id);
            $stmt_get_product->execute();
            $product = $stmt_get_product->fetch(PDO::FETCH_ASSOC);

            // Cập nhật số lượng tồn kho mới
            $new_quantity = max($product['quantity'] - $quantity_sold, 0);

            // Cập nhật số lượng tồn kho mới vào CSDL
            $sql_update_product = "UPDATE products SET quantity = :new_quantity WHERE id = :product_id";
            $stmt_update_product = $db->prepare($sql_update_product);
            $stmt_update_product->bindParam(':new_quantity', $new_quantity);
            $stmt_update_product->bindParam(':product_id', $product_id);
            $stmt_update_product->execute();
        }

        return true;
    } catch (PDOException $e) {
        echo "Có lỗi khi cập nhật số lượng tồn kho:" . $e->getMessage();
        return false;
    }
}

// Hàm lấy tổng số lượng sản phẩm tồn kho
function tinhTongSoLuongTonKho($db)
{
    try {
        $sql = "SELECT SUM(quantity) as total_quantity from products";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $query = $stmt->fetch(PDO::FETCH_ASSOC);

        $total = $query['total_quantity'];
        return $total;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn database: " . $e->getMessage();
        return;
    }
}

// Hàm lấy 10 đơn hàng gần đây
function lay10DonHangGanDay($db)
{
    try {
        $sql = "SELECT * FROM oders ORDER BY created_at DESC LIMIT 10";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn:" . $e->getMessage();
        return array();
    }
}


// Hàm lấy tổng số đơn hàng ngày hiện tại
function getTongSoDonHangNgayHienTai($db)
{
    try {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ là Việt Nam
        $ngay_hien_tai = date("Y-m-d"); // Lấy ngày hiện tại theo múi giờ Việt Nam


        $sql = "SELECT SUM(quantity) AS total_orders
                FROM oder_detail od
                INNER JOIN oders o ON od.oder_id = o.id
                WHERE DATE(o.created_at) = :ngay_hien_tai";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':ngay_hien_tai', $ngay_hien_tai);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_orders'] ?? 0;
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn: " . $e->getMessage();
        return 0;
    }
}



// Hàm lấy tổng số đơn hàng tuần hiện tại
function getTongSoDonHangTuanHienTai($db)
{
    try {
        $tuan_hien_tai = date("W");

        $sql = "SELECT SUM(quantity) AS total_orders 
                FROM oder_detail od
                INNER JOIN oders o ON od.oder_id = o.id
                WHERE WEEK(o.created_at) = :tuan_hien_tai";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tuan_hien_tai', $tuan_hien_tai);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_orders'] ?? 0;
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn: " . $e->getMessage();
        return 0;
    }
}

// Hàm lấy tổng số đơn hàng tháng hiện tại
function getTongSoDonHangThangHienTai($db)
{
    try {
        $thang_hien_tai = date("m"); // Lấy số tháng hiện tại

        $sql = "SELECT SUM(quantity) AS total_orders
                FROM oder_detail od
                INNER JOIN oders o ON od.oder_id = o.id
                WHERE MONTH(o.created_at) = :thang_hien_tai";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':thang_hien_tai', $thang_hien_tai);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_orders'] ?? 0;
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn: " . $e->getMessage();
        return 0;
    }
}




// Hàm lấy tổng số sản phẩm theo tuần
function getTongSoSanPhamTheoTuan($db)
{
    try {
        $tuan_hien_tai = date("W");
        $sql = "SELECT COUNT(*) AS total_products from products where WEEK(create_at) = :tuan_hien_tai";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tuan_hien_tai', $tuan_hien_tai, PDO::PARAM_INT);
        $stmt->execute();
        $query = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_products = $query['total_products'];
        return $total_products;
    } catch (PDOException $e) {
        echo "Có lỗi khi truy vấn database: " . $e->getMessage();
        return 0;
    }
}

// ngày
$date = date('Y-m-d');
$totalProducts = getTongSoSanPhamTheoNgay($date);
$totalOrders = getTotalOrderCountByDate($db, $date);



// Hàm lấy danh sách sản phẩm phân trang
function getProductsByPage($page, $perPage)
{
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
// function getOrdersInfo(){
//     global $db;

//     $sql = "
//     SELECT
//         o.id AS order_id,
//         o.recipient_name,
//         o.phone_number,
//         o.address_detail,
//         o.province,
//         o.district,
//         o.ward,
//         o.total_amount,
//         o.status_payment,
//         o.status_delivery,
//         o.created_at AS order_created_at,
//         od.product_id,
//         od.quantity,
//         p.name AS product_name,
//         u.full_name AS customer_name,
//         u.email AS customer_email
//     FROM
//         oders o
//     INNER JOIN oder_detail od ON o.id = od.oder_id
//     INNER JOIN products p ON od.product_id = p.id
//     INNER JOIN users u ON o.cus_id = u.id
//     ORDER BY o.created_at DESC
//     ";

//     $stmt = $db->prepare($sql);
//     $stmt->execute();

//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
// Hàm lấy đơn hàng theo id
function getOrderById($order_id)
{
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

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getOrdersData() {
    global $db; // Đảm bảo biến $conn là biến toàn cục

    $sql = "SELECT * FROM oders";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}