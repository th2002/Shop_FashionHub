<!-- Controller -->

<?php

$loi = "";
if (isset($_POST['btn_buy'])) {
    // oders
    $cus_id = $_SESSION['user_id'];
    $recipient_name = $_POST['cus_name'];
    $phone_number = $_POST['cus_phone'];
    $address_detail = $_POST['cus_address_detail'];
    $province = $_POST['province_name'];
    $district = $_POST['district_name'];
    $ward = $_POST['ward_name'];
    $coupon_code_id = $_POST['coupon'];
    $payment_method = $_POST['method_payment'] == 1 ? 0 : 1;
    $total_amount = $_POST['total_money'];
    $status_payment = $_POST['method_payment'] == 2 ? 1 : 0;
    $status_delivery = 0;
    $created_at = $_POST['toDay'];

    // oder_details

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $oder_id = '';

    if (empty($phone_number)) {
        $loi .= "Không được bỏ trống sdt<br>";
    }

    if (empty($address_detail)) {
        $loi .= "Không được bỏ trống địa chỉ<br>";
    }

    if (empty($loi)) {
        $oder_id = insert_info_users(
            $cus_id,
            $recipient_name,
            $phone_number,
            $address_detail,
            $province,
            $district,
            $ward,
            $coupon_code_id,
            $payment_method,
            $total_amount,
            $status_payment,
            $status_delivery,
            $created_at
        );

        if ($oder_id !== false) {
            for ($i = 0; $i < count($product_id); $i++) {
                insert_oder_detail($product_id[$i], $quantity[$i], $size[$i], $oder_id);
            }

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
}