<?php
// Kết nối đến CSDL sử dụng PDO
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=fashionhub_shop;charset=utf8";
    $username = 'root';
    $password = '';
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Chạy câu lệnh sql để (INSERT, UPDATE, DELETE)
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 */
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
/**
 * Chạy câu lệnh sql SELECT
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
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
/**
 * Chạy lệnh sql để lấy 1 record
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 */
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
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
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}