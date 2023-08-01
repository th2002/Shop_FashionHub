<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');

$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;
$error = "";
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $notification_type = $_POST['notification_type'];
    $notification_content = $_POST['notification_content'];
    $pinned = $_POST['pinned'];

    if(empty($notification_content) || empty($notification_type) || empty($pinned)){
        $error = "Vui lòng nhập đày đủ thông tin!";
    }else{
        $them = addnotification($notification_type, $notification_content, $pinned);
        if($them){
            $error = "Thêm thông báo thành công!";
            exit();
        }else{
            $error = "Thêm thông báo thất bại";
            exit();
        }
    }
}
// Gọi tệp view cho form nhập dữ liệu
require_once '../../views/admin/view/setting.php';
?>