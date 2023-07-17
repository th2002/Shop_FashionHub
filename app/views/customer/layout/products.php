<!-- Day la san pham -->
<?php 

                            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:8;
                            $current_page = !empty($_GET['page']) ? $_GET['page']:1;
                            $offset = ($current_page - 1) * $item_per_page;
                            $conn = connect();
                            $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id LIMIT ".$item_per_page." OFFSET ".$offset.";";
                            $result = mysqli_query($conn,$sql);
                            $num = mysqli_query($conn, "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id");
                            $num = $num->num_rows;
                            $page = ceil($num / $item_per_page);
                            ?>
                            <?php foreach($result as $key => $value):?>
                            <div class="col l-3">
                                <div class="product_item">
                                    <div class="product_img">
                                        <img src="<?php echo $value['image_url']?>" alt="" class="product_img-item">
                                        <div class="product_cart">
                                            <button class="product_btn product_btn-buy">Mua Ngay </button>
                                            <button class="product_btn product_btn-add_cart">Thêm Giỏ Hàng </button>
                                        </div>
                                    </div>
                                    <div class="product_name">
                                        <h4><?php echo $value['name']; ?></h4>
                                    </div>
                                    <div class="product_price product_price-new">
                                        <h4><?php echo $value['price']; ?></h4>
                                    </div>
                                    <div class="product_price product_price-old">
                                        <h4><?php echo $value['sale_price']; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>