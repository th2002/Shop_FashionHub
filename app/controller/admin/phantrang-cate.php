<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

function getAllCategoriesWithPagination($page = 1, $limit = 10) {
    // Gọi hàm trong model để lấy tổng số danh mục
    $totalCategories = getTotalCategories();

    // Tính toán số trang
    $totalPages = ceil($totalCategories / $limit);

    // Xác định trang hiện tại không được vượt quá số trang
    $currentPage = min($totalPages, $page);

    // Tính vị trí bắt đầu của dữ liệu trên trang hiện tại
    $offset = ($currentPage - 1) * $limit;

    // Gọi hàm trong model để lấy danh sách danh mục theo trang
    $categories = getCategoriesWithPagination($limit, $offset);

    return [
        'categories' => $categories,
        'totalPages' => $totalPages,
        'currentPage' => $currentPage
    ];
}

?>