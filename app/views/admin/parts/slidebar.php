<!-- slidebar -->
<style>
    .sidebar {
        background-image: linear-gradient(to right, <?php echo isset($color1) ? $color1 : '#333'; ?>, <?php echo isset($color2) ? $color2 : '#555'; ?>, <?php echo isset($color3) ? $color3 : '#777'; ?>);
    }
</style>
<section class="home-section">
      <nav class="header">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Tìm kiếm..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <img src="images/profile.jpg" alt="" />
          <span class="admin_name">Admin</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>

      <div class="home-content">
<!-- end slidebar -->