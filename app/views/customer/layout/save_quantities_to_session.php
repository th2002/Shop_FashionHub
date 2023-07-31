<?php
session_start();

if (isset($_POST['total_quantity']) && is_numeric($_POST['total_quantity'])) {
    $_SESSION['total_quantity'] = (int)$_POST['total_quantity'];
}
?>