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

$categories = getAllCategories();
?>
<h2 class="title">Danh mục</h2>
<div class="menu-chucnang">
    <div class="menu-left">
        <h4 class="add-category"><a href="addCategory.php" class="add-links"><i class="fas fa-plus"></i>
                </i>Thêm</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-excel"><i class="fas fa-file-excel"></i>
                Xuất Excel</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="xuat-pdf"><i class="fas fa-file-pdf"></i>
                Xuất PDF</a></h4>
        <h4 class="add-category"><a href="export.php" class="add-links" id="In"><i class="fas fa-print"></i>In dữ
                liệu</a></h4>


    </div>
    <div class="menu-right">
        <h5>Thời gian hiện tại: <span id="current-time"></span></h5>

    </div>
</div>
<div class="table">
    <table class="category-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Size</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php foreach ($categories as $category) { ?>
            <tr>
                <td><?= $category['id']; ?></td>
                <td><?= $category['cate_name']; ?></td>
                <td><?= $category['has_size']; ?></td>
                <td><?= $category['create_at']; ?></td>
                <td><?= $category['update_at']; ?></td>



                <td class="action-links">
                    <?php if ($_SESSION['user_position'] != 0) { ?>
                        <a href="editCategory.php?id=<?php echo $category['id']; ?>" class="btn-sua">Sửa</a>
                        <a href="<?php echo $controller; ?>/admin/deleteCate.php?id=<?php echo $category['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')" class="btn-xoa">Xóa</a>
                    <?php } else
                        echo "Website has a virus";
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<!-- Hiển thị phân trang -->
<div class="pagination">
    <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
        <?php if ($page == $currentPage) { ?>
            <span class="current-page"><?php echo $page; ?></span>
        <?php } else { ?>
            <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
        <?php } ?>
    <?php } ?>
</div>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->