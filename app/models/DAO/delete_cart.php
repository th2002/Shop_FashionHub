<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_cart'])){
        $id_cart = $_GET['id_cart'];
    }
    if(isset($_SESSION['data-cart'])){
        $data =$_SESSION['data-cart'];
        foreach($data as $key => $item){
            if($item["id_price"] == $id_cart){
                $k++;
            }
            echo $k;
        }
    }
?>