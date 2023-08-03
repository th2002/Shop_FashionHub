<?php 

if (isset($_POST['city_id'])) {
    $cityId = $_POST['city_id'];

    // Truy vấn SQL để lấy danh sách các quận/huyện dựa vào id thành phố
    $query = "SELECT * FROM district WHERE _province_id = :cityId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':cityId', $cityId);
    $stmt->execute();
    $districts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về dữ liệu dạng JSON để sử dụng trong AJAX
    echo json_encode($districts);
} else {
    // Trả về mảng rỗng nếu không nhận được id thành phố
    echo json_encode([]);
}