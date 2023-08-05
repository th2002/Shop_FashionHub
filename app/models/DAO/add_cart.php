<?php
    session_start();
    // session_unset();
    $data = json_decode(file_get_contents('php://input'), true);
    // là một luồng dữ liệu đặc biệt cho phép bạn đọc dữ liệu đầu vào từ yêu cầu HTTP. Khi gửi dữ liệu từ trình duyệt bằng phương thức POST và loại dữ liệu là JSON, thông tin dữ liệu JSON sẽ được gửi trong phần thân yêu cầu HTTP.
    // $quantity = 1;
    if(!isset($_SESSION['data-cart'])){
        $_SESSION['data-cart'] = array();
    }

    if (isset($data)) {
        $output ='';
        if (isset($_SESSION['data-cart'][$data['id_price']])) {
            $_SESSION['data-cart'][$data['id_price']]['quantity'] += $data['quantity'];
            $totalQuantity = $_SESSION['data-cart'][$data['id_price']]['quantity'];
            $output =$data['id_price'];
            $_SESSION['data-cart']['totalQuantity'] += $data['quantity'];
        } else {
            $_SESSION['data-cart'][$data['id_price']] = array(
                'id' => $data['id'],
                'imgName' => $data['imgName'],
                'name' => $data['name'],
                'quantity' => $data['quantity'],
                'price' => $data['price'],
                'id_price' => $data['id_price'],
            );
            if(isset($_SESSION['data-cart']['totalQuantity'])){
                $_SESSION['data-cart']['totalQuantity'] += $data['quantity'];
            }else{
                $_SESSION['data-cart']['totalQuantity'] = $data['quantity'];
            }
            $output ='<li style="margin: 5px 0;padding:5px" class="nav_cart-item">
            <div class="nav_cart-item-left">
                <img src="https://product.hstatic.net/1000284478/product/'.$data['imgName'].'" alt="" class="nav_cart-item-img">
            </div>
            <div style="min-width:205px" class="nav_cart-item-center">
                <h4 class="nav_cart-item-info">'.$data['name'].'</h4>
            </div>
            <div class="nav_cart-item-right">
                <div class="nav_cart-item-price">
                    <span style="margin-right:5px" class="nav_cart-item-text">'.$data['price'].'</span>
                    <span data-id_price='.$data['id_price'].' class="nav_cart-item-quantity">'.$data['quantity'].'</span>
                </div>
                <div class="nav_cart-item-delete">
                    <a href="../../../models/DAO/delete_cart.php?id_product='.$data['id_price'].'">xóa</a>
                </div>
            </div>
        </li>';
            }  
            $total = $_SESSION['data-cart']['totalQuantity'];
            $arr =[
                $output,
                $total
               ,
            ];
        header('Content-Type: application/json');
        echo json_encode($arr);
    }


?>