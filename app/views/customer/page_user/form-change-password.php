<?php require_once '../page_user/header.php' ?>
<?php require_once './change-password.php'?>
<header>
<div class="sidebar">
      <div class="logo-details">
        <a href="./index.php">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">User</span>
        </a>
      </div>
      <ul class="nav-links">
        <li>
          <a href="./form-edit-profile.php" class="">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Sửa Thông Tin</span>
          </a>
        </li>
        <li>
          <a href="./form-forgot-pasword.php" class="">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Quên Mật Khẩu</span>
          </a>
        </li>
        <li>
          <a href="./form-change-password.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Đổi Mật Khẩu</span>
          </a>
        </li>
        <li>
          <a href="./purchase-history.php" class="">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Lịch Sử Mua Hàng</span>
          </a>
        </li>
      </ul>
</div>
<section class="home-section">
      <nav class="header">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Đổi Mật Khẩu</span>
        </div>
<form method="post" style="width: 600px;" class="border border-primary rounded border-2 p-2">
<?php if($loi != "") { ?>
      <div class="alert alert-secondary"><?php echo $loi ?></div>
  <?php } ?>
  <div class="mb-3">
    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
    <input value="<?php echo $_SESSION['user_name'] ?>" type="text" disabled class="form-control" id="tendangnhap" name="tendangnhap">
  </div>
  <div class="mb-3">
    <label for="matkhaucu" class="form-label">Mật khẩu cũ</label>
    <input value="<?php if(isset($matkhaucu)==true) { echo $matkhaucu; }?>" type="password" class="form-control" id="matkhaucu" name="matkhaucu">
  </div>
  <div class="mb-3">
    <label for="matkhaumoi_1" class="form-label">Mật khẩu mới</label>
    <input value="<?php if(isset($matkhaumoi_1)==true) { echo $matkhaumoi_1; }?>" type="password" class="form-control" id="matkhaumoi_1" name="matkhaumoi_1">
  </div>
  <div class="mb-3">
    <label for="matkhaumoi_2" class="form-label">Nhập lại mật khẩu mới</label>
    <input type="password" class="form-control" id="matkhaumoi_2" name="matkhaumoi_2">
  </div>
  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
</form>
      </nav>
    </section>
</header>
    