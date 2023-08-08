<!-- footer -->



<div class="overview-boxes">


</div>


</div>
</section>

<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
sidebar.classList.toggle("active");
if (sidebar.classList.contains("active")) {
  sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};
// Hiển thị thông báo SweetAlert2 khi nhấp vào các thẻ a có lớp "custom-link"
const customLinks = document.querySelectorAll(".custom-link");
customLinks.forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a (chuyển hướng trang)

        // Lấy nội dung trong thẻ span
        const linkText = this.querySelector(".links_name").textContent;

        // Hiển thị thông báo SweetAlert2 tùy chỉnh
        Swal.fire({
            imageUrl: "../images/icon.gif",
            imageWidth: 200, // Chiều rộng hình ảnh tùy chỉnh
            imageHeight: 200, // Chiều cao hình ảnh tùy chỉnh
            imageAlt: "Hình ảnh tùy chỉnh",
            title: "Thông báo",
            text: "Chức năng đang cập nhật.",
        });
    });
});
   // Lấy tất cả các phần tử có lớp 'count-up'
   const countUpElements = document.querySelectorAll('.count-up');

// Thời gian chuyển động (tính bằng giây)
const duration = 5;

// Tính toán số bước chuyển động mỗi giây
const stepsPerSecond = 50;
const totalSteps = duration * stepsPerSecond;

// Hàm thực hiện hiệu ứng số chạy
function animateNumber(element, endValue) {
  const stepValue = endValue / totalSteps;
  let currentStep = 0;

  function updateValue() {
    if (currentStep <= totalSteps) {
      const value = Math.round(stepValue * currentStep);
      element.textContent = value.toLocaleString();
      currentStep++;
      setTimeout(updateValue, 1000 / stepsPerSecond);
    }
  }

  updateValue();
}

// Gọi hàm animateNumber cho từng phần tử
countUpElements.forEach((element) => {
  const endValue = parseInt(element.dataset.endValue, 10);
  animateNumber(element, endValue);
});

  // Lấy thẻ span và thẻ input
  const spanElement = document.getElementById('dashboardText');
  const inputElement = document.getElementById('searchInput');

  // Chữ cần gõ tự động cho span và placeholder cho input
  const textToTypeSpan = "Xin chào admin";
  const textToTypeInput = "Tìm kiếm...";

  // Thời gian gõ mỗi ký tự (tính bằng mili giây)
  const typingSpeed = 100;

  // Hàm thực hiện hiệu ứng gõ tự động cho span
  function typeTextForSpan() {
    let index = 0;
    const interval = setInterval(() => {
      if (index < textToTypeSpan.length) {
        const currentText = spanElement.textContent;
        spanElement.textContent = currentText + textToTypeSpan[index];
        index++;
      } else {
        clearInterval(interval);
      }
    }, typingSpeed);
  }

  // Hàm thực hiện hiệu ứng gõ tự động cho input
  function typeTextForInput() {
    let index = 0;
    const interval = setInterval(() => {
      if (index < textToTypeInput.length) {
        const currentText = inputElement.getAttribute('placeholder');
        inputElement.setAttribute('placeholder', currentText + textToTypeInput[index]);
        index++;
      } else {
        clearInterval(interval);
      }
    }, typingSpeed);
  }

  // Gọi cả hai hàm typeTextForSpan và typeTextForInput sau khi trang tải xong
  window.onload = () => {
    typeTextForSpan();
    typeTextForInput();
  };



</script>
<script src="../public/js/script.js"></script>
</body>

</html>

<!-- end footer -->