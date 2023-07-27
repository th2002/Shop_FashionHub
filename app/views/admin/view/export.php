<?php
// Include các tệp và tạo các hàm cần thiết ở đây...
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

// Gọi hàm exportPDF() và truyền danh sách sản phẩm vào
if (isset($_GET['export_pdf'])) {
    $products = getAllUsers();

    // Gọi hàm exportPDF() để tạo và xuất tệp PDF
    $pdfFilePath = exportPDF($products);


    // Tải tệp PDF về máy tính của người dùng
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename='san-pham.pdf'");
    readfile($pdfFilePath);
    exit();
}

// Tiếp tục với phần mã của trang (header, nội dung HTML, v.v.)...
?>
