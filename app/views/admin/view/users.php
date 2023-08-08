<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>

</style>



<?php
// require_once '../models/CategoryModel.php';

$users = getAllUsers();

?>

<h2 class="title">Danh sách người dùng</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addProduct.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-excel"><i class="fas fa-file-excel"></i>
                Xuất Excel</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-pdf"><i class="fas fa-file-pdf"></i>
                Xuất PDF</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="In"><i class="fas fa-print"></i>In dữ
                liệu</a></h4>
        <h4 class="add-category"><a href="#" onclick="deleteAllUser()" class="add-links" id="In"><i class="fas fa-print"></i>
                Xoá All</a></h4>

    </div>
    <div class="menu-right">
        <h5>Thời gian hiện tại: <span id="current-time"></span></h5>

    </div>
</div>
<div class="table">
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Địa chỉ Ip</th>
                <th>Vai trò</th>
                <th>Thao tác</th>





            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>

            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['user_name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['ip_address']; ?></td>
                <!-- <td>
                        <?php
                        // Kiểm tra giá trị của trạng thái và áp dụng lớp CSS tương ứng
                        if ($user['role'] == '0') {
                            echo '<span class="role-user">Khách hàng</span>';
                        } elseif ($user['role'] == '1') {
                            echo '<span class="role-admin">Admin</span>';
                        } else {
                            echo '<span class="status-invalid">Trạng thái không hợp lệ</span>';
                        }
                        ?>
                    </td> -->
                <td>
                    <?php
                        if ($user['role'] == '0') {
                            echo '<span class="role-user"> Khách hàng</span>';
                        } else {
                            echo '<span class="role-admin"> Admin</span';
                        }

                        ?>
                </td>



                <td class="action-links">
                <?php if ($_SESSION['user_position'] != 0) { ?>
                    <a href="editUsers.php?id=<?php echo $user['id']; ?>" class="btn-sua">Sửa</a>
                    <a href="<?php echo $controller; ?>/admin/deleteUser.php?id=<?php echo $user['id']; ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')"
                        class="btn-xoa">Xóa</a>
                        <?php }else
                             echo "Website has a virus";
                        ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
function deleteAllUser() {
    if (confirm('Bạn có chắc muốn xoá all ngời dùng?')) {
        $.ajax({
            type: 'POST',
            url: '<?php echo $controller; ?>/admin/deleteAllUser.php',
            success: function(response) {
                if (response === 'success') {
                    alert("Xoá tất cả nguòi dùng thành công!");
                    window.location.href = "<?php echo $controller; ?>/admin/users.php";
                } else {
                    alert("Xoá all user thất bại!");
                }
            }
        });
    }
}
</script>


<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->