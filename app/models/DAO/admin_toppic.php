<?php 
    include 'connect.php';
    include 'toppics.php';
    if(isset($_GET['id_toppics'])){
        $idToppic = $_GET['id_toppics'];
        $result = select_admin_by_id_toppics($idToppic);
        // insert_conversation($idToppic);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
?>