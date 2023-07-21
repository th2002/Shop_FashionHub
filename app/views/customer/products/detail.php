<!-- Day la chi tiet san pham -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../../../../../assets/css/grid.css">
    <link rel="stylesheet" href="../../css/app.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <title>Shop FashionHub</title>
</head>
<style>
    header {
        width: 100%;
        display: flex;
        margin-top: 30px ;
    }
    header > .header-left {
        flex : 1 ; 
        height: 500px;
        margin-left:100px;
    }
    header > .header-left > .header-left-img > .header-left-img-pro > .header-left-img-main > img  {
        width: 400px;
        height: 400px;
    }
    header > .header-left > .header-left-img > .header-left-img-pro > .header-left-img-slider > img  {
        width: 50px;
        height: 50px;
    }
    header > .header-right {
        width: 100%;
        flex : 2 ;
        height: 500px;
        margin-right:100px;
        padding-left: 30px ;
        display: flex;
        flex: 1 1 auto ;
        flex-direction: column;
        box-sizing: border-box;
        visibility: visible;
        justify-content: space-around
    }
    
    header > .header-right > .pro-name > span {
        display: -webkit-box;
        text-overflow: ellipsis;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        font-weight: 900;
        margin: 0;
        vertical-align: sub;
        max-height: 3rem;
        line-height: 1.5rem;
        overflow: hidden;
        max-width: 41.5625rem;
        font-size: 1.25rem;
        overflow-wrap: break-word;
    }
    header > .header-right > .pro-gia {
        font-size: 1.875rem;
        font-weight: 500;
        color: #ee4d21d;
    }
    header > .header-right >.pro-giua > .pro-giua-giua {
        position: relative;
        margin-top: -4px;
        margin-bottom: 25px;
        margin-left: -4px;
        padding: 4px;
        color: #222;
        display: flex ;
        flex-direction: column;
        visibility: visible;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-giam_gia{
        display: flex;
        align-items: center;
        width: 100%;
        visibility: visible;
        margin-top: 10px ;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-loai {
        display:flex;
        visibility: visible;
        margin-top: 10px ;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-giam_gia  > .mini-vouchers-laurel{
        color: green;
        width: 110px;
        text-transform: capitalize;
        flex-shrink: 0;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-giam_gia  > .mini-vouchers{
        position: relative;
        margin-right: 0.625rem;
        cursor: default;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        background: rgba(208,1,27,.08);
        padding: 3px 7px;
        border: 0;
        white-space: nowrap;
        color: #ee4d2d;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong > .pro-so_luong-main {
        display: flex;
        align-items: center;
        visibility: visible;
        color: #757575;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong > .pro-so_luong-top {
        margin-right: 40px ;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong {
        display: flex;
        align-items: center;
        visibility: visible;
        margin-top: 10px ;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 > .pro-so_luong-main-3 {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        outline: none;
        cursor: pointer;
        border: 0;
        font-size: .875rem;
        font-weight: 300;
        line-height: 1;
        letter-spacing: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color .1s cubic-bezier(.4,0,.6,1);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0,0,0,.8);
        width: 32px;
        height: 32px;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 > .pro-so_luong-main-4{
        width: 50px;
        height: 32px;
        border-left: 0;
        border-right: 0;
        font-size: 16px;
        font-weight: 400;
        box-sizing: border-box;
        text-align: center;
        cursor: text;
        border-radius: 0;
        -webkit-appearance: none;
        outline: none;
        cursor: pointer;
        border: 0;
        font-size: .875rem;
        font-weight: 300;
        line-height: 1;
        letter-spacing: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color .1s cubic-bezier(.4,0,.6,1);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0,0,0,.8);
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 > .pro-so_luong-main-5 {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        outline: none;
        cursor: pointer;
        border: 0;
        font-size: .875rem;
        font-weight: 300;
        line-height: 1;
        letter-spacing: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color .1s cubic-bezier(.4,0,.6,1);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0,0,0,.8);
        width: 32px;
        height: 32px;
        -webkit-appearance: button;
    }
    header > .header-right > .pro-giua > .pro-giua-giua > .pro-so_luong > .pro-so_luong-main > .pro-so_luong-main-1 > .pro-so_luong-main-2 {
        display: flex;
        align-items: center;
        background: #fff;
        visibility: visible;
    }
    header > .header-right > .pro-end {
        display: flex;
        visibility: visible;
    }
    header > .header-right > .pro-end > .btn-solid {
        color: #fff;
        position: relative;
        overflow: visible;
        outline: 0;
        background: #ee4d2d;
        min-width: 80px;
        max-width: 250px;
        font-size: 16px;
        height: 48px;
        padding: 0 20px;
    }
    header > .header-right > .pro-end > .btn-tined {
        flex-direction: row;
        position: relative;
        overflow: visible;
        outline: 0;
        background: rgba(255,87,34,.1);
        background: ;
        color: #11;
        border: 1px solid #ee4d2d;
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.03);
        min-width: 80px ;
        max-width: 250px;
        font-size: 16px;
        height: 48px;
        padding: 0 20px;
    }
    main {
        width: 100%;
        display: flex;
        margin-top: 30px ;
    }
    main > .main-left {
        flex : 2 ; 
        height: 500px;
        margin-left:50px;
        margin-right:10px;
        border: 1px solid #ee4d2d;
    }
    main > .main-right {
        flex : 0.5 ;
        height: 500px;
        margin-right:50px;
        border: 1px solid #ee4d2d;
    }
    main > .main-right > h3 {
        text-align: center;
        margin: 10px ;
    }
    main > .main-right > .main-right-top10{
        display: flex; 
        flex-direction: column
    }
    .comment-section {
    background-color: #f2f2f2;
    padding: 20px;
    border: 1px solid #ddd;
    }

    .comment-section h2 {
    font-size: 24px;
    margin-bottom: 10px;
    }

    .comment-section form {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    }

    .comment-section label {
    font-size: 16px;
    margin-bottom: 5px;
    }

    .comment-section input[type="text"],
    .comment-section textarea {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    }

    .comment-section button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    }

    .comment-section button[type="submit"]:hover {
    background-color: #3e8e41;
    }
    .product-quantity {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .quantity-input {
    width: 50px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin: 0 10px;
    }

    .decrease-btn, .increase-btn {
    display: inline-block;
    width: 25px;
    height: 25px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 3px;
    cursor: pointer;
    }

    .decrease-btn:hover, .increase-btn:hover {
    background-color: #e6e6e6;
    }

    .decrease-btn:active, .increase-btn:active {
    background-color: #d9d9d9;
    }

    .increase-btn {
    margin-right: 10px;
    }
</style>
<?php
        require '../layout/nav.php';
    ?>
<body>
    <header>
    <?php 
    require_once "../../../models/DAO/connect.php";
    $id=$_GET['id'];
    $conn = connect();
    // $sql = "SELECT * FROM products where id = $id";
    // $sql = "SELECT b.* , h.image_url FROM products b JOIN product_images h ON h.product_id=b.id WHERE b.id=$id ";
    $sql = "SELECT * FROM products INNER JOIN product_images ON products.id = product_images.product_id where products.id=$id ;";
    $rows = mysqli_query($conn,$sql);
    ?>
    <?php
        foreach ($rows as $row) {
    ?>  
        <div class="header-left">
            <div class="header-left-img">
                <div class="header-left-img-pro">
                    <div class="header-left-img-main">
                        <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                    </div>
                    <div class="header-left-img-slider">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                            <img src="<?php echo $row['image_url']?>" alt="" class="product_img-item">
                    </div>
                </div>
            </div>
        </div>
        <div class="header-right">
            <div class="pro-name">
                <span><?php echo $row['name']; ?></span>
            </div>
            <div class="pro-gia">
                <h4> GIÁ :<?php echo $row['price']; ?>  </h4>
                <div class="product_price product_price-old">
                         <h4> <?php echo $row['sale_price']; ?>  </h4>
                </div>
            </div>
            <div class="pro-giua" >
                <div class="pro-giua-giua" >
                    <div class="pro-giam_gia">
                            <div class="mini-vouchers-laurel">Mã giảm giá của shop</div>
                            <div class="mini-vouchers">giam 5k</div>
                            <div class="mini-vouchers">giam 10k</div>
                            <div class="mini-vouchers">giam 15k</div>
                            <div class="mini-vouchers">giam 10k</div>
                    </div>
                    <div class="pro-loai" style="margin-bottom: 8px; align-items: baseline;">
                        <label >Phân loại</label>
                        <div class="pro-loai-main" >
                        <button class="product-variation" aria-label="Màu Xanh Nhạt - P47M">Màu Xanh Nhạt - P47M</button>
                        <button class="product-variation" aria-label="Màu Xanh Nhạt - P47M">Màu Xanh Nhạt - P47M</button>
                        <button class="product-variation" aria-label="Màu Xanh Nhạt - P47M">Màu Xanh Nhạt - P47M</button>
                        <button class="product-variation" aria-label="Màu Xanh Nhạt - P47M">Màu Xanh Nhạt - P47M</button>
                        </div>
                    </div>
                    <div class="pro-so_luong">
                        <div class="pro-so_luong-top" >Số lượng</div>
                        <div class="pro-so_luong-main" >
                            <div class="pro-so_luong-main-1" style="margin-right: 15px;">
                                <div class="product-quantity">
                                    <button class="decrease-btn">-</button>
                                    <input type="number" min="1" value="1" class="quantity-input">
                                    <button class="increase-btn">+</button>
                                </div>
                                <!-- <div class="pro-so_luong-main-2">
                                    <button class="pro-so_luong-main-3">
                                        <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" >
                                            <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon>
                                        </svg>
                                    </button>
                                    <input type="text" value="1" role="spinbutton" aria-valuenow="1" class="pro-so_luong-main-4" >
                                    <button class="pro-so_luong-main-5" >
                                        <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0">
                                            <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon>
                                        </svg>
                                    </button>
                                </div> -->
                            </div>
                            <div>
                                <p><?php echo $row['quantity']?> sẩn phẩm có sẵn </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pro-end">
                <button type="button" class="btn-tined">Thêm Vào Giỏ Hàng</button>
                <button type="button" class="btn-solid">Mua</button>
            </div>
            
        </div>
        <?php } ?>
    </header>
    <main>
        <div class="main-left" >
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "fashionhub_shop";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Kiểm tra kết nối
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            ?>
            <h3>Mô tả : </h3>
            <i> <?php echo $row['decsription']?> </i>
            <div class="comment-section">
            <?php
            function exist_param($fieldname){
                return array_key_exists($fieldname, $_REQUEST);
            }
            $id=$_GET['id'];
            if(exist_param("content")){
                $content=$_POST['content'];    
                // $customer_id = $_SESSION['']['customer_id'];
                $create_at = date_format(date_create(), 'Y-m-d');
                // comment_insert($content, $create_at);
                $sql = "INSERT INTO comment(product_id, content, create_at) VALUES ( '$id','$content', '$create_at')";
                $conn->query($sql);
            }
            $sql = "SELECT b.* , h.name FROM comment b JOIN products h ON h.id=b.product_id WHERE b.product_id=$id ORDER BY create_at DESC";
            $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                echo "<ul>";
                foreach ($result as $bl) {
                echo "
                <li>$bl[content] <i class='pull-right'><b></b>, $bl[create_at]</i></li>;
                    
                ";
                }
                echo "</ul>";
            } else {
                echo "Không có bình luận nào.";
            }
            ?>
                <h2>Bình luận</h2>
                <form action="<?=$_SERVER["REQUEST_URI"]?>" method="POST">
                    <textarea name="content" id="comment"></textarea>
                    <button type="submit" class="btn btn-default">Gửi</button>
                </form>
            </div>
            <?php
            // Kiểm tra xem biểu mẫu đã được gửi chưa
            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     // Lấy thông tin từ biểu mẫu
            //     $content = $_POST["comment"];
            //     // Thêm nội dung bình luận vào CSDL
            //     $sql = "INSERT INTO `comment`(`content`) VALUES ('$content')";
            //     $conn->query($sql);
            // }
            // $sql = "SELECT  content FROM comment";
            // $result = $conn->query($sql);
            // Hiển thị nội dung bình luận
            ?>
        </div>
        <div class="main-right" >
            <h3> Top sản phẩm bán chạy </h3>
            <div class="main-right-top10" > 
                <?php
                    require '../layout/top10_products.php';
                ?>
            </div>
        </div>
    </main>
    <script>
        const decreaseBtn = document.querySelector('.decrease-btn');
        const increaseBtn = document.querySelector('.increase-btn');
        const quantityInput = document.querySelector('.quantity-input');

        decreaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
        });

        increaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        });
    </script>
</body>
