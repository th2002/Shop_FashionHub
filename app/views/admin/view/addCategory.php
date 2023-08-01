<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<h2 class="title">Thêm voucher</h2>

<!-- Mã HTML cho form nhập dữ liệu -->
<form method="POST" action="<?php echo $controller ?>/admin/addCate.php">
    <label for="cate_name">Tên danh mục:</label>
    <input type="text" name="cate_name" id="cate_name" required><br>

    <label for="has_size">Chọn size</label>
    <select name="has_size" >
        <option value="o">Không có size</option>
        <option value="1">Có size</option>
    </select>

    <div class="button-container">
        <button type="submit">Thêm sản phẩm</button>
        <a href="categoryList.php" class="cancel-button">Hủy</a>
    </div>
    <?php if (!empty($message)) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thông báo',
            text: "<?php echo $message; ?>",
            confirmButtonText: 'OK'
        });
    </script>
<?php } ?>

</form>
<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->