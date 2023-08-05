<?php 


function update_profile($user_id, $email, $fullname, $phone) {
    $sql = "UPDATE users SET email=?, full_name=?, phone_number=? WHERE id = ?;";
    pdo_execute($sql, $email, $fullname, $phone,$user_id);
}

function select_user($user_id){
    $sql = "SELECT * FROM users WHERE id = ?";
    return pdo_query_one($sql, $user_id);
}