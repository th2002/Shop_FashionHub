<!-- Day la binh luan -->
<!DOCTYPE html>
<style>
    .comment-section {
        background-color: #f2f2f2;
        padding: 20px;
        border: 1px solid #ddd;
        margin:10px;
    }
    .comment-section > .nav__acoun{
        justify-content: flex-start;
        align-items: flex-start;
        padding: 1rem 0 1rem 1.25rem;
    }
    .comment-section > .nav__acoun > .noi_dung{
        display:flex ;
        align-items: baseline;
        flex-direction: column;
    }
    .comment-section > .nav__acoun > .noi_dung > .content {
        margin-top: 0.75rem;
        font-size: 20px;
        line-height: 1.25rem;
        color: black;
        word-break: break-word;
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
<html>
    <body>
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
        <div class="comment-section">
                <?php
                $id=$_GET['id'];
                if(exist_param("content")){
                    $content=$_POST['content'];    
                    $customer_id = $_SESSION['user_id'];
                    $create_at = date_format(date_create(), 'Y-m-d');
                    // comment_insert($content, $create_at);
                    $sql = "INSERT INTO comment(customer_id , product_id, content, create_at) VALUES ( '$customer_id', '$id','$content', '$create_at')";
                    $conn->query($sql);
                }
                $sql = "SELECT b.* , h.name , u.full_name FROM comment b JOIN products h ON h.id=b.product_id 
                                                                            JOIN users u ON u.id=b.customer_id
                                                                WHERE b.product_id=$id ORDER BY create_at DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    foreach ($result as $bl) {
                    ?>
                    <div class="nav__acoun display-item">
                        <a href="<?php echo $SITE_URL; ?>/page_user/index.php" style="color: black;">
                            <i class="nav_acounted-icon fa-regular fa-user fa-beat"></i>
                        </a>
                        <div class="noi_dung">
                            <h4 class="nav_acounted-name"><?php echo $bl['full_name'] ?></h4>
                            <i class='pull-right'><?php echo $bl['create_at'] ?></i>
                            <div class="content">
                                Nôi dung : <?php echo $bl['content'] ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    
                } else {
                    echo "Không có bình luận nào.";
                }
                ?>
                <?php
                    if(!isset($_SESSION['user_id'])){
                    echo '<b class="text-danger">Đăng nhập để bình luận về sản phẩm này</b>';
                    }else{
                ?>
                    <form action="<?=$_SERVER["REQUEST_URI"]?>" method="POST">
                        <textarea name="content" id="comment"></textarea>
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </form>
                <?php 
                    } 
                ?>
        </div>
    </body>
</html>