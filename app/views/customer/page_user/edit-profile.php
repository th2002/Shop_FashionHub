<!-- Controller -->
<?php
require_once '../../../models/DAO/edit-profile.php';
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
        echo 'Vui lòng không truy cập bằng đường dẫn trực tiếp';
        exit();
    }
$loi = "";
$user_id = $_SESSION['user_id'];
$user = select_user($_SESSION['user_id']);
if (isset($_POST['btnsubmitprofile'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if (empty($fullname)) {
        $loi .= "Họ và tên không được bỏ trống<br>";
    }

    if (empty($phone)) {
        $loi .= "Số điện thoại không được bỏ trống<br>";
    }

    if (empty($email)) {
        $loi .= "Email không được bỏ trống<br>";
    }

    if (empty($loi)) {
        update_profile($user_id, $email, $fullname, $phone);
        echo '<script>';
        echo 'Swal.fire({ title: "Cập nhật thành công!", icon: "success" }).then(function() {';
        echo '   window.location.href = "' . $SITE_URL . '/page_user/form-edit-profile.php";';
        echo '});';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'Swal.fire({ title: "Lỗi", html: "' . addslashes($loi) . '", icon: "error" });';
        echo '</script>';
    }
}
?>