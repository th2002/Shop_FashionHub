<?php
// session_start();

$color1 = '#333';
$color2 = '#555';
$color3 = '#777';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $color1 = $_POST['color1'];
  $color2 = $_POST['color2'];
  $color3 = $_POST['color3'];

  $data = "$color1\n$color2\n$color3";
  file_put_contents('colors.txt', $data);

  $_SESSION['color1'] = $color1;
  $_SESSION['color2'] = $color2;
  $_SESSION['color3'] = $color3;

  // header("Location: admin.php");
  exit;
}

$data = file('colors.txt');
if ($data !== false) {
  $color1 = isset($data[0]) ? trim($data[0]) : '#333';
  $color2 = isset($data[1]) ? trim($data[1]) : '#555';
  $color3 = isset($data[2]) ? trim($data[2]) : '#777';
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
  <input type="color" name="color1" value="<?php echo $color1; ?>">
  <input type="color" name="color2" value="<?php echo $color2; ?>">
  <input type="color" name="color3" value="<?php echo $color3; ?>">
  <button type="submit">Lưu</button>
</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
