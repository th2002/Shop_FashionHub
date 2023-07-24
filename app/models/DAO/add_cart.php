<?php

/*cách 1:------------ */
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['productId'])) {
//     $productId = $_GET['productId'];
//     // Xử lý yêu cầu và dữ liệu từ Ajax
//     // Ví dụ: Lưu productId vào giỏ hàng
//     // session_start();
//     // $_SESSION['cart'][] = $productId;
//     // Trả về phản hồi thành công
//     echo "Thêm vào giỏ hàng thành công";
// } else {
//     echo 'Yêu cầu không hợp lệ';  
// }

/*cách 2:--------------- */
    session_start();
    $jsonData = json_decode(file_get_contents('php://input'), true);
    // là một luồng dữ liệu đặc biệt cho phép bạn đọc dữ liệu đầu vào từ yêu cầu HTTP. Khi gửi dữ liệu từ trình duyệt bằng phương thức POST và loại dữ liệu là JSON, thông tin dữ liệu JSON sẽ được gửi trong phần thân yêu cầu HTTP.
    $output ='';
    $quantity = 1;
    if ($jsonData) {
        if(!isset($_SESSION['data-cart'])){
             $_SESSION['data-cart'] = array();
        }
        $data =$_SESSION['data-cart'];
        foreach($data as $item){
            if($item['id_price'] == $jsonData['id_price']){
                $output = $jsonData['id_price'];
            }
            $quantity += intval($item['quantity']);
        }
        $jsonData['quantity_cart'] = $quantity;
        array_push($_SESSION['data-cart'],$jsonData);
        if($output !== $jsonData['id_price']){
            $output.='<li data-id="'.$jsonData['id_price'].'" class="nav_cart-item">
            <div class="nav_cart-item-left">
                <img src="https://product.hstatic.net/1000284478/product/'.$jsonData['imgName'].'" alt=""
                    class="nav_cart-item-img">
            </div>
            <div class="nav_cart-item-center">
                <h4 class="nav_cart-item-info">'.$jsonData['name'].'</h4>
            </div>
            <div class="nav_cart-item-right">
                <div class="nav_cart-item-price">
                    <span class="nav_cart-item-text">'.$jsonData['price'].' <span>đ</span> </span>x
                    <span data-id_price="'.$jsonData['id_price'].'" class="nav_cart-item-quantity">'.$jsonData['quantity'].'</span>
                </div>
               
            </div>
            </li>';
        }
       
        $arr =[
                $output,$quantity
        ];
       header('Content-Type: application/json');
       echo json_encode($arr);
    }

?>