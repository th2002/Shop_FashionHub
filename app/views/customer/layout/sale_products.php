<!-- Day la san pham giam gia -->
<?php 
    
    $result = hang_hoa_select_sale();
?>
<?php foreach($result as $key => $value):?>
<div class="col l-3">
    <div class="product_item">
        <div class="product_img">
            <img src="<?php echo $value['image_url']?>" alt="" class="product_img-item">
            <div class="product_cart">
                <button class="product_btn product_btn-buy">Mua Ngay </button>
                <button onclick="showSuccsecToast()" class="btn--success product_btn product_btn-add_cart">Thêm Giỏ Hàng</button>
            </div>
        </div>
        <div class="product_name">
            <h4><?php echo $value['name']; ?></h4>
        </div>
        <div class="product_price product_price-new">
            <h4><?php echo number_format($value['price']) . " " . "₫"; ?></h4>
        </div>
        <div class="product_price product_price-old">
            <h4>
                <?php 
                    if ($value['sale_price'] !== null) {
                    echo number_format($value['sale_price']) . " " . "₫";
                }
                ?>
            </h4>
        </div>
    </div>
</div>
<?php endforeach ?>