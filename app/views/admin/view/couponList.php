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
</style>



<?php
$modelPath = "$rootDir/app/models/DAO/functions.php";

// Gọi tệp functions
require_once $modelPath;

$coupons = getAllCoupon();


?>

<h2 class="title">Danh sách Mã giảm giá</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addCoupon.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>

        <h4 class="add-category"><a href="#" onclick="deleteAllCoupon()" class="add-links" id="In"><i class="fas fa-print"></i>Xóa All</a></h4>



    </div>
    <div class="menu-right">
        <h5>Thời gian hiện tại: <span id="current-time"></span></h5>

    </div>
</div>
<div class="table">
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã</th>
                <th>GIá giảm</th>
                <th>Trạng thái</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coupons as $coupon) { ?>
                <tr>
                    <td><?= $coupon['id']; ?></td>
                    <td><?= $coupon['code']; ?></td>
                    <td><?= $coupon['value']; ?></td>
                    <td>
                        <?php
                        // Kiểm tra giá trị của trạng thái và áp dụng lớp CSS tương ứng
                        if ($coupon['status'] == '0') {
                            echo '<span class="status-inactive">Chưa kích hoạt</span>';
                        } elseif ($coupon['status'] == '1') {
                            echo '<span class="status-active">Đã kích hoạt</span>';
                        } else {
                            echo '<span class="status-invalid">Trạng thái không hợp lệ</span>';
                        }
                        ?>
                    </td>
                    <td><?= $coupon['update_at']; ?></td>
                    <td class="action-links">
                        <?php if ($_SESSION['user_position'] != 0) { ?>

                            <a href="editCoupon.php?id=<?php echo $coupon['id']; ?>" class="btn-sua">Sửa</a>
                            <a href="<?php echo $controller; ?>/admin/deleteCoupon.php?id=<?php echo $coupon['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" class="btn-xoa">Xóa</a>
                        <?php } else
                            echo "Website has a virus";
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>


<script>
    function deleteAllCoupon() {
        if (confirm('Bạn có chắc muốn xoá tất cả sản phẩm')) {
            $.ajax({
                type: 'GET',
                url: '<?php echo $controller; ?>/admin/deleteAllCoupon.php',
                success: function(response) {
                    if (response === 'success') {
                        alert('Xoá tất cả mã giảm giá thành công!');
                        window.location.href = '<?php echo $controller; ?>/admin/couponLits.php';
                    } else {
                        alert('Xoá tất cả mã giảm giá không thành công, vui lòng thử lại!');
                    }
                }
            });
        }
    }
</script>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->