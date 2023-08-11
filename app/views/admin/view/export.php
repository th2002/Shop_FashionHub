<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');



$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

$ordersData = getOrdersData();

// Thiết lập tiêu đề và kiểu tập tin cho xuất Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="orders_export.xls"');

// Tạo nội dung tập tin Excel
echo '<table border="1">
        <tr style="background-color: red;">
            <th style="border: 1px solid #555;">ID</th>
            <th style="border: 1px solid #555;">Customer ID</th>
            <th style="border: 1px solid #555;">Recipient Name</th>
            <th style="border: 1px solid #555;">Phone Number</th>
            <th style="border: 1px solid #555;">Address Detail</th>
            <th style="border: 1px solid #555;">Province</th>
            <th style="border: 1px solid #555;">District</th>
            <th style="border: 1px solid #555;">Ward</th>
            <th style="border: 1px solid #555;">Coupon Code ID</th>
            <th style="border: 1px solid #555;">Payment Method</th>
            <th style="border: 1px solid #555;">Total Amount</th>
            <th style="border: 1px solid #555;">Status Payment</th>
            <th style="border: 1px solid #555;">Status Delivery</th>
            <th style="border: 1px solid #555;">Created At</th>
        </tr>';

foreach ($ordersData as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid #000;">' . $row['id'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['cus_id'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['recipient_name'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['phone_number'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['address_detail'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['province'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['district'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['ward'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['coupon_code_id'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . ($row['payment_method'] == 0 ? 'Tiền mặt (COD)' : 'Bank') . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['total_amount'] . '</td>';
    echo '<td style="border: 1px solid #000;">' . ($row['status_payment'] == 0 ? 'Chưa thanh toán' : 'Đã thanh toán') . '</td>';
    echo '<td style="border: 1px solid #000;">' . getStatusDelivery($row['status_delivery']) . '</td>';
    echo '<td style="border: 1px solid #000;">' . $row['created_at'] . '</td>';
    echo '</tr>';
}

echo '</table>';

// Đóng kết nối với cơ sở dữ liệu
$conn = null;

// Hàm chuyển đổi trạng thái giao hàng thành chữ
function getStatusDelivery($status)
{
    switch ($status) {
        case 0:
            return 'Chưa giao';
        case 1:
            return 'Đang giao';
        case 2:
            return 'Đã giao';
        case 3:
            return 'Đã hủy';
        default:
            return '';
    }
}
?>