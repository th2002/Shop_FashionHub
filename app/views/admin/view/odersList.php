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
    .name-product{
        text-align: end;
    }
</style>



<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;


?>

<h2 class="title">Danh sách đơn hàng</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addProduct.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-excel"><i class="fas fa-file-excel"></i>
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
<table class="category-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Người nhận</th>
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
        ?>
            <tr>
                <td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['product_name']; ?></td>
                <td><?php echo $order['recipient_name']; ?></td>
                <td><?php echo $order['total_amount']; ?></td>
                <td><?php echo $order['status_delivery']; ?></td>
                <td><?php echo $order['status_payment']; ?></td>
                <td class="action-links">
                   <a href="#" class="btn-chi-tiet" onclick="showDetail('<?php echo $order['order_id']; ?>')">Chi tiết</a>
                    <a href="editOrder.php?id=<?php echo $order['order_id']; ?>" class="btn-sua">Sửa</a>
                    <a href="../controller/deleteOrder.php?id=<?php echo $order['order_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')" class="btn-xoa">Xóa</a>
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
     function showDetail(order_id) {
        // Hiển thị popup
        var popup = document.getElementById('orderDetailPopup');
        popup.style.display = 'block';

        // Lấy thông tin đơn hàng theo id bằng Ajax và điền vào bảng chi tiết đơn hàng
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var order = JSON.parse(this.responseText);
                var orderDetailBody = document.getElementById('orderDetailBody');
                orderDetailBody.innerHTML = `
                    <tr>
                        <td>${order.order_id}</td>
                        <td>${order.product_name}</td>
                        <td>${order.recipient_name}</td>
                        <td>${order.total_amount}</td>
                        <td>${order.status_delivery}</td>
                        <td>${order.status_payment}</td>
                    </tr>
                    <!-- Thêm thông tin chi tiết khác vào đây -->
                `;
            }
        };
        xhttp.open("GET", "getOrderDetail.php?order_id=" + order_id, true);
        xhttp.send();
    }

    function hidePopup() {
        // Ẩn popup
        var popup = document.getElementById('orderDetailPopup');
        popup.style.display = 'none';
    }

</script>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->