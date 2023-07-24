<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
require_once('../../models/DAO/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $cate_id = $_GET['id'];

    // gọi hàm xóa danh mục
    $xoa = deleteCategory($cate_id);

    if($xoa){
        // xóa thành công chuyển về trang danh sách danh mục
        header('Location:' . $viewAdmin . '/categoryList.php');
    }else{
        // Đặt thông báo lỗi
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Xóa danh mục không thành công",
                showCancelButton: false,
                confirmButtonText: "OK",
                timer: 1000, // 1 giây
                timerProgressBar: true,
                willClose: function () {
                    window.location.href = "categoryList.php";
                }
            });
        </script>';
    }
}
?>