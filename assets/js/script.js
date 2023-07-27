function createSnowflakes() {
    const numFlakes = 100;
    const body = document.querySelector('body');

    for (let i = 0; i < numFlakes; i++) {
        const flake = document.createElement('div');
        flake.className = 'snowflake';
        flake.style.left = `${Math.random() * 98}%`;
        flake.style.animationDuration = `${Math.random() * 0 + 8}s`;
        flake.style.animationDelay = `${Math.random()}s`;
        body.appendChild(flake);
    }
}

createSnowflakes();

// ẩn hiện mật khẩu
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("passwordInput");
    var toggleIcon = document.querySelector(".password-toggle-icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    }
    toggleIcon.classList.toggle("active");
}

function togglePasswordConfirm() {
    var confirmPasswordInput = document.getElementById("confirmPasswordInput");
    var toggleIcon = document.querySelector(".password-wrapper:nth-child(2) .password-toggle-icon");

    if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        confirmPasswordInput.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }

    // Thêm hoặc xóa lớp "active" để thay đổi màu của biểu tượng
    toggleIcon.classList.toggle("active");
}

// hieu ung tuyet roi login.php
const container = document.querySelector('.snow-container');

function createSnowflake() {
  const snowflake = document.createElement('div');
  snowflake.classList.add('snowflake');

  snowflake.style.left = Math.random() * window.innerWidth + 'px';
  snowflake.style.animationDuration = Math.random() * 3 + 2 + 's';
  snowflake.style.opacity = Math.random();
  snowflake.style.fontSize = Math.random() * 10 + 10 + 'px';

  container.appendChild(snowflake);

  setTimeout(() => {
    snowflake.remove();
  }, parseFloat(snowflake.style.animationDuration) * 1000);
}

setInterval(createSnowflake, 100);

