<?php 

// insert info user to table oder 
function insert_info_users( $recipient_name, $phone_number, $address_detail, $province, $district, $ward, $coupon_code_id, $payment_method, $created_at) {
    $sql = "INSERT INTO oders(recipient_name, phone_number, address_detail, province_id, district_id, ward_id, coupon_code_id, payment_method, created_at)
    VALUES (?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $recipient_name, $phone_number, $address_detail, $province, $district, $ward, $coupon_code_id, $payment_method, $created_at);
}

// select * oder where user_id
function select_oder_all_by_user($user_id) {
    $sql = "SELECT * FROM oders WHERE cus_id = ?";
    return pdo_query($sql, $user_id);
}
// select * coupon where id
function select_all_coupon($id) {
    $sql = "SELECT * FROM coupon WHERE id = ?";
    return pdo_query_one($sql, $id);
}
function select_all_coupons() {
    $sql = "SELECT * FROM coupon";
    return pdo_query($sql);
}
// select oder_detail where oders
function select_order_details_with_product_info($order_id) {
    $sql = "
        SELECT od.quantity, od.size ,p.name AS product_name, p.price, pi.image_url
        FROM oder_detail od
        INNER JOIN products p ON od.product_id = p.id
        INNER JOIN product_images pi ON p.id = pi.product_id
        WHERE od.oder_id = ?";
    
    return pdo_query($sql, $order_id);
}