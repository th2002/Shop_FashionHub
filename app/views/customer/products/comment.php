<!-- Day la binh luan -->
<!DOCTYPE html>
<html>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">BÌNH LUẬN</div>
            <div class="panel-body">
            <?php
                // require_once "../../../models/DAO/connect.php";
                $product_id = 1;
                // $conn = connect();
                function exist_param($fieldname){
                    return array_key_exists($fieldname, $_REQUEST);
                }
                function pdo_get_connection(){
                    $dburl = "mysql:host=localhost;dbname=fashionhub_shop;charset=utf8";
                    $username = 'root';
                    $password = '';
                    $conn = new PDO($dburl, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $conn;
                }
                function pdo_query($sql){
                    $sql_args = array_slice(func_get_args(), 1);
                    try{
                        $conn = pdo_get_connection();
                        $stmt = $conn->prepare($sql);
                        $stmt->execute($sql_args);
                        $rows = $stmt->fetchAll();
                        return $rows;
                    }
                    catch(PDOException $e){
                        throw $e;
                    }
                    finally{
                        unset($conn);
                    }
                }
                function pdo_execute($sql){
                    $sql_args = array_slice(func_get_args(), 1);
                    try{
                        $conn = pdo_get_connection();
                        $stmt = $conn->prepare($sql);
                        $stmt->execute($sql_args);
                    }
                    catch(PDOException $e){
                        throw $e;
                    }
                    finally{
                        unset($conn);
                    }
                }
                function comment_insert( $product_id, $content, $create_at){
                    $sql = "INSERT INTO comment( product_id, content, create_at) VALUES ( '$product_id', '$content', '$create_at')";
                    pdo_execute($sql, $product_id, $content, $create_at);
                }
                function binh_luan_select_by_hang_hoa($product_id){
                    $sql = "SELECT b.* , h.name FROM comment b JOIN products h ON h.id=b.product_id WHERE b.product_id=? ORDER BY create_at DESC";
                    return pdo_query($sql, $product_id);
                }
                if(exist_param("content")){
                    // $customer_id = $_SESSION['']['customer_id'];
                    $create_at = date_format(date_create(), 'Y-m-d');
                    comment_insert($product_id, $content, $create_at);
                }
                $binh_luan_list = binh_luan_select_by_hang_hoa($product_id);
                foreach ($binh_luan_list as $bl) {
                    echo "<li>$bl[content] <i class='pull-right'><b>$bl[ma_kh]</b>, $bl[ngay_bl]</i></li>";
                }
            ?>
            </div>
            <div class="panel-footer">
            <?php
                // if(!isset($_SESSION['user'])){
                //     echo '<b class="text-danger">Đăng nhập để bình luận về sản phẩm này</b>';
                // }else{
            ?>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-10">
                                <input name="content" class="form-control"/>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-default" style="width: 100%">Gửi</button>
                            </div>
                        </div>
                    </div>
                </form>                
            <?php 
                // } 
                
            ?>
            
            
            </div>
        </div>        
    </body>
</html>