<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Menu with Gradient Background</title>
    <style>
        /* CSS cho menu */
        #menu {
            <?php
                $start_color = isset($_COOKIE['start_color']) ? $_COOKIE['start_color'] : '#ff0000';
                $mid_color = isset($_COOKIE['mid_color']) ? $_COOKIE['mid_color'] : '#00ff00';
                $end_color = isset($_COOKIE['end_color']) ? $_COOKIE['end_color'] : '#0000ff';
            ?>
            background-image: linear-gradient(to right, <?php echo $start_color; ?>, <?php echo $mid_color; ?>, <?php echo $end_color; ?>);
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div id="menu">
        <!-- Đây là nội dung của menu -->
        <ul>
            <li>Trang chủ</li>
            <li>Giới thiệu</li>
            <li>Dịch vụ</li>
            <li>Liên hệ</li>
        </ul>
    </div>

    <!-- Nút "Cài đặt màu" -->
    <!-- <a href="settings.php">Cài đặt màu</a> -->
</body>
</html>
