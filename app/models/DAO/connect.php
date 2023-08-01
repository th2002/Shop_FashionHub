<?php
// Kết nối đến CSDL sử dụng PDO
// Thông tin cấu hình kết nối
    $host = 'localhost';
    $dbname = 'fashionhub_shop';
    $username = 'root';
    $password = '';

    try {
        // Tạo kết nối PDO
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        // Thiết lập các thuộc tính kết nối (tuỳ chọn)
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // Trả về đối tượng kết nối để sử dụng trong các chức năng khác
        return $db;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu không thể kết nối đến cơ sở dữ liệu
        echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        die();
    }
    // Đóng kết nối
    $db = null;
/**
 * Chạy câu lệnh sql để (INSERT, UPDATE, DELETE)
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 */
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        global $db;
        $stmt = $db->prepare($sql);
        $stmt->execute($sql_args);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Chạy câu lệnh sql SELECT
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        global $db;
        $stmt = $db->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($db);
    }
}
/**
 * Chạy lệnh sql để lấy 1 record
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 */
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        global $db;
        $stmt = $db->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($db);
    }
}
/**
 * Chạy câu lệnh sql truy vấn 1 giá trị
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 */
function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        global $db;
        $stmt = $db->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($db);
    }
}