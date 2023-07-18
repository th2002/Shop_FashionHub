<?php
require_once '../../global.php';
require_once '../models/CategoryModel.php';

// Khởi tạo biến thông báo mặc định
$message = '';

// Kiểm tra xem yêu cầu là POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $productName = $_POST['product_name'];
    $thumbnail = $_POST['thumbnail'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $salePrice = $_POST['sale_price'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    $bestSeller = isset($_POST['best_seller']) ? 1 : 0;
    $categoryId = $_POST['category_id'];

    // Xử lý dữ liệu form và kiểm tra hợp lệ
    // ...

    // Tạo một bản ghi trong bảng cartitems
    $query = $db->prepare("INSERT INTO cartitems (quantity) VALUES (?)");
    $query->execute([$quantity]);

    // Lấy id của bản ghi vừa tạo
    $cartItemId = $db->lastInsertId();

    // Thêm sản phẩm với cartitem_id đã lấy được
    $createAt = date("Y-m-d");
    $updateAt = date("Y-m-d");
    $result = addProduct($productName, $thumbnail, $slug, $description, $quantity, $price, $salePrice, $featured, $bestSeller, $categoryId, $cartItemId, $createAt, $updateAt);

    if ($result) {
        // Thêm sản phẩm thành công, hiển thị thông báo hoặc chuyển hướng
        $message = "Thêm sản phẩm thành công!";
        // Hoặc chuyển hướng đến trang danh sách sản phẩm
        // header("Location: danh_sach_san_pham.php");
        // exit();
    } else {
        // Thêm sản phẩm thất bại, hiển thị thông báo lỗi
        $message = "Thêm sản phẩm thất bại!";
    }
}
header("Location: ../view/productList.php");
exit();
// Gọi tệp view để hiển thị giao diện thêm sản phẩm
require_once '../view/addProduct.php';
?>
