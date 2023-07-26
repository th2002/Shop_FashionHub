<!-- Day la top 10 san pham ban chay -->
<?php 
<<<<<<< HEAD
    $result = hang_hoa_select_outstanding();
=======
 require_once($_SERVER['DOCUMENT_ROOT'] . ':3000/Shop_FashionHub/global.php');
 
 $modelPath = "$rootDir/app/models/DAO/functions.php";
 
 // Gọi tệp functions
 require_once $modelPath;

    // Truy vấn lấy top 10 sản phẩm bán chạy nhất
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id WHERE featured = 1 ORDER BY quantity_sold DESC LIMIT 10;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> 835d6a8bcb724943d4d3604cde0f68cb877d9601
?>

<?php foreach($products as $product): ?>
    <div class="col l-3">
        <div class="product_item">
            <div class="product_img">
                <img src="<?php echo $product['image_url']?>" alt="" class="product_img-item">
                <div class="product_cart">
                    <button class="product_btn product_btn-buy">Mua Ngay </button>
                    <button class="product_btn product_btn-add_cart">Thêm Giỏ Hàng </button>
                </div>
            </div>
            <div class="product_name">
                <h4><?php echo $product['name']; ?></h4>
            </div>
            <div class="product_price product_price-new">
                <h4><?php echo number_format($product['price']); ?></h4>
            </div>
            <div class="product_price product_price-old">
                <h4><?php echo $product['sale_price']; ?></h4>
            </div>
        </div>
<<<<<<< HEAD
        <div class="product_name">
            <h4><?php echo $value['name']; ?></h4>
        </div>
        <div class="product_price product_price-new">
            <h4><?php echo number_format($value['price']) . " " . "₫"; ?></h4>
        </div>
=======
>>>>>>> 835d6a8bcb724943d4d3604cde0f68cb877d9601
    </div>
<?php endforeach ?>
