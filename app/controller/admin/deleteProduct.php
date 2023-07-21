<?php
require_once '../models/CategoryModel.php';

// Kiểm tra xem có id được truềy từ url
if(isset($_GET['id'])){
    $productId = $_GET['id'];

    //Gọi hàm xóa sản phẩm
    $xoaSanpham = deleteProduct($productId);

    if($xoaSanpham){
        $message = "Xóa sản phẩm thành công!";
    }else{
        $message = "Xóa không thành cong!";
    }
}
header("Location: ../view/productList.php");
exit();
?>