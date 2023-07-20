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

