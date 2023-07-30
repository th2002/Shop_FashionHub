document.addEventListener('DOMContentLoaded', function() {
  const btnAddCart = document.querySelectorAll('.product_btn-add_cart');
  const btnIncrease = document.querySelectorAll('.quantity-btn.increase');
  const btnDecrease = document.querySelectorAll('.quantity-btn.decrease');
  const ulListCart = document.querySelector('.nav_cart-list');

  // Hàm xử lý sự kiện click của button "+"
  function handleIncreaseClick(event) {
    const item = event.target.closest('.cart-item');
    const quantityInput = item.querySelector('.quantity-input');
    let quantity = parseInt(quantityInput.value);
    quantity++;
    quantityInput.value = quantity;
    updateQuantityOnServer(item, quantity);
    totalPriceItem(item, quantity);
  }

  // Hàm xử lý sự kiện click của button "-"
  function handleDecreaseClick(event) {
    const item = event.target.closest('.cart-item');
    const quantityInput = item.querySelector('.quantity-input');
    let quantity = parseInt(quantityInput.value);
    if (quantity > 1) {
      quantity--;
      quantityInput.value = quantity;
      updateQuantityOnServer(item, quantity);
      totalPriceItem(item, quantity);
    }
  }

  // Gắn sự kiện click cho button "+"
  btnIncrease.forEach(btn => {
    btn.addEventListener('click', handleIncreaseClick);
  });

  // Gắn sự kiện click cho button "-"
  btnDecrease.forEach(btn => {
    btn.addEventListener('click', handleDecreaseClick);
  });

  // Các hàm khác không thay đổi và vẫn giữ nguyên như trong mã JavaScript gốc
  // ...

  // Hàm xử lý AJAX
  function updateQuantityOnServer(item, quantity) {
    const id_price = item.dataset.id_price;
    const formData = new FormData();
    formData.append('id_price', id_price);
    formData.append('quantity', quantity);

    fetch(updateCartUrl, {
      method: 'POST',
      body: formData,
    })
    .then(response => response.json())
    .then(data => {
      // Xử lý phản hồi từ server nếu cần
      // Ví dụ: cập nhật số lượng trên giao diện
      console.log('Số lượng đã cập nhật thành công:', data.quantity);
    })
    .catch(error => {
      console.error('Lỗi khi cập nhật số lượng:', error);
    });
  }

  // ...
});
