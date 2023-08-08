<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a,
    .pagination .current {
        padding: 8px 12px;
        background-color: #f0f0f0;
        margin: 0 5px;
        text-decoration: none;
        color: #333;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination .current {
        background-color: #007bff;
        color: #fff;
    }

    .menu-chucnang {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;

    }

    .menu-left {
        display: flex;
        gap: 20px;
    }

    .menu-right {
        text-align: end;
    }

    .add-category {
        margin: 0;
    }





    /* Responsive styles */
    @media (max-width: 1050px) {
        .menu-left {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 1050px) {
        .menu-left {
            margin-bottom: 10px;
        }

        h5 {
            font-size: 14px;
        }
    }

    .action-links {
        width: 200px;
        /* Đặt chiều rộng cố định, bạn có thể thay đổi giá trị tùy ý */
        margin: 0 auto;
    }

    .action-links a {
        display: block;
        /* Hiển thị hình ảnh dạng khối */
        margin: 0 auto;
        /* Căn giữa hình ảnh */
    }

    .sap-xep {
        display: block;
        width: 200px;
        padding: 20px;
        float: right;
    }

    .sap-xep select {
        font-size: 14px;
        font-weight: 500;
    }

    .name-product {
        text-align: end;
    }

    /* CSS */
    /* Màu chữ cho các trạng thái đơn hàng */
    .status-not-delivered {
        color: red;
    }

    .status-in-progress {
        color: orange;
    }

    .status-delivered {
        color: green;
    }

    .status-huy {
        color: red;
        font-weight: 500;
    }

    .fa-times-circle {
        color: red;
        opacity: 0.4;
    }

    .fa-face-angry {
        color: red;
    }

    /* Màu chữ cho các trạng thái thanh toán */
    .status-not-paid {
        color: red;
    }

    .status-paid {
        color: green;
    }

    /* CSS cho hiệu ứng nhảy lên */
    .btn-chi-tiet {
        padding: 5px;
        background-color: aquamarine;
    }
</style>

<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

// Hàm chuyển đổi trạng thái đơn hàng thành chuỗi có icon
function getOrderStatusWithIcon($status)
{
    switch ($status) {
        case 0:
            return '<span class="status-icon"><i class="fas fa-circle-notch"></i> Chưa giao</span>';
            break;
        case 1:
            return '<span class="status-icon"><i class="fas fa-truck"></i> Đang giao</span>';
            break;
        case 2:
            return '<span class="status-icon"><i class="fas fa-check-circle"></i> Đã giao</span>';
            break;
        case 3:
            return '<span class="status-icon"><i class="fas fa-times-circle"></i> Hủy</span>';
            break;
        default:
            return '<span class="status-icon">Không xác định</span>';
            break;
    }
}

?>

<h2 class="title">Danh sách đơn hàng</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addProduct.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>
        <h4 zclass="add-category"><a href="export.php" class="add-links" id="xuat-excel"><i class="fas fa-file-excel"></i>
                Xuất Excel</a></h4>
        <h4 class="add-category"><a href="export.php?export_pdf" class="add-links" id="xuat-pdf"><i class="fas fa-file-pdf"></i>
                Xuất PDF</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="In"><i class="fas fa-print"></i>In dữ
                liệu</a></h4>
        <h4 class="add-category"><a href="#" onclick="deleteAllProducts()" class="add-links" id="In"><i class="fas fa-print"></i>Xóa All</a></h4>



    </div>
    <div class="menu-right">
        <h5>Thời gian hiện tại: <span id="current-time"></span></h5>


    </div>

</div>
<div class="sap-xep">

</div>
<div class="table">
    <!-- HTML -->
    <!-- HTML -->
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Người nhận</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $orders = getOrdersInfo(); // Lấy thông tin đơn hàng

            foreach ($orders as $order) {
                $statusClass = '';
                $statusIcon = '';
                if ($order['status_delivery'] == 0) {
                    $statusText = 'Chưa giao';
                    $statusClass = 'status-not-delivered';
                    $statusIcon = '<i class="fas fa-shipping-fast animate__animated animate__spin"></i>';
                } elseif ($order['status_delivery'] == 1) {
                    $statusText = 'Đang giao';
                    $statusClass = 'status-in-progress';
                    $statusIcon = '<i class="fas fa-shipping-fast animate__animated animate__bounce"></i>';
                } elseif ($order['status_delivery'] == 2) {
                    $statusText = 'Đã giao';
                    $statusClass = 'status-delivered';
                    $statusIcon = '<i class="fas fa-check-circle cart three animate__animated animate__swing animate__repeat-3"></i>';
                } elseif ($order['status_delivery'] == 3) {
                    $statusText = 'Đã hủy';
                    $statusClass = 'status-huy';
                    $statusIcon = '<i class="fas fa-times-circle"></i>';
                } else {
                    $statusText = 'Không xác định';
                }

                $paymentClass = '';
                $paymentIcon = '';
                if ($order['status_payment'] == 0) {
                    $paymentText = 'Chưa thanh toán';
                    $paymentClass = 'status-not-paid';
                    $paymentIcon = '<i class="fa-solid fa-face-angry animate__animated animate__swing animate__repeat-3"></i>';
                } elseif ($order['status_payment'] == 1) {
                    $paymentText = 'Đã thanh toán';
                    $paymentClass = 'status-paid';
                    $paymentIcon = '<i class="fa-solid fa-money-check-dollar animate__animated animate__swing animate__repeat-3"></i>';
                } else {
                    $paymentText = 'Không xác định';
                }
            ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['product_name']; ?></td>
                    <td><?php echo $order['recipient_name']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>

                    <td><?php echo number_format($order['total_amount'], 0, ',', ',');  ?></td>
                    <td class="<?php echo $statusClass; ?>"><?php echo $statusIcon . ' ' . $statusText; ?></td>
                    <td class="<?php echo $paymentClass; ?>"><?php echo $paymentIcon . ' ' . $paymentText; ?></td>
                    <td class="action-links">
                        <?php if($_SESSION['user_role'] = 1) { ?>
                        <a href="editOrder.php?id=<?php echo $order['order_id']; ?>" class="btn-sua">Sửa</a>
                        

                            <a href="#" onclick="return confirmDelete(<?php echo $order['order_id']; ?>, '<?php echo $order['status_payment']; ?>');" class="btn-xoa">Xóa</a>
                        
                        <?php }else
                          echo "Bạn đã bị cấm!!!";
                        ?>
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>




    <!-- Table chi tiết -->
    <div id="orderDetailPopup" class="popup" style="display: none;">
        <h2>Chi tiết đơn hàng</h2>
        <table class="category-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Người nhận</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                </tr>
            </thead>
            <tbody id="orderDetailBody">
                <!-- Dữ liệu của bảng chi tiết đơn hàng sẽ được điền vào đây bằng JavaScript -->
            </tbody>
        </table>
        <button onclick="hidePopup()">Đóng</button>
    </div>

</div>
<!-- Hiển thị nút phân trang -->
<div class="pagination">

</div>

<script>
function confirmDelete(orderId, statusPayment) {
    if (statusPayment === '1') {
        Swal.fire({
            icon: 'error',
            title: 'Đã nhận tiền thì không thể xóa!!!',
            text: 'Đã nhận tiền thì không thể xóa!!!'
        });
        return false;
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Xác nhận xóa đơn hàng',
            text: 'Bạn có chắc chắn muốn xóa đơn hàng này không?',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "deleteOrder.php?id=" + orderId;
            }
        });
    }
    return false;
}

</script>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->