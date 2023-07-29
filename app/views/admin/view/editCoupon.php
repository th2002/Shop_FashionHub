

<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->

<h2 class="title">Sửa voucher</h2>
<?php   
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // lấy mã giảm theo id
    $coupon = getCouponId($id);
    $error = "";

    if(!empty($coupon) && isset($coupon['id'])){
        // Hiển thị form chỉ khi có mã giảm giá được tìm thấy
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $code = $_POST['code'];
            $type = $_POST['type'];
            $value = $_POST['value'];
            $status = $_POST['status'];
            $date_end = $_POST['date_end'];
            $update_at = date("Y-m-d");

            // thực hiện cập nhật mã giảm giá vào database
            $themma = updateCoupon($id, $code, $type, $value, $status, $date_end);
            if($themma){
                $error = "Cập nhật mã thành công";
            }else{
                $error = "Cập nhật mã thất bại!";
            }
        }
?>
        <!-- Mã HTML cho form nhập dữ liệu -->
        <form method="POST" action="">
            <?php if(!empty($error)) {?>
                <p><?php echo $error ;?></p>

                <?php } ?>
            <label for="code">Mã</label>
            <input type="text" name="code" value="<?= $coupon['code'];?>"> <br>

            <label for="type">Kiểu</label>
            <select name="type" id="">
                <option value="">Chọn Kiểu</option>
                <option value="amount" <?php if ($coupon['type'] === 'amount') echo 'selected'; ?>>Giảm theo số tiền</option>
                <option value="percent" <?php if ($coupon['type'] === 'percent') echo 'selected'; ?>>Giảm theo %</option>
            </select>

            <label for="value">Value</label>
            <input type="text" name="value" value="<?= $coupon['value'] ;?>"><br>

            <label for="status">Trạng thái</label>
            <select name="status" id="">
                <option value="">Chọn trạng thái</option>
                <option value="0" <?php if ($coupon['status'] === '0') echo 'selected'; ?>>Chưa kích hoạt</option>
                <option value="1" <?php if ($coupon['status'] === '1') echo 'selected'; ?>>Đã kích hoạt</option>
            </select>

            <label for="date_end">Ngày hết hạn</label>
            <input type="date" name="date_end" value="<?= $coupon['date_end'] ;?>"><br>

            <button type="submit">Sửa</button>

        </form>
<?php 
    } else { 
        echo "<p>Không tìm thấy mã giảm giá</p>";
    }
}
?>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
