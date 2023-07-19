<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
    .add-category{
        padding: 20px;

    }
    .add-links{
        background-color: #007bff;
        color: #fff;
        font-weight: 500;

        padding:8px 12px;
        border-radius: 4px;
       
    }
    .add-links:hover{
        background-color: #0056b3;

      
    }
    
    .category-table {
        width: 100%;
        border-collapse: collapse;
        overflow-x: auto;
    }

    .category-table th,
    .category-table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .category-table th {
        background-color: #f8f8f8;
        font-weight: bold;
    }

    .category-table td {
        background-color: #fff;
    }

    .category-table .action-links a {
        display: inline-block;
        margin-right: 5px;
        color: #fff;
        background-color: #007bff;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
    }

    .category-table .action-links a:hover {
        background-color: #0056b3;
    }

    .category-table .action-links a.delete {
        background-color: #dc3545;
    }

    .category-table .action-links a.delete:hover {
        background-color: #c82333;
    }
    
    .product-image img {
        width: 100px; /* Đặt kích thước hình ảnh */
        height: 100px; /* Căn chỉnh chiều cao tự động */
        display: block; /* Hiển thị hình ảnh dạng khối */
        margin: 0 auto; /* Căn giữa hình ảnh */
    }


    @media (max-width: 768px) {
        .category-table {
            overflow-x: scroll;
        }
    }
</style>



<?php
// require_once '../models/CategoryModel.php';

$users = getAllUsers();

?>

<h2 class="title">Danh sách sản phẩm</h2>

<table class="category-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Ngày đăng ký</th>
            <th>Trạng thái</th>
            <th>Vai trò</th>
            <th>ID khách hàng</th>
            <th>ID admin</th>
            <th>Thao tác</th>



        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['register_date']; ?></td>
                    <td><?php echo $user['status'] ? 'Đã kích hoạt' : 'Chưa kích hoạt'; ?></td>
                    <td><?php echo $user['role'] ? 'Admin' : 'Khách hàng'; ?></td>
                    <td><?php echo $user['cus_id']; ?></td>
                    <td><?php echo $user['admin_id']; ?></td>
                    <td class="action-links">
                        <a href="editUsers.php?id=<?php echo $user['id']; ?>" class="action-links">Sửa</a>
                        <a href="deleteUsers.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')" class="action-links">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->