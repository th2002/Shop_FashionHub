<!-- Day la top 10 san pham ban chay -->
<?php 
    require_once "../../../models/DAO/connect.php";
    $conn = connect();
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id where featured = 1 ORDER BY price DESC LIMIT 10;";
    $result = mysqli_query($conn,$sql);
?>
<?php foreach($result as $key => $value):?>
<div class="col l-3">
    <div class="product_item">
        <div class="product_img">
            <a href="../products/detail.php?id=<?=$value['product_id']?>"> 
                <img src="<?php echo $value['image_url']?>" alt="" class="product_img-item">
            </a>
            <div class="product_cart">
                <button class="product_btn product_btn-buy">Mua Ngay </button>
                <button class="product_btn product_btn-add_cart">Thêm Giỏ Hàng </button>
            </div>
        </div>
        <div class="product_name">
            <h4><?php echo $value['name']; ?></h4>
        </div>
        <div class="product_price product_price-new">
            <h4><?php echo number_format($value['price']) . " " . "₫"; ?></h4>
        </div>
        <div class="product_price product_price-old">
            <h4><?php echo $value['sale_price']; ?></h4>
        </div>
    </div>
</div>
<?php endforeach ?>