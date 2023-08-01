<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // thực hiện xoá tất cả mã 
    $xoaall = deleteAllCoupon();

    if($xoaall){

        header("Location: ../admin/couponList.php?success=deleteall");
        exit();
    }else{
        header("Location: ../admin/couponList.php?error=deleteall");
        exit();
    }
}
?>