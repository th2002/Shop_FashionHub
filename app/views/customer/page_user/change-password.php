<?php 
$loi="";
    if(isset($_POST['btnsubmit']) == true){
        $matkhaucu = $_POST['matkhaucu'];
        $matkhaumoi_1 = $_POST['matkhaumoi_1'];
        $matkhaumoi_2 = $_POST['matkhaumoi_2'];
        $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['user_name'] , $matkhaucu]);
        if ( $stmt->rowCount() ==0 ){
            $loi.="Mật khẩu cũ không đúng<br>";
        }
        if(strlen($matkhaumoi_1)<4){
            $loi.="Mật khẩu mới quá ngắn<br>";
        }
        if($matkhaumoi_1 != $matkhaumoi_2){
            $loi.="Mật khẩu mới không giống nhau<br>";
        }
    }
?>