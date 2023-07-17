<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "fashionhub_shop");
function connect()
{
    $host = DB_HOST;
    $user = DB_USER;
    $pass = DB_PASS;
    $dbname = DB_NAME;
    $conn = new mysqli(
        $host,
        $user,
        $pass,
        $dbname
    );
    if ($conn->connect_error) {
        $error = "Connection fail" . $conn->connect_error;
        return $error;
    } else {
        return $conn;
    }
}
connect();
function qr_insert($sql)
{
    $conn = connect();
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
function qr_select($sql)
{
    $conn = connect();
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}