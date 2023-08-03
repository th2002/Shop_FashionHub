

<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->

<h2 class="title">Cài đặt</h2>

<form method="POST" action="">
<label>Chọn màu đầu: <input type="color" id="startColorPicker"></label><br>
    <label>Chọn màu giữa: <input type="color" id="midColorPicker"></label><br>
    <label>Chọn màu cuối: <input type="color" id="endColorPicker"></label><br>

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

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
