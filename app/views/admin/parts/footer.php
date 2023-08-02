<!-- footer -->



<div class="overview-boxes">


</div>


</div>
</section>

<script>
// let sidebar = document.querySelector(".sidebar");
// let sidebarBtn = document.querySelector(".sidebarBtn");
// sidebarBtn.onclick = function () {
// sidebar.classList.toggle("active");
// if (sidebar.classList.contains("active")) {
//   sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
// } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
// };
// Hiển thị thông báo SweetAlert2 khi nhấp vào các thẻ a có lớp "custom-link"
const customLinks = document.querySelectorAll(".custom-link");
customLinks.forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a (chuyển hướng trang)

        // Lấy nội dung trong thẻ span
        const linkText = this.querySelector(".links_name").textContent;

        // Hiển thị thông báo SweetAlert2 tùy chỉnh
        Swal.fire({
            title: 'Thông báo',
            text: `${linkText}! Chức năng đang cập nhật `,
            icon: 'error',
            confirmButtonText: 'Đóng'
        });
    });
});
// Header
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
const thongbaoBtn = document.querySelector(".thongbao-btn");
const dropthong = document.querySelector(".thong-bao1");

thongbaoBtn.addEventListener("click", () => {
  dropthong.classList.toggle("active");
});
document.addEventListener("click", (event) => {
  const targetElement = event.target;
  if (!dropthong.contains(targetElement)) {
    dropthong.classList.remove("active");
  }
});
// JavaScript để thêm/loại bỏ class "shake" cho icon khi trang được tải
document.addEventListener("DOMContentLoaded", function() {
var bellIcon = document.querySelector(".thongbao-btn");
bellIcon.classList.add("shake");

// Thêm class "shake" cho icon sau 3 giây
setTimeout(function() {
bellIcon.classList.remove("shake");
}, 10000);
});
// Lấy tất cả các thẻ span chứa số lượng thông báo
var badges = document.querySelectorAll(".badge");

// Lấy thẻ icon thông báo
var bellIcon = document.querySelector(".thongbao-btn");

// Thêm sự kiện click cho icon thông báo
bellIcon.addEventListener("click", function() {
  // Khi người dùng ấn vào icon, ẩn hẳn tất cả số lượng thông báo bằng cách đặt thuộc tính CSS display thành "none"
  badges.forEach(function(badge) {
      badge.style.display = "none";
  });
});

// End header
</script>
<script src="../public/js/script.js"></script>
</body>

</html>

<!-- end footer -->