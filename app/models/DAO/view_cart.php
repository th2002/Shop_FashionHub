<?php 
    // session_destroy();
    // session_unset();
    // $expireTime = 30 * 24 * 60 * 60; // 30 ngày = 30 * 24 giờ * 60 phút * 60 giây
    // session_set_cookie_params($expireTime);
    if(isset($_SESSION['data-cart'])){
        $data = $_SESSION['data-cart'];
        $output='';
        foreach($data as $item){
            $output.='<li data-id="'.$item['id_price'].'" class="nav_cart-item">
                       <div class="nav_cart-item-left">
                           <img src="https://product.hstatic.net/1000284478/product/'.$item['imgName'].'" alt=""
                               class="nav_cart-item-img">
                       </div>
                       <div class="nav_cart-item-center">
                           <h4 class="nav_cart-item-info">'.$item['name'].'</h4>
                       </div>
                       <div class="nav_cart-item-right">
                           <div class="nav_cart-item-price">
                               <span class="nav_cart-item-text">'.$item['price'].' <span>đ</span> </span>x
                               <span data-id_price="'.$item['id_price'].'" class="nav_cart-item-quantity">'.$item['quantity'].'</span>
                           </div>
                           
                       </div>
                       </li>';
       }
       echo $output;
    }
    
?>