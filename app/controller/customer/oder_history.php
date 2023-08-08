<!-- Controller -->

<?php

    $error = "";
    if(isset($_POST['btnHuy'])) {
    $canceled_order_ids = $_POST['oder_id']; // Array oder id
    $status_delivery = 3;

    foreach ($canceled_order_ids as $oder_id) {
        update_oder_history($oder_id, $status_delivery);
        echo '<script>';
        echo 'Swal.fire({ title: "Hủy đơn hàng thành công!", icon: "success" }).then(function() {';
        echo '   window.location.href = "' . $SITE_URL . '/page_user/purchase-history.php";';
        echo '});';
        echo '</script>';
    }
}