<?php 
$loi="";
    $username = $_SESSION['user_name'];
    if(isset($_POST['btnsubmit']) == true){
        $matkhaucu = $_POST['matkhaucu'];
        $matkhaumoi_1 = $_POST['matkhaumoi_1'];
        $matkhaumoi_2 = $_POST['matkhaumoi_2'];
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($matkhaucu)){
            $loi.="Không được bỏ trống mật khẩu cũ<br>";
        }else{
            $loi.="";
        }
        if(password_verify($matkhaucu, $user['password'])==0){
            $loi.="Mật khẩu cũ không đúng<br>";
        }
        if(strlen($matkhaumoi_1)<6){
            $loi.="Mật khẩu mới quá ngắn<br>";
        }
        if($matkhaumoi_1 != $matkhaumoi_2){
            $loi.="Mật khẩu mới không giống nhau<br>";
        }

        if($loi==""){
            $sql = "UPDATE users SET password = ? WHERE user_name = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([password_hash($matkhaumoi_1, PASSWORD_BCRYPT), $username]);

            // echo '<script>
            //     window.location.href = "' . $baseURL . '/app/views/customer/tai-khoan/login.php";
            // </script>';
            echo '<script>';
            echo 'Swal.fire({ title: "Đổi mật khẩu thành công!", icon: "success" }).then(function() {';
            echo '   window.location.href = "' . $baseURL . '/app/views/customer/tai-khoan/login.php";';
            echo '});';
            echo '</script>';
        }
    }
?>