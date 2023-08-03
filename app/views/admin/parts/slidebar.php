<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Shop_FashionHub/global.php');



?>

<!-- slidebar -->
<style>
/* .sidebar {
        background-image: linear-gradient(to right, <?php echo isset($color1) ? $color1 : '#333'; ?>, <?php echo isset($color2) ? $color2 : '#555'; ?>, <?php echo isset($color3) ? $color3 : '#777'; ?>);
<<<<<<< HEAD
    }
    .profile-details{
      position: relative;
      display: inline-block;
    }
    .drop-menu{
      display: none;
            position: absolute;
            background-color: beige;
            width: 100%;
            box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.6);
            z-index: 1;
            margin-top: 10px;
            right: 0;
            opacity: 0;
            transform: translateY(-10%);
            transition: opacity 2.9s ease, transform 8.9s ease;
    }
    .profile-details.active .drop-menu{
      display: block;
      opacity: 1;
            transform: translateY(60%);
    }
    .profile-details.active .drop-menu a{
      opacity: 1;
            transform: translateY(0%);
    }
    .drop-menu a{
      color: black;
            padding: 12px 12px;
            display: block;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.9s ease;
    }
    .drop-menu a:hover{
      background-color: #081D45;
      color: #fff;
      border-radius: 5px;

    }
=======
    } */
.profile-details {
    position: relative;
    display: inline-block;
}

.drop-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    width: 100%;
    box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.6);
    z-index: 1;
    margin-top: 10px;
    right: 0;
    opacity: 0;
    transform: translateY(-10%);
    transition: opacity 2.9s ease, transform 8.9s ease;
}

.profile-details.active .drop-menu {
    display: block;
    opacity: 1;
    transform: translateY(60%);
}

.profile-details.active .drop-menu a {
    opacity: 1;
    transform: translateY(0%);
}

.drop-menu a {
    color: black;
    padding: 12px 12px;
    display: flex;
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.9s ease;
    align-items: center;
}

.drop-menu a i {
    padding: 5px;
    color: #081D45;
}
.drop-menu a i:hover{
  color: #fff;
}

.drop-menu a:hover {
    background-color: #081D45;
    color: #fff;
    border-radius: 5px;

}
>>>>>>> sub_main2
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
<<<<<<< HEAD
          <img src="../images/luu_duoc_phi.webp" alt="" class="drop-btn"/>
          <span class="admin_name"><?php echo $_SESSION['user_fullname']; ?></span>
          <i class="bx bx-chevron-down" ></i>
          <div class="drop-menu">
            <a href="#">Làm 1 gậy</a>
            <a href="#">Làm 2 gậy</a>
            <a href="#">Làm 3 gậy</a>
            <a href="#">Ngất</a>

          </div>
        </div>
      </nav>

      <div class="home-content">
<!-- end slidebar -->
<script>
const dropdown = document.querySelector(".profile-details");
const dropbtn = document.querySelector(".drop-btn");
const dropmenu = document.querySelector(".drop-menu");

dropbtn.addEventListener("click", () => {
    dropdown.classList.toggle("active");
    if (dropdown.classList.contains("active")) {
        dropmenu.style.display = "block";
        setTimeout(() => {
            dropmenu.style.opacity = "1";
            dropmenu.style.transform = "translateY(100)";
        }, 50);
    } else {
        dropmenu.style.opacity = "0";
        dropmenu.style.transform = "translateY(60%)";
        setTimeout(() => {
            dropmenu.style.display = "none";
        }, 300);
    }
});

document.addEventListener("click", (event) => {
    const targetElement = event.target;
    if (!dropdown.contains(targetElement)) {
        dropdown.classList.remove("active");
        dropmenu.style.opacity = "0";
        dropmenu.style.transform = "translateY(60%)";
        setTimeout(() => {
            dropmenu.style.display = "none";
        }, 9000);
    }
});

</script>
=======
            <img src="../images/luu_duoc_phi.webp" alt="" class="drop-btn" />
            <span class="admin_name"><?php echo $_SESSION['user_fullname']; ?></span>
            <i class="bx bx-chevron-down"></i>
            <div class="drop-menu">
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-face-grin-hearts"></i>
                    <span class="links_name">Làm 1 gậy</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-headphones"></i>
                    <span class="links_name">Làm 2 gậy</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-user-astronaut"></i>
                    <span class="links_name">Làm 3 gậy</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-spider"></i>
                    <span class="links_name">Ngất</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Cài đặt</span>
                </a>
                <a href="<?php echo $viewURL;  ?>/view/setting.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="links_name">Logout</span>
                </a>


            </div>
        </div>
    </nav>

    <div class="home-content">
        <!-- end slidebar -->
        <script>
        const dropdown = document.querySelector(".profile-details");
        const dropbtn = document.querySelector(".drop-btn");
        const dropmenu = document.querySelector(".drop-menu");

        dropbtn.addEventListener("click", () => {
            dropdown.classList.toggle("active");
            if (dropdown.classList.contains("active")) {
                dropmenu.style.display = "block";
                setTimeout(() => {
                    dropmenu.style.opacity = "1";
                    dropmenu.style.transform = "translateY(100)";
                }, 50);
            } else {
                dropmenu.style.opacity = "0";
                dropmenu.style.transform = "translateY(60%)";
                setTimeout(() => {
                    dropmenu.style.display = "none";
                }, 300);
            }
        });

        document.addEventListener("click", (event) => {
            const targetElement = event.target;
            if (!dropdown.contains(targetElement)) {
                dropdown.classList.remove("active");
                dropmenu.style.opacity = "0";
                dropmenu.style.transform = "translateY(60%)";
                setTimeout(() => {
                    dropmenu.style.display = "none";
                }, 9000);
            }
        });
        </script>
>>>>>>> sub_main2
