

<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->

<h2 class="title">Sửa danh mục</h2>
<?php

// Kiểm tra xem có ID được truyền từ URL không
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Lấy danh mục theo ID
    $category = getCategoryById($categoryId);

    // Kiểm tra xem danh mục có tồn tại hay không
    if (!empty($category) && isset($category['id'])) {
        // Khởi tạo biến thông báo mặc định
        $message = '';

        // Kiểm tra xem yêu cầu là POST hay không
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form sửa danh mục
            $cate_name = $_POST['cate_name'];
            $has_size = $_POST['has_size'];
            
            $update_at = date("Y-m-d");
            
            // Thực hiện cập nhật danh mục
            $sua = updateCategory($categoryId, $cate_name, $has_size);

            if ($sua) {
                // Đặt thông báo thành công
                echo '<script>
                Swal.fire({
                  icon: "success",
                  title: "Sủa danh mục thành công",
                  showCancelButton: false,
                  confirmButtonText: "OK",
                  timer: 1000, // 5 giây
                  timerProgressBar: true,
                  willClose: function() {
                    window.location.href = "categoryList.php";
                  }
                });
                </script>';
            } else {
                // Đặt thông báo lỗi
                $message = "Có lỗi xảy ra khi cập nhật danh mục.";
            }
        }
    }
}
?>
<!-- Mã HTML cho form nhập dữ liệu -->
<form method="POST" action="">
    <?php if (!empty($category) && isset($category['id'])) { ?>
        <label for="cate_name">Tên danh mục:</label>
        <input type="text" name="cate_name" id="cate_name" value="<?php echo $category['cate_name']; ?>" required><br>

        <label for="has_size">Size </label>
        <p><?= ($category['has_size'] == 1) ? 'Có size' : 'không có size'; ?></p>
        <select name="has_size" id="">
            <option value="0" <?php echo ($category['has_size'] == 0) ? 'selected' : ''; ?>>Không có size</option>
            <option value="1" <?php echo ($category['has_size'] == 1) ? 'selected' : ''; ?>>Có size</option>
        </select>
        <button type="submit">Sửa danh mục</button>
    <?php } else { ?>
        <p>Không tìm thấy danh mục!</p>
    <?php } ?>

    <?php if (!empty($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>
</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
