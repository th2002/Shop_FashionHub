<?php 
    require_once './connect.php';
    $conn = connect();
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id;";
    $result = mysqli_query($conn,$sql);
?>