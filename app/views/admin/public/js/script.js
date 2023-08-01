let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

    // Hàm để cập nhật thời gian hiện tại
    function updateTime() {
      const currentTimeElement = document.getElementById('current-time');
      const now = new Date();
      currentTimeElement.innerText = now.toLocaleString(); // Hiển thị thời gian hiện tại

      // Tự động cập nhật thời gian mỗi giây
      setTimeout(updateTime, 1000); // 1000 milliseconds = 1 giây
    }

    // Gọi hàm updateTime() lần đầu để hiển thị thời gian
    updateTime();
  
    
// Lấy danh sách các menu
const menuItems = document.querySelectorAll(".sidebar .nav-links li a");

// Thêm sự kiện "click" vào mỗi menu
menuItems.forEach((menuItem) => {
    menuItem.addEventListener("click", () => {
        // Xóa lớp "active" khỏi tất cả các menu
        menuItems.forEach((item) => {
            item.classList.remove("active");
        });

        // Thêm lớp "active" vào menu được chọn
        menuItem.classList.add("active");

        // Lưu trạng thái menu đang được chọn vào localStorage
        const selectedMenu = menuItem.innerText.trim();
        localStorage.setItem("selectedMenu", selectedMenu);
    });
});

// Kiểm tra nếu có trạng thái lưu trữ, áp dụng màu nền cho menu tương ứng
document.addEventListener("DOMContentLoaded", () => {
    const selectedMenu = localStorage.getItem("selectedMenu");
    if (selectedMenu) {
        const menuToSelect = Array.from(menuItems).find(item => item.innerText.trim() === selectedMenu);
        if (menuToSelect) {
            menuToSelect.classList.add("active");
        }
    }
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

