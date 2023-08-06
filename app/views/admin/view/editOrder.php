<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->

<h2 class="title">Cập nhật đơn hàng</h2>

<?php   
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // lấy thông tin đơn hàng từ id
    $order = getOrderById($order_id);

    // Kiểm tra có đơn hàng hay không
    $has_order = count($order) > 0;

    if ($has_order) {
        // khởi tạo thông báo
        $message = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // lấy dữ liệu từ form cập nhật đơn hàng
            $status_payment = $_POST['status_payment'];
            $status_delivery = $_POST['status_delivery'];

            $capnhat = updateOrder($order_id, $status_payment, $status_delivery);

             // Gọi hàm cập nhật tổng số lượng sản phẩm tồn kho sau khi thanh toán đơn hàng
               capNhatSoLuongSauKhiThanhToan($db, $order_id);
            if ($capnhat) {
                $message = "Cập nhật đơn hàng thành công";
            } else {
                $message = "Cập nhật đơn hàng thất bại!";
            }
        }
    }
}
?>
<form action="" method="post">
    <?php if ($has_order) { ?>
        <label for="status_payment">Thanh toán</label>
        <select name="status_payment" id="">
            <option value="0" <?php if ($order['status_payment'] === 0) echo 'selected'; ?>>Chưa thanh toán</option>
            <option value="1" <?php if ($order['status_payment'] === 1) echo 'selected'; ?>>Đã thanh toán</option>
        </select>

        <label for="status_delivery">Trạng thái</label>
        <select name="status_delivery" id="">
            <option value="0" <?php if ($order['status_delivery'] === 0) echo 'selected'; ?>>Chưa giao</option>
            <option value="1" <?php if ($order['status_delivery'] === 1) echo 'selected'; ?>>Đang giao</option>
            <option value="2" <?php if ($order['status_delivery'] === 2) echo 'selected'; ?>>Đã giao</option>
            <option value="3" <?php if ($order['status_delivery'] === 3) echo 'selected'; ?>>Đã hủy</option>
        </select>

        <label for="created_at">Ngày tạo đơn hàng:</label>
        <input type="date" id="created_at" name="created_at" value="<?php echo $order['created_at']; ?>">
        <button type="submit">Cập nhật</button>
    <?php } else { ?>
        <p>Không tìm thấy đơn hàng!</p>
    <?php } ?>
    <?php if (!empty($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>
</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
