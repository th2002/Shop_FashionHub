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
            icon: "custom-icon.png",
            title: "Thông báo",
            text: "Đây là thông báo với icon tùy chỉnh.",
        });
    });
});
</script>
<script src="../public/js/script.js"></script>
</body>

</html>

<!-- end footer -->