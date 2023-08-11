<!-- Controller -->

<!DOCTYPE html>
<html>

<head>

    <!--Link library Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body>

</body>

</html>

<?php
   

if (isset($_GET['oder_id'])) {
    require_once '../../models/DAO/oders.php';
    require_once '../../models/DAO/connect.php';
    require_once '../../../global.php';
    $oder_id = $_GET['oder_id'];
    $status_delivery = 3;

    if(isset($oder_id)) {
        update_oder_history($oder_id, $status_delivery);
        echo '<script>';
        echo 'Swal.fire({ title: "Hủy đơn hàng thành công!", icon: "success" }).then(function() {';
        echo '   window.location.href = "' . $SITE_URL . '/page_user/purchase-history.php";';
        echo '});';
        echo '</script>';
    }
}