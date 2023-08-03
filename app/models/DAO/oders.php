<?php 

// insert info user to table oder 
function insert_info_users( $recipient_name, $phone_number, $address_detail, $province_id, $district_id, $ward_id, $coupon_code_id, $payment_method, $created_at) {
    $sql = "INSERT INTO oders(recipient_name, phone_number, address_detail, province_id, district_id, ward_id, coupon_code_id, payment_method, created_at)
    VALUES (?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $recipient_name, $phone_number, $address_detail, $province_id, $district_id, $ward_id, $coupon_code_id, $payment_method, $created_at);
}

// insert product to table cart_itmes
function insert_cart_items($cart_id, $product_id, $quantity) {
    $sql = "INSERT INTO cartitems(cart_id, product_id, quantity) VALUES (?,?,?,?)";
    pdo_execute($sql, $cart_id, $product_id, $quantity);
}

// insert cart_tiems to table cart 
function inset_cart($cus_id, $total_amount, $create_at) {
    $sql = "INSERT INTO cart(cus_id, total_amount, create_at) VALUES (?,?,?,?)";
    pdo_execute($sql, $cus_id, $total_amount, $create_at);
}