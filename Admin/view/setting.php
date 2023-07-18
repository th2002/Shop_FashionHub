<?php
require_once '../models/CategoryModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lưu các giá trị màu sắc vào biến
  $color1 = $_POST['color1'];
  $color2 = $_POST['color2'];
  $color3 = $_POST['color3'];

  // Lưu giá trị màu sắc vào cơ sở dữ liệu hoặc file
  // Ví dụ: $color1, $color2 và $color3 có thể được lưu vào cơ sở dữ liệu hoặc file để sử dụng lại trong tương lai
}

?>

<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->

<h2 class="title">Cài đặt</h2>

<form method="POST" action="">
  <input type="color" name="color1" value="#333">
  <input type="color" name="color2" value="#555">
  <input type="color" name="color3" value="#777">
  <button type="submit">Lưu</button>
</form>

<style>
    .sidebar {
        background-image: linear-gradient(to right, <?php echo isset($color1) ? $color1 : '#333'; ?>, <?php echo isset($color2) ? $color2 : '#555'; ?>, <?php echo isset($color3) ? $color3 : '#777'; ?>);
    }
</style>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
