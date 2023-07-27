<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/dao/functions.php";
// gọi hàm functions
require_once $modelPath;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // gọi hàm xoá all users
    $xoaall = deleteAllUser();

    if($xoaall){
        header('Location: ../admin/users.php?success=deleteall');
        exit();
    }else{
        header(('Location: ../damin/users.php?error=deleteall'));
    }
}
?>