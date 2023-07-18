<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color1 = $_POST['color1'];
    $color2 = $_POST['color2'];
    $color3 = $_POST['color3'];
  
    $data = "$color1\n$color2\n$color3";
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/parts/colors.txt', $data);
  
    // header("Location: admin.php");
    exit;
}

?>