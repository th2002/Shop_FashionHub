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
<form method="POST" action="../controller/CategoryController.php">
    <label for="cate_name">Tên danh mục:</label>
    <input type="text" name="cate_name" id="cate_name" required><br>

    <label for="cate_slug">Slug danh mục:</label>
    <input type="text" name="cate_slug" id="cate_slug" required><br>

    <label for="cate_banner">Banner danh mục:</label>
    <input type="text" name="cate_banner" id="cate_banner" required><br>

    <button type="submit">Thêm danh mục</button>
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