<?php 
    session_start();
    if (isset($_GET["id_product"])) {
        $id = $_GET["id_product"];
        if (isset($_SESSION['data-cart'][$id])) {
            $_SESSION['data-cart']['totalQuantity'] -= $_SESSION['data-cart'][$id]['quantity'];
            unset($_SESSION['data-cart'][$id]);
        }
        header('Location: ../../views/customer/layout/cart.php');
        exit();
    }
?>