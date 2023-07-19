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
  
