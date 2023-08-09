<?php 
    session_start();
    $data = json_decode(file_get_contents('php://input'), true);
        $_SESSION['data-cart'][$data['id_price']] = array(
            'id' => $data['id'],
            'imgName' => $data['imgName'],
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'id_price' => $data['id_price'],
            'order' => $data['order'],
            'size' => $data['size'],
        );
        if(isset($_SESSION['data-cart']['totalQuantity'])){
            $_SESSION['data-cart']['totalQuantity'] += $data['quantity'];
        }else{
            $_SESSION['data-cart']['totalQuantity'] = $data['quantity'];
        }
       
    
    echo json_encode($data);
