<?php 
    session_start();

    $data = json_decode(file_get_contents('php://input'), true);

    if(isset($_SESSION['data-cart'])){
        foreach($data as $key => $val){
            if(isset($_SESSION['data-cart'][$key])){
                $_SESSION['data-cart'][$key]['quantity'] = $val['quantity'];
                $_SESSION['data-cart'][$key]['order'] = $val['order'];
                $_SESSION['data-cart'][$key]['size'] = $val['size'];
            }
        }
    }
 
?>