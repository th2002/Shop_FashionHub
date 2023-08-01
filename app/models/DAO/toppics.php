<?php
function select_toppics_all(){
    $sql = "SELECT * FROM chat_toppics";
    return pdo_query($sql);
}
function select_admin_by_id_toppics($idToppic){
    $sql = "SELECT users.id, users.full_name,users.images,users.active,chat_toppics.chat_toppic_name FROM users INNER JOIN chat_toppics ON users.position_incharge = chat_toppics.chat_toppic_id WHERE chat_toppics.chat_toppic_id = ? AND users.role = '1'";
    return pdo_query_one($sql,$idToppic);
}
function insert_conversation($idToppic){
    $sql = "INSERT INTO conversations(id_chat_toppics) VALUES (?)";
    return pdo_query($sql,$idToppic);
}
?>