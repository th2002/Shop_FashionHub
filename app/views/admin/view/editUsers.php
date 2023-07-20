

<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    // $cus_id = $_POST['cus_id'];
    // $admin_id = $_POST['admin_id'];

    // Tiến hành cập nhật thông tin người dùng
    if (updateUser($id, $username, $email, $role)) {
        


// Sau khi hoàn thành, sử dụng mã JavaScript để hiển thị cửa sổ thông báo và chuyển hướng trang
echo '<script>
Swal.fire({
  icon: "success",
  title: "Cập nhật thông tin người dùng thành công",
  showCancelButton: false,
  confirmButtonText: "OK",
  timer: 5000, // 5 giây
  timerProgressBar: true,
  willClose: function() {
    window.location.href = "users.php";
  }
});
</script>';

    } else {
        echo "Cập nhật thông tin người dùng thất bại";
    }
}
?>
<h2 class="title">Sửa sản người dùng</h2>

<?php
// lấy all danh sách người dùng
$users = getAllUsers();

    // Lấy thông tin người dùng theo ID
    $id = $_GET['id'];
    $user = getUserById($id);

    if (!$user) {
        echo "Người dùng không tồn tại";
    } else {
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['user_name']; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>

            <label for="register_date">Ngày đăng ký:</label>
            <input type="text" id="register_date" name="register_date" value="<?php echo $user['register_date']; ?>" disabled><br>

            

            <label for="role">Vai trò:</label>
            <select id="role" name="role">
                <option value="0" <?php echo $user['role'] === 0 ? 'selected' : ''; ?>>Khách hàng</option>
                <option value="1" <?php echo $user['role'] === 1 ? 'selected' : ''; ?>>Admin</option>
            </select><br>

 

            <button type="submit">Cập nhật</button>
        </form>
    <?php } ?>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
