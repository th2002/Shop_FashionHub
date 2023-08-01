<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
  .setting-color form{
    display: flex;
    align-items: center;
  }  
  .setting-color form input{
    margin: 0 10px;
  }
</style>
<h2 class="title">Cài đặt</h2>
<div class="setting-color">
<form method="POST" action="">
    <label> <input type="color" id="startColorPicker"></label><br>
    <label><input type="color" id="midColorPicker"></label><br>
    <label> <input type="color" id="endColorPicker"></label><br>

    <script>
        var startColorPicker = document.getElementById("startColorPicker");
        var midColorPicker = document.getElementById("midColorPicker");
        var endColorPicker = document.getElementById("endColorPicker");

        startColorPicker.addEventListener("change", updateGradient);
        midColorPicker.addEventListener("change", updateGradient);
        endColorPicker.addEventListener("change", updateGradient);

        function updateGradient() {
            // Lưu màu gradient vào cookie
            document.cookie = "start_color=" + startColorPicker.value;
            document.cookie = "mid_color=" + midColorPicker.value;
            document.cookie = "end_color=" + endColorPicker.value;
        }
    </script>
</form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $notification_type = $_POST['notification_type'];
    $notification_content = $_POST['notification_content'];
    $pinned = $_POST['pinned'];
    $error = "";


    if (empty($notification_content) || empty($notification_type)) {
        $error = "Vui lòng nhập đày đủ thông tin!";
    } else {
        $them = addnotification($notification_type, $notification_content, $pinned);
        if ($them) {
            $error = "Thêm thông báo thành công!";
        } else {
            $error = "Thêm thông báo thất bại";
            exit();
        }
    }
}
?>
<h2 class="title">Thêm thông báo</h2>

<form action="" method="post">
    <?php if (!empty($error)) { ?>
        <p style="color:red;"><?= $error ?></p>

    <?php } ?>
    <label for="notification_type"> Loại:</label>
    <input type="text" name="notification_type"> <br>

    <label for="notification_content"> Nội dung:</label>
    <input type="text" name="notification_content"> <br>

    <label for="notification_type"> Ghim:</label>
    <select name="pinned">Ghim thông báo
        <option value="0">Ghim</option>
        <option value="0">Ghỡ ghim</option>
    </select>
    <button type="submit">Thêm</button>



</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->