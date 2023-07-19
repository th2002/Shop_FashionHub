

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
    $status = $_POST['status'];
    $role = $_POST['role'];
    $cus_id = $_POST['cus_id'];
    $admin_id = $_POST['admin_id'];

    // Tiến hành cập nhật thông tin người dùng
    if (updateUser($id, $username, $email, $status, $role, $cus_id, $admin_id)) {
        


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

            <label for="status">Trạng thái:</label>
            <select id="status" name="status">
                <option value="0" <?php echo $user['status'] === 0 ? 'selected' : ''; ?>>Chưa kích hoạt</option>
                <option value="1" <?php echo $user['status'] === 1 ? 'selected' : ''; ?>>Đã kích hoạt</option>
            </select><br>

            <label for="role">Vai trò:</label>
            <select id="role" name="role">
                <option value="0" <?php echo $user['role'] === 0 ? 'selected' : ''; ?>>Khách hàng</option>
                <option value="1" <?php echo $user['role'] === 1 ? 'selected' : ''; ?>>Admin</option>
            </select><br>

            <label for="cus_id">ID khách hàng:</label>
            <input type="text" id="cus_id" name="cus_id" value="<?php echo $user['cus_id']; ?>"><br>

            <label for="admin_id">ID admin:</label>
            <input type="text" id="admin_id" name="admin_id" value="<?php echo $user['admin_id']; ?>"><br>

            <button type="submit">Cập nhật</button>
        </form>
    <?php } ?>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
